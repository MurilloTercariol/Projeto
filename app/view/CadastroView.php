<?php
include("../config/connection.php");
include("../models/CadastroModel.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="cadastro-container">
        <div class="form-container">
            <form class="form" method="POST" action="CadastroView.php">
                <label>Nome de Usuário:</label><input class="label" type="text" name="usuario" id="usuario"><br>
                <label>Email:<input class="label" type="text" name="email" id="email"><br>
                <label>Senha:<input class="label" type="password" name="senha" id="senha"><br>
                <a href="../controller/CadastroController.php"><button type="submit">Cadastrar</button>
                <a href="home.html"><button type="button">Voltar</button>
            </form>
        </div>
    </div>
</body>
</html>