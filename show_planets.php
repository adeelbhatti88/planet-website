<!DOCTYPE html>
<html>
<head>
<style>

	body{
	background-image: url("showplanets.jpg");
	background-repeat: no-repeat;
	background-size: 100%;
	}
	</style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>Show Planets</title>
</head>
<div style = "color:white;">
<body>
    <main role="main" class="container-fluid">
	<div style="text-align:center">
        <h1>Show Planets</h1>
		
<?php
    @ $db = new mysqli('localhost', 'bookkorama', 'cpsc33000', 'solarsystem');


    if ($db->connect_error) {
        die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
    }

    $query="SELECT planetID, planetName, planetMass, averageTemperature, lowestTempOnPlanet, highestTempOnPlanet FROM Planets";
    //$result = $db->query($query);

    if ($result = $db->query($query)) {

        //find size of result set
        $num_results = $result->num_rows;
        $num_fields = $result->field_count;

        echo "<table class='table table-responsive'>";
        echo "<tr>";

        //get and display field names
        $dbinfo = $result->fetch_fields();
 

        foreach ($dbinfo as $val) {
            echo "<th>".ucwords($val->name)."</th>";
        }

        echo "</tr>";

        while ($row = $result->fetch_row()) {
            echo "<tr>";
            for ($i=0; $i<$num_fields; $i++) {
				if($i==0){
					$planetID = $row[$i];
					echo "<td><a 'show_planet.php?planetID=$planetID'>$planetID</a></td>";
				
				}else{
                echo "<td>". stripslashes($row[$i])."</td>";
				}
            }
			echo "<td><a href='delete_planet.php?planetID=$planetID'>Delete</a></td>";
            echo "</tr>";
        }

        $result->close();
        echo "</table>";
    }

    $db->close();

?>
</main>
</div>
</div>
</body>
</html>