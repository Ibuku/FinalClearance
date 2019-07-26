<section id="nav">
	<nav class="navbar navbar-default" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				<img src="../img/logo-fpe.png" class="img-responsive logo">
			</a>
		</div>
		<?php
			$ad = $_SESSION['sport'];
			$profile = mysql_query("SELECT name FROM sport_admin WHERE username='$ad'") or die(mysql_error());
			$rs = mysql_fetch_assoc($profile);
		?>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">			
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $rs['name']; ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
					</ul>
				</li>			
			</ul>
		</div>
	</nav>
</section>