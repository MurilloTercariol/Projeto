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
    <div class="inserir-container">
        <div class="inserir-form">
            <form method="POST" action="../controller/InserirController.php">

                <label>
                    Insira o Título da Tarefa:
                    <input type="text" name="titulo" id="titulo" required>
                </label>
                <br>


            </form>
        </div>
    </div>
</body>
</html>