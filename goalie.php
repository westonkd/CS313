<?php 
session_start();

	//if the user is already signed in
if (!isset($_SESSION["signed-in"])) {
	//redirect to the main page
	header( 'Location: /goalie-signin.php' );
} else {
	//connect to the DB
	require("dbConnector.php");
	$db = loadDatabase();

	if (!isset($_SESSION['email'])) {
		$_SESSION['email'] = $_POST['email'];
	}

	//get the current user
	$stmt = $db->prepare("SELECT * FROM user WHERE email=:email ");
	$stmt->execute(array(':email' => $_SESSION['email']));
	$user = $stmt->fetch();

	//get the current goal
	$stmt = $db->prepare("SELECT * FROM goal INNER JOIN user ON goal.user_id = user.id WHERE email=:email AND is_current_goal=1");
	$stmt->execute(array(':email' => $_SESSION['email']));
	$currentGoal = $stmt->fetch();

	//get goalhistory
	$stmt = $db->prepare("SELECT * FROM goal INNER JOIN user ON goal.user_id = user.id WHERE email=:email AND is_current_goal=0");
	$stmt->execute(array(':email' => $_SESSION['email']));
	$oldGoals = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

	<!--chart js-->
	<script src="assets/Chart.min.js"></script>
</head>
<body>
	<!--Navigation-->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="../" class="navbar-brand active">This Weeks Goal</a>
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navbar-main">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="goalie-new-goal.php">Set a New Goal</a></li>
					<li><a href="goalie-settings.php"><?php echo $user['first_name'] ?>'s Settings</a></li>
					<li><a href="/logout.php">Logout</a></li>
				</ul>

			</div>
		</div>
	</div>

	<!--main content-->
	<main class="container">
		<section class="row">
			<?php 
				if (!$currentGoal) {
					echo "<div id='goal-container'><div class='col-all-12'><h2>No goal set</h2><h4>Click 'Set a New Goal' to get started.</h4></div></div>";
					echo "<style type='text/css'>.current{display:none !important;}</style>";
				}
		 	?>
			<div class="col-md-6 current">
				<div id="goal-container">
					<canvas id="goal-progress" width="375" height="375"></canvas>
				</div>
			</div>
			<div class="col-md-6 current">
				<div id="current-goal-info">
					<h2><?php echo $currentGoal['title']; ?></h2>
					<p><?php echo $currentGoal['description']; ?></p>

					<h4>Goal Last Updated</h4>
					<p><?php echo $currentGoal['last_updated']; ?></p>

					<h4>Goal Progress Complete</h4>
					<p><?php echo $currentGoal['percent_complete']; ?>%</p>

					<a href="#" class="btn btn-success update-status">Update Progress</a>
				</div>
			</div>
		</section>	

		<!--history-->
		<section class="row">
			<div class="col-all-12">
				<div class="history">
					<h4>Goal History</h4>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Goal Name</th>
								<th>Date Set</th>
								<th>Date Finished</th>
								<th>Percent Complete</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($oldGoals as $row)
							{
								echo "<tr><td>".$row['title']."</td><td>".$row['date_set']."</td><td>".$row['date_to_finish']."</td><td>".$row['percent_complete']."%</td></tr>";
							}
							?>
						</tbody>
					</table> 
				</div>
			</div>
		</section>


		<!-- Modals -->
		<div class="modal fade" id="update-status-modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">Update Goal Status</h4>
					</div>
					<div class="modal-body">
						<p><strong>Which days did you meet your goal on?</strong></p>

						<div class="checkbox">
							<label>
								<input type="checkbox"> Monday
							</label>
						</div>

						<div class="checkbox">
							<label>
								<input type="checkbox"> Tuesday
							</label>
						</div>

						<div class="checkbox">
							<label>
								<input type="checkbox"> Wednesday
							</label>
						</div>

						<div class="checkbox">
							<label>
								<input type="checkbox"> Thursday
							</label>
						</div>

						<div class="checkbox">
							<label>
								<input type="checkbox"> Friday
							</label>
						</div>

						<div class="checkbox">
							<label>
								<input type="checkbox"> Saturday
							</label>
						</div>

						<div class="checkbox">
							<label>
								<input type="checkbox"> Sunday
							</label>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary">Save Update</button>
						<a href="#" class="btn btn-danger">Delete Goal</a>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer>
		
	</footer>

	<script type="text/JavaScript">
		$('.update-status').click(function(){
			$('#update-status-modal').modal();
		});

		//goal progress options
		var charOptions = {
		    //Boolean - Whether we should show a stroke on each segment
		    segmentShowStroke : true,

		    //String - The colour of each segment stroke
		    segmentStrokeColor : "#fff",

		    //Number - The width of each segment stroke
		    segmentStrokeWidth : 2,

		    //Number - The percentage of the chart that we cut out of the middle
		    percentageInnerCutout : 85, // This is 0 for Pie charts

		    //Number - Amount of animation steps
		    animationSteps : 100,

		    //String - Animation easing effect
		    animationEasing : "easeOutBounce",

		    //Boolean - Whether we animate the rotation of the Doughnut
		    animateRotate : true,

		    //Boolean - Whether we animate scaling the Doughnut from the centre
		    animateScale : false,

		    //String - A legend template
		    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

		};

		//goal progress data
		var goalProgress = [
		{
			value: 75,
			color:"#3399FF",
			highlight: "#5CADFF",
			label: "Goal Progress Percent"
		},
		{
			value: 25,
			color:"white",
			highlight: "white",
			label: ""
		}
		];

		//Goal Progress
		var goalCanvas = document.getElementById("goal-progress").getContext("2d");
		var characters = new Chart(goalCanvas).Doughnut(goalProgress,charOptions);
	</script>
</body>
</html>