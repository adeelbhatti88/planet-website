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
	<title>Planet Search</title>
</head>
<div style = "color:white;">
<body>
    <main role="main" class="container-fluid">
	<div style="text-align:center">
        <h1>Panet search</h1>
		</div>
		
		<form action="search-results.php" method="post">
			  <div class="form-group">
					<label for ="searchtype">Select Search Type</label>
					<select class="form-control" id="searchtype" name="searchtype" >
						<option value="planetName">planetName</option>
						<option value = "solarSystemID">solarSystemID</option>
						<option value ="planetID">planetID</option>
					</select>
				</div>
				
				
				<div class="form-group">
					<label for="searchterm">Enter Search Term</label>
				<input name="searchterm" type="text" class="form-control" name="searchterm" id = "searchterm" >
			</div>
				<button type="submit" class="btn btn-primary">Search</button>
		</form>



</body>
</div>
</html>
