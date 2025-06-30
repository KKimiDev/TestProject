

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rezepte</title>
        <link rel="stylesheet" href="style.css">

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

// Datenbankverbindung
$servername = "localhost";
$username = "root"; // Standard bei XAMPP
$password = "";
$dbname = "Rezepte";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo "<p>Verbo</p>";
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

$login_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usr = $conn->real_escape_string($_POST['usr']);
    $pass = $_POST['pwd'];

    $sql = "SELECT * FROM Users WHERE Username='$usr'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $user = $result->fetch_assoc();
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
        <h2>Login</h2>
        <form method="POST" action="">
            <label for="email">E-Mail</label>
            <input type="text" id="email" name="usr" placeholder="E-Mail eingeben" required>

            <label for="password">Passwort</label>
            <input type="password" id="password" name="pwd" placeholder="Passwort eingeben" required>

            <div class="forgot-password">Passwort vergessen?</div>

            <button type="submit">Anmelden</button>
        </form>
        </div>
    </body>
</html>
