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