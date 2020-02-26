<?php
include ('config2.php');

if (is_array($_FILES) && array_key_exists('f', $_FILES) && $_FILES['f']['error'] == 0) {
	$fileInfo = $_FILES['f'];
	if (move_uploaded_file($fileInfo['tmp_name'], 'uploaded/'.$fileInfo['name'])) {
		mysqli_query($connection,"insert into images set name='". mysqli_real_escape_string($connection,$fileInfo['name'])."'");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Images</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
	<div>
		<form method="post" enctype="multipart/form-data">
			<div>
				<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
				<div>
					<label>Загрузить файл</label>
				</div>
				<div>
					<input type="file" name="f">
				</div>
				<div>
					<input type="submit" value="Upload">
				</div>
			</div>
		</form>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	</div>
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Загрузочные картинки</h1>
		</div>
	

		<?php
		//запрос
		$result=mysqli_query($connection, "select * from images order by id desc");
       
       //перебор массива
       foreach ($result as $img) {
       echo "<div><img src=\"uploaded/".$img['name']."\"></div>";
       }

		?>
	</div>
</div>
	
</body>
</html>
