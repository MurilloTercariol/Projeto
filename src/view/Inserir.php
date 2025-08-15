<?php
include('../config/protection.php');
echo "<a href='../config/logout.php'>Sair</a>";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <h1>Criar Nova Tarefa</h1>
    <div class="inserir-container">
        <div class="inserir-form">
            <form method="POST" action="../controller/TarefasController.php">

                <label for="titulo">Título da Tarefa:</label><br>
                <input type="text" name="titulo" id="titulo" required>
                <br>

                <label for="descricao">Descrição:</label><br>
                <textarea  name="descricao" id="descricao" row="4" required></textarea>
                <br>

                <label for="prazo">Para entregar:</label><br>
                <input type="date" name="prazo" id="prazo">
                <br>

                <label for="status">Status:</label><br>
                    <select id="status" name="status">
                        <option value="a-fazer">A fazer</option>
                        <option value="em-andamento">Em andamento</option>
                        <option value="finalizada">Finalizada</option>
                    </select>

                <button type="submit">Salvar Tarefa</button><br>
                <a href ="../view/Principal.php">Voltar</a>
            </form>
        </div>
    </div>
</body>
</html>