<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/Projeto/dist/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Login</title>
</head>
<body class="bg-gray-500">
    <h2>Login</h2>

    <div
      class="flex flex-col place-items-center gap-5 mt-50 ml-auto mr-auto bg-white p-4 rounded-lg shadow-lg w-60 h-52"
    >
    <form method="POST" action="../controller/LoginController.php">
        <label>
            <input type="text" name="usuario" id="usuario" class="border-b-2 border-gray-400 bg-transparent focus:border-blue-500 focus:outline-none px-2 py-1 transition-colors duration-300" placeholder="Usuário" required>
        </label>
        <br><br>

        <label>
            <input type="password" name="senha" id="senha" class="border-b-2 border-gray-400 bg-transparent focus:border-blue-500 focus:outline-none px-2 py-1 transition-colors duration-300" placeholder="Senha" required>
        </label>
        <br><br>
        <br>
        
        <a href="home.html" class="rounded-sm w-12 h-7 hover:bg-purple-400 cursor-pointer">Voltar</a>
        <button type="submit" class="rounded-sm w-12 h-7 hover:bg-purple-400 ml-24 cursor-pointer">Logar</button>
    </form>
    </div>
</body>
</html>
