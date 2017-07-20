<?php
	session_start();
	setcookie("cook", $_cookie['cook'],time() - (180), "/");
	session_destroy();
	header("location: home.php");
?>