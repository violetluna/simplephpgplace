<?php

if(isset($_GET['query'])){
$query=$_GET['query'];
}


$url = "https://maps.googleapis.com/maps/api/place/textsearch/json?query=".urlencode($query)."&key=ykey";

$results = file_get_contents($url);
$data = json_decode($results);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Simple Php Google Search</title>

    <!-- GoogleFont -->
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">

    <!-- Styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>


  <body>

  	<h1>Search a place</h1>

	<!-- Search Bar -->

  	<div id="search">

  		<form class="navbar-form" role="search" action="" method="GET">

    		<div class="form-group">
        		<input type="text" name="query" class="form-control" placeholder="Search">
    		</div>
			<button type="submit" class="btn btn-default per"><span class="glyphicon glyphicon-search"></span></button>

	 	</form>

	</div>

  	<!-- End Search Bar-->


  	<!-- Results List -->

  	<div id="results">

  		<?php 
			for($i=0; $i<count($data->{'results'}); $i++) {
		?>
   
  		<div class="card">
  			<ul class="list-group list-group-flush">
    			<li class="list-group-item name"><?php echo $data->{'results'}[$i]->{'name'} ?></li>
    			<li class="list-group-item"><?php echo $data->{'results'}[$i]->{'formatted_address'} ?></li>
  			</ul>
		</div>

		<?php } ?>

	</div>


    <!-- library&scripts -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>