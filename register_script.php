<?php
  if (empty($_POST["email"])) {
    header("Location: ./index.php?content=message&alert=no-email");
  } else {
    include("./connect_db.php");
    include("./functions.php");

    $email = sanitize($_POST["email"]);

    $sql = "SELECT * FROM `register` WHERE `email` = '$email'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)) {
      header("Location: ./index.php?content=message&alert=emailexists");
    } else {
      $password = "geheim";
      $password_hash = password_hash($password, PASSWORD_BCRYPT);

      $sql = "INSERT INTO `register` (`id`,
                                      `email`,
                                      `password`,
                                      `userrole`)
              VALUES                 (NULL,
                                      '$email',
                                      '$password_hash',
                                      'customer')";

      if (mysqli_query($conn, $sql)) {

        $id = mysqli_insert_id($conn);

        $to = $email;
        $subject = "Activatielink voor uw account van am1x-vegetablejuice.org";
        $message = '<!doctype html>
                      <html lang="en">
                        <head>
                          <!-- Required meta tags -->
                          <meta charset="utf-8">
                          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                      
                          <!-- Bootstrap CSS -->
                          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
                          <style>
                            body {
                              background-color: #dddddd;
                              font-size: 1.3em;
                            }
                          </style>
                      
                          <title>Hello, world!</title>
                        </head>
                        <body>
                          <h2>Beste Gebruiker,</h2>
                          <p>U heeft zich onlangs geregistreerd voor de site www.am1x-vegetablejuice.org</p>
                          <p>Klik <a href="http://www.am1x-vegetablejuice.org/index.php?content=activate&id=' . $id . '&pwh=' . $password_hash . '">hier</a> voor het activeren en wijzigen van het wachtwoord van uw account</p>
                          <p>Bedankt voor het registreren</p>
                          <p>Met vriendelijke groet,</p>
                          <p>A. de Ruijter</p>
                          <p>CEO Vegetablejuice INC.</p>

                      
                          <!-- Optional JavaScript -->
                          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                          <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
                        </body>
                      </html>';

        
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: admin@vegetablejuice.org\r\n";
        $headers .= "Cc: moderator@vegetablejuice.org\r\n";
        $headers .= "Bcc: root@vegetablejuice.org";
        
        mail($to, $subject, $message, $headers);

        header("Location: ./index.php?content=message&alert=register-success");
      } else {
        header("Location: ./index.php?content=message&alert=register-error");
      }
    }
  }
?>