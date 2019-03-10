<?php

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'login';

//create connection
$conn = new mysqli($mysql_host , $mysql_user , $mysql_pass ,$mysql_db);

//check connection
if ($conn->connect_error) {
  die("connect failed:".$conn->connect_error);
}
echo "";
?>
