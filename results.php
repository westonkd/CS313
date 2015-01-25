<?php
session_start();

function saveData () {
	$_SESSION['taken'] = true;

		 //save the data
		 //open the xml doc
	$xml=simplexml_load_file("test.xml") or die("Error: Cannot create object");

		 //character
	if (isset($_POST['character'])) {
		$nextChar = (int) $xml->question[0]->option[(int) $_POST['character']] + 1;
		$xml->question[0]->option[(int) $_POST['character']] = $nextChar;
	}

		 //movie
	if (isset($_POST['movie'])) {
		$nextChar = (int) $xml->question[1]->option[(int) $_POST['movie']] + 1;
		$xml->question[1]->option[(int) $_POST['movie']] = $nextChar;
	}

		 //saber
	if (isset($_POST['color'])) {
		$nextChar = (int) $xml->question[2]->option[(int) $_POST['color']] + 1;
		$xml->question[2]->option[(int) $_POST['color']] = $nextChar;
	}

		 //trailer
	if (isset($_POST['trailer'])) {
		$nextChar = (int) $xml->question[3]->option[(int) $_POST['trailer']] + 1;
		$xml->question[3]->option[(int) $_POST['trailer']] = $nextChar;
	}
	
	//save the file
	$xml->asXml('test.xml');

	return true;
}

saveData();
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
				<a class="navbar-brand" href="#">Results</a>
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

	<main class="container top">
		<section class="row well well-sm">
			<div class="col-sm-6" style="text-align:right;">
				<h2>Favorite Character</h2>
				<p>Mouse over sections to see results.</p>
			</div>
			<div class="col-sm-6" style="text-align:center;">
				<canvas id="characters" width="300" height="300"></canvas>
			</div>
		</section>

		<section class="row top well well-sm">
			<div class="col-sm-6" style="text-align:center;">
				<canvas id="movies" width="300" height="300"></canvas>
			</div>
			<div class="col-sm-6" style="text-align:left;">
				<h2>Favorite Movies</h2>
				<p>Mouse over sections to see results.</p>
			</div>
		</section>

		<section class="row top well well-sm">
			<div class="col-sm-6" style="text-align:right;">
				<h2>Favorite Lightsaber Color</h2>
				<p>Mouse over sections to see results.</p>
			</div>
			<div class="col-sm-6" style="text-align:center;">
				<canvas id="color" width="300" height="300"></canvas>
			</div>
		</section>

		<section class="row top well well-sm">
			<div class="col-sm-6" style="text-align:center;">
				<canvas id="trailer" width="300" height="300"></canvas>
			</div>
			<div class="col-sm-6" style="text-align:left;">
				<h2>Episode VII Trailer</h2>
				<p>Mouse over sections to see results.</p>
			</div>
		</section>
	</main>
