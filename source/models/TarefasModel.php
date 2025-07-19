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

        public static function ExibirTarefas($userID): array
        {
            $pdo = self::conectar();
            $sql = "SELECT id, user_id, titulo, descricao, prazo, status FROM tarefas WHERE user_id = :user_id ORDER BY prazo ASC, id DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();

            $todasAsTarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $tarefasOrganizadas = [
                'a-fazer'       => [],
                'em-andamento'  => [],
                'finalizado'    => []
            ];

            foreach($todasAsTarefas as $tarefa) {
                $status = $tarefa['status'];
                if (isset($tarefasOrganizadas[$status])) {
                    $tarefasOrganizadas[$status][] = $tarefa;
                }
            }

            return $tarefasOrganizadas;
        }
    }