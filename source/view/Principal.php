<?php

include_once("../config/protection.php");
include_once("../config/connection.php");
include_once("../models/TarefasModel.php");
include_once("../controller/TarefasController.php"); // Este arquivo deve preparar $tarefasPorStatus

// NENHUM FOREACH AQUI ANTES DO HTML!
// O foreach DEVE estar DENTRO do <body> ou onde você quer exibir os itens.

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Agenda</title>
</head>
<body>
    <h1>Boa</h1>
    <a href="../view/Inserir.php">Criar tarefa</a>

    <h2>Tarefas A Fazer</h2>
    <div>
        <?php if (!empty($tarefasPorStatus['a-fazer'])): ?>
            <?php foreach ($tarefasPorStatus['a-fazer'] as $tarefa): ?>
                <h3><?php echo htmlspecialchars($tarefa['titulo']); ?></h3>
                <p><?php echo htmlspecialchars($tarefa['descricao']); ?></p>
                <hr> <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhuma tarefa "A Fazer" para exibir.</p>
        <?php endif; ?>
    </div>

    </body>
</html>