<?php 
session_start();

if (isset($_SESSION['email']) && !empty($_POST['days-completed'])) {
	require("dbConnector.php");
	$db = loadDatabase();

	$days = $_POST['days-completed'];

	//move the current goal to history
	$stmt = $db->prepare("SELECT * FROM goal INNER JOIN user ON goal.user_id = user.id WHERE email=:email AND is_current_goal=1");
	$stmt->execute(array(':email' => $_SESSION['email']));
	$currentGoal = $stmt->fetch();

	//simply set the days the goal was completed on
	$newDaysSet = "0000000";
	foreach($days as $day) {
        $newDaysSet[(int) $day] = "1";
    }

    //update the days completed on
    $stmt = $db->prepare("UPDATE goal INNER JOIN user ON goal.user_id = user.id SET goal.days_complete=:newDate, goal.percent_complete=:percent WHERE email=:email AND is_current_goal=1");
	$stmt->execute(array(':email' => $_SESSION['email'], ':newDate' => $newDaysSet, ':percent' => (int)(count($days) / 7 * 100)));

} 
//finished, go home
header( 'Location: /goalie.php' );
die();
?>