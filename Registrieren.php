

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rezepte</title>
        <link rel="stylesheet" href="css/style.css">

        <!-- /// BOOTSTRAP /// -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- /// ENDE BOOTSTRAP /// -->
    </head>
    <body>
        <?php
session_start();

require_once("Database.php");

$login_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usr = $conn->real_escape_string(htmlspecialchars($_POST['usr']));
    $pass = htmlspecialchars($_POST['pwd']);

    $sql = "SELECT * FROM Users WHERE Username=:usr";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':usr' => $usr]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result && count($result) == 1) {
        $user = $result[0];
        // Passwort prüfen
        if (password_verify($pass, $user['Password'])) {
            // Login erfolgreich
            $_SESSION['usr'] = $user['Username'];

            header("Location: index.php");
            exit();
        } else {
            $login_error = "Falsches Passwort.";
            echo "FehlerPWD";
        }
    } else {
        $login_error = "Benutzer nicht gefunden.";

        echo "Fehler";
    }
}
?>
        <div class="login-container">
        <h2>Registrieren</h2>
        <form method="POST" action="">
            <label for="email">Nutzername</label>
            <input type="text" id="email" name="usr" placeholder="Nutzername eingeben" required>

            <label for="password">Passwort</label>
            <input type="password" id="password" name="pwd" placeholder="Passwort eingeben" required>

            <div class="forgot-password">Passwort vergessen?</div>

            <button type="submit">Anmelden</button>
            <div class="register"><a href="Login">Login</a></div>
        </form>
        </div>
    </body>
</html>
