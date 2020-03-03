<?php
include 'config2.php';
$checkSQL=mysqli_query($connection,'SELECT * FROM articles');
?>

<?php
while ($line = mysqli_fetch_array($checkSQL)) {
	echo '<div>
	<h3>'.$line['title'].'</h3>
	<p>' .$line['text'].'</p>
	<p>'.$line['date'].'</p>
	<buton>
	<a href="'.$_SERVER['PHP_SELF'].'?id=' .$line["id"].'">
	удалить</a>
	</button>;
	</div>';
	
}
if (!empty($_GET['id'])) {
	//удаляем запрос
$id=$_GET['id'];
$delete_sql = "DELETE FROM articles WHERE id='$id'";
$delete_value = mysqli_query($connection,$delete_sql);
if ($delete_value) {
	      echo "строка удалена!";
	      echo '<META HTTP-EQUIV="Refresh" Content="0; 

	      URL='.
	      $_SERVER['PHP_SELF'].'">';

} else {
	echo "Ошибка при удалении!";
}
}
?>