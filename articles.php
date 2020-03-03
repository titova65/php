<?php
include 'config2.php';
$paring = "SELECT * FROM articles";//выбираем все статьи
$response = mysqli_query($connection,$paring );//вывод из базы
//количество статей на странице
//новости на одной странице
$news_page=4;

//считаем страницы
$news_total_paring = "SELECT count('id') FROM articles";
$pages_response = mysqli_query($connection, $news_total_paring);

$news_total = mysqli_fetch_array($pages_response);
$pages_total = $news_total[0];
$pages_total = ceil($pages_total/$news_page);

echo 'Всего страниц:'.$pages_total.'<br>';
echo 'Новостей на странице:'.$news_page.'<br>';

//спрашиваем пользователя
if (isset ($_GET ['page'])) {
	$page=$_GET ['page'];

} else {
	$page=1;
}

//с чего начать показ
$start=($page-1)*$news_page;

// данные с базы
$paring = "SELECT * FROM articles LIMIT $start, $news_page";
$response=mysqli_query($connection, $paring);

//перелистование
$previous = $page-1;
$next = $page +1;
if ($page > 1) {
	echo "<a href=\"?page=$previous\">Предыдущая </a>";
}

if ($pages_total>=1) {
    for ($i=1; $i<=$pages_total; $i++) {
    	if ($i==$page) {
    		echo "<b><a href=\"?page=$i\"> $i </a></b>";
    	} else {
    		echo "<a href=\"?page= $i\"> $i </a> ";
    	}
    }
}
if ($page<$pages_total) {
	echo "<a href=\"?page= $next\">Далее </a>";
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Статьи</title>
	<meta charset="utf-8">
</head>
<body>
<?php
while ($line=mysqli_fetch_assoc($response)) {
	echo '<div><h3>'.$line['title']. '</h3>';
	echo '<p>'.$line['text']. '</p></div>';
}
?>

</body>
</html>