<?php
include 'config.php';
$query = mysqli_query($connection, "SELECT * FROM editor");
$post = mysqli_fetch_array($query);

while ($post=mysqli_fetch_assoc($query)) {
	echo '<div><h3>'.$post['title']. '</h3>';
	echo '<p>'.$post['body']. '</p></div>';
	echo '<hr/><p>Posted on : '.$post['date'].'</p><hr/>';
}
?>