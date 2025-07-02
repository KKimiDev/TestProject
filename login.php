

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

require_once("database_login.php");

$login_error = 'display:none;';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['guest']) && $_POST['guest'] == 'true') {
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
            echo "FehlerPWD";
        }
    } else {
        $login_error = "";

        echo "Fehler";
    }
}
?>
        <!-- Alert for wrong username or password -->
        <div class="alert alert-danger" role="alert" style="<?= $login_error ?>" >
        ❌ Username or password is incorrect. Please try again.
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
            <input type="submit" name="registrieren" style="display:none;">
            <div class="register"><a href="#" onclick="document.querySelector('input[name=registrieren]').click(); return false;">Registrieren</a></div>
            
        </form>
        <form method="POST" action="">
            <input style="display: none;" type="text" name="guest" value="true" />
        </div>
    </body>
</html>
