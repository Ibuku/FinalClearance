<?php
	include_once 'inc/all.php';

	if(login())
	{
		header("location:home.php");
		exit();
	}

	if(isset($_POST['ok'])){
		$matric = get_post('matric');
		$password = get_post('password');
		$name = get_post('name');		
		$phone = get_post('phone');
		$level = get_post('level');
		$department = get_post('department');
		$address = get_post('address');
		$gender = get_post('gender');
		$state = get_post('state');
		$on_campus = get_post('on_campus');
		$room_no = get_post('room_no');
		$semester = get_post('semester');
		
		$date_reg = time();

		//check error
		$sql_1 = mysql_query("SELECT NULL FROM students WHERE matric='$matric'") or die(mysql_error());
		$n = mysql_num_rows($sql_1);
		if($n >= 1){
			set_flash("Matric No already exist, try again!","warning");
			header("location:apply.php");
			exit();
		}else{
			mkdir('img/'.$matric);
			$dest = "img/".$matric."/".$_FILES['passport']['name'];
			$passport = $_FILES['passport']['name'];
			copy($_FILES['passport']['tmp_name'], $dest);
			//SAVE
			$sql = mysql_query("INSERT INTO students(matric,password,name,phone,level,department,address,gender,state,on_campus,room_no,app_date,semester,passport) VALUES('$matric','$password','$name','$phone','$level','$department','$address','$gender','$state','$on_campus','$room_no','$date_reg','$semester','$passport')") or die(mysql_error());
			set_flash("Account created successfully, login to your account","success");
			header("location:index.php");
			exit();
		}
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
				<h3 class="page-header">
					Application Form
				</h3>
				<center>
					<img src="img/logo2.png" class="img-responsive">
				</center>
				<p>
					Fill the form below to apply for new clearance
				</p>
				<div class="separator">&nbsp;</div>

				<form action="" method="post" role="form" class="has-success" enctype="multipart/form-data">
					<?php flash(); ?>
					<div class="form-group">
	        			<label>Matric Number</label>
	        			<input type="text" name="matric" class="form-control" required="" placeholder="Matric Number">
	        		</div>

	        		<div class="form-group">	        			
	        			<label>Password</label>
	        			<input type="password" name="password" class="form-control" required="password" placeholder="Password">
	        			<small>Create a password you will be using to login to the portal</small>
	        		</div>

	        		<div class="form-group">
	        			<label>Name</label>
	        			<input type="text" name="name" class="form-control" required="" placeholder="Full name">
	        		</div>

	        		<div class="form-group">
	        			<label>Department</label>
	        			<select class="form-control" required="" name="department">
	        				<option value="">Department</option>
	        				<?php
	        					$dpt = mysql_query("SELECT name FROM department ORDER BY name ASC") or die(mysql_error());
	        					while($d = mysql_fetch_assoc($dpt)){
	        						echo "<option>".$d['name']."</option>";
	        					}
	        				?>
	        			</select>
	        		</div>

	        		<!--<div class="form-group">
	        			<label>Email Address</label>
	        			<input type="email" name="email" class="form-control" required="" placeholder="Email Address">
	        		</div>-->

	        		<div class="form-group">
	        			<label>Phone Number</label>
	        			<input type="text" name="phone" class="form-control" required="" placeholder="Phone Number">
	        		</div>

	        		<div class="form-group">
	        			<label>Level</label>
	        			<select class="form-control" name="level" required="">
	        				<option value="">Level</option>	        				
	        				<option>ND 2 FT</option>
	        				<option>ND 2 DPT</option>	        				
	        				<option>ND PT YR 3</option>	        				
	        				<option>HND 2</option>
	        			</select>
	        		</div>
	        		
	        		<div class="form-group">
	        			<label>Contact Address</label>
	        			<textarea name="address" class="form-control" required="" placeholder="Address"></textarea>
	        		</div>

	        		<div class="form-group">
	        			<label>Gender</label>
	        			<select name="gender" class="form-control" required="" >
	        				<option value="">Gender</option>
	        				<option>Male</option>
	        				<option>Female</option>
	        			</select>
	        		</div>

	        		<div class="form-group">
	        			<label>State of Origin</label>
	        			<select class="form-control" name="state" required="">
	        				<option value="">State of Origin</option>
							<?php
								$s = array("Abia State","Adamawa State","Akwa Ibom State","Anambra State","Bauchi State","Bayelsa State","Benue State","Borno State","Cross River State","Delta State","Ebonyi State","Edo tate","Ekiti State","Enugu State","FCT","Gombe State","Imo State","Jigawa State","Kaduna State","Kano State","Katsina state","Kebbi State","Kogi State","Kwara State","Lagos State","Nasarawa State","Niger State","Ogun State","Ondo State","Osun State","Oyo State","Plateau State","Rivers State","Sokoto State","Taraba State","Yobe State","Zamfara State");
								foreach ($s as $key) {
									echo "<option>$key</option>";
								}
							?>
	        			</select>
	        		</div>

	        		<div class="form-group">
	        			<label>On Campus</label>
	        			<select class="form-control" name="on_campus" required="">
	        				<option value="No">No</option>
	        				<option value="Yes">Yes</option>
	        			</select>
	        		</div>

	        		<div class="form-group">
	        			<label>Room No (Optional)</label>
	        			<input type="text" name="room_no" class="form-control" placeholder="Room No (For hostelite only)">
	        		</div>

	        		<div class="form-group">
	        			<label>Semester</label>
	        			<input type="text" name="semester" class="form-control" required="" placeholder="Semester">
	        		</div>

	        		<div class="form-group">
	        			<label>Passport</label>
	        			<input type="file" name="passport" required="" accept="images/*">
	        		</div>

	        		<div class="form-group">
	        			<input type="submit" name="ok" class="btn btn-success" value="Apply">
	        		</div>
				</form>
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