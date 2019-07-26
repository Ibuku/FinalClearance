<?php
	session_start();
	unset($_SESSION['lib']);
	header("location:../index.php");
	exit();
?>