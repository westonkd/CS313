<?php 
session_start();

if (isset($_SESSION["signed-in"])) {
	//redirect to the main page
	header( 'Location: /goalie.php' );
} else {
	//connect to the DB
	require("dbConnector.php");
	$db = loadDatabase();

	//get the current user
	$stmt = $db->prepare("SELECT * FROM user WHERE email=:email ");
	$stmt->execute(array(':email' => $attemptEmail));
	$user = $stmt->fetch();

	//check if the email is in the database
	if ($user){
		echo "There is a user!";
		echo "\nComparing: ". $attemptPass . "with " . $user['password'];
		if ($attemptPass == $user['password'])
		{
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['signed-in'] = true;

			header( 'Location: /goalie.php' );
		} 
	} 
		
	//email not found or password incorrect
	header( 'Location: /goalie-signin.php' );
}
?>