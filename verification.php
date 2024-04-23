<?php

$lines = file("empass.txt");
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$rememberMe = $_REQUEST['rememberMe'];

// Cari Email di List Txt
foreach ($lines as $line) {
  $parts = explode("/&/", $line);
  $storedEmail = $parts[0];
  $storedPassword = $parts[1];

  // Mulai sesi jika Email dan Password sesuai
  if ($storedEmail == $email && $storedPassword == $password) {
    session_start();

    $_SESSION['email'] = $email;

    // Buat cookie jika rememberMe dicentang
    if (isset($rememberMe)) {
      setcookie('email', $email, time() + 86400);
    }
    echo true;
    exit;
  }
}

echo false;
