<<?php
include 'config2.php';

//запрос
$query='SELECT * FROM articles';
$output = mysqli_query($connection, $query);
echo mysqli_error($connection);

//вывод
while ($line= mysqli_fetch_row($output)){
//var_dump($line);
echo '<div style="padding-bottom:12px";>';
echo '<strong> </strong>'.$line[1].'<br>';
echo '<strong></strong>'.$line[2].'<br>';
echo '<strong></strong>'.$line[3].'<br>';
echo '</div>';

}
mysqli_free_result($output);//Прерывает запрос
mysqli_close($connection);//ПРерывает соединение с базой

?>

	