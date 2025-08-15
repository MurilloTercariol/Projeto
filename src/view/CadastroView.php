<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>

    <form method="POST" action="../controller/CadastroController.php">
        <label>
            Nome de Usuário:
            <input type="text" name="usuario" id="usuario" required>
        </label>
        <br><br>

        <label>
            E‑mail:
            <input type="email" name="email" id="email" required>
        </label>
        <br><br>

        <label>
            Senha:
            <input type="password" name="senha" id="senha" required>
        </label>
        <br><br>

        <button type="submit">Cadastrar</button>
        <a href="home.html">Voltar</a>
    </form>
</body>
</html>
