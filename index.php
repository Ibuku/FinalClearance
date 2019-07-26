<?php
	include_once 'inc/all.php';

	if(login())
	{
		header("location:home.php");
		exit();
	}

	if(isset($_POST['ok']))
	{
		//var_dump($_POST);
		$matric = get_post('matric');
		$password = get_post('password');
		$sql = mysql_query("SELECT matric FROM students WHERE matric='$matric' and password='$password'") or die(mysql_error());
		$n = mysql_num_rows($sql);
		if($n == 0){
			set_flash("Invalid details, check and try again","danger");
			header("location:index.php");
			exit();
		}else{
			$_SESSION['matric'] = $matric;
			header("location:home.php");
			exit();
		}
		exit();		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>The Federal Polytechnic Ede - Clearance Portal</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=Edge"/> 		
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />	
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="lib/font-awesome/font-awesome.min.css">
</head>
<body>

<?php
	include_once 'nav.php';
?>
<section id="main">
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="intro">
				<h2>The Federal Polytechnic Ede</h2>
				<h2>Clearance Application Portal</h2>
				<h2>Login to check your application status or to re-print your clearance</h2>
				<h3 class="text-muted">
					New Applicant? <a href="apply.php">Apply</a>
				</h3>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">Student Login</div>
				<div class="panel-body">
					<center>
						<img src="img/logo2.png" class="img-responsive">
					</center>
					<div class="separator">&nbsp;</div>
					<form action="" method="post" role="form" class="has-success">
						<?php flash(); ?>
						<div class="form-group">
							<label>Matric No</label>
							<input type="text" name="matric" class="form-control" required="" placeholder="Matric Number">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required="" placeholder="Password">
						</div>
						<div class="form-group">
							<input type="submit" name="ok" class="btn btn-success" value="Login">
						</div>						
					</form>					
					<p>
						<a href="apply.php">Apply for clearance</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<section id="footer">
	&copy; The Federal Polytechnic Ede
</section>
<script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>