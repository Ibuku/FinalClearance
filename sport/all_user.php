<?php
	include_once '../inc/all.php';
	if(!sport())
	{
		header("location:login.php");
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
			<h3 class="page-header">All Sport Record</h3>
			<div class="page-body">
				<?php flash(); ?>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Sn</th>
							<th>Matric</th>	
							<th>Item Name</th>						
							<th>Date Borrowed</th>
							<th>Status</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Sn</th>
							<th>Matric</th>							
							<th>Item Name</th>
							<th>Date Borrowed</th>
							<th>Status</th>
						</tr>
					</tfoot>
					<tbody>
						<?php
							$sql = mysql_query("SELECT * FROM sports ORDER BY id DESC") or die(mysql_error());
							$sn = 0;
							while($rs = mysql_fetch_assoc($sql)){
						?>
						<tr>
							<td><?php echo ++$sn;; ?></td>
							<td><?php echo @$rs['matric']; ?></td>
							<td><?php echo @$rs['name']; ?></td>
							<td><?php echo date("M d, y",$rs['date_borrowed']); ?></td>
							<td><?php echo state($rs['status']); ?></td>
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

<?php
	function state($n)
	{
		if($n == 0){
			return "Not return";
		}else{
			return "Returned";
		}
	}
?>
</body>
</html>