<?php 
session_start();

if (isset($_SESSION['email'])) {

	

	//move the current goal to history
	$stmt = $db->prepare("SELECT * FROM goal INNER JOIN user ON goal.user_id = user.id WHERE email=:email AND is_current_goal=1");
	$stmt->execute(array(':email' => $_SESSION['email']));
	$currentGoal = $stmt->fetch();

	echo "in: ".$currentGoal['days_complete'];
	echo $_SESSION['email'];
} else {
	echo "not in ";
}
?>