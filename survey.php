<?php
session_start();

if (isset($_SESSION['taken'])) {
	header("Location: results.php");
	exit();
} 
?>

<!DOCTYPE html>
<html>

<head>
	<title>Weston Dransfield</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/boot-theme.css">
	<link rel="stylesheet" href="assets/main.css">
	<link rel="stylesheet" href="assets/survey.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="assets/chart.min.js"></script>
</head>

<body>
	<div class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Survey</a>
			</div>
			<div class="navbar-collapse collapse" id="navbar-main">

				<ul class="nav navbar-nav navbar-left">
					<li><a href="http://westonkd.github.io" target="_blank">Portfolio</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-left">
					<li><a href="mailto:dra10005@byui.edu" target="_blank">Contact</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-left">
					<li><a href="assignments.html">Assignements</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<main class="container">
		<section class="row">
			<div class="col-all-12">
				<h1>Star Wars Survey</h1>
				<p>Please answer the following questions or <a href="results.php">click here</a> to see the results.</p>
				<form action="results.php" method="post">
					<div class="question" data-example-id="large-well">
						<div class="well well-lg">
							<h3>My favoriate character from the original trilogy is:</h3>
							<input type="radio" name="character" value="0"> Luke Skywalker <br>
							<input type="radio" name="character" value="1"> Leia Organa Solo <br>
							<input type="radio" name="character" value="2"> Han Solo <br>
							<input type="radio" name="character" value="3"> Chewbacca <br>
							<input type="radio" name="character" value="4"> Yoda <br>
							<input type="radio" name="character" value="5"> Darth Vadar <br>
							<input type="radio" name="character" value="6"> Other <br>
						</div>
					</div>

					<div class="question" data-example-id="large-well">
						<div class="well well-lg">
							<h3>My favoriate Star Wars movie is:</h3>
							<input type="radio" name="movie" value="0"> The Phantom Menace <br>
							<input type="radio" name="movie" value="1"> Attack of the Clones <br>
							<input type="radio" name="movie" value="2"> The Revenge of the Sith <br>
							<input type="radio" name="movie" value="3"> A New Hope <br>
							<input type="radio" name="movie" value="4"> The Empire Strikes Back <br>
							<input type="radio" name="movie" value="5"> Return of the Jedi <br>
						</div>
					</div>

					<div class="question" data-example-id="large-well">
						<div class="well well-lg">
							<h3>If I had a lightsaber it would be:</h3>
							<input type="radio" name="color" value="0"> Blue<br>
							<input type="radio" name="color" value="1"> Green <br>
							<input type="radio" name="color" value="2"> Purple <br>
							<input type="radio" name="color" value="3"> Pink<br>
							<input type="radio" name="color" value="4"> Red <br>
							<input type="radio" name="color" value="5"> Other<br>
						</div>
					</div>

					<div class="question" data-example-id="large-well">
						<div class="well well-lg">
							<h3>I liked the new Star Wars <a href="https://www.youtube.com/watch?v=OMOVFvcNfvE">trailer:</a></h3>
							<input type="radio" name="trailer" value="0"> A lot!<br>
							<input type="radio" name="trailer" value="1"> A bit <br>
							<input type="radio" name="trailer" value="2"> Okay <br>
							<input type="radio" name="trailer" value="3"> Not much<br>
							<input type="radio" name="trailer" value="4"> Not at all <br>
						</div>
					</div>

					<div class="submit-container">
						<button type="submit">Submit</button>
					</div>
				</form>
			</div>
		</section>
	</main>
</body>

</html>