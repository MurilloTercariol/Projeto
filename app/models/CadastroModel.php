<?php
class Usuario
{
    private static function conectar(): PDO
    {
        return new PDO(
            'mysql:host=localhost;dbname=seubanco;charset=utf8',
            'usuario', 'senha',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    public static function inserir(string $u, string $e, string $s): void
    {
        $pdo = self::conectar();
        $sql = "INSERT INTO usuarios (username,email,senha)
                VALUES (:u,:e,:s)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':u' => $u,
            ':e' => $e,
            ':s' => password_hash($s, PASSWORD_DEFAULT)
        ]);
    }
}
