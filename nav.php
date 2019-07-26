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
				<img src="img/logo-fpe.png" class="img-responsive logo">
			</a>
		</div>
		<div class="col-md-4 col-sm-12 col-xs-12">
			<h3 class="text-info text-center text-uppercase">online clearance system</h3>
		</div>
		<div class="col-md-3 col-xs-12 col-sm-12 pull-right">
			<ul class="list-unstyled">
				<li><a href="about.php" class="btn btn-info">About Developer</a></li>
			</ul>
		</div>
	
		<!-- Collect the nav links, forms, and other content for toggling-->
		<?php 
		if(login()){?>
		<div class="collapse navbar-collapse navbar-ex1-collapse">			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="home.php">Dashboard</a></li>
				<li><a href="submit_application.php">Submit Application</a></li>
				<li><a href="view_application.php">View Status</a></li>				
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
		<?php }?>
	</nav>
</section>