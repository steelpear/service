<?php
    $_POST = json_decode(file_get_contents('php://input'), true);

    $hostname = "localhost:3306";
    $username = "steelpear";
    $password = "20alex09";
    $dbName = "comm";
    $table = "comments";

    $name = $_POST["name"];
    $city = $_POST["city"];
    $text = $_POST["text"];

    $conn = mysqli_connect($hostname,$username,$password); 
    mysqli_set_charset($conn, "utf8");
    mysqli_select_db($conn, $dbName);
    $query = "INSERT INTO `$table` (`comment_author`, `comment_city`, `comment_content`, `comment_avatar`, `comment_author_email`) VALUES ('$name', '$city', '$text', '', '')";
    if(mysqli_query($conn, $query)){
        echo "true";
    } else{
        echo "false". mysqli_error($conn);
    }
?>
