<?php
require_once __DIR__ . '/env.php';

class DB
{
    public static function conn()
    {
        static $pdo = null;

        if ($pdo !== null) {
            return $pdo;
        }

        loadEnv(__DIR__ . '/../../.env');

        $host = env('DB_HOST', '127.0.0.1');
        $port = env('DB_PORT', '5432');
        $name = env('DB_NAME', '');
        $user = env('DB_USER', '');
        $pass = env('DB_PASS', '');

        $dsn = "pgsql:host=$host;port=$port;dbname=$name";

        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        return $pdo;
    }
}