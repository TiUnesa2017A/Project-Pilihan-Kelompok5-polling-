<!DOCTYPE html>
<html>
<head>
	<title>Polling System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div style="background-color: orange; color: white; text-align: center; width: 100%; padding: 7px; font-family: comic sans ms;">
		<h2>Vote For Your Favorite Sport. NOW!</h2>
	</div>

<div class="container">
<form action="index.php" method="post" align="center">
	<img src="image/basket.jpg" width="280" height="250"/>
	<img src="image/sepakbola.jpg" width="280" height="250"/>
	<img src="image/volly.jpg" width="280" height="250"/>

<input type="submit" name="basket" value="You Vote For Basketball"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="sepakbola" value="You Vote For Football"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="volly" value="You Vote For Volleyball"/>

</form>

<?php 
	$con = mysqli_connect("localhost","root","","vote"); 

if(isset($_POST['basket']))
{
	$vote_basket = "update vote set basket=basket+1";
	$run_basket = mysqli_query($con, $vote_basket);

	if($run_basket)
	{
		echo "<h2 align='center'>Your Vote Has Been Cast For Basketball!</h2>";
		echo "<h2 align='center'><a href='index.php?results'>View Results</a></h2>";
	}
}
else if(isset($_POST['sepakbola']))
{
	$vote_sepakbola = "update vote set sepakbola=sepakbola+1";
	$run_sepakbola = mysqli_query($con, $vote_sepakbola);

	if($run_sepakbola)
	{
		echo "<h2 align='center'>Your Vote Has Been Cast For Football!</h2>";
		echo "<h2 align='center'><a href='index.php?results'>View Results</a></h2>";
	}
}
else if(isset($_POST['volly']))
{
	$vote_volly = "update vote set volly=volly+1";
	$run_volly = mysqli_query($con, $vote_volly);

	if($run_volly)
	{
		echo "<h2 align='center'>Your Vote Has Been Cast For Volleyball!</h2>";
		echo "<h2 align='center'><a href='index.php?results'>View Results</a></h2>";
	}
}
if(isset($_GET['results']))
{
	$get_vote = "select * from vote";
	$run_vote = mysqli_query($con, $get_vote);
	$row_vote = mysqli_fetch_array($run_vote);

		$basket = $row_vote['basket'];
		$sepakbola = $row_vote['sepakbola'];
		$volly = $row_vote['volly'];

	$count = $basket+$sepakbola+$volly;

	$per_basket = round($basket*100/$count) . "%";
	$per_sepakbola = round($sepakbola*100/$count) . "%";
	$per_volly = round($volly*100/$count) . "%";

	echo "
	<div style='background-color: orange' padding: 10px; text-align: center;>
		<center>
			<h2> Updated Result: </h2>

			<p style='background-color: black; color: white; padding: 10px; width: 500px;'>
				<b>Basketball: </b> $basket ($per_basket)
			</p>
			<p style='background-color: black; color: white; padding: 10px; width: 500px;'>
				<b>Football: </b> $sepakbola ($per_sepakbola)
			</p>
			<p style='background-color: black; color: white; padding: 10px; width: 500px;'>
				<b>Volleyball: </b> $volly ($per_volly)
			</p>

		</center>
	</div>
	";
}
?>

</div>


<div style="background-color: black; color: white; text-align: center; width: 100%; padding: 7px; font-family: comic sans ms;">
	<h3>YOGA PRADAFA HARAHAP	(17051204001)</h3>
	<h3>MOH. HILMY BADRUDDUJA	(17051204030)</h3>
	<h3>M. KHAFIDHUN ALIM MUSLIM	(17051204063)</h3>
</div>

</body>
</html>