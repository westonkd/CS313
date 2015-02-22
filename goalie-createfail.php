<?php  
session_start();

	//if the user is already signed in
if (isset($_SESSION["signed-in"]))
{
		//redirect to the main page
	header( 'Location: goalie.php' ) ;
	die();
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
	<!--main content-->
	<main class="container">
		<section class="row">
			<div class="col-all-12">
				<h3>The email you selected is already in use.</h3>
				<p><a href="/goalie-signin.php">Click here </a> to go back to the login page.</p>
			</div>
		</section>	
	</main>
	<footer>
	</footer>

</body>
</html>