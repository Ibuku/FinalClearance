<?php
	include_once 'inc/all.php';

	if(!login())
	{
		header("location:index.php");
		exit();
	}

	if(isset($_POST['ok']))
	{
		$rrr = get_post('rrr');
		$matric = $_SESSION['matric'];
		$date_applied = time();
		$status = 0;

		//check RRR
		$c = mysql_query("SELECT NULL FROM application WHERE rrr='$rrr'") or die(mysql_error());
		$nn = mysql_num_rows($c);
		if($nn == 0){
			$in = mysql_query("INSERT INTO application(matric,rrr,date_applied,status) VALUES('$matric','$rrr','$date_applied','$status')") or die(mysql_error());
			set_flash("Your Clearance Application has been submitted successfully!","success");
		}else{
			set_flash("RRR has been used by another applicant","danger");
		}
		
		header("location:submit_application.php");
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
				<h3 class="page-header">Submit Application</h3>				
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

				<h3>Application Steps</h3>
				<ul type="circle">
					<li>Visit http://federalpolyede.edu.ng to pay alumni fee of &#8358; 10,500</li>
					<li>Enter the Remita RRR used for payment in the space provided below</li>
					<li>
						Make sure you have returned all school properties with you to enable speedy processing;
					</li>
					<li>
						Click on the submit application button to submit your application
					</li>
					<li>
						NOTE: This can only be done once
					</li>
				</ul>

				<?php
					$matric = $_SESSION['matric'];
					$apply = mysql_query("SELECT NULL FROM application WHERE matric='$matric'") or die(mysql_error());
					$n = mysql_num_rows($apply);
					if($n == 0){
						?>
						<form action="" method="post" role="form" class="has-success">
							<div class="form-group">
								<label>Remita RRR</label>
								<input type="text" name="rrr" required="" class="form-control" placeholder="Remita RRR">
							</div>
							<div class="form-group">
								<input type="submit" name="ok" class="btn btn-success" value="Submit Application">
							</div>
						</form>
						<?php
					}else{
						echo "<h3 class='text-info'>You have submitted application for clearance before</h3>";
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
</body>
</html>