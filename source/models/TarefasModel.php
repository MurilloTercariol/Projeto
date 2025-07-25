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
            $sql = "SELECT id, user_id, titulo, descricao, prazo, status FROM tarefas WHERE user_id = :user_id AND ativo = 1 ORDER BY prazo ASC, id DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $userID, PDO::PARAM_INT);
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

        public static function InativarTarefa($tarefaID): bool
        {
            $pdo = self::conectar();
            $sql = "UPDATE tarefas SET ativo = 0 WHERE id = :tarefaID";
            
            try {
                $stmt= $pdo->prepare($sql);
                $stmt->bindValue(':tarefaID', $tarefaID, PDO::PARAM_INT);
                return $stmt->execute();
            } catch (PDOException $e) {
                error_log("Erro ao desativar tarefa: " . $e->getMessage());
                return false;
            }
        }

        public static function getTarefaPorId(int $tarefaID)
        {
            $pdo = self::conectar();

            $sql = "SELECT id, titulo, descricao, prazo, status FROM tarefas WHERE id = :id AND ativo = 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $tarefaID, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public static function EditarTarefa(int $id, string $titulo, ?string $descricao, ?string $prazo, string $status): bool
        {
            $pdo = self::conectar();
            $sql = "UPDATE tarefas SET titulo    = :titulo
                                       descricao = :descricao
                                       prazo     = :prazo
                                       status    = :status
                                       WHERE id  = :id";
            
            try {
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':titulo'      , $titulo,  PDO::PARAM_STR);
                $stmt->bindValue(':descricao'   , $descricao,PDO::PARAM_STR);
                $stmt->bindValue(':prazo'       , $prazo,   PDO::PARAM_STR);
                $stmt->bindValue(':status'      , $status,  PDO::PARAM_STR);
                $stmt->bindValue(':id'          , $id,      PDO::PARAM_INT);

                return $stmt->execute();
            } catch (PDOException $e){
                error_log("Erro ao atualizar tarefa: " . $e->getMessage());
                return false;
            }
        }
    }
