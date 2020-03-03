<?php

session_start();
if (!isset($SESSION['authentication'])) {
   header('Location: login.php');
   exit();
 }

 if (isset($POST['logout'])) {
 	session_destroy();
   header('Location: content.php');
   exit();
 }
 ?>