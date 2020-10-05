<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Book-O-Rama Catalog New Book Entry</title>
</head>

<body>
    <main role="main" class="container-fluid">
        <h1> New Planet Entry </h1>
		<?php
	@$planetID = $_GET["planetID"];
	
	if (!$planetID){
		echo "Error!";
		exit;
	}
	
	
	
	@$db = new mysqli('localhost', 'bookkorama', 'cpsc33000', 'solarsystem');


    if ($db->connect_error) {
        die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
    }
	
	$query = "SELECT * FROM planets WHERE planetID=?";
		$stmt = $db->prepare($query);
		$stmt->bind_param("s", $planetID);
		$stmt->execute();
		$result = $stmt->get_result();
		if($result){
			$row = $result->fetch_assoc();
			$planetID = $row["planetID"];
			$solarSystemID = $row["solarSystemID"];
			$planetName = $row["planetName"];
			$planetMass = $row["planetMass"];
			$averageTemperature = $row["averageTemperature"];
			$lowestTempOnPlanet = $row["lowestTempOnPlanet"];
			$highestTempOnPlanet = $row["highestTempOnPlanet"];
			
		}
	?>

        <form action="update_planet.php" method="post">
            <p>planetID <input type="text" name="planetID" maxlength="13" size="13"value=<?php echo "".$planetID."";?> readonly /></p>
            <p>solarSystemID <input type="text" name="solarSystemID" maxlength="30" size="30"value=<?php echo "".$solarSystemID."";?> readonly /></p>
            <p>planetName <input type="text" name="planetName" maxlength="60" size="30"value=<?php echo "".$planetName."";?>  /></p>
            <p>planetMass<input type="text" name="planetMass" maxlength="7" size="7"value=<?php echo "".$planetMass."";?> readonly /></p>
			<p>averageTemperature<input type="text" name="averageTemperature" maxlength="7" size="7"value=<?php echo "".$averageTemperature."";?> readonly /></p>
			<p>lowestTempOnPlanet<input type="text" name="lowestTempOnPlanet" maxlength="7" size="7"value=<?php echo "".$lowestTempOnPlanet."";?> readonly /></p>
			<p>highestTempOnPlanet<input type="text" name="highestTempOnPlanet" maxlength="7" size="7"value=<?php echo "".$highestTempOnPlanet."";?> readonly /></p>

            <input type="submit" name="submit" value="Add Planet" />
        </form>
    </main>
</body>

</html>