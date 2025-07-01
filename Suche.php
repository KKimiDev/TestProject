<?php
require_once("database_login.php");

// standard tags
$allTags = ['Vegetarisch', 'Vegan', 'Fleisch', 'Desserts', 'Schnell & Einfach', 'Glutenfrei', 'LowCarb', 'Frühstück', 'Sommer'];

// search params
$author = null; 
$duration = -1;
$tagcount = 0;
$tags = [];

// build sql

if(isset($_GET["tags"]) && trim($_GET["tags"]) != "") {
  $tags = explode(',', trim($_GET["tags"]));
  $tagcount = count($tags);
}

if(isset($_GET["Author"]) && trim($_GET["Author"]) != "") {
  $author = $_GET["Author"];
}

if(isset($_GET["maxDuration"]) && trim($_GET["maxDuration"]) != "") {
  try {
    $duration = (int) $_GET["maxDuration"];
  } catch (Exception $e) {
    $duration = -1;
  }
}

$sql = "SELECT Name, Author, Description FROM Recipes LEFT JOIN Tags ON (Tags.RecipeName = Recipes.Name AND Tags.RecipeAuthor = Recipes.Author) WHERE 1=1 ";

/*
if ($author != null)
  $sql .= " AND Author = :author ";

if ($duration != -1) 
  $sql .= "AND Duration <= :duration ";



if ($tagcount != 0) {
  $sql .= "AND (";
  $i = 0;
  foreach($tags as $tag) {
    $tag = trim($tag);
    $sql .= "Tag = :tag$i OR ";
    $i += 1;
  }
  $sql .= "1 = 2) ";
}


$sql .= "GROUP BY Recipes.Name, Recipes.Author ";

if($tagcount != 0)
  $sql .= "HAVING COUNT(DISTINCT Tag) = $tagcount;";

echo $sql;
*/

$stmt = $pdo->prepare($sql);

/*
$i = 0;
foreach ($tags as $tag) {
    $stmt->bindValue(":tag$i", trim($tag));
    $i++;
}

if ($author != null)  
  $stmt->bindValue(":author", trim($author));

if ($duration != -1)
  $stmt->bindValue(":duration", trim($duration));
*/

// Bind the value to the placeholder and execute
$stmt->execute();

if(!$stmt->fetch())
  echo "no";

?>

<!DOCTYPE html>
<html lang="de">
<head>
  <base href="/sites/Rezepte/"/>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Rezeptsuche</title>

  <link href="/sites/Rezepte/css/style.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    /* Beispiel Styles für Tag-Chips */
    .tag-chip {
      display: inline-block;
      padding: 5px 10px;
      margin: 2px;
      background: #f9a825;
      color: white;
      border-radius: 15px;
      font-weight: 600;
      cursor: pointer;
      user-select: none;
      transition: background-color 0.3s ease;
    }
    .tag-chip:hover {
      background: #c7a300;
    }
    .tag-chip.active {
      background: #6d4c41;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold text-warning" href="#">RezepteSite</a>
  </div>
</nav>

<main class="container">

  <h1 class="mb-4 text-center">Rezepte suchen</h1>

  <!-- Suchformular -->
  <form id="searchForm" method="get" action="" class="mb-5">

    <div class="mb-3">
      <label for="keyword" class="form-label">Stichwort</label>
      <input type="text" id="keyword" name="keyword" class="form-control" placeholder="z.B. Spaghetti, Kuchen, etc." />
    </div>

    <script>
      function update_hidden_input() {
        let elems = document.querySelectorAll("span.active");
        let input = document.getElementById("tags");
        let value = "";
        let first = true;
        elems.forEach(elem => {
          if(!first)
            value += ",";
          else 
            first = false;
          value += elem.getAttribute("data-tag");
        });
        input.value = value;
      }

      function toggleSelect(span) {
        if(span.classList.contains("active")) {
          span.classList.remove("active");
        } else {
          span.classList.add("active");
        }

        update_hidden_input();
      }

    </script>

    <div class="mb-3">
      <label class="form-label">Tags auswählen</label>
      <div id="tagsContainer" class="mb-2">
        <?php foreach ($allTags as $tag): ?>
          <span onclick="toggleSelect(this); " class="tag-chip" data-tag="<?= htmlspecialchars($tag) ?>"><?= htmlspecialchars($tag) ?></span>
          <?php endforeach; ?>
      </div>
      <input id = "tags" style="display: none;" type="text" name="tags" value=""/>
      <input type="text" id="customTagInput" class="form-control" placeholder="Eigenen Tag hinzufügen und Enter drücken" formnovalidate/>
    </div>
          <script>
  document.getElementById('customTagInput').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
      event.preventDefault(); 
      // Suppose you have your tag in a variable:
      const tag = document.getElementById("customTagInput").value;

      // Create the span element
      const span = document.createElement('span');

      // Add the class
      span.classList.add('tag-chip');

      // Set the data-tag attribute safely
      span.setAttribute('data-tag', tag);
      
      span.addEventListener('click', () => {
        span.remove();  // Entfernt das Element aus dem DOM
      });

      // Set the text content (escaping happens automatically with textContent)
      span.textContent = tag;

      // Now, append it somewhere in your DOM, for example:
      document.getElementById("tagsContainer").appendChild(span);

      span.classList.add("active");

      update_hidden_input();
    }
  });
</script>
    <div class="mb-3">
      <label for="author" class="form-label">Autor</label>
      <input type="text" name="Author" id="author" class="form-control" placeholder="Autorname eingeben" />
    </div>

    <div class="mb-3">
      <label for="maxDuration" class="form-label">Maximale Zubereitungsdauer (Minuten)</label>
      <input type="number" name="maxDuration" id="maxDuration" class="form-control" min="1" placeholder="z.B. 30" />
    </div>

    <button type="submit" class="btn btn-warning fw-bold">Suchen</button>
  </form>
<script>update_hidden_input();</script>
  <!-- Ergebnisbereich -->
  <section>
    <h2>Suchergebnisse</h2>
    <div id="results" class="row g-4">
      <script>
        function open_recipe(author, name) {
          window.location.href = author + "/" + name;
        }
      </script>
      <!-- Hier kommen Rezept-Karten rein -->
       <?php
        while(($row = $stmt->fetch())) {
          echo '<div class="recipe-card" onclick="open_recipe('."'$row[Author]'"."'$row[Name]'".')">
            <div class="recipe-title">' . $row["Name"] . '</div>
            <div class="recipe-desc">' . $row["Description"] . '</div>
          </div>';
        }
       ?>
    </div>
  </section>
</main>

<footer class="text-center py-3 mt-5 bg-light">
  &copy; 2025 RezepteSite - Alle Rechte vorbehalten
</footer>

<script>

</script>

</body>
</html>
