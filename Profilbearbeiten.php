
<?php
require_once("database_login.php");
require_once("check_login.php");

if(isset($_SESSION["guest"])) {
  header("Location: index.php");
}

$username = $_SESSION["usr"];

// Initialisieren von Variablen
$altpass = $neupass = $beschreibung = "";
$fehler = "";

// Prüfen, ob das Formular gesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Eingabewerte holen
    $altpass = $_POST['altpasswort'] ?? '';
    $neupass = $_POST['neupasswort'] ?? '';
    $beschreibung = $_POST['beschreibung'] ?? '';

    // Überprüfen, ob die Passworte eingegeben wurden
    if (empty($altpass) || empty($neupass)) {
        $fehler = "Bitte beide Passwörter eingeben.";
    } else {
        // SQL-Abfrage: Hole das gehashte Passwort des Benutzers
        $sql = "SELECT Password FROM users WHERE Username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        
        $pwd = $stmt->fetch();

        // Passwort überprüfen
        if ($pwd && password_verify($altpass, $pwd['Password'])) {
            // Passwort hashen
            $neupass_hash = password_hash($neupass, PASSWORD_DEFAULT);

            // SQL-Abfrage: Passwort in der Datenbank aktualisieren
            $sql = "UPDATE users SET Password = :newpass WHERE Username = :username";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['newpass' => $neupass_hash, 'username' => $username]);

            echo "Passwortänderung erfolgreich!";
        } else {
            $fehler = "Das alte Passwort ist falsch.";
        }
    }
    
    $sql = "UPDATE users SET Description = :beschreibung WHERE Username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['beschreibung' => $beschreibung, 'username' => $username]);
}

?>


<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profil bearbeiten</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>Profil bearbeiten</h1>
  
  <div class="profile-container">
    <div class="profile-header">
      <img class="profile-pic" src="Bilder/R.png" alt="Profilbild von User" />
      <div>
        <!-- Formular zum Bearbeiten des Profils -->
        <form class="folgen" method="POST" action="">
          <div class="zsm">
            <h1 class="veraenderung">Altes Passwort:</h1>
            <input type="password" placeholder="Altes Passwort" name="altpasswort" value="<?= htmlspecialchars($altpass) ?>" required>
          </div>

          <div class="zsm">
            <h1 class="veraenderung">Neues Passwort:</h1>
            <input type="password" placeholder="Neues Passwort" name="neupasswort" value="<?= htmlspecialchars($neupass) ?>" required>
          </div>

          <div class="zsm">
            <h1 class="veraenderung">Beschreibung:</h1>
            <input type="text" placeholder="Deine Profilbeschreibung" name="beschreibung" value="<?= htmlspecialchars($beschreibung) ?>">
          </div>

          <!-- Bestätigungsbutton -->
          <button type="submit" name="bestaetigen">Bestätigen</button>
          
          <!-- Fehlerausgabe, falls es welche gibt -->
          <?php if ($fehler): ?>
            <p style="color: red;"><?= $fehler ?></p>
          <?php endif; ?>
        </form>
      </div>
    </div>
</body>
</html>


