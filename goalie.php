<?php  
session_start();

	//if the user is already signed in
if (!isset($_SESSION["signed-in"]))
{
	//redirect to the main page
	header( 'Location: /goalie-signin.php' ) ;
} else {

	require("dbConnector.php");
	$db = loadDatabase();
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
					<li><a href="goalie-settings.php">Weston's Settings</a></li>
					<li><a href="https://wrapbootstrap.com/?ref=bsw" target="_blank">Logout</a></li>
				</ul>

			</div>
		</div>
	</div>

	<!--main content-->
	<main class="container">
		<section class="row">
			<div class="col-md-6">
				<div id="goal-container">
					<canvas id="goal-progress" width="375" height="375"></canvas>
				</div>
			</div>
			<div class="col-md-6">
				<div id="current-goal-info">
					<h2>Run Every Day</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum rerum reiciendis voluptatum iure ipsam possimus aliquam.</p>

					<h4>Goal Last Updated</h4>
					<p>January 30, 2014</p>

					<h4>Goal Progress Complete</h4>
					<p>75 %</p>

					<a href="#" class="btn btn-success update-status">Update Progress</a>

					<?php 
						echo "<h1>" . $_POST['email'] . "</h1>";
					?>
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
							<tr>
								<td>1</td>
								<td>Column content</td>
								<td>Column content</td>
								<td>Column content</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Column content</td>
								<td>Column content</td>
								<td>Column content</td>
							</tr>
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