<?php
include 'config.php';

$title = trim($_POST["title"]);
$body = mysqli_real_escape_string($connection, $_POST["editor1"]);
$date = date("d M, Y H:i:s");

$query="INSERT INTO editor(title,body,date) 
VALUES('".$title."','".$body."','".$date."')";
$output=mysqli_query($connection, $query);

echo "статья " .$title." успешно добавленна.";

?>






<button>
<a href="view2.php">посмотреть</a>
</button>