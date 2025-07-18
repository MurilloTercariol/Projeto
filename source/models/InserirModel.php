<?php

    class Tarefa
    {
        private static function conectar(): PDO
        {
            return new PDO(
            'mysql:host=26.6.89.217;dbname=php;charset=utf8',
            'murillo', '1234',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }

        public static function CriarTarefa($user_id, $titulo, $descricao, $prazo): void {
            $pdo = self::conectar();
            $sql = "INSERT INTO tarefas (user_id, titulo, descricao, prazo) VALUES (:user_id, :titulo, :descricao, :prazo)";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':user_id' => $user_id,
                ':titulo' => $titulo ,
                ':descricao' => $descricao,
                ':prazo' => $prazo 
            ]);
        }
    }