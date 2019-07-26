<?php
	include_once 'inc/all.php';

	if(!login())
	{
		header("location:index.php");
		exit();
	}
	$matric = $_SESSION['matric'];
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Clearance Application - View Status</title>
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
				<h3 class="page-header">View Application</h3>				
				<?php flash(); ?>
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
						<td>Semester</td>
						<td><?php echo user('semester'); ?></td>
					</tr>
				</table>

				<h3 class="page-header text-info">Library Record</h3>
				<table class="table table-bordered">
					<thead>
						<th>Sn</th>
						<th>Book name</th>
						<th>Date Borrowed</th>
						<th>Status</th>
					</thead>
					<tbody>
						<?php
							$lib = mysql_query("SELECT * FROM books WHERE matric='$matric'") or die(mysql_error());
							$n_lib = mysql_num_rows($lib);
							if($n_lib == 0){
								echo "<tr><td clospan='4'>No Record found</td></tr>";
							}else{
								$lib_sn = 0;
								while($lib_rs = mysql_fetch_assoc($lib))
								{
									?>
									<tr>
										<td><?php echo ++$lib_sn;?></td>
										<td><?php echo $lib_rs['name'];?></td>
										<td><?php echo date("M d, y",$lib_rs['date_borrowed']); ?></td>
										<td><?php echo state($lib_rs['status']); ?></td>
									</tr>
									<?php
								}
							}
						?>
					</tbody>
				</table>

				<h3 class="page-header text-success">Sport Record</h3>
				<table class="table table-bordered">
					<thead>
						<th>Sn</th>
						<th>Item name</th>
						<th>Date Borrowed</th>
						<th>Status</th>
					</thead>
					<tbody>
						<?php
							$lib = mysql_query("SELECT * FROM sports WHERE matric='$matric'") or die(mysql_error());
							$n_lib = mysql_num_rows($lib);
							if($n_lib == 0){
								echo "<tr><td clospan='4'>No Record found</td></tr>";
							}else{
								$lib_sn = 0;
								while($lib_rs = mysql_fetch_assoc($lib))
								{
									?>
									<tr>
										<td><?php echo ++$lib_sn;?></td>
										<td><?php echo $lib_rs['name'];?></td>
										<td><?php echo date("M d, y",$lib_rs['date_borrowed']); ?></td>
										<td><?php echo state($lib_rs['status']); ?></td>
									</tr>
									<?php
								}
							}
						?>
					</tbody>
				</table>

				<h3 class="text-info">Application Status</h3>				
				<?php
					$matric = $_SESSION['matric'];
					$apply = mysql_query("SELECT * FROM application WHERE matric='$matric'") or die(mysql_error());
					$n = mysql_num_rows($apply);					
					if($n == 1){
						$rs = mysql_fetch_assoc($apply);
						?>
						<table class="table table-bordered">
							<tr>
								<td>Remita RRR</td>
								<td><?php echo $rs['rrr'];?>
							</tr>
							<tr>
								<td>Date Applied</td>
								<td><?php echo date("M d, y \b\y h:i a",$rs['date_applied']);?></td>
							</tr>
							<tr>
								<td>Clearance Status</td>
								<td><?php echo status($rs['status']);?>
							</tr>
							<?php
								if($rs['status'] == 2){
								?>
							<tr>
								<td>Date Approved</td>
								<td><?php echo date("M d, y \b\y h:i a",$rs['date_approved']);?></td>
							</tr>
							<tr>
								<td>Download</td>
								<td>
									<a target='_blank' href='download_clearance.php'>Download</a>
								</td>
							</tr>
								<?php	
								}
							?>
						</table>
						
						<?php
					}else{
						echo "<h3 class='text-info'>Your application has not been submitted</h3>";
					}
				?>
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