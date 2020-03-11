<?php
include ('config2.php');
?>
<?php
$paring="SELECT goods.id, goods.title, clients.id as clients_id, clients.name  FROM goods JOIN clients ON goods.clients_id=clients.id";
$output = mysqli_query($connection, $paring);

while ($line = mysqli_fetch_assoc ($output)) {
	echo 'id товара: '.$line['id']. '<br>';
	echo 'Название товара: '.$line['title'].'<br>';
	echo 'id клиента: '.$line['clients_id'].'<br>';
	echo 'Имя клиента: '.$line['name'].'<br><br>';
}


