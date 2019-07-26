<?php
	include_once '../inc/all.php';
	if(!sport())
	{
		header("location:login.php");
		exit();
	}

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$s = mysql_query("UPDATE sports SET status='1' WHERE id='$id' and status='0'") or die(mysql_error());
		set_flash("Record updated successfully","info");
		header("location:remove_user.php");
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
			<h3 class="page-header">Remove Sport Defaulters</h3>
			<div class="page-body">
				<?php flash(); ?>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Sn</th>
							<th>Matric</th>
							<th>Item Borrowed</th>							
							<th>Date Borrowed</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Sn</th>
							<th>Matric</th>	
							<th>Item Borrowed</th>
							<th>Date Borrowed</th>
							<th>&nbsp;</th>
						</tr>
					</tfoot>
					<tbody>
						<?php
							$sql = mysql_query("SELECT * FROM sports WHERE status='0' ORDER BY id DESC") or die(mysql_error());
							$sn = 0;
							while($rs = mysql_fetch_assoc($sql)){
						?>
						<tr>
							<td><?php echo ++$sn;; ?></td>
							<td><?php echo @$rs['matric']; ?></td>	
							<td><?php echo @$rs['name']; ?></td>							
							<td><?php echo date("M d, y",$rs['date_borrowed']); ?></td>
							<td><a href="?id=<?php echo $rs['id']; ?>">Delete</td>
						</tr>
						<?php
					}
						?>
					</tbody>
				</table>
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