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
      $mut = microtime();

      $time = explode(" ", $mut);

      $password = $time[1] * $time[0] * 1000000;

      $password_hash = password_hash($password, PASSWORD_BCRYPT);

      $onehour = mktime(1,0 ,0, 1, 1, 1970);
 
      $d = date("d-m-Y", ($time[1] + $onehour));

      $t = date("H:i:s", ($time[1] + $onehour));
      
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
        // include("./email.php");
        include("./alt-email.php");
        
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