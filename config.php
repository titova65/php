<?php
//ваши данные
$db_server='localhost';// название сервера
$db_database='db_clients'; //название базы данных
$db_user='root'; //при необходимости
$db_password='';//пароль если есть

//соединение с базой
$connection=mysqli_connect($db_server,$db_user,$db_password,$db_database);
mysqli_select_db($connection,"db_clients");
//контроль соединения
if (!$connection) {
	die('не удается подключится');
}

?>