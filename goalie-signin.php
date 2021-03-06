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
				<div class="sign-in">
					<h1>Goalie Sign In</h1>
					<form class="form-horizontal" method="post" action="login.php" onsubmit="return validateLogin();">
						<fieldset>
							<div class="form-group">
								<label for="inputEmail" class="col-lg-2 control-label">Email</label>
								<div class="col-lg-10">
									<input name="email" name="email" type="text" class="form-control" id="inputEmail" placeholder="Enter your email address">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-lg-2 control-label">Password</label>
								<div class="col-lg-10">
									<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
							<button id="create-account" onclick="return false;" class="btn btn-default">Create an Account</button>
						</fieldset>
					</form>
				</div>
			</div>
		</section>	

		<!--Create Account Sign In-->
		<div class="modal fade" id="create-account-modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="goalie-newaccount.php" method="post" onsubmit="return validateNewUser();">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title">Creat Account</h4>
						</div>
						<div class="modal-body">
						<div id="warning-area"></div>
							<label for="first-name" class="control-label">First Name</label>
							<input id="first-name" type="text" name="firstName" class="form-control" placeholder="First Name">

							<label for="last-name" class="control-label">Last Name</label>
							<input id="last-name" type="text" name="lastName" class="form-control" placeholder="Last Name">

							<br>

							<label for="email" class="control-label">Email Address</label>
							<input id="email" type="text" name="email" class="form-control" placeholder="Email">

							<br>

							<label for="password" class="control-label">Password</label>
							<input id="password" type="password" name="password" class="form-control" placeholder="Password">

							<label for="reenter" class="control-label">Re-enter Password</label>
							<input id="reenter" type="password" name="reenter" class="form-control" placeholder="Password">
						</div>
						<div class="modal-footer">
							<p>After creating a new account you will be redirected to the login page.</p>
							<button type="submit" class="btn btn-primary">Create Account</button>
							<button type="cancel" class="btn btn-info">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
	<footer>
	</footer>
	<script type="text/JavaScript">
		$('#create-account').click(function(){
			$('#create-account-modal').modal();
		});

		//function to validate login boxes
		function validateLogin() {
			if ($('#inputEmail').val() == "" || $('#inputPassword').val() == "") {
				return false;
			}

			return true;
		}

		//function to validate the new user form
		function validateNewUser() {

			//if the passwords match
			if ($('#reenter').val() == $('#password').val()) {
				//if the fields are not empty
				if ($('#password').val() != "" && $('#first-name').val() != "" && $('#first-name').val() != "" && $('#last-name').val() != "") {
					return true;
				} else {
					$('#warning-area').html("<div class='alert alert-info' role='alert'>All fields are required</div>");
					return false;
				}
				
			} 

			$('#warning-area').html("<div class='alert alert-info' role='alert'>Passwords do not match.</div>");
			$('#password').focus();
			return false;
		}
	</script>
</body>
</html>