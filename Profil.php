<?php
  require_once("check_login.php");
  require_once("database_login.php");
  
  if(!isset($_GET["name"]))
    header("Location: index.php");

  $profile_name = $_GET["name"];

  $sql = "SELECT * FROM Users WHERE Username=:usr";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([':usr' => $profile_name]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $profile = null;

  if (count($result) == 1) {
    $profile = $result[0];
  } else {
    header("Location: index.php");
  }

  $sql = "SELECT * FROM Recipes WHERE Author=:usr";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([':usr' => $profile_name]);
  $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $authorisuser = isset($_SESSION["usr"]) && $_SESSION["usr"] == $profile_name;
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

    <!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />


</head>
<body>
<?php include("templates/navbar.php"); ?>

  <!-- Hauptbereich mit Sidebar und Content -->
  <main class="container my-5">
    <div class="profile-container">
      <div class="profile-header">
        <img class="profile-pic" src="
        <?php 
          if($profile["Picture"] == null || trim($profile["Picture"]) == "") {
            echo "http://localhost/sites/Rezepte/rsc/R.png"; 
          } 
          else { 
            echo "profile pictures/" . $profile["Picture"]; 
          } 
        ?>" alt="Profilbild von User" />
        
        <div>
          <div style="display: flex; align-items: center; gap: 15px;">
          <h1 class="profile-name"><?php echo $profile["Username"] ?></h1>
          <button <?php if($authorisuser) {echo "style='display:none;'";}?> class="btn btn-sm btn-outline-warning text-black fw-bold rounded-pill px-4">
            Follow
          </button>

          <button <?php if(!$authorisuser) {echo "style='display: none;'"; } ?> onclick='window.location.href = "http://localhost/sites/Rezepte/Profilbearbeiten/<?= $profile["Username"] ?>"' class="edit-btn" aria-label="Rezept bearbeiten" title="Rezept bearbeiten">
            <i class="bi bi-pencil-fill"></i>
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
          foreach($recipes as $row) {
            echo 
          '<div class="recipe-card" onclick="open_recipe('."'$row[Name]'".')">
            <div class="recipe-title">' . $row["Name"] . '</div>
            <div class="recipe-desc">' . $row["Description"] . '</div>
          </div>';
            $i++;

            if ($i == 3) {
              break;
            }
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

