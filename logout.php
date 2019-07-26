<?php
	session_start();
	unset($_SESSION['matric']);
	header("location:index.php");
	exit();
?>