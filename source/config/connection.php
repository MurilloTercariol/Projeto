<?php

$host = '26.6.89.217';
$dbname = 'php';
$username = 'murillo';
$password = '1234';
$charset = 'utf8mb4';

try {

    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES      => false,

    ];

    $pdo = new PDO($dsn, $username, $password, $options);

} catch (PDOException $e) {

    error_log('[' . date('Y-m-d H:i:s') . '] PDO Error: ' . $e->getMessage() . PHP_EOL, 3, __DIR__ . '/erros.log');

    http_response_code(500);
    echo "Ops! Houve um problema interno. Tente novamente mais tarde.";
    exit;
}

?>