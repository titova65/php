<?php
include 'config2.php';
?>
<?php

//добавление в базу
if ($_SERVER['REQUEST_METHOD']=='POST') {
if (!empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['date'])) {
$title = htmlspecialchars(trim($_POST['title']));
$text = htmlspecialchars(trim($_POST['text']));
$date = htmlspecialchars(trim($_POST['date']));
}
//запрос
$query= "INSERT INTO articles(title,text,date) VALUES('".$title."','".$text."','".$date."')";
$output = mysqli_query($connection, $query);
//количество ответов на запрос
$result=mysqli_affected_rows($connection);
//mysqli_affected_rows() проверяет сколько запросов было сделано
if ($result == 1) {
echo "запись успешно добавлена";

}
else {
echo"запись не добавлена";
}
}

?>
<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="UTF-8">
                <title>Document</title>
                <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        </head>
        <body>
                <div style="height: 300px;">
                        <form method="post" action="">
                                <div>
                                        <label>Title</label>
                                        <input type="text" name="title" required>
                                </div>
                                <div>
                                        <label>Text</label>
                                        <textarea type="text" name="text" rows="5" required></textarea>
                                </div>
                                <div>
                                        <label>Date</label>
                                        <input type="date" name="date" required>
                                </div>
                                <input type="submit" name="submit" value="SEND">
                        </form>
                </div>
                <script>
                CKEDITOR.replace( 'text' );
                </script>
        </body>
</html>