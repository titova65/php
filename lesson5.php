<?php
include 'config2.php';
?>
<form method="get" action=""> 
    Поиск<input type="text" name="search">
    <input type="submit" value="Поиск...">


    <select id="select" name="where">
    	<option>name</option>
    	<option>email</option>
    	<option>phone</option>
    </select>
 </form>
<?php
if (!empty ($_GET['search'])) {
	//пользовательский текст из формы
	$search = $_GET['search'];
	$search = htmlspecialchars(trim ($search));

	$fields=['name'=>'name','email'=>'email','phone'=>'phone'];
	$field='name';

	if(array_key_exists($_GET['where'],$fields)) {
		$field=$fields[$_GET['where']];
	}




   //запрос
	$query = "SELECT * FROM clients WHERE {$field} LIKE '%{$search}%'";
	$output=mysqli_query($connection,$query);
	//колличество ответов на запрос
	$results=mysqli_num_rows($output);

    echo 'Поиск по:'.$search.'<br>';
	echo 'Ответы: <br>';
	//колличество найденных ответов
	if ($results == 0) {
		echo "Ответов не найдено !";
		# code...
	}
	else {
		echo 'Найдено - '.$results.' ответов'.'<br>';
	}

	while ($line = mysqli_fetch_assoc($output)) {
		echo $line['name'].' - '.$line['email'].' - '.$line['phone'].'<br>';
	}
	mysqli_free_result($output);//Прерывает запрос
    mysqli_close($connection);//ПРерывает соединение с базой

}
?>


	