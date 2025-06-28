<?php
require_once './models/Usuario.php';

class UsuarioController
{
    public function form()          // GET: mostra o form
    {
        require './views/usuario/form.php';
    }

    public function cadastrar()     // POST: grava no banco
    {
        $u = trim($_POST['username'] ?? '');
        $e = trim($_POST['email']    ?? '');
        $s = $_POST['senha']         ?? '';

        // Validações básicas
        $erros = [];
        if ($u === '')                            $erros[] = 'Username vazio';
        if (!filter_var($e, FILTER_VALIDATE_EMAIL)) $erros[] = 'E‑mail inválido';
        if (strlen($s) < 6)                       $erros[] = 'Senha muito curta';

        if ($erros) {
            echo implode('<br>', $erros);
            return;
        }

        try {
            Usuario::inserir($u, $e, $s);
            echo "Usuário cadastrado com sucesso!";
        } catch (PDOException $ex) {
            // detecta duplicidade (código 1062)
            if ($ex->getCode() == 23000) {
                echo "Username ou e‑mail já existe.";
            } else {
                echo "Erro: " . $ex->getMessage();
            }
        }
    }
}
