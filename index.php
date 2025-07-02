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

    .image-container {
      position: relative;
      display: inline-block;
      width: 300px; 
      height: 200px;
      overflow: hidden;
      cursor: pointer;
    }

    .image-container img {
      display: block;
      width: 100%;
      height: 100%;
      transition: transform 0.3s ease;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.5);
      opacity: 0;
      transition: opacity 0.3s ease;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5em;
      text-align: center;
    }

    .image-container:hover img {
      filter: grayscale(100%);
      transform: scale(1.05);
    }

    .image-container:hover .overlay {
      opacity: 1;
    }

  </style>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 58b0efa (Bild overlay)
=======
>>>>>>> c8c976d (changes)
>>>>>>> a1dfc96977bcfe65db7cdf27fec8200103a67fc6
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
              <div class="image-container">
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0000.jpg" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
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
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0000.jpg" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
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
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0000.jpg" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
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
                <img src="uploads/Anna Koch/Avocado Toast Deluxe 0000.jpg" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
                <div class="overlay">Avocadotoast</div>
              </div>
              <div class="image-container">
                <img src="" alt="Beispielbild" />
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

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
