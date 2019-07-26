<?php
	session_start();
	unset($_SESSION['sport']);
	header("location:../index.php");
	exit();
?>