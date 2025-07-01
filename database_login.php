<?php
$servername = "localhost";
$username = "root"; // Standard bei XAMPP
$password = "";
$dbname = "Rezepte";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
?>