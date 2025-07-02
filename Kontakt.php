<?php
  require_once("check_login.php");
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

    <style>
      .B-Rund{
            background-color: #f9a825;
            padding: 12px 12px;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            border-radius: 12px;
      }
      .B-Rund:hover{
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        padding: 12.25px 12.25px;
      }

    </style>

  </head>
<body>
<?php include("templates/navbar.php"); ?>

  <!-- Hauptbereich mit Sidebar und Content -->
  <main class="container my-5">
    <div class="profile-container">
        <h1>Kontakt</h1>
        <p>Haben Sie Fragen oder Anmerkungen? Füllen Sie das Formular aus, und wir werden uns so schnell wie möglich bei Ihnen melden!</p>

        <!-- Kontaktformular -->
        <form action="formular.php" method="POST">
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