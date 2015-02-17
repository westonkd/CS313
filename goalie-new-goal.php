<?php  
session_start();

//if the user is already signed in
if (!isset($_SESSION["signed-in"]))
{
	//redirect to the main page
	header( 'Location: /goalie-signin.php' ) ;
}
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
				<a href="../" class="navbar-brand active">Create a New Goal</a>
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navbar-main">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="goalie.php">Current Goal</a></li>
					<li><a href="goalie-settings.php">Weston's Settings</a></li>
					<li><a href="/logout.php">Logout</a></li>
				</ul>

			</div>
		</div>
	</div>

	<!--main content-->
	<main class="container">
		<section class="row">
			<div class="col-all-12">
				<div class="sign-in well">
					<form action="goalie-creategoal.php" method="post">
						<fieldset>
							<div class="form-group">
								<label for="goal-name" class="col-lg-2 control-label">Goal Name</label>
								<div class="col-lg-10">
									<input type="text" name="goalName" class="form-control" id="goal-name" placeholder="Enter a goal name.">
								</div>
								<br>
								<label for="goal-description" class="col-lg-2 control-label">Goal Description</label>
								<div class="col-lg-10">
									<textarea class="form-control" rows="2" name="goalDescription" id="goal-description" placeholder="Enter a goal description."></textarea>
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-10 col-lg-offset-2">
									<p>Note that the goal due date will be set for one week from the current date.</p>
									<p><strong>Caution:</strong> Setting a new goal will mark your current goal as complete and move it to history.</p>
									<button type="submit" class="btn btn-primary">Set Goal</button>
									<button type="reset" class="btn btn-default" onClick="javascript:location.href = 'http://php-westonkd.rhcloud.com/goalie.php';" />>Cancel</button>
								</div>
							</div>
							
						</fieldset>
					</form>
				</div>
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