<?php 
require_once("database_login.php");
require_once("check_login.php");

$name = "";
$author = "";

if(isset($_GET["Name"]))
  $name = $_GET["Name"];
else
  header("location: index");
if(isset($_GET["Author"]))
  $author = $_GET["Author"];
//else
  //header("location: index");

// Recipe

$sql = "SELECT * FROM Recipes WHERE Name = :name AND Author = :author";
$stmt = $pdo->prepare($sql);

// Bind the value to the placeholder and execute
$stmt->execute(['name' => $name, 'author' => $author]);

$recipe = $stmt->fetch();



// Images

$sql = "SELECT * FROM Recipes INNER JOIN Images ON (Recipes.Name = Images.RecipeName AND Recipes.Author = Images.RecipeAuthor) WHERE Name = :name AND Author = :author";
$stmt = $pdo->prepare($sql);

// Bind the value to the placeholder and execute
$stmt->execute(['name' => $name, 'author' => $author]);

$imgs = [];
while($row = $stmt->fetch()) {
  array_push($imgs, $row);
}



// Steps

$sql = "SELECT * FROM Recipes INNER JOIN Steps ON (Recipes.Name = Steps.RecipeName AND Recipes.Author = Steps.RecipeAuthor) WHERE Name = :name AND Author = :author";
$stmt = $pdo->prepare($sql);

// Bind the value to the placeholder and execute
$stmt->execute(['name' => $name, 'author' => $author]);

$steps = [];
while($row = $stmt->fetch()) {
  array_push($steps, $row);
}



// Ingredients

$sql = "SELECT * FROM Recipes INNER JOIN Ingredients ON (Recipes.Name = Ingredients.RecipeName AND Recipes.Author = Ingredients.RecipeAuthor) WHERE Name = :name AND Author = :author";
$stmt = $pdo->prepare($sql);

// Bind the value to the placeholder and execute
$stmt->execute(['name' => $name, 'author' => $author]);

$ingredients = [];
while($row = $stmt->fetch()) {
  array_push($ingredients, $row);
}



// Utilities

$sql = "SELECT * FROM Recipes INNER JOIN Utilities ON (Recipes.Name = Utilities.RecipeName AND Recipes.Author = Utilities.RecipeAuthor) WHERE Name = :name AND Author = :author";
$stmt = $pdo->prepare($sql);

// Bind the value to the placeholder and execute
$stmt->execute(['name' => $name, 'author' => $author]);

$utilities = [];
while($row = $stmt->fetch()) {
  array_push($utilities, $row);
}

//if(!$recipe || $stmt->fetch())
//  header("location: index");

?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Rezeptseite – Alternativ</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

<style>
  .title-with-edit {
    display: inline-flex;
    align-items: center;
    gap: 6px; /* kleiner Abstand */
    font-weight: 600;
    font-size: 2rem;
  }

  .edit-btn {
    border: none;
    background: transparent;
    color: #0d6efd; /* Bootstrap primary */
    cursor: pointer;
    padding: 0;
    display: flex;
    align-items: center;
    transition: color 0.2s ease;
  }

  .edit-btn:hover,
  .edit-btn:focus {
    color: #084298; /* dunkleres Blau beim Hover */
    outline: none;
  }

  .edit-btn i {
    font-size: 1.2rem;
  }
