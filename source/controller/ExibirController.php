<?php
 require_once("../models/TarefasModel.php");

    $userId = $_SESSION['user_id'];

    try{
        $tarefasPorStatus = Tarefa::ExibirTarefas($userId);

        require_once("../view/Principal.php");
    } catch (PDOException $ex) {
        echo "Erro ao carregar tarefas: " . $ex->getMessage();
    }