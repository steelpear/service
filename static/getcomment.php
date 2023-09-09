<?php
  $_POST = json_decode(file_get_contents('php://input'), true);
  
  $hostname = "localhost:3306";
  $username = "steelpear";
  $password = "20alex09";
  $dbName = "comm";
  $table = "comments";
  $limit = $_POST["limit"];
  $skip = $_POST["skip"];

  $conn = mysqli_connect($hostname,$username,$password); 
  mysqli_set_charset($conn, "utf8");
  mysqli_select_db($conn, $dbName);
  $query = "SELECT * FROM $table ORDER BY `comment_ID` DESC LIMIT $skip,$limit";
  $res = mysqli_query($conn, $query); 
  $response = mysqli_fetch_all($res, MYSQLI_ASSOC);

  echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>
