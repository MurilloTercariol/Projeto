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

    public static function logar(string $u, string $s): void
    {
        $pdo = self::conectar();
        $sql = "SELECT * FROM usuarios WHERE username='$u' AND senha='$senha';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':u' => $u,
            ':s' => password_hash($s, PASSWORD_DEFAULT)
        ]);
    }
}
