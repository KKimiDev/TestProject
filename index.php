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
      margin: auto;
      margin-top: 20px;
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
      margin-top: 20px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
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
    .B-Rund{
      background-color: #f9a825;
      padding: 12px 12px;
      border: none;
      color: white;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      border-radius: 12px;
    }
    .B-Rund:hover{
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
      padding: 12.25px 12.25px;
    }
    .scroll-container {
      width: 100%;              
      overflow-x: auto;         
      white-space: nowrap;      
      border: 1px solid #ccc;
      padding-bottom: 5px;
      scrollbar-width: medium;    
    }
    .scroll-container::-webkit-scrollbar {
      height: 10px;             
    }
    .scroll-container::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 4px;
    }
    .scroll-container::-webkit-scrollbar-track {
      background: #eee;
    }
    .scroll-container img {
      display: inline-block;
      width: 300px;             
      height: 200px;
      object-fit: cover;
      margin-right: 10px;
      border-radius: 4px;
      cursor: pointer;
      transition: transform 0.3s ease;
    }
    .scroll-container img:last-child {
      margin-right: 0;
    }
    .scroll-container img:hover {
      transform: scale(1.05);
    }
    .flex-bilder{
      display: flex;
    }
  </style>
</head>
<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold text-warning" href="index">RezepteSite</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto gap-3">
          <li class="nav-item">
            <button class="B-Rund" onclick="document.location='index'">Startseite</button>
          </li>
          <li class="nav-item">
            <button class="B-Rund" onclick="document.location='Suche'">Rezepte</button>
          </li>
          <li class="nav-item">
            <button class="B-Rund" onclick="document.location='Ueberuns.html'">Über Uns</button>
          </li>
          <li class="nav-item">
            <button class="B-Rund" onclick="document.location='Kontakt.html'">Kontakt</button>
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
            <div>
              <h1 class="profile-name">Neuste Rezepte</h1>
            </div>
          </div>
          <div class=flex-bilder>
            <div class="scroll-container">
              <img src="" alt="">
              <img src="" alt="">
              <img src="" alt="">
              <img src="" alt="">
              <img src="" alt="">
              <img src="" alt="">
            </div>
          </div>
        </div>

        <div class="profile-container">
          <div class="profile-header">
            <div>
              <h1 class="profile-name">Am Besten bewertet</h1>
            </div>
          </div>
          <div class=flex-bilder>
            <div class="scroll-container">
              <img src="" alt="">
              <img src="" alt="">
              <img src="" alt="">
              <img src="" alt="">
              <img src="" alt="">
              <img src="" alt="">
            </div>
          </div>
        </div>

        <div class="profile-container">
          <div class="profile-header">
            <div>
              <h1 class="profile-name">Am Neusten</h1>
            </div>
          </div>
          <div class=flex-bilder>
            <div class="scroll-container">
              <img src="" alt="">
              <img src="" alt="">
              <img src="" alt="">
              <img src="" alt="">
              <img src="" alt="">
              <img src="" alt="">
            </div>
          </div>
        </div>

        <div class="profile-container">
          <div class="profile-header">
            <div>
              <h1 class="profile-name">Beliebt im Sommer</h1>
            </div>
          </div>
          <div class=flex-bilder>
            <div class="scroll-container">
              <img src="" alt="">
              <img src="" alt="">
              <img src="" alt="">
              <img src="" alt="">
              <img src="" alt="">
              <img src="" alt="">
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
