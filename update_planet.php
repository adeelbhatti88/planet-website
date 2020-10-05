<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>Planet Edit</title>


</head>

<body>
    <main role="main" class="container-fluid">
	<h1> Edit Planet </h1>
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
    $planetMass = doubleval($planetMass);
	$averageTemperature = doubleval($averageTemperature);
	$lowestTempOnPlanet = doubleval($lowestTempOnPlanet);
	$highestTempOnPlanet = doubleval($highestTempOnPlanet);
	

    //connect to the database
    @$db = new mysqli('localhost', 'bookkorama', 'cpsc33000', 'solarsystem');


    if ($db->connect_error) {
        die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
    }


    $query = "UPDATE Planets SET solarSystemID=?, planetName=?, planetMass=?, averageTemperature=?, lowestTempOnPlanet=?, highestTempOnPlanet=? WHERE planetID = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssssssd", $solarSystemID, $planetName, $planetMass, $averageTemperature, $lowestTempOnPlanet, $highestTempOnPlanet, $planetID);
    $stmt->execute();
    echo $stmt->affected_rows." Planets updated";

    $db->close();
?>
    <br/
    ><a href="show_planets.php">Show Planets</a>
</main>
</body>

</html>