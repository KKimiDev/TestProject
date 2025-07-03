<?php
// Überprüft, ob der Benutzer eingeloggt ist
require_once("check_login.php");
?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>RezepteSite</title>
  <?php // Fügt den gemeinsamen Head-Bereich ein (z.B. CSS, Meta-Tags)
  include("templates/head.php"); ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body>
  <?php // Fügt die Navigationsleiste ein
  include("templates/navbar.php"); ?>

  <!-- Hauptbereich mit Sidebar und Inhalt -->
  <main class="container my-5">
    <div class="row g-4">

      <!-- Sidebar mit Kategorien und beliebten Tags -->
      <aside class="col-lg-3 order-lg-1 order-2">
        <div class="sidebar">
          <h5>Kategorien</h5>
          <ul>
            <!-- Links zu Rezept-Kategorien -->
            <li><a href="http://localhost/sites/Rezepte/Suche?tags=Vegetarisch">Vegetarisch</a></li>
            <li><a href="http://localhost/sites/Rezepte/Suche?tags=Vegan">Vegan</a></li>
            <li><a href="http://localhost/sites/Rezepte/Suche?tags=Fleisch">Fleisch</a></li>
            <li><a href="http://localhost/sites/Rezepte/Suche?tags=Desserts">Desserts</a></li>
            <li><a href="http://localhost/sites/Rezepte/Suche?tags=Simpel">Simpel</a></li>
          </ul>

          <h5>Beliebte Tags</h5>
          <ul>
            <!-- Beispielhafte Tag-Links (aktuell ohne Funktion) -->
            <li><a href="#">#Glutenfrei</a></li>
            <li><a href="#">#LowCarb</a></li>
            <li><a href="#">#Frühstück</a></li>
            <li><a href="#">#Sommer</a></li>
          </ul>
        </div>
      </aside>

      <!-- Haupt-Inhaltsbereich mit Rezept-Galerien -->
      <section class="col-lg-9 order-lg-2 order-1">
        <!-- Bereich: Neuste Rezepte -->
        <div class="profile-container">
          <div class="profile-header">
            <div>
              <h1 class="profile-name">Neuste Rezepte</h1>
            </div>
          </div>
          <div class="flex-bilder">
            <div class="scroll-container">
              <!-- Einzelne Rezeptbilder mit Overlay-Titel -->
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0000.jpg" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0001.jpeg" alt="Beispielbild" />
                <div class="overlay">Nudelsuppe</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0002.jpg" alt="Beispielbild" />
                <div class="overlay">Pfannenkuchen</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0001.jpeg" alt="Beispielbild" />
                <div class="overlay">Nudelsuppe</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0002.jpg" alt="Beispielbild" />
                <div class="overlay">Pfannenkuchen</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0000.jpg" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Bereich: Am besten bewertet -->
        <div class="profile-container">
          <div class="profile-header">
            <div>
              <h1 class="profile-name">Am besten bewertet</h1>
            </div>
          </div>
          <div class="flex-bilder">
            <div class="scroll-container">
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0001.jpeg" alt="Beispielbild" />
                <div class="overlay">Nudelsuppe</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0000.jpg" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0002.jpg" alt="Beispielbild" />
                <div class="overlay">Pfannenkuchen</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0000.jpg" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0001.jpeg" alt="Beispielbild" />
                <div class="overlay">Nudelsuppe</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0002.jpg" alt="Beispielbild" />
                <div class="overlay">Pfannenkuchen</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Bereich: Am neusten -->
        <div class="profile-container">
          <div class="profile-header">
            <div>
              <h1 class="profile-name">Am neusten</h1>
            </div>
          </div>
          <div class="flex-bilder">
            <div class="scroll-container">
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0002.jpg" alt="Beispielbild" />
                <div class="overlay">Pfannenkuchen</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0000.jpg" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0001.jpeg" alt="Beispielbild" />
                <div class="overlay">Nudelsuppe</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0001.jpeg" alt="Beispielbild" />
                <div class="overlay">Nudelsuppe</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0000.jpg" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0002.jpg" alt="Beispielbild" />
                <div class="overlay">Pfannenkuchen</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Bereich: Beliebt im Sommer -->
        <div class="profile-container">
          <div class="profile-header">
            <div>
              <h1 class="profile-name">Beliebt im Sommer</h1>
            </div>
          </div>
          <div class="flex-bilder">
            <div class="scroll-container">
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0002.jpg" alt="Beispielbild" />
                <div class="overlay">Pfannenkuchen</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0001.jpeg" alt="Beispielbild" />
                <div class="overlay">Nudelsuppe</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0002.jpg" alt="Beispielbild" />
                <div class="overlay">Pfannenkuchen</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0000.jpg" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0001.jpeg" alt="Beispielbild" />
                <div class="overlay">Nudelsuppe</div>
              </div>
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0000.jpg" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
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
</body>

</html>