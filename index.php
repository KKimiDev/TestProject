<?php
require_once("check_login.php");
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Rezepte Website</title>
  <?php include("templates/head.php;"); ?>
</head>
<body>
<script>
function neuesRezept() {
    <?php 
      if (isset($_SESSION["guest"])) {
        echo "window.location.href = 'login'; return;";
      }
    ?>
    let rezeptName = prompt("Bitte den Namen des neuen Rezepts eingeben:");
    if (rezeptName && rezeptName.trim() !== "") {
        // URL-encode den Namen für GET-Parameter
        rezeptName = encodeURIComponent(rezeptName.trim());
        // Weiterleitung mit GET-Parameter
        window.location.href = "Rezeptbearbeiten/<?= $_SESSION['usr'] ?? '' ?>/" + rezeptName;
    } else {
        alert("Bitte einen gültigen Namen eingeben.");
    }
}
</script>
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
          <li class="nav-item">
            <button class="B-Rund" onclick="neuesRezept();">Neues Rezept</button>
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
