
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
    // Hier kann die Eingabe validiert und bearbeitet werden
    $altpass = $_POST['altpasswort'] ?? '';
    $neupass = $_POST['neupasswort'] ?? '';
    $beschreibung = $_POST['beschreibung'] ?? '';

    // Beispielhafte Validierung (Hier können auch noch mehr Sicherheitschecks eingefügt werden)
    if (empty($altpass) || empty($neupass)) {
        $fehler = "Bitte beide Passwörter eingeben.";
    } else {
        $altpass_hash = password_hash($altpass, PASSWORD_DEFAULT);

        // Hier würde normalerweise das Passwort gehasht und in einer Datenbank gespeichert werden
        // z.B.:

        $neupass_hash = password_hash($neupass, PASSWORD_DEFAULT);

        $sql = "SELECT Password FROM users WHERE Username = :username";
       
        $stmt = $pdo->prepare($sql);

        // Bind the value to the placeholder and execute
        $stmt->execute(['username' => $username]);

        $pwd = $stmt->fetch();

        if($pwd) {
          if (password_verify($_POST['altpasswort'], $pwd)) {
            $sql = "UPDATE users SET Password = $neupass_hash WHERE Username = :username";
            $stmt->execute(['username' => $username]);

            } else {
            $fehler = "Bitte beide Passwörter eingeben.";
            }
        }

        echo "Passwortänderung erfolgreich!";
        // Hier kann z.B. auch die Datenbank aktualisiert werden
    }
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


