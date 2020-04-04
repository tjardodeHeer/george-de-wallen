<?php
  var_dump($_POST);
  include("./connect_db.php");
  include("./functions.php");

  $email = sanitize($_POST["email"]);
  $password = sanitize($_POST["password"]);

  if (empty($email) || empty($password)) {
    echo "Leeg";
  } else {
    echo "Ingevuld";
  }
?>

<!-- Volgende stap is dat we gaan kijken of het ingevulde emailadres wel bestaat? -->