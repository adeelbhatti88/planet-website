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
	<title>Planet added!</title>


</head>
<div style = "color:white;">
<body>
    <main role="main" class="container-fluid">
	<h1> Planet added into database! </h1>
<?php
    $planetID=$_POST["planetID"];
    $solarSystemID=$_POST["solarSystemID"];
    $planetName=$_POST["planetName"];
    $planetMass=$_POST["planetMass"];
	$averageTemperature=$_POST["averageTemperature"];
	$lowestTempOnPlanet=$_POST["lowestTempOnPlanet"];
	$highestTempOnPlanet=$_POST["highestTempOnPlanet"];

    if (!$planetID || !$solarSystemID || !$planetName || !$planetMass || !$averageTemperature || !$lowestTempOnPlanet || !$highestTempOnPlanet) {
        echo "You have not entered all required details.  Please go back and try again.";
        exit;
    }

    //format input
    $planetID = addslashes($planetID);
    $solarSystemID = addslashes($solarSystemID);
    $planetName = addslashes($planetName);
    $planetMass = addslashes($planetMass);
	$averageTemperature = doubleval($averageTemperature);
	$lowestTempOnPlanet = doubleval($lowestTempOnPlanet);
	$highestTempOnPlanet = doubleval($highestTempOnPlanet);
	

    //connect to the database
    @$db = new mysqli('localhost', 'bookkorama', 'cpsc33000', 'solarsystem');


    if ($db->connect_error) {
        die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
    }


    $query = "insert into Planets values (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssssssd", $planetID, $solarSystemID, $planetName, $planetMass, $averageTemperature, $lowestTempOnPlanet, $highestTempOnPlanet);
    $stmt->execute();
    echo $stmt->affected_rows." Planet inserted into database";

    $db->close();
?>
    <br/
    ><a href="show_planets.php">Show Planets</a>
</main>
</body>
</div>

</html>