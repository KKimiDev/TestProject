<?php
  require_once("check_login.php");
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rezepte Website</title>
    <?php include("templates/head.php"); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  
  </head>
  <body>
  <?php include("templates/navbar.php"); ?>

    <!-- Hauptbereich mit Sidebar und Content -->
    <main class="container my-5">
      <div class="row g-4">
        
        <!-- Sidebar -->
        <aside class="col-lg-3 order-lg-1 order-2">
          <div class="sidebar">
            <h5>Kategorien</h5>
            <ul>
              <li><a href="http://localhost/sites/Rezepte/Suche?tags=Vegetarisch">Vegetarisch</a></li>
              <li><a href="#http://localhost/sites/Rezepte/Suche?tags=Vegan">Vegan</a></li>
              <li><a href="http://localhost/sites/Rezepte/Suche?tags=Fleisch">Fleisch</a></li>
              <li><a href="http://localhost/sites/Rezepte/Suche?tags=Desserts">Desserts</a></li>
              <li><a href="http://localhost/sites/Rezepte/Suche?tags=Simpel">Simpel</a></li>
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

          <div class="profile-container">
            <div class="profile-header">
              <div>
                <h1 class="profile-name">Am Besten bewertet</h1>
              </div>
            </div>
            <div class=flex-bilder>
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

          <div class="profile-container">
            <div class="profile-header">
              <div>
                <h1 class="profile-name">Am Neusten</h1>
              </div>
            </div>
            <div class=flex-bilder>
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

          <div class="profile-container">
            <div class="profile-header">
              <div>
                <h1 class="profile-name">Beliebt im Sommer</h1>
              </div>
            </div>
            <div class=flex-bilder>
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
