<?php
	include_once '../inc/all.php';
	if(lib())
	{
		header('location:index.php');
		exit();
	}

	if(isset($_POST['ok']))
	{
		//var_dump($_POST);
		$username = get_post('username');
		$password = get_post('password');
		$sql = mysql_query("SELECT username FROM library_admin WHERE username='$username' and password='$password'") or die(mysql_error());
		$n = mysql_num_rows($sql);
		if($n == 0){
			set_flash("Invalid details, check and try again","danger");
			header("location:login.php");
			exit();
		}else{
			$_SESSION['lib'] = $username;
			header("location:index.php");
			exit();
		}
		exit();	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Clearance Application - Library Admin Login</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=Edge"/> 		
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />	
	<link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../lib/font-awesome/font-awesome.min.css">
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">
			<img src="../img/logo-fpe.png" class="logo">
		</a>
	</div>	
</nav>

<div class="container">
	<div class="row">		
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					Login
				</div>
				<div class="panel-body">
					<h3 class="page-header">Library Admin Login</h3>

					<form action="" method="post" role="form" class="has-success">
						<?php flash(); ?>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" required="" placeholder="Username">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required="" placeholder="Password">
						</div>
						<div class="form-group">
							<input type="submit" name="ok" class="btn btn-success" value="Login">
						</div>						
					</form>					
				</div>
			</div>
		</div>	
	</div>
</div>


<section id="footer">
	&copy; The Federal Polytechnic Ede
</section>
<script type="text/javascript" src="../lib/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
</body>
</html>