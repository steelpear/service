<?php
$_POST = json_decode(file_get_contents('php://input'), true);

if ($_POST["action"] == "status") {
  /* Переменные для соединения с базой данных */
  $hostname = "46.254.21.116";
  $username = "p272502_mobiser4";
  $password = "20service16";
  $dbName = "p272502_replica";

  /* Таблицы MySQL, в которых хранятся данные */
  $userstable = "service";
  $col1 = "kvit";
  $kv = $_POST['kv'];

  /* создать соединение */
  $conn = @mysql_connect($hostname,$username,$password); 
  if ($conn == false) {
    echo "Ошибка базы данных!";
  }

  /* выбрать базу данных. Если произойдет ошибка - вывести ее */
  if ($conn == !false) {
  $sel = @mysql_select_db($dbName);
  if ($sel == false) {
    echo "База данных недоступна в данный момент.";  
  }
  }

  /* составить запрос */
  if (!empty($kv)) {
  $query = "SELECT * FROM $userstable WHERE ($col1=$kv)";
  /* Выполнить запрос. Если произойдет ошибка - вывести ее. */
  $res = @mysql_query($query); 
  $field = @mysql_fetch_assoc( $res );}
  $price=$field[scen3] ;

  if ($field[statea] == 1) $stat = 'Ожидает ремонта';
  else if ($field[statea] == 2) $stat = 'В процессе ремонта';
  else if ($field[statea] == 3) $stat = 'Ожидает запчасть';
  else if ($field[statea] == 4) $stat = 'Готов';
  else if ($field[statea] == 5) $stat = 'Выдан';
  else if ($field[statea] == 7) $stat = 'Отказ от ремонта. Ремонт нерентабелен';
  else if ($field[statea] == 8) $stat = 'Выдан без ремонта';
  else if ($field[statea] == 9) $stat = 'В удалённом сервисном центре';
  else if ($field[statea] == 15) $stat = 'Требуется согласовать дополнительные условия ремонта. Свяжитесь с СЦ';
  else if ($field[statea] == 16) $stat = 'Согласованы дополнительные условия ремонта. Ремонт продолжается';
  else if (!$field && !empty($kv)) $stat = 'Такого номера не существует!';

  echo $stat;
};

?>
