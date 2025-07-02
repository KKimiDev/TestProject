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
    if(isset($_POST["altpasswort"])) {
    // Eingabewerte holen
    $altpass = $_POST['altpasswort'] ?? '';
    $neupass = $_POST['neupasswort'] ?? '';

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
  }
  if(isset($_POST["beschreibung"])) {
    
    $beschreibung = $_POST['beschreibung'] ?? '';
    $sql = "UPDATE users SET Description = :beschreibung WHERE Username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['beschreibung' => $beschreibung, 'username' => $username]);
  }
    
}

$sql = "SELECT Description FROM users WHERE Username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $username]);
$descr = htmlspecialchars($stmt->fetch()["Description"]);

?>


<!DOCTYPE html>
<html lang="de">
<head>
  <?php include("templates/head.php");?>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profil bearbeiten</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include("templates/navbar.php");?>

  <h1 class="page-title" style="font-size:30px;color: #f9a825;">Profil bearbeiten</h1>
  
  <div class="profile-container">
    <div class="profile-header">
      <img class="profile-pic" src="http://localhost/sites/Rezepte/rsc/R.png" alt="Profilbild von User" style="width:20%; height:20%;"/>
      
      <div>
        <!-- Formular zum Bearbeiten des Profils -->
         <br>
        <form class="form-section" method="POST" action="">
          <div class="form-group">
            <label for="altpasswort" class="form-label">Altes Passwort:</label>
            <input id="altpasswort" class="form-input" type="password" placeholder="Altes Passwort" name="altpasswort" required>
          </div>
          <br>
          <div class="form-group">
            <label for="neupasswort" class="form-label">Neues Passwort:</label>
            <input id="neupasswort" class="form-input" type="password" placeholder="Neues Passwort" name="neupasswort" required>
          </div>
          <br>
          <button type="submit" name="bestaetigen" class="btn-primary">Bestätigen</button>
        </form>
         <br>
        <form class="form-section" method="POST" action="">
          <div class="form-group">
            <label for="beschreibung" class="form-label">Beschreibung:</label>
            <textarea style="width: 100%" id="beschreibung" class="form-input" type="text" placeholder="Deine Profilbeschreibung" name="beschreibung"><?= htmlspecialchars($descr) ?></textarea>
          </div>
           <br>
          <button type="submit" name="bestaetigen" class="btn-primary">Bestätigen</button>
           <br>

          <?php if ($fehler): ?>
            <p class="error-message"><?= htmlspecialchars($fehler) ?></p>
          <?php endif; ?>
        </form>
       
      </div>
    </div>
  </div>

  <?php include("templates/footer.php"); ?>
</body>
</html>



