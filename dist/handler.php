<?php
$_POST = json_decode(file_get_contents('php://input'), true);

if ($_POST["action"] == "getstatus") {
  $hostname = "46.254.21.116";
  $username = "p272502_mobiser4";
  $password = "20service16";
  $dbName = "p272502_replica";

  $userstable = "service";
  $kvit = $_POST["kvit"];

  $conn = mysqli_connect($hostname,$username,$password); 
  mysqli_set_charset($conn, "utf8");
  mysqli_select_db($conn, $dbName);
  $query = "SELECT * FROM $userstable WHERE (kvit=$kvit)";
  $res = mysqli_query($conn, $query); 
  $response = mysqli_fetch_assoc($res);

  echo json_encode($response,JSON_UNESCAPED_UNICODE);
};

?>
