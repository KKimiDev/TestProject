<?php
require_once("database_login.php");
require_once("check_login.php");

if (isset($_SESSION["guest"])) {
  header("Location: index.php");
}

$username = $_SESSION["usr"];

// Initialisieren von Variablen
$altpass = $neupass = $beschreibung = "";
$fehler = "";

// Prüfen, ob das Formular gesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["altpasswort"])) {
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
  if (isset($_POST["beschreibung"])) {

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
<?php
if (isset($_POST['uploadPic']) && isset($_FILES['profilePic'])) {
    $file = $_FILES['profilePic'];
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $width = 200;  // max Breite in Pixel
    $height = 200; // max Höhe in Pixel

    if ($file['error'] === UPLOAD_ERR_OK) {

        if (!in_array($file['type'], $allowedTypes)) {
            echo "Nur JPG, PNG und GIF Dateien sind erlaubt.";
        } else {
            // Bildgrößen auslesen
            $imageInfo = getimagesize($file['tmp_name']);
            if ($imageInfo === false) {
                echo "Die Datei ist kein gültiges Bild.";
                exit;
            }

            if ($width != $imageInfo[0] || $height > $imageInfo[1]) {
                echo "Das Bild muss {$maxWidth}x{$maxHeight} Pixel groß sein.";
                exit;
            }

            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $newFileName = $_SESSION['usr'] . "_profile_" . time() . "." . $ext;

            $uploadDir = __DIR__ . "/profile_pictures/";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $destination = $uploadDir . $newFileName;

            if (move_uploaded_file($file['tmp_name'], $destination)) {
                // Update DB
                $sql = "UPDATE Users SET Picture = :pic WHERE Username = :usr";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['pic' => $newFileName, 'usr' => $_SESSION['usr']]);

                echo "Profilbild erfolgreich hochgeladen!";
            } else {
                echo "Fehler beim Speichern der Datei.";
            }
        }

    } else {
        echo "Fehler beim Hochladen der Datei.";
    }
}
?>


<!DOCTYPE html>
<html lang="de">

<head>
  <?php include("templates/head.php"); ?>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profil bearbeiten</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php include("templates/navbar.php"); ?>

  <main>
  <h1 class="page-title" style="font-size:30px;color: #f9a825;">Profil bearbeiten</h1>

  <div class="profile-container">
    <div class="profile-header">
      <img class="profile-pic" src="http://localhost/sites/Rezepte/rsc/R.png" alt="Profilbild von User" style="width:20%; height:20%;" />

      <div>
        <!-- Formular zum Bearbeiten des Profils -->
        <br>
        <form method="POST" action="" enctype="multipart/form-data">
          <label for="profilePic">Profilbild hochladen:</label>
          <input type="file" name="profilePic" id="profilePic" accept="image/*" required>
          <button type="submit" name="uploadPic">Bild hochladen</button>
        </form>
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
          </main>
  <?php include("templates/footer.php"); ?>
</body>

</html>