</style>

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #faf8f5;
      color: #4b342f; /* dunkleres Braun für Text */
      padding-top: 50px 0;
    }

    h1 {
      text-align: center;
      font-weight: 700;
      color: #a9746e; /* soften Braun */
      margin-bottom: 40px;
      font-size: 2.8rem;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    footer {
      background-color: #f9a825;
      color: white;
      padding: 15px 0;
      text-align: center;
      font-weight: 600;
    }

    .recipe-card {
      background: #fff3e0;
      border-radius: 15px;
      padding: 30px 25px;
      box-shadow: 0 6px 20px rgba(249, 168, 37, 0.25);
      transition: box-shadow 0.3s ease, transform 0.2s ease;
      max-width: 600px;
      margin: 0 auto;
      cursor: pointer;
    }

    .recipe-card:hover {
      box-shadow: 0 12px 30px rgba(249, 168, 37, 0.45);
      transform: translateY(-5px);
    }

    .recipe-title {
      font-weight: 800;
      font-size: 2rem;
      margin-bottom: 15px;
      color: #6d4c41;
      letter-spacing: 0.05em;
      text-shadow: 0 1px 1px rgba(255, 255, 255, 0.4);
    }

    .recipe-desc {
      font-size: 1.15rem;
      margin-bottom: 25px;
      color: #5d4037;
      line-height: 1.5;
      font-style: italic;
    }

    ul.ingredients {
      list-style-type: square;
      padding-left: 20px;
      color: #5d4037;
      font-size: 1rem;
      margin-bottom: 25px;
    }

    ul.ingredients li {
      margin-bottom: 8px;
    }

    .preparation {
      font-size: 1rem;
      color: #4b342f;
      line-height: 1.6;
    }

    /* Stil für das Carousel */
    .carousel-item {
      background: #fff3e0;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(249, 168, 37, 0.25);
      padding: 30px;
      transition: box-shadow 0.3s ease, transform 0.2s ease;
    }

    .carousel-item:hover {
      box-shadow: 0 12px 30px rgba(249, 168, 37, 0.45);
      transform: translateY(-5px);
    }

    .carousel-inner img {
      width: 100%;
      height: auto;
      border-radius: 15px;
    }
  </style>
</head>
<body>
    <div style="justify-content: center; display: flex;">
  <h1 class="title-with-edit"><?= $recipe["Name"] ?>
  Rezept
  <button <?php if(!isset($_SESSION["usr"]) || $_SESSION["usr"] != $author) {echo "style='display: none;'"; } ?> onclick='window.location.href = "http://localhost/sites/Rezepte/Rezeptbearbeiten/<?= $author ?>/<?= $name ?>"' class="edit-btn" aria-label="Rezept bearbeiten" title="Rezept bearbeiten">
    <i class="bi bi-pencil-fill"></i>
  </button>
</h1>
  </div>
</button>

  <!-- Bilder Slideshow (Carousel oben) -->
  <div id="imageCarousel" data-bs-interval="false" class="carousel slide" data-ride="carousel" style="max-width: 600px; margin: 0 auto;">
    <div class="carousel-inner">
      <?php $_ = true; foreach($imgs as $img): ?>
      <div class="carousel-item <?php if ($_) {echo "active"; $_ = false; }?>">
        <img src="/sites/Rezepte/uploads/<?= $img["Path"]; ?>" class="d-block w-100" alt="Schritt 1: Bananen zerdrücken">
      </div>
      <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Vorherige</span>
    </a>
    <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Nächste</span>
    </a>
  </div>

  <!-- Rezeptkarte -->
  <div class="recipe-card" tabindex="0" role="article" aria-label="Rezept Schoko-Bananen-Pancakes">
    <h2 class="recipe-title"><?= $recipe["Name"] ?></h2>
    <p class="recipe-desc">
      <?= $recipe["Description"] ?>
    </p>
    <h3>Zutaten</h3>
    <ul class="ingredients">
      <?php
        foreach($ingredients as $ingredient) {
          echo "<li>$ingredient[Ingredient]</li>";
        }
      ?>
    </ul>

    <h3>Hilfsmittel</h3>
    <ul class="ingredients">
      <?php
        foreach($utilities as $utility) {
          echo "<li>$utility[Utility]</li>";
        }
      ?>
    </ul>
  </div>

  <!-- Unteres Carousel (Repariert) -->
  <div id="recipeCarousel" class="carousel slide" data-bs-interval="false" data-ride="carousel" style="max-width: 600px; margin: 0 auto;">
    <div class="carousel-inner">
      <?php $_ = true; foreach($steps as $step): ?>
      <div class="carousel-item active">
        <h3 class="recipe-title"><?php if ($_ = true) {echo $step["Title"]; $_ = false;}?></h3>
        <p><?= $step["Explanation"] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Vorherige</span>
    </a>
    <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Nächste</span>
    </a>
  </div>

  <!-- Rezeptkarte -->
  <div class="recipe-card" tabindex="0" role="article" aria-label="Rezept Schoko-Bananen-Pancakes">
    <div>Erstellt von <a href="http://localhost/sites/Rezepte/Profil/<?= $recipe["Author"]?>"><?= $recipe["Author"]?></a></div>
  </div>

  <footer style="margin-top: 20px;">
    <div class="container">
      &copy; 2025 RezepteSite - Alle Rechte vorbehalten
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


