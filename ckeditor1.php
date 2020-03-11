<?php
include ('config2.php');
?>
<?php
//добавление в базу
if ($_SERVER['REQUEST_METHOD']=='POST'){
if (!empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['date'])){
$title = htmlspecialchars(trim($_POST['title']));
$text = htmlspecialchars(trim($_POST['text']));
$date = htmlspecialchars(trim($_POST['date']));
}
//запрос
$query="INSERT INTO articles(title,text,date) VALUES('".$title."','".$text."','".$date."')";
$output=mysqli_query($connection, $query);
//количество ответов на запрос
$result=mysqli_affected_rows($connection);
//mysqli_affected_rows() проверяет, сколько запросов было сделано
if ($result == 1) {
echo "Запись успешно добавлена";
} else {
echo "Запись не добавлена";
}
}
//вывод
$checkSQL=mysqli_query($connection, 'SELECT * FROM articles');
//удаление
if(!empty($_GET['id'])){
//удаляем запрос
$id = $_GET['id'];
$delete_sql = "DELETE FROM articles WHERE id='$id'";
$delete_value = mysqli_query($connection, $delete_sql);
if($delete_value){
echo "Строка удалена!";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$_SERVER['PHP_SELF'].'">';
} else {
echo "Ошибка при удаление!";
}
}
?>
<html>
<head>
<title>Content</title>
<meta charset="utf-8">
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>
<div style="height:300px;">
<form method="post" action="">
<div>
<label>Title</label>
<input type="text" name="title" required>
</div>
<div>
<label>Text</label>
<textarea type="text" name="text" rows="10" cols="80" required></textarea>
</div>
<div>
<label>Date</label>
<input type="date" name="date" required>
</div>
<input type="submit" name="submit" value="SEND">
<script>
CKEDITOR.replace('text');
</script>
</form>
</div>
<br>
<?php
while($line = mysqli_fetch_array($checkSQL)){
echo '<div>
<h3>'.$line['title'].'</h3>
<p>'.$line['text'].'</p>
<p>'.$line['date'].'</p>
<button>
<a href="'.$_SERVER['PHP_SELF'].'?id='.$line["id"].'">
удалить</a>
</button>
<button>
<a href="edit.php?id='.$line["id"].'">обновить</a>
</button>
<button>
<a href="viev.php?id='.$line['id'].'">просмотр</a>
</button>

</div>';
}
?>
</body>
</html>