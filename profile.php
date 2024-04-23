<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="img\flowers.png" type="image/x-icon">
  <title>Fairytale</title>
</head>

<!-- Header -->
<nav class="navbar navbar-expand-lg shadow-sm mb-2 position-sticky top-0 bg-white z-3">
  <div class="container py-3 ">
    <a class="navbar-brand" href="index.php">Fairytale</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav me-auto ">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Galeri
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Kalkulator ROI</a></li>
            <li><a class="dropdown-item" href="#">Fitur Chat</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="img\Profil.svg" alt="">
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item active" href="profile.php">Profil Saya</a></li>
            <li>
              <a class="dropdown-item" href="logout.php" name="logout">
                <img src="img\Logout.svg" alt="">
                Keluar
              </a>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<body>
  <div class="container h-100 my-5">
    <div class="p-0 border border-dark-subtle pb-3 rounded-4 position-relative">
      <div class="background position-absolute z-1 w-100">
        <img class="img-fluid w-100 rounded-top-4" src="img/profil-background.svg" alt="">
      </div>
      <div class="row mt-5 pb-2 pt-5">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <div class="profile-picture position-relative z-2">
            <img class="" src="img/profil-foto.svg" alt="">
          </div>
        </div>
        <div class="col-lg-1"></div>
      </div>
      <div class="row">
        <div class="col-lg-1"></div>

        <!-- Biodata -->
        <div class="col-lg-10">
          <h3 id="name" class="my-3">Syahirotul Baroroh</h3>
          <p>
            Alamat Email: <span id="email-address"><?php echo $_SESSION['email']; ?></span>
          </p>
          <p>
            <img src="img\Location.svg" alt="">
            <span id="location">Indonesia</span>
          </p>
        </div>

        <script>
          window.addEventListener('DOMContentLoaded', (event) => {
            const email = document.querySelector("#email-address").innerText.trim();
            fetch("data.php?email=" + email, {
                method: "GET"
              }).then((response) => {
                return response.text();
              })
              .then((data) => {
                const parts = data.split("/&/");
                document.getElementById("name").textContent = parts[2];
                document.getElementById("location").textContent = parts[3];
              })
              .catch((error) => {
                console.error('Error:', error);
              });
          });
        </script>
      </div>
    </div>
  </div>

</body>

<?php include "footer.html" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"> </script>
<script src="script.js"> </script>

</html>