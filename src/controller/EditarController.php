<?php
session_start();
include_once("../models/TarefasModel.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['titulo'], $_POST['status'])) {
    
    $id = (int)$_POST['id'];

    $titulo = trim($_POST['titulo']);
    $descricao = !empty(trim($_POST['descricao'])) ? trim($_POST['descricao']) : null;
    $prazo = !empty(trim($_POST['prazo'])) ? trim($_POST['prazo']) : null;
    $status =  $_POST['status'];

    if(empty($titulo)) {
        $_SESSION['erros_formulario'] = ['O título não pode estar vazio.'];
        header('Location: ../view/Editar.php?id=' . $id);
        exit();
    }

    $sucesso = Tarefa::EditarTarefa($id, $titulo, $descricao, $prazo, $status);

    if ($sucesso) {
        $_SESSION['sucesso_formulario'] = 'Tarefa atualizada com sucesso!';
    } else {
        $_SESSION['erros_formulario'] = ['Ocorreu um erro ao atualizar a tarefa.'];
    }

    header('Location: ../view/Principal.php');
    exit();

} else {
    header('Location: ../view/Principal.php');
    exit();
}
