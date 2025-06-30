<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/sites/Rezepte/"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilübersicht</title>
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
  <div class="profile-container">
    <div class="profile-header">
      <img class="profile-pic" src="rsc/R.png" alt="Profilbild von User" />
      
      <div>
        <div style="display: flex; align-items: center; gap: 15px;">
        <h1 class="profile-name">Anna Koch</h1>
        <button class="btn btn-sm btn-outline-warning text-black fw-bold rounded-pill px-4">
          Follow
        </button>
        </div>
        <p class="profile-bio">Leidenschaftliche Hobbyköchin, die gerne schnelle und gesunde Rezepte teilt. Lieblingszutat: Avocado 🥑</p>
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

    <div class="recipes-section">
      <h2>Beliebte Rezepte</h2>
      <div class="recipe-list">
        <div class="recipe-card">
          <div class="recipe-title">Avocado Toast Deluxe</div>
          <div class="recipe-desc">Knuspriges Brot mit cremiger Avocado, Tomaten und frischem Basilikum.</div>
        </div>
        <div class="recipe-card">
          <div class="recipe-title">Schneller Quinoa-Salat</div>
          <div class="recipe-desc">Leicht, proteinreich und perfekt für den Sommer.</div>
        </div>
        <div class="recipe-card">
          <div class="recipe-title">Vegane Schoko-Muffins</div>
          <div class="recipe-desc">Saftig und schokoladig, ganz ohne tierische Produkte.</div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

