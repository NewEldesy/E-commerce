<?php

function load_env(): void {
    $file = __DIR__ . '/.env';
    if (!file_exists($file)) return;
    foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (str_starts_with(trim($line), '#')) continue;
        [$key, $value] = array_map('trim', explode('=', $line, 2));
        $_ENV[$key] = $value;
    }
}

load_env();

function db(): PDO {
    static $connexion = null;
    if ($connexion !== null) return $connexion;

    $host     = $_ENV['DB_HOST']     ?? 'localhost';
    $dbname   = $_ENV['DB_NAME']     ?? 'ecommerce';
    $username = $_ENV['DB_USER']     ?? 'root';
    $password = $_ENV['DB_PASSWORD'] ?? '';

    try {
        $connexion = new PDO(
            "mysql:host={$host};dbname={$dbname};charset=utf8mb4",
            $username,
            $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }

    return $connexion;
}
