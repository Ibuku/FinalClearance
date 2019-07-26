<?php
	include_once 'inc/all.php';

	if(!login())
	{
		header("location:index.php");
		exit();
	}

	$matric = $_SESSION['matric'];
	$apply = mysql_query("SELECT * FROM application WHERE matric='$matric'") or die(mysql_error());
	$n = mysql_num_rows($apply);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Clearance Application</title>
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

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="page-body">
				<h3 class="page-header">Applicant Dashboard</h3>
				<p>
					My Profile Details
				</p>
				<?php
					if($n > 0){
						$rs = mysql_fetch_assoc($apply);						
						if($rs['status'] == 2){
							echo "<div class='alert alert-info'>";
							echo "Dear ".user('name').", your Clearance has been approved.";
							echo "<p>Click <a target='_blank' href='download_clearance.php'>Here</a> to Download your Clearance";
							echo "</div>";
						}						
					}
				?>
				<table class="table table-bordered">
					<tr>
						<td>Matric No</td>
						<td><?php echo user('matric'); ?></td>
					</tr>
					<tr>
						<td>Name</td>
						<td><?php echo user('name'); ?></td>
					</tr>
					<tr>
						<td>Department</td>
						<td><?php echo user('department'); ?></td>
					</tr>
					<tr>
						<td>Phone Number</td>
						<td><?php echo user('phone'); ?></td>
					</tr>
					<tr>
						<td>On Campus</td>
						<td><?php echo user('on_campus'); ?></td>
					</tr>
					<tr>
						<td>Room No.</td>
						<td><?php echo user('room_no'); ?></td>
					</tr>
					<tr>
						<td>Address</td>
						<td><?php echo user('address'); ?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td><?php echo user('gender'); ?></td>
					</tr>
					<tr>
						<td>State</td>
						<td><?php echo user('state'); ?></td>
					</tr>
					<tr>
						<td>Semester</td>
						<td><?php echo user('semester'); ?></td>
					</tr>
				</table>
			</div>			
		</div>
	</div>
</div>


<section id="footer">
	&copy; The Federal Polytechnic Ede
</section>
<script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>