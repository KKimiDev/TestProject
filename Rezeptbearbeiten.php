<?php
require_once("database_login.php");

$name = $_GET["Name"] ?? null;
$author = $_GET["Author"] ?? null;

if (!$name || !$author || !isset($_SESSION["usr"] || ($_SESSION["usr"] != $author)) {
    header("Location: index.php");
    exit;
}

// Fetch existing recipe data
function fetchAll($pdo, $table, $name, $author) {
    $sql = "SELECT * FROM $table WHERE RecipeName = :name AND RecipeAuthor = :author";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'author' => $author]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$sql = "SELECT * FROM Recipes WHERE Name = :name AND Author = :author";
$stmt = $pdo->prepare($sql);
$stmt->execute(['name' => $name, 'author' => $author]);
$recipe = $stmt->fetchAll(PDO::FETCH_ASSOC);

$imgs = fetchAll($pdo, 'Images', $name, $author);
$steps = fetchAll($pdo, 'Steps', $name, $author);
$ingredients = fetchAll($pdo, 'Ingredients', $name, $author);
$utilities = fetchAll($pdo, 'Utilities', $name, $author);

// Handle form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $pdo->beginTransaction();
    // Update recipe main data
    $stmt = $pdo->prepare("
        UPDATE Recipes 
        SET Name = :newname, Author = :newauthor, Description = :description 
        WHERE Name = :oldname AND Author = :oldauthor
    ");
    $stmt->execute([
        'newname' => $_POST['name'],
        'newauthor' => $_POST['author'],
        'description' => $_POST['description'],
        'oldname' => $name,
        'oldauthor' => $author
    ]);

    // Helper to clear & insert multiple
    function replaceMany($pdo, $table, $keyCol, $valCol, $oldname, $oldauthor, $items) {
        $pdo->prepare("DELETE FROM $table WHERE RecipeName = :name AND RecipeAuthor = :author")
            ->execute(['name' => $oldname, 'author' => $oldauthor]);
        $stmt2 = $pdo->prepare("
            INSERT INTO $table (RecipeName, RecipeAuthor, $valCol) 
            VALUES (:name, :author, :value)
        ");
        foreach ($items as $it) {
            if (trim($it) === '') continue;
            $stmt2->execute(['name' => $_POST['name'], 'author' => $_POST['author'], 'value' => trim($it)]);
        }
    }

    replaceMany($pdo, 'Ingredients', 'Ingredient', 'Ingredient', $name, $author, explode("\n", $_POST['ingredients']));
    replaceMany($pdo, 'Utilities', 'Utility', 'Utility', $name, $author, explode("\n", $_POST['utilities']));
    replaceMany($pdo, 'Steps', 'Title, Explanation', 'Explanation', $name, $author, explode("\n---\n", $_POST['steps']));

    $pdo->commit();
    //header("Location: view_recipe.php?Name=".urlencode($_POST['name'])."&Author=".urlencode($_POST['author']));
    exit;
}
?>
<!DOCTYPE html>
<html lang="de">
<head><meta charset="UTF-8"><title>Rezept bearbeiten</title></head>
<body>

  <h1>Rezept bearbeiten</h1>

  <div class="recipe-card">
    <form method="POST">
      <div class="form-group">
        <label for="name" class="recipe-title">Rezeptname</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($recipe[0]['Name']) ?>" required>
      </div>

      <div class="form-group">
        <label for="author" class="recipe-title">Autor</label>
        <input type="text" name="author" id="author" class="form-control" value="<?= htmlspecialchars($recipe[0]['Author']) ?>" required>
      </div>

      <div class="form-group">
        <label for="description" class="recipe-title">Beschreibung</label>
        <textarea name="description" id="description" class="form-control" rows="4"><?= htmlspecialchars($recipe[0]['Description']) ?></textarea>
      </div>

      <div class="form-group">
        <label for="ingredients" class="recipe-title">Zutaten (eine pro Zeile)</label>
        <textarea name="ingredients" id="ingredients" class="form-control ingredients" rows="6"><?= htmlspecialchars(implode("\n", array_column($ingredients, 'Ingredient'))) ?></textarea>
      </div>

      <div class="form-group">
        <label for="utilities" class="recipe-title">Hilfsmittel (eine pro Zeile)</label>
        <textarea name="utilities" id="utilities" class="form-control ingredients" rows="4"><?= htmlspecialchars(implode("\n", array_column($utilities, 'Utility'))) ?></textarea>
      </div>

      <div class="form-group">
        <label for="steps" class="recipe-title">Schritte (Titel und Erklärung durch `---` trennen, je Schritt)</label>
        <textarea name="steps" id="steps" class="form-control preparation" rows="10"><?= htmlspecialchars(
          implode("\n---\n", array_map(fn($s)=> $s['Title']."\n".$s['Explanation'], $steps))
        ) ?></textarea>
      </div>

      <div class="text-center mt-4">
        <button type="submit" name="save" class="btn btn-warning font-weight-bold px-4 py-2">💾 Speichern</button>
      </div>
    </form>
  </div>

  <footer style="margin-top: 40px;">
    <div class="container text-center">
      &copy; 2025 RezepteSite – Alle Rechte vorbehalten
    </div>
  </footer>

  <!-- Bootstrap & jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
