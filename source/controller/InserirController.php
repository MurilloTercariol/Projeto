<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require('../models/InserirModel.php');

    class InserirController
    {
        public function InserirTarefa()
        {
            $user_id = trim($_POST['user_id'] ?? '');
            $titulo = trim($_POST['titulo'] ?? '');
            $descricao = !empty(trim($_POST['descricao'])) ? trim($_POST['descricao']) :NULL;
            $prazo = !empty(trim($_POST['prazo'])) ? trim($_POST['prazo']) :NULL;

            $erros = [];
            
        }
    }
    