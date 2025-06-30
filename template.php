<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Rezepte Website</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Dein custom CSS -->
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
  </style>
</head>
<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold text-warning" href="#">RezepteSite</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto gap-3">
          <li class="nav-item">
            <a class="nav-link text-dark fw-semibold" href="#">Startseite</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark fw-semibold" href="#">Rezepte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark fw-semibold" href="#">Über uns</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark fw-semibold" href="#">Kontakt</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hauptbereich mit Sidebar und Content -->
  <main class="container my-5">
    <div class="row g-4">
      
      <!-- Sidebar -->
      <aside class="col-lg-3 order-lg-1 order-2">
        <div class="sidebar">
          <h5>Kategorien</h5>
          <ul>
            <li><a href="#">Vegetarisch</a></li>
            <li><a href="#">Vegan</a></li>
            <li><a href="#">Fleisch</a></li>
            <li><a href="#">Desserts</a></li>
            <li><a href="#">Schnell & Einfach</a></li>
          </ul>

          <h5>Beliebte Tags</h5>
          <ul>
            <li><a href="#">#Glutenfrei</a></li>
            <li><a href="#">#LowCarb</a></li>
            <li><a href="#">#Frühstück</a></li>
            <li><a href="#">#Sommer</a></li>
          </ul>
        </div>
      </aside>

      <!-- Content -->
      <section class="col-lg-9 order-lg-2 order-1">
        <div class="profile-container">
          <div class="profile-header">
            <img src="https://via.placeholder.com/120" alt="Profilbild" class="profile-pic" />
            <div>
              <h1 class="profile-name">Julia Koch</h1>
              <p class="profile-bio">Leidenschaftliche Köchin und Food-Bloggerin. Hier findest du meine Lieblingsrezepte.</p>
            </div>
          </div>

          <div class="stats">
            <div class="stat">
              <div class="stat-number">150</div>
              <div class="stat-label">Rezepte</div>
            </div>
            <div class="stat">
              <div class="stat-number">20K</div>
              <div class="stat-label">Follower</div>
            </div>
            <div class="stat">
              <div class="stat-number">320</div>
              <div class="stat-label">Bewertungen</div>
            </div>
          </div>

          <div class="recipes-section">
            <h2>Neueste Rezepte</h2>
            <div class="recipe-list">
              <div class="recipe-card">
                <h3 class="recipe-title">Spaghetti Carbonara</h3>
                <p class="recipe-desc">Ein klassisches italienisches Pastagericht mit cremiger Sauce.</p>
              </div>
              <div class="recipe-card">
                <h3 class="recipe-title">Vegane Buddha Bowl</h3>
                <p class="recipe-desc">Bunte Mischung aus Gemüse, Reis und Hülsenfrüchten.</p>
              </div>
              <div class="recipe-card">
                <h3 class="recipe-title">Schoko-Bananen Muffins</h3>
                <p class="recipe-desc">Saftige Muffins mit Schokolade und Banane.</p>
              </div>
              <!-- Weitere Rezeptkarten -->
            </div>
          </div>
        </div>
      </section>

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
