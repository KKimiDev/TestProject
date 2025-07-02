<?php
session_start();

if (!isset($_SESSION['usr']) && !isset($_SESSION['guest'])) {
    // Benutzer ist nicht eingeloggt → zur Login-Seite weiterleiten
    header("Location: http://localhost/sites/Rezepte/login.php");
    exit;
}
?>