<?php
	include_once '../inc/all.php';

	if(!admin())
	{
		header("location:login.php");
		exit();
	}

	if(isset($_POST['ok']))
	{
		$status = get_post('status');
		$id = get_post('id');

		$ad = $_SESSION['admin'];
		$profile = mysql_query("SELECT name FROM admin WHERE username='$ad'");
		$p = mysql_fetch_assoc($profile);
		$now = time();		
		$admin = $p['name'];
		if($status == 2){
			$db = mysql_query("UPDATE application SET status='$status', date_approved='$now', officer='$admin' WHERE id='$id'") or die(mysql_error());
		}else{
			$db = mysql_query("UPDATE application SET status='$status', date_approved='', officer='' WHERE id='$id'") or die(mysql_error());
		}
		header("location:view_app.php?id=$id");
		exit();
	}

	if(!isset($_GET['id']))
	{
		header('location:index.php');
		exit();
	}

	$id = $_GET['id'];
	$sql = mysql_query("SELECT * FROM application WHERE id='$id'") or die(mysql_error());
	$num = mysql_num_rows($sql);
	if($num == 0)
	{
		header("location:index.php");
		exit();
	}

	$rs = mysql_fetch_assoc($sql);
	$matric = $rs['matric'];
	//extract($rs)

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Clearance Application - View Application</title>
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
			<h3 class="page-header">View Clearance Application</h3>
			<div class="page-body">				
				<?php flash(); ?>
				<table class="table table-bordered">
					<tr>
						<td>Matric No</td>
						<td><?php echo student($matric,'matric'); ?></td>
					</tr>
					<tr>
						<td>Name</td>
						<td><?php echo student($matric,'name'); ?></td>
					</tr>
					<tr>
						<td>Department</td>
						<td><?php echo student($matric,'department'); ?></td>
					</tr>
					<tr>
						<td>Semester</td>
						<td><?php echo student($matric,'semester'); ?></td>
					</tr>
					<tr>
						<td>Department</td>
						<td><?php echo student($matric,'department'); ?></td>
					</tr>
					<tr>
						<td>Phone Number</td>
						<td><?php echo student($matric,'phone'); ?></td>
					</tr>
					<tr>
						<td>On Campus</td>
						<td><?php echo student($matric,'on_campus'); ?></td>
					</tr>
					<tr>
						<td>Room No.</td>
						<td><?php echo student($matric,'room_no'); ?></td>
					</tr>
					<tr>
						<td>Address</td>
						<td><?php echo student($matric,'address'); ?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td><?php echo student($matric,'gender'); ?></td>
					</tr>
					<tr>
						<td>State</td>
						<td><?php echo student($matric,'state'); ?></td>
					</tr>
				</table>

				<h3 class="text-info">Application Status</h3>				
				<table class="table table-bordered">
					<?php
						$sql = mysql_query("SELECT * FROM application WHERE id='$id'") or die(mysql_error());
						$rs = mysql_fetch_assoc($sql);
					?>
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

				<?php
					if(($rs['status'] == 0) || $rs['status'] == 1){
					?>
				<form action='' method='post'>
					<h3 class='page-header'>Update Status</h3>
					<div class='form-group'>
						<label>New Status</label>
						<select name='status' class='form-control' required>
							<option value='0'>Not Treated</option>
							<option value='1'>Pending</option>
							<option value='2'>Cleared</option>
						</select>
					</div>
					<div class='form-group'>
						<input type='hidden' name='id' value='<?php echo $rs['id'];?>'>
						<input type='submit' name='ok' class='btn btn-sm btn-success' value='Update'>
					</div>
				</form>
					<?php	
					}
				?>
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