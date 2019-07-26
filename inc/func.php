<?php
	function login()
	{
		if(isset($_SESSION['matric'])){
			return true;
		}else{
			return false;
		}
	}

	function admin()
	{
		if(isset($_SESSION['admin'])){
			return true;
		}else{
			return false;
		}
	}
	function sport()
	{
		if(isset($_SESSION['sport'])){
			return true;
		}else{
			return false;
		}
	}
	function lib()
	{
		if(isset($_SESSION['lib'])){
			return true;
		}else{
			return false;
		}
	}

	function set_flash($msg,$type)
	{
		$_SESSION['flash'] = "<div class='alert alert-".$type."'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$msg."</div>";
	}

	function flash()
	{
		if(isset($_SESSION['flash']))
		{
			echo $_SESSION['flash'];
			unset($_SESSION['flash']);
		}
	}

	function num_formats($n)
	{
		$l = strlen($n);
		if($l == 1){
			return "00".$n;
		}elseif ($n == 2) {
			return "0".$n;
		}else{
			return $n;
		}
	}

	function get_post($str)
	{
		return trim(mysql_real_escape_string($_POST[$str]));
	}

	function student($matric,$value)
	{
		$sql = mysql_query("SELECT $value FROM students WHERE matric='$matric'") or die(mysql_error());

		$rs = mysql_fetch_assoc($sql);

		return $rs[$value];
	}

	

	

    function user($value)
    {
    	$matric = $_SESSION['matric'];
    	$sql = mysql_query("SELECT $value FROM students WHERE matric='$matric'") or die(mysql_error());

		$rs = mysql_fetch_assoc($sql);

		return $rs[$value];
    }

    function status($n)
    {
    	if($n == 0){
    		return "Not treated";
    	}elseif ($n == 1) {
    		return "Pending";
    	}elseif ($n == 2) {
    		return "Cleared";
    	}
    }

	
?>