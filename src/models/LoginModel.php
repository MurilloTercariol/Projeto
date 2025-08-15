<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Usuario
{
    private static function conectar(): PDO
    {
        return new PDO(
            'mysql:host=26.132.134.2;dbname=php;charset=utf8',
            'Muka', '1234',
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