<?php
  function sanitize($raw_data) {
    global $conn;
    $data = htmlspecialchars($raw_data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
  }


  function date_password_hash() {

    $mut = microtime();

    $time = explode(" ", $mut);

    $password = $time[1] * $time[0] * 1000000;

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $onehour = mktime(1,0 ,0, 1, 1, 1970); 
 
    $d = date("d-m-Y", ($time[1] + $onehour));

    $t = date("H:i:s", ($time[1] + $onehour));

    return array("time" => $t, "date" => $d, "password_hash" => $password_hash);
  }
?>