<?php
  $hostname = "localhost:3306";
  $username = "steelpear";
  $password = "20alex09";
  $dbName = "comm";
  $table = "comments";

  $conn = mysqli_connect($hostname,$username,$password); 
  mysqli_set_charset($conn, "utf8");
  mysqli_select_db($conn, $dbName);
  $query = "SELECT * FROM $table";
  $res = mysqli_query($conn, $query); 
  $response = mysqli_fetch_all($res);

  echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>
