<?php
require_once("check_login.php");
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <?php include("templates/head.php"); ?>
    <base href="/sites/Rezepte/"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Über uns</title>
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

      <style>
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

      </style>


</head>
<body>
  <?php include("templates/navbar.php"); ?>

  <!-- Hauptbereich mit Sidebar und Content -->
  <main class="container my-5">
    <div class="profile-container">
        <h1>Über uns</h1>

        <p>Willkommen bei <strong>RezepteSite</strong>, einer Plattform für alle, die Spaß am Kochen haben und gerne neue Rezepte ausprobieren. Wir bieten eine Vielzahl an Rezeptideen für jede Gelegenheit – von schnellen Alltagsgerichten bis hin zu festlichen Menüs.</p>

        <p>Unsere Website ist darauf ausgelegt, dir als Inspirationsquelle zu dienen und dir zu helfen, leckere und abwechslungsreiche Mahlzeiten zu kreieren. Wir möchten dir nicht nur Rezepte bieten, sondern auch die Freude am Kochen und an gutem Essen vermitteln.</p>

        <h2>Unsere Philosophie</h2>
        <p>Bei RezepteSite glauben wir, dass Kochen mehr ist als nur die Zubereitung von Nahrung. Es geht darum, Momente der Freude zu schaffen, neue Geschmäcker zu entdecken und den Alltag mit einfachen, aber köstlichen Gerichten zu bereichern. Unsere Rezepte sind so gestaltet, dass sie sowohl für Anfänger als auch für erfahrene Köche zugänglich sind.</p>

        <h2>Unsere Vision</h2>
        <p>Unsere Vision ist es, eine Anlaufstelle für alle zu sein, die gerne kochen oder sich nach neuen Ideen für ihre Küche sehnen. Wir möchten eine breite Sammlung an Rezepten bereitstellen, die leicht nachzukochen sind und dir helfen, immer wieder neue kulinarische Abenteuer zu erleben.</p>

        <p>Wir hoffen, dass du hier Rezepte findest, die dir gefallen und die du gerne ausprobieren möchtest. Vielen Dank, dass du Teil unserer Reise bist!</p>
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

