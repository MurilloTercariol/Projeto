<?php

class Usuario
{
    private static function conectar(): PDO
    {
        return new PDO(
            'mysql:host=26.6.89.217;dbname=php;charset=utf8',
            'murillo', '1234',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    public static function autenticar(string $username, string $senha): ?array
    {
        $pdo = self::conectar();

        $sql = "SELECT * FROM usuarios WHERE username = :u LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':u' => $username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($senha, $user['senha'])) {
            return $user;
        }

        return null;
    }   
}

