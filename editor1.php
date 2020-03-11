<?php
include('config.php'); 
?>
<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">
                <title>CKEditor</title>	
                <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

        </head>
	<body>
		<form method="POST" action="save.php">
		<div style="padding-bottom:20px;">
		<label>Title</label>
		<input type="text" name="title" required>
		</div>
		<div>
		
                <textarea name="editor1" required></textarea>
                <script>
            CKEDITOR.replace( 'editor1' );
        </script>
		</div>
		<input type="submit" value="SAVE">
		</form>
        </body>
</html>