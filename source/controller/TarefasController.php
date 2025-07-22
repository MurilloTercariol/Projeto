<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);


    include('../config/protection.php');
    require('../models/TarefasModel.php');

    class InserirController
    {
        public function InserirTarefa()
        {
            $user_id = $_SESSION['user_id'];
            $titulo = trim($_POST['titulo'] ?? '');
            $descricao = !empty(trim($_POST['descricao'])) ? trim($_POST['descricao']) :NULL;
            $prazo = !empty(trim($_POST['prazo'])) ? trim($_POST['prazo']) :NULL;

            $erros = [];

            if ($titulo === '') $erros[] = 'Obrigatório o título da tarefa';
            if ($descricao === '') $erros[] = 'Obrigatório o descrição da tarefa';
            
            if($erros) {
                echo implode('<br>', $erros);
                return;
            }
            
            try {
                Tarefa::CriarTarefa($user_id, $titulo, $descricao, $prazo);
                echo $_SESSION['username'] . ', sua tarefa foi criada com sucesso!';
            } catch (PDOException $ex) {
                if($ex->getCode() == 23000){
                     echo 'Erro: ' .  $ex->getCode() . ', já existe uma tarefa com este título. <br>';
                     echo "Mensagem de Erro: " . $ex->getMessage() . "<br>";
                } else {
                    echo 'Erro: ' . $ex->getCode() . '<br>';
                    echo "Mensagem de Erro: " . $ex->getMessage() . "<br>";
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
