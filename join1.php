<?php
include ('config2.php');
?>
<?php
$paring="SELECT users.id AS id_users , users.username, articles.id, articles.title FROM users JOIN articles ON users.id=articles.id_users";
$output = mysqli_query($connection, $paring);

while ($line = mysqli_fetch_assoc ($output)) {
	echo 'id пользователя: '.$line['id_users']. '<br>';
	echo 'Имя пользователя: '.$line['username'].'<br>';
	echo 'id статьи: '.$line['id'].'<br>';
	echo 'Название статьи: '.$line['title'].'<br><br>';
}