</body>
<script>
	var luke, leia, han, chewey, yoda, vadar, other;
	var phantom, clones, sith, hope, empire, jedi;
	var blue, green, purple, pink, red, otherColor;
	var lot, bit, ok, notMuch, notAtAll;

	<?php
	$xml=simplexml_load_file("test.xml") or die("Error: Cannot create object");

	//Characters
	$luke = $xml->question[0]->option[0];
	$leia = $xml->question[0]->option[1];
	$han = $xml->question[0]->option[2];
	$chewey = $xml->question[0]->option[3];
	$yoda = $xml->question[0]->option[4];
	$vadar = $xml->question[0]->option[5];
	$other = $xml->question[0]->option[6];

	//Movies
	$phantom = $xml->question[1]->option[0];
	$clones = $xml->question[1]->option[1];
	$sith = $xml->question[1]->option[2];
	$hope = $xml->question[1]->option[3];
	$empire = $xml->question[1]->option[4];
	$jedi = $xml->question[1]->option[5];

	//colors
	$blue = $xml->question[2]->option[0];
	$green = $xml->question[2]->option[1];
	$purple = $xml->question[2]->option[2];
	$pink = $xml->question[2]->option[3];
	$red = $xml->question[2]->option[4];
	$otherColor = $xml->question[2]->option[5];

	//trailer
	$lot = $xml->question[3]->option[0];
	$bit = $xml->question[3]->option[1];
	$ok = $xml->question[3]->option[2];
	$notMuch = $xml->question[3]->option[3];
	$notAtAll = $xml->question[3]->option[4];

	?>

	luke = <?php echo $luke;?>;
	leia = <?php echo $leia;?>;
	han = <?php echo $han;?>;
	chewey = <?php echo $chewey;?>;
	yoda = <?php echo $yoda;?>;
	vadar = <?php echo $vadar;?>;
	other = <?php echo $other;?>;

	phantom = <?php echo $phantom?>;
	clones = <?php echo $clones?>;
	sith = <?php echo $sith?>;
	hope = <?php echo $hope?>;
	empire = <?php echo $empire?>;
	jedi = <?php echo $jedi?>;

	blue = <?php echo $blue?>;
	green = <?php echo $green?>;
	purple = <?php echo $purple?>;
	pink = <?php echo $pink?>;
	red = <?php echo $red?>;
	otherColor = <?php echo $otherColor?>;

	lot = <?php echo $lot?>;
	bit = <?php echo $bit?>;
	ok = <?php echo $ok?>;
	notMuch = <?php echo $notMuch?>;
	notAtAll = <?php echo $notAtAll?>;	

	//characters
	var charData = [
	{
		value: luke,
		color:"#3399FF",
		highlight: "#5CADFF",
		label: "Luke"
	},
	{
		value: leia,
		color: "#B247B2",
		highlight: "#CC52CC",
		label: "Leia"
	},
	{
		value: han,
		color: "#005C1F",
		highlight: "#007A29",
		label: "Han"
	},
	{
		value: chewey,
		color: "#754719",
		highlight: "#855C33",
		label: "Chewey"
	},
	{
		value: yoda,
		color: "#00A37A",
		highlight: "#00B88A",
		label: "Yoda"
	},
	{
		value: vadar,
		color: "#000000",
		highlight: "#000029",
		label: "Vadar"
	},
	{
		value: other,
		color: "#997A7A",
		highlight: "#CCA3A3",
		label: "Other"
	}
	];

	var charOptions = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke : true,

    //String - The colour of each segment stroke
    segmentStrokeColor : "#fff",

    //Number - The width of each segment stroke
    segmentStrokeWidth : 2,

    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout : 50, // This is 0 for Pie charts

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



	//movies
	var movieData = [
	{
		value: phantom,
		color:"#3399FF",
		highlight: "#5CADFF",
		label: "The Phantom Menace"
	},
	{
		value: clones,
		color: "#B247B2",
		highlight: "#CC52CC",
		label: "Attack of The Clones"
	},
	{
		value: sith,
		color: "#005C1F",
		highlight: "#007A29",
		label: "Revenge of the Sith"
	},
	{
		value: hope,
		color: "#754719",
		highlight: "#855C33",
		label: "A New Hope"
	},
	{
		value: empire,
		color: "#00A37A",
		highlight: "#00B88A",
		label: "The Empire Strikes Back"
	},
	{
		value: jedi,
		color: "#000000",
		highlight: "#000029",
		label: "Return of the Jedi"
	}
	];

	//colors
	var colorData = [
	{
		value: blue,
		color:"#0066CC",
		highlight: "#3385D6",
		label: "Blue"
	},
	{
		value: green,
		color: "#339933",
		highlight: "#47A347",
		label: "Green"
	},
	{
		value: purple,
		color: "#9900FF",
		highlight: "#AD33FF",
		label: "Purple"
	},
	{
		value: pink,
		color: "#FF33CC",
		highlight: "#FF5CD6",
		label: "Pink"
	},
	{
		value: red,
		color: "#E60000",
		highlight: "#FF1919",
		label: "Red"
	},
	{
		value: otherColor,
		color: "#000000",
		highlight: "#000029",
		label: "Other"
	}
	];

	//trailer
	var trailerData = [
	{
		value: lot,
		color:"#0066CC",
		highlight: "#3385D6",
		label: "A Lot"
	},
	{
		value: bit,
		color: "#339933",
		highlight: "#47A347",
		label: "A Bit"
	},
	{
		value: ok,
		color: "#9900FF",
		highlight: "#AD33FF",
		label: "It was OK"
	},
	{
		value: notMuch,
		color: "#FF33CC",
		highlight: "#FF5CD6",
		label: "Not a Fan"
	},
	{
		value: notAtAll,
		color: "#E60000",
		highlight: "#FF1919",
		label: "Not at All"
	}
	];

//character graph
var charCanvas = document.getElementById("characters").getContext("2d");
var characters = new Chart(charCanvas).Doughnut(charData,charOptions);

//movie graph
var movieCanvas = document.getElementById("movies").getContext("2d");
var moviesChart = new Chart(movieCanvas).Doughnut(movieData,charOptions);

//color graph
var colorCanvas = document.getElementById("color").getContext("2d");
var colorChart = new Chart(colorCanvas).Doughnut(colorData,charOptions);

//color graph
var trailerCanvas = document.getElementById("trailer").getContext("2d");
var trailerChart = new Chart(trailerCanvas).Doughnut(trailerData,charOptions);

</script>
</html>