<?php 
session_start();

if (isset($_SESSION['email']) && !empty($_POST['days-completed'])) {
	require("dbConnector.php");
	$db = loadDatabase();

	$days = $_POST['days-completed'];

	//move the current goal to history
	// $stmt = $db->prepare("UPDATE goal INNER JOIN user ON goal.user_id = user.id WHERE email=:email AND is_current_goal=1");
	// $stmt->execute(array(':email' => $_SESSION['email']));

	//move the current goal to history
	$stmt = $db->prepare("SELECT * FROM goal INNER JOIN user ON goal.user_id = user.id WHERE email=:email AND is_current_goal=1");
	$stmt->execute(array(':email' => $_SESSION['email']));
	$currentGoal = $stmt->fetch();

	foreach($days as $day) {
            echo $day."\n";
    }

	echo "in: ".$currentGoal['days_complete'];

} 
?>