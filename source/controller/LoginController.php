<?php

require('../models/LoginModel.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['usuario'] ?? '';
    $pass = $_POST['senha'] ?? '';

    $dados = Usuario::autenticar($user, $pass);

    if ($dados) {
        $_SESSION['user_id'] = $dados['id'];
        $_SESSION['username'] = $dados['username'];
        header('Location: ../view/Principal.php');
        exit;
    }

    echo 'Usuário ou senha inválidos!';
}else {
    echo 'Acesso inválido - use POST';
}
















?>