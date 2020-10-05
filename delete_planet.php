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
	<title>Delete Planet</title>
</head>
<div style = "color:white;">
<body>
    <main role="main" class="container-fluid">
	<h1> Planet deleted from database! </h1>
	<?php
	@$planetID = $_GET["planetID"];
	
	if (!$planetID){
		echo "Error!";
		exit;
	}
	
	
	
	@ $db = new mysqli('localhost', 'bookkorama', 'cpsc33000', 'solarsystem');


    if ($db->connect_error) {
        die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
    }
	
	$query = "DELETE FROM planets WHERE planetID = ?";
	$stmt = $db->prepare($query);
	$stmt->bind_param("s", $planetID);
	$stmt->execute();
	if($stmt->affected_rows == 1){
		echo "<p>Planet Deleted</p>";
	}
	?>
	<a href="show_planets.php">Show Planets</a>
	
	</main>
</body>
<div style = "color:white;">
</html>