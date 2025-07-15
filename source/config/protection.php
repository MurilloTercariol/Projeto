<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['user_id'])){
    die('Erro 401: Acesso não autorizado.<br> <a href="../view/LoginView.php">Fazer Login<a/>');
}