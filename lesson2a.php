<?php
include ('config.php');

// запрос
$query="SELECT * FROM clients";
$output = mysqli_query ($connection, $query);
echo mysqli_error($connection);

// вывод
while ($line=mysqli_fetch_row($output)) {
	var_dump($line);
 }
 ?>