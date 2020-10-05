<!DOCTYPE html>
<html>
<head>
<style>

	body{
	background-image: url("searchplanet.jpg");
	background-repeat: no-repeat;
	background-size: 100%;
	}
	</style>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>Search Results</title>


</head>
<div style = "color:white;">
<body>
    <main role="main" class="container-fluid">
	<h1> Planet Search Results </h1>
	<?php
    $searchtype=$_POST["searchtype"];
	$searchterm=trim($_POST["searchterm"]);

    if (!$searchtype || !$searchterm) {
        echo "You have not entered all required details.  Please go back and try again.";
        exit;
    }

    
    //connect to the database
    @$db = new mysqli('localhost', 'bookkorama', 'cpsc33000', 'solarsystem');


    if ($db->connect_error) {
        die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
    }


    $query = "SELECT * FROM Planets WHERE $searchtype LIKE '%$searchterm%'";
    $result=$db->query($query);
	
	$num_results = $result->num_rows;
	echo"<p> Number of Planets found: $num_results";
	
	for($i=0; $i<$num_results;$i++){
		$row = $result->fetch_assoc();
		echo "<p><strong>planetID: ";
		echo htmlspecialchars(stripslashes($row["planetID"]));
		echo "</strong>";
		echo "<br />";
		echo "solarSystemID: ".stripslashes($row["solarSystemID"]);
		echo "<br />";
		echo "planetName: ".stripslashes($row["planetName"]);
		echo "<br />";
		echo "planetMass: ".stripslashes($row["planetMass"]);
		echo" </p>";
	}
	
	$result->free();
	$db->close();

    
	?>
    <br/
    ><a href="show_planets.php">Show Planets</a>
</main>
</body>
</div>

</html>