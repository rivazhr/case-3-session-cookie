<?php
session_start();
if (isset($_COOKIE['email']) && isset($_SESSION['email'])) {
  header("Location: profile.php");
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

<body>
  <div class="container align-self-center py-5">
    <div class="row">
      <div class="col-lg-6 d-flex justify-content-center">
        <img src="img\login-pict.svg" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 p-3">
        <div class="container w-75 py-5 px-1 bg-pink align-self-center rounded-3">
          <div class="row d-flex text-center px-5">
            <h3>Login</h3>
            <hr>
          </div>
          <div class="row mt-2 px-5">
            <form action="" method=post id="form-login">
              <div>
                <label for="email" class="fw-medium">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan Email" aria-describedby="validationEmailFeedback" class="form-control py-2" required>
                <div id="validationEmailFeedback" class="invalid-feedback">
                  Email must contain '@' and '.'
                </div>
              </div>
              <label for="password" class="fw-medium mt-3">Password</label>
              <div class="d-flex flex-row">
                <input type="password" id="password" name="password" placeholder="Masukkan Password" aria-describedby="validationPasswordFeedback" class="form-control py-2" required>
                <button class="ms-2">
                  <img src="img\hide.svg" id="show" alt="">
                </button>
              </div>
              <div id="validationPasswordFeedback" class="invalid-feedback">
                Password must be 8 characters long, include a-z, A-Z, 0-9, and symbol.
              </div>
              <div class="mt-3 d-flex justify-content-between">
                <div>
                  <input type="checkbox" name="rememberMe" id=rememberMe>
                  Ingat Saya
                </div>
              </div>
              <div class="d-flex text-center pt-5">
                <button class="btn text-center fw-bold bg-primary w-100 py-3" id="submit" type="submit">Sign In</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"> </script>
<script src="script.js"></script>

</html>