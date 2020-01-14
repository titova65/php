<?php
// ваши данные
$db_server='localhost';
$db_database='db_clients';
$db_user='root'; 
$db_password='';

//соединение с базой
$connection=mysqli_connect($db_server,$db_user, $db_password, $db_database);
mysqli_select_db($connection, "db_clients");
//контроль соединения
if (!$connection){
die ("Не удается подключиться к базе данных");
}
?>
