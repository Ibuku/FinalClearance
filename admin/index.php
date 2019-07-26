<?php
	include_once '../inc/all.php';
	if(!admin())
	{
		header('location:login.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Clearance Application</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=Edge"/> 		
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />	
	<link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../lib/font-awesome/font-awesome.min.css">
</head>
<body>

<?php
	include_once 'nav.php';
?>

<div class="container">
	<div class="row">
		
		<div class="col-md-3">
			<h3 class="page-header">Admin Menu</h3>
			<ul class="list-group">
				<li class="list-group-item">
					<a href="index.php">Dashboard</a>
				</li>
				<li class="list-group-item">
					<a href="new_application.php">New Applications</a>
				</li>
				<li class="list-group-item">
					<a href="pending_application.php">Pending Applications</a>
				</li>
				<li class="list-group-item">
					<a href="confirmed_application.php">Cleared Application</a>
				</li>
				<li class="list-group-item">
					<a href="all_applications.php">All Application</a>
				</li>
				<li class="list-group-item">
					<a href="logout.php">Logout</a>
				</li>
			</ul>
		</div>

		<div class="col-md-9">
			<h3 class="page-header">Admin Dashboard</h3>
			<div class="intro">
				<h2>The Federal Polytechnic Ede</h2>
				<h2>Clearance Application Portal</h2>
				<h2>View Clearance Status</h2>
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