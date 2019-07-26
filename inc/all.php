<?php
	session_start();
	require_once 'func.php';

	$db_name = "project_clearance";
	$db_user = "root";
	$db_pass = "";
	$db_host = "localhost";

	$connect = mysql_connect($db_host,$db_user,$db_pass) or die(mysql_error());
	$db = mysql_select_db($db_name,$connect) or die(mysql_error());
?>