<?php
  $alert = (isset($_GET["alert"]))? $_GET["alert"]: "default";

  switch($alert) {
    case "no-email" :
      echo '<div class="alert alert-info mt-5 w-50 mx-auto" role="alert">
              U heeft geen e-mailadres ingevuld, probeer het opnieuw...
            </div>';
      header("Refresh: 3; ./index.php?content=register");
    break;
    case "emailexists" :
      echo '<div class="alert alert-warning mt-5 w-50 mx-auto" role="alert">
              Het door u ingevulde e-mailadres bestaat al, probeer het opnieuw met een ander e-mailadres...
            </div>';
      header("Refresh: 3; ./index.php?content=register");
    break;
    case "register-error" :
      echo '<div class="alert alert-danger mt-5 w-50 mx-auto" role="alert">
              Er is iets fout gegaan in het registratieproces... Probeer het nogmaals of neem contact op met admin@vegetablejuice.nl
            </div>';
      header("Refresh: 3; ./index.php?content=register");
    break;
    case "register-success" :
      echo '<div class="alert alert-success mt-5 w-50 mx-auto" role="alert">
              U bent succesvol geregistreerd. U ontvangt een e-mail van ons met daarin een activatielink.
            </div>';
      header("Refresh: 3; ./index.php?content=login");
    break;
    default:
      header("Location: ./index.php?content=home");
    break;
  }


?>