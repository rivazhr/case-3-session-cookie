<?php
$lines = file("empass.txt");
$email = $_REQUEST['email'];

foreach ($lines as $line) {
  $parts = explode("/&/", $line);
  $storedEmail = $parts[0];
  $storedPassword = $parts[1];

  if ($storedEmail == $email) {
    echo $line;
    exit;
  }
}
