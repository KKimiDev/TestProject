
<?php
session_start();

require_once("database_login.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rezepte</title>
        <link rel="stylesheet" href="css/style.css">

        <!-- /// BOOTSTRAP /// -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- /// ENDE BOOTSTRAP /// -->

        <style>
    /* Hier kommt dein gesamter CSS-Code aus deiner Vorlage rein */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #faf8f5;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .profile-container {
      max-width: 800px;
      margin: 40px auto;
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      padding: 30px;
    }

    /* ... restliche CSS-Klassen hier ... */
    .zsm {
      display: flex;
      align-items: center;
    }

    .folgen {
      margin: 10%;
      color: #aaa;
      font-style: italic;
    }

    /* Zusätzliche Styles für Sidebar und Layout */
    main {
      min-height: 80vh;
    }

    footer {
      background-color: #f9a825;
      color: white;
      padding: 15px 0;
      text-align: center;
      font-weight: 600;
    }

    .sidebar {
      background: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      height: 100%;
    }

    .sidebar h5 {
      border-bottom: 2px solid #f9a825;
      padding-bottom: 8px;
      margin-bottom: 15px;
      font-weight: 700;
      color: #6d4c41;
    }

    .sidebar ul {
      list-style: none;
      padding-left: 0;
    }

    .sidebar ul li {
      margin-bottom: 10px;
    }

    .sidebar ul li a {
      color: #5d4037;
      text-decoration: none;
      font-weight: 600;
    }

    .sidebar ul li a:hover {
      color: #f9a825;
      text-decoration: underline;
    }
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
    .scroll-container {
      width: 100%;              
      overflow-x: auto;         
      white-space: nowrap;      
      border: 1px solid #ccc;
      padding-bottom: 10px;
      scrollbar-width: thin;    
    }
    .scroll-container::-webkit-scrollbar {
      height: 8px;             
    }
    .scroll-container::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 4px;
    }
    .scroll-container::-webkit-scrollbar-track {
      background: #eee;
    }
    .scroll-container img {
      display: inline-block;
      width: 150px;             
      height: 100px;
      object-fit: cover;
      margin-right: 10px;
      border-radius: 4px;
      cursor: pointer;
      transition: transform 0.3s ease;
    }
    .scroll-container img:last-child {
      margin-right: 0;
    }
    .scroll-container img:hover {
      transform: scale(1.05);
    }
    .flex-bilder{
      display: flex;
    }
    .foto_head{
      width: 150px;
      height: 20px;
      align: center;
      margin-right: 10px;
      border-radius: 4px;
    }
  </style>
    </head>
    <body>
        <?php

$login_error = 'display:none;';
$register_error = 'display:none;';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['guest'])) {
        // Gastzugang
        $_SESSION['guest'] = true;
        header("Location: index.php");
        exit();
    }
    $usr = htmlspecialchars($_POST['usr']);
    $pass = htmlspecialchars($_POST['pwd']);

    $sql = "SELECT * FROM Users WHERE Username=:usr";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':usr' => $usr]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST["login"])) {
        if ($result && count($result) == 1) {
            $user = $result[0];
            // Passwort prüfen
            if (password_verify($pass, $user['Password'])) {
                // Login erfolgreich
                $_SESSION['usr'] = $user['Username'];
                
                header("Location: index.php");
                exit();
            } else {
                $login_error = "";
            }
        } else {
            $login_error = "";
        }
    } else if (isset($_POST["register"])) {
        if (count($result) == 0) {
            // Passwort hashen
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

            // Benutzer in DB einfügen
            $insert_sql = "INSERT INTO Users (Username, Password, Description) VALUES (:usr, :pass, '')";
            $insert_stmt = $pdo->prepare($insert_sql);
            $insert_success = $insert_stmt->execute([
                ':usr' => $usr,
                ':pass' => $hashed_password
            ]);

            if ($insert_success) {
                // Direkt nach Registrierung einloggen und weiterleiten
                $_SESSION['usr'] = $usr;
                header("Location: index.php");
                exit();
            } else {
                // Fehler beim Einfügen
                $register_error = "";
            }
        } else {
            $register_error = "";
        }
    }
}
?>
        <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" style="margin-bottom: 100px;">
    <div class="container">
      <a class="navbar-brand fw-bold text-warning" href="template">RezepteSite</a>
    </div>
  </nav>
        <!-- Alert for wrong username or password -->
        <div class="alert alert-danger" role="alert" style="<?= $login_error ?>" >
        ❌ Nutzername oder Passwort ist falsch. Bitte versuchen Sie es erneut.
        </div>
        <!-- Alert for wrong username or password -->
        <div class="alert alert-danger" role="alert" style="<?= $register_error ?>" >
        ❌ Nutzername ist vergeben. Bitte wählen Sie einen anderen.
        </div>
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
