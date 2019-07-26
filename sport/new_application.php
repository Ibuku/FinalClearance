<?php
	include_once '../inc/all.php';
	if(!sport())
	{
		header("location:login.php");
		exit();
	}

	if(isset($_POST['ok']))
	{
		$matric = get_post('matric');
		$name = get_post('name');
		$price = get_post('price');
		$date_borrowed = time();

		$in = mysql_query("INSERT INTO sports VALUES('','$matric','$name','$date_borrowed','0','$price')") or die(mysql_error());
		set_flash("Record saved successfully","success");
		header("location:new_application.php");
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
			<h3 class="page-header">Sport Admin Menu</h3>
			<ul class="list-group">
				<li class="list-group-item">
					<a href="index.php">Dashboard</a>
				</li>
				<li class="list-group-item">
					<a href="new_application.php">New Defaulter</a>
				</li>				
				<li class="list-group-item">
					<a href="remove_user.php">Remove Defaulter</a>
				</li>
				<li class="list-group-item">
					<a href="all_user.php">View Record</a>
				</li>
				<li class="list-group-item">
					<a href="logout.php">Logout</a>
				</li>
			</ul>
		</div>

		<div class="col-md-9">
			<h3 class="page-header">Add New defaulter</h3>
			<div class="page-body">
				<form action="" method="post" role='form'>
				<?php flash(); ?>
					<div class="form-group">
						<label>Matric Number</label>
						<input type="text" name="matric" class="form-control" required="" placeholder="Matric">
					</div>

					<div class="form-group">
						<label>Item Name</label>
						<input type="text" name="name" class="form-control" required="" placeholder="Item Name">
					</div>

					<div class="form-group">
						<label>Item Price</label>
						<input type="text" name="price" required="" class="form-control" placeholder="Price">
					</div>

					<div class="form-group">
						<input type="submit" name="ok" class="btn btn-success" value="Save">
					</div>
				</form>
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