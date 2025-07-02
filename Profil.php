<?php
  // require_once("check_login.php")
  
  if(!isset($_GET["name"]))
    header("Location: index.php");

  $profile_name = $_GET["name"];
  // Datenbankverbindung
  $servername = "localhost";
  $username = "root"; // Standard bei XAMPP
  $password = "";
  $dbname = "Rezepte";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
  }

  $login_error = '';
  $usr = $conn->real_escape_string($profile_name);

  $sql = "SELECT * FROM Users WHERE Username='$usr'";
  $result = $conn->query($sql);
  if ($result && $result->num_rows == 1) {
    $profile = $result->fetch_assoc();
  } else {
    header("Location: index.php");
  }

  $sql = "SELECT * FROM Recipes WHERE Author='$usr'";
  $recipes = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/sites/Rezepte/"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilübersicht</title>
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
      <div class="profile-header">
        <img class="profile-pic" src="
        <?php 
          if($profile["Picture"] == null) {
            echo "rsc/R.jpg"; 
          } 
          else { 
            echo "profile pictures/" . $profile["Picture"]; 
          } 
        ?>" alt="Profilbild von User" />
        
        <div>
          <div style="display: flex; align-items: center; gap: 15px;">
          <h1 class="profile-name"><?php echo $profile["Username"] ?></h1>
          <button class="btn btn-sm btn-outline-warning text-black fw-bold rounded-pill px-4">
            Follow
          </button>
          </div>
          <p class="profile-bio"><?php echo $profile["Description"] ?></p>
        </div>
      </div>

      <div class="stats">
        <div class="stat">
          <div class="stat-number">34</div>
          <div class="stat-label">Rezepte hochgeladen</div>
        </div>
        <div class="stat">
          <div class="stat-number">120</div>
          <div class="stat-label">Follower</div>
        </div>
        <div class="stat">
          <div class="stat-number">18</div>
          <div class="stat-label">Lieblingsrezepte</div>
        </div>
      </div>
      
      <script>
        function open_recipe(name) {
          window.location.href = "Rezept/<?php echo $profile["Username"];?>/" + name;
        }
      </script>

      <div class="recipes-section">
        <h2>Beliebte Rezepte</h2>
        <div class="recipe-list">
          <?php
          $i = 0;
          while (($row = $recipes->fetch_assoc()) && $i < 3) {
            echo 
          '<div class="recipe-card" onclick="open_recipe('."'$row[Name]'".')">
            <div class="recipe-title">' . $row["Name"] . '</div>
            <div class="recipe-desc">' . $row["Description"] . '</div>
          </div>';
            $i++;
          }
          ?>
        </div>
      </div>
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

