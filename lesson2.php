<?php
include('config.php');
//запрос
$query="SELECT * FROM clients.db_clients";
$output=mysqli_query($connection,$query);

//вывод
while ($line=mysql_fetch_row($output)) {
	var_dump($line);
}
?>