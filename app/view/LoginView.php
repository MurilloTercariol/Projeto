<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <form method="POST" action="../controller/LoginController.php">
        <label>
            Nome de Usuário:
            <input type="text" name="usuario" id="usuario" required>
        </label>
        <br><br>

        <label>
            Senha:
            <input type="password" name="senha" id="senha" required>
        </label>
        <br><br>

        <button type="submit">Entrar</button>
        <a href="home.html">Voltar</a>
    </form>
</body>
</html>
