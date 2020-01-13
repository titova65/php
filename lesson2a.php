<?php
include ('config.php');

// запрос
$query='Select * from clients.db_clients';
$output = mysqli_query ($connection, $query);

// вывод
while ($line=mysqli_fetch_row($output)) {
var_dump($line);
 }
 ?>