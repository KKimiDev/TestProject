<?php 
    require_once("check_login.php");

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if (empty($name) || empty($email) || empty($message)) {
        die("Alle Felder müssen ausgefüllt werden.");
    }

    $host = 'localhost';
    $db   = 'kontakt';
    $user = 'root';
    $pass = '';

    $dsn = "mysql:host=$host;dbname=$db;";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,        
        PDO::ATTR_EMULATE_PREPARES   => false,                   
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        die("Fehler bei der Verbindung zur Datenbank: " . $e->getMessage());
    }

    $sql = "INSERT INTO kontakte (name, email, message) VALUES (:name, :email, :message)";
    $stmt = $pdo->prepare($sql);

    // Bind the values to the placeholders and execute
    $stmt->execute(['name' => $name, 'email' => $email, 'message' => $message]);

    echo "Daten erfolgreich gespeichert!";
?>
