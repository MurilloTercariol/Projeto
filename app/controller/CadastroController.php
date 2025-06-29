<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../models/CadastroModel.php';   // <- model certo

class UsuarioController
{
    public function cadastrar()
    {
        $u = trim($_POST['usuario'] ?? '');   // agora bate com o form
        $e = trim($_POST['email']   ?? '');
        $s = $_POST['senha']        ?? '';

        // Validações básicas
        $erros = [];
        if ($u === '')                               $erros[] = 'Username vazio';
        if (!filter_var($e, FILTER_VALIDATE_EMAIL))  $erros[] = 'E‑mail inválido';
        if (strlen($s) < 6)                          $erros[] = 'Senha muito curta';

        if ($erros) {
            echo implode('<br>', $erros);
            return;
        }

        try {
            Usuario::inserir($u, $e, $s);
            echo "Usuário cadastrado com sucesso!";
        } catch (PDOException $ex) {
            if ($ex->getCode() == 23000) {
                echo "Username ou e‑mail já existe.";
            } else {
                echo "Erro: " . $ex->getMessage();
            }
        }
    }
}

/* ---  BLOCO QUE REALMENTE EXECUTA  --- */
$ctrl = new UsuarioController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ctrl->cadastrar();
} else {
    echo 'Use o formulário para enviar';
}
