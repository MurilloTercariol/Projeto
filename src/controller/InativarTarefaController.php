<?php
    include("../models/TarefasModel.php");
    session_start();
    
    if (isset($_GET['id']) && isset($_SESSION['user_id'])) {
        $tarefaID = (int)$_GET['id'];
        
        // Futuramente, é importante verificar se o usuário logado é o dono da tarefa antes de excluir.

        try {
            // Chama o novo método de desativação
            $sucesso = Tarefa::InativarTarefa($tarefaID);

            if ($sucesso) {
                // Redireciona para o painel com mensagem de sucesso
                $_SESSION['sucesso_formulario'] = 'Tarefa excluída com sucesso!';
            } else {
                // Redireciona com mensagem de erro
                $_SESSION['erros_formulario'] = ['Não foi possível excluir a tarefa.'];
            }

        } catch (Exception $e) {
            error_log($e->getMessage());
            $_SESSION['erros_formulario'] = ['Ocorreu um erro inesperado.'];
        }

        // Redireciona de volta para o painel em todos os casos
        header('Location: ../view/Principal.php');
        exit();
    }