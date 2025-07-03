<?php
// Startet die Session
session_start();

// Setzt die Benutzersession zurück
unset($_SESSION["usr"]);
unset($_SESSION["guest"]);

// Datenbankverbindung einbinden
require_once("database_login.php");

// Fehleranzeigen für Login und Registrierung initialisieren (CSS-Display)
$loginError = 'display:none;';
$registerError = 'display:none;';

// Prüft, ob das Formular abgeschickt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['guest'])) {
    // Gastzugang
    unset($_SESSION["usr"]);
    $_SESSION['guest'] = true;
    header("Location: index.php");
    exit();
  }
  $usr = htmlspecialchars($_POST['usr']);
  $pwd = htmlspecialchars($_POST['pwd']);

  $sql = "SELECT * FROM Users WHERE Username=:usr";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([':usr' => $usr]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (isset($_POST["login"])) {
    if ($result && count($result) == 1) {
      $user = $result[0];
      // Passwort prüfen
      if (password_verify($pwd, $user['Password'])) {
        // Login erfolgreich
        $_SESSION['usr'] = $user['Username'];
        unset($_SESSION["guest"]);

        header("Location: index.php");
        exit();
      } else {
        $loginError = "";
      }
    } else {
      $loginError = "";
    }
  } else if (isset($_POST["register"])) {
    if (count($result) == 0) {
      // Passwort hashen
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      // Benutzer in die Datenbank einfügen
      $insertSql = "INSERT INTO Users (Username, Password, Description) VALUES (:username, :password, '')";
      $insertStmt = $pdo->prepare($insertSql);
      $insertSuccess = $insertStmt->execute([
        ':username' => $usr,
        ':password' => $hashedPassword
      ]);

      if ($insertSuccess) {
        // Direkt nach Registrierung einloggen und weiterleiten
        $_SESSION['usr'] = $usr;
        header("Location: index.php");
        exit();
      } else {
        // Fehler beim Einfügen
        $registerError = "";
      }
    } else {
      $registerError = "";
    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <?php // Fügt den gemeinsamen Head-Bereich ein
  include("templates/head.php"); ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rezepte</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- Navigationsleiste -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" style="margin-bottom: 100px;">
    <div class="container">
      <a class="navbar-brand fw-bold text-warning" href="index">RezepteSite</a>
    </div>
  </nav>
  <!-- Fehlermeldung für falschen Benutzernamen oder Passwort -->
  <div class="alert alert-danger" role="alert" style="margin-top: -70px; margin-bottom: 70px; <?= $loginError ?>">
    ❌ Nutzername oder Passwort ist falsch. Bitte versuchen Sie es erneut.
  </div>
  <!-- Fehlermeldung für vergebenen Benutzernamen -->
  <div class="alert alert-danger" role="alert" style="margin-top: -7px; margin-bottom: 70px; <?= $registerError ?>">
    ❌ Nutzername ist vergeben. Bitte wählen Sie einen anderen.
  </div>
  <!-- Hauptbereich -->
  <div class="login-container">
    <h2>Login</h2>
    <form method="POST" action="">
      <label for="email">Nutzername</label>
      <input type="text" id="email" name="usr" placeholder="Nutzername eingeben" required>

      <label for="password">Passwort</label>
      <input type="password" id="password" name="pwd" placeholder="Passwort eingeben" required>

      <div class="forgot-password">Passwort vergessen?</div>

      <button type="submit" name="login">Anmelden</button>
      <input type="submit" name="register" style="display:none;">
      <div class="register"><a href="#" onclick="document.querySelector('input[name=register]').click(); return false;">Registrieren</a></div>

    </form>
    <form method="POST" action="" style="margin-top: 20px;">
      <input style="display: none;" type="submit" name="guest" value="true" />
      <div class="register"><a href="#" onclick="document.querySelector('input[name=guest]').click(); return false;">Gastzugang</a></div>
  </div>
  <!-- Footer -->
  <footer>
    <div class="container">
      &copy; 2025 RezepteSite - Alle Rechte vorbehalten
    </div>
  </footer>
</body>

</html>