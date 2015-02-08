<?php
	session_start();
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Goalie Goal Tracker</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/paper.min.css">
	<link rel="stylesheet" href="assets/goalie.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="../" class="navbar-brand active">Weston's Settings</a>
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navbar-main">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="goalie.php">Current Goal</a></li>
					<li><a href="goalie-new-goal.php">Set a New Goal</a></li>
					<li><a href="/logout.php">Logout</a></li>
				</ul>

			</div>
		</div>
	</div>

	<!--main content-->
	<main class="container">
		<section class="row">
			<div class="col-all-12">
				
			</div>
		</section>	
		
	</main>
	<footer>
	</footer>
	<script type="text/JavaScript">
		$('#create-account').click(function(){
			$('#create-account-modal').modal();
		});
	</script>
</body>
</html>