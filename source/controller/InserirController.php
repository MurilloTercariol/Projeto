<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require('../models/InserirModel.php');

    class InserirController
    {
        public function InserirTarefa()
        {
            $user_id = trim($_POST['user_id'] ?? '');
            $titulo = trim($_POST['titulo'] ?? '');
            $descricao = !empty(trim($_POST['descricao'])) ? trim($_POST['descricao']) :NULL;
            $prazo = !empty(trim($_POST['prazo'])) ? trim($_POST['prazo']) :NULL;

            $erros = [];

            if ($titulo === '') $erros[] = 'Obrigatório o título da tarefa';
            if ($titulo === '') $erros[] = 'Obrigatório o descrição da tarefa';
            
            if($erros) {
                echo implode('<br>', $erros);
            }
            
            try {
                Tarefa::CriarTarefa($user_id, $titulo, $descricao, $prazo);
                echo $_SESSION['usario'] . ', Sua tarefa foi criada com sucesso!';
            } catch (PDOException $ex) {
                if($ex->getCode() == 23000){
                     echo 'Erro:' . $ex->getCode();
                } else {
                    echo 'Erro: ' . $ex->getCode();
                }   
            }
        }
    }
    
    $ctrl = new InserirController();

   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ctrl->InserirTarefa();
    } else {
    echo 'Use o formulário para enviar';
    }
