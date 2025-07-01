<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Rezeptseite – Alternativ</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #faf8f5;
      color: #4b342f; /* dunkleres Braun für Text */
      padding: 50px 0;
    }

    h1 {
      text-align: center;
      font-weight: 700;
      color: #a9746e; /* soften Braun */
      margin-bottom: 40px;
      font-size: 2.8rem;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    .recipe-card {
      background: #fff3e0;
      border-radius: 15px;
      padding: 30px 25px;
      box-shadow: 0 6px 20px rgba(249, 168, 37, 0.25);
      transition: box-shadow 0.3s ease, transform 0.2s ease;
      max-width: 600px;
      margin: 0 auto;
      cursor: pointer;
    }

    .recipe-card:hover {
      box-shadow: 0 12px 30px rgba(249, 168, 37, 0.45);
      transform: translateY(-5px);
    }

    .recipe-title {
      font-weight: 800;
      font-size: 2rem;
      margin-bottom: 15px;
      color: #6d4c41;
      letter-spacing: 0.05em;
      text-shadow: 0 1px 1px rgba(255, 255, 255, 0.4);
    }

    .recipe-desc {
      font-size: 1.15rem;
      margin-bottom: 25px;
      color: #5d4037;
      line-height: 1.5;
      font-style: italic;
    }

    ul.ingredients {
      list-style-type: square;
      padding-left: 20px;
      color: #5d4037;
      font-size: 1rem;
      margin-bottom: 25px;
    }

    ul.ingredients li {
      margin-bottom: 8px;
    }

    .preparation {
      font-size: 1rem;
      color: #4b342f;
      line-height: 1.6;
    }

    /* Stil für das Carousel */
    .carousel-item {
      background: #fff3e0;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(249, 168, 37, 0.25);
      padding: 30px;
      transition: box-shadow 0.3s ease, transform 0.2s ease;
    }

    .carousel-item:hover {
      box-shadow: 0 12px 30px rgba(249, 168, 37, 0.45);
      transform: translateY(-5px);
    }
  </style>
</head>
<body>

  <h1>Leckeres Rezept</h1>


  <!-- Rezeptkarte -->
  <div class="recipe-card" tabindex="0" role="article" aria-label="Rezept Schoko-Bananen-Pancakes">
    <!-- Bootstrap Carousel -->
  <div id="recipeCarousel" class="carousel slide" data-ride="carousel" style="max-width: 600px; margin: 0 auto;">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <h3 class="recipe-title">Schritt 1: Bananen zerdrücken</h3>
        <p>Die reifen Bananen zerdrücken, bis sie eine weiche, breiige Konsistenz haben.</p>
      </div>
      <div class="carousel-item">
        <h3 class="recipe-title">Schritt 2: Zutaten vermengen</h3>
        <p>Die Bananen mit Eiern, Milch und Mehl vermengen.</p>
      </div>
      <div class="carousel-item">
        <h3 class="recipe-title">Schritt 3: Pancakes ausbacken</h3>
        <p>Die Mischung in der Pfanne ausbacken, bis sie goldbraun sind.</p>
      </div>
    </div>
    <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Vorherige</span>
    </a>
    <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Nächste</span>
    </a>
  </div>
    <h2 class="recipe-title">Schoko-Bananen-Pancakes</h2>
    <p class="recipe-desc">
      Fluffige Pancakes mit Banane und Schokostückchen – perfekt für ein gemütliches Frühstück!
    </p>
    <ul class="ingredients">
      <li>2 reife Bananen</li>
      <li>150g Mehl</li>
      <li>2 Eier</li>
      <li>50g Zartbitterschokolade</li>
      <li>150ml Milch</li>
      <li>1 TL Backpulver</li>
    </ul>
    <p class="preparation">
      Zubereitung: Bananen zerdrücken, mit Eiern und Milch verrühren, Mehl & Backpulver dazugeben, Schokolade hacken und unterheben. In der Pfanne ausbacken und genießen!
    </p>
  </div>

  
  <!-- Bootstrap Carousel -->
  <div id="recipeCarousel" class="carousel slide" data-ride="carousel" style="max-width: 600px; margin: 0 auto;">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <h3 class="recipe-title">Schritt 1: Bananen zerdrücken</h3>
        <p>Die reifen Bananen zerdrücken, bis sie eine weiche, breiige Konsistenz haben.</p>
      </div>
      <div class="carousel-item">
        <h3 class="recipe-title">Schritt 2: Zutaten vermengen</h3>
        <p>Die Bananen mit Eiern, Milch und Mehl vermengen.</p>
      </div>
      <div class="carousel-item">
        <h3 class="recipe-title">Schritt 3: Pancakes ausbacken</h3>
        <p>Die Mischung in der Pfanne ausbacken, bis sie goldbraun sind.</p>
      </div>
    </div>
    <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Vorherige</span>
    </a>
    <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Nächste</span>
    </a>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

