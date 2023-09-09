<?php
$_POST = json_decode(file_get_contents('php://input'), true);

if (isset($_POST["ids"]) && !empty($_POST["ids"])) {

    $hostname = "localhost:3306";
    $username = "steelpear";
    $password = "20alex09";
    $dbName = "comm";
    $table = "comments";

    $ids = $_POST["ids"];
    $ids = implode(",",$ids);

    $conn = mysqli_connect($hostname,$username,$password); 
    mysqli_set_charset($conn, "utf8");
    mysqli_select_db($conn, $dbName);
    $query = "DELETE FROM `$table` WHERE `comment_ID` IN ($ids)";
    if(mysqli_query($conn, $query)){
        echo "true";
    } else{
        echo "false". mysqli_error($conn);
    }
}
?>
