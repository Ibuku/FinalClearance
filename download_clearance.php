<?php
	require_once 'inc/all.php';
	if(!login())
	{
		header("location:index.php");
		exit();
	}
	$matric = $_SESSION['matric'];
	$sql = mysql_query("SELECT date_approved FROM application WHERE matric='$matric' and status='2'") or die(mysql_error());
	$n = mysql_num_rows($sql);
	if($n == 0){
		header("location:home.php");
		exit();
	}

	$rs = mysql_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			font-family: 'Times New Romans';
		}

		.body{
			width: 700px;
			margin: 10px auto;
			border: #000 solid thin;
			padding: 10px;
		}
		h2,h4,h6{
			margin-top: 0;
			margin-bottom: 4px;
		}
	</style>
</head>
<body>
<div class="body">
	<h2 align="center">THE FEDERAL POLYTECHNIC, EDE</h2>
	<h4 align="center">DIRECTORATE OF STUDENTS' AFFAIRS</h4>
	<h6 align="center">END OF SESSION CLEARANCE SLIP</h6>

	<table>
		<tr>
			<td valign="top" width="90%">
			<p>	
				This is certify that the bearer MR/MRS/MISS: <u><b><?php echo strtoupper(user('name'));?></b></u> of 
				<u><b><?php echo strtoupper(user('department')); ?></b></u> Department with Registration Number <u><b><?php echo strtoupper(user('matric')); ?></b></u> has returned all Polytechnic item(s) in his/her possession and does not owe any fees. He/She is therefore cleared accordingly.
				<br><br>
				<u><b><?php echo date("d / m / Y",$rs['date_approved']); ?></b></u>
				<br>
				DATE
			</p>
			</td>
			<td valign="top">
				<img src="img/<?php echo user('matric')."/".user('passport');?>" width='120' style='border: #000 solid 1px;'>
			</td>
		</tr>
		</table>
</div>

<div align="center" id="print-div">
	<input type="button" id="print" value="Print">
</div>

<script type="text/javascript">
	var a = document.getElementById('print');
	a.addEventListener("click",function(){
		document.getElementById('print-div').style.display="none";
		window.print();
		document.getElementById('print-div').style.display="block";
	});
</script>
</body>
</html>