<?php 
session_start();

$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$password = $_POST['password'];
$rePassword = $_POST['reenter'];

//connect to the DB
require("dbConnector.php");
$db = loadDatabase();

//get the current user
$stmt = $db->prepare("SELECT * FROM user WHERE email=:email ");
$stmt->execute(array(':email' => $_SESSION['email']));
$user = $stmt->fetch();

//move the current goal to history
$stmt = $db->prepare("UPDATE goal INNER JOIN user ON goal.user_id = user.id SET goal.is_current_goal = 0 WHERE email=:email AND is_current_goal=1");
$stmt->execute(array(':email' => $_SESSION['email']));
$currentGoal = $stmt->fetch();

//current date
$date = date('Y-m-d H:i:s');
$plusOneWeek = strtotime('+1 Week');

//insert the new goal
if(isset($_POST['goalName'])) {
	$statement = $db->prepare("INSERT INTO goal(title, description, date_set, date_to_finish, percent_complete, last_updated, is_current_goal, user_id) VALUES(:title, :description, :date_set, :date_to_finish, :percent_complete, :last_updated, :is_current_goal, :user_id)");
	$goalWasCreated = $statement->execute(array(':title' => $_POST['goalName'], ':description' => $_POST['goalDescription'], ':date_set' => $date, ':date_to_finish' => $plusOneWeek, ':percent_complete' => 0, ':last_updated' => $date, ':is_current_goal' => 1, ':user_id' => $user[id]));
	echo "Goal: " . $goalWasCreated;
}	



// //insert the new user
// $statement = $db->prepare('INSERT INTO user(first_name, last_name, email, password, last_visited, pref_id) VALUES(:first, :last, :email, :password, :dateVisit, :pref)');

// $statement->bindParam(':first', $firstName);
// $statement->bindParam(':last', $lastName);
// $statement->bindParam(':email', $email);
// $statement->bindParam(':password', $password);
// $statement->bindParam(':dateVisit', $date);
// $statement->bindParam(':pref', $statementID);
// $wasSuccesful = $statement->execute();

//header('Location: goalie-signin.php');

echo $user['id'];

?>
