<?php
$host = 'localhost';
$db   = 'Rezepte';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // Enable exceptions for errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,        // Fetch associative arrays
    PDO::ATTR_EMULATE_PREPARES   => false,                   // Use native prepared statements
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
