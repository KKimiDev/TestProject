<?php
require_once("check_login.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
}
?>
<!DOCTYPE html>
<html lang="de">

<head>
  <?php include("templates/head.php"); ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontakt</title>
  <link rel="stylesheet" href="css/style.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Dein custom CSS -->

</head>

<body>
  <?php include("templates/navbar.php"); ?>

  <!-- Hauptbereich mit Sidebar und Content -->
  <main class="container my-5">
    <div class="profile-container">
      <h1>Kontakt</h1>
      <p>Haben Sie Fragen oder Anmerkungen? Füllen Sie das Formular aus, und wir werden uns so schnell wie möglich bei Ihnen melden!</p>

      <!-- Kontaktformular -->
      <form action="" method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Ihr Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Ihre E-Mail-Adresse</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
          <label for="message" class="form-label">Ihre Nachricht</label>
          <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-warning text-white">Absenden</button>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <footer>
    <div class="container">
      &copy; 2025 RezepteSite - Alle Rechte vorbehalten
    </div>
  </footer>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>