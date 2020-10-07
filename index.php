<?php
	$connection = mysqli_connect('localhost','root','','hideaway')or die("not connect");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Hideaway</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/Homecss.css">
	<link rel="stylesheet" type="text/css" href="font/css/all.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row"> 	
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<h1>Hideaway</h1><br>
				<p>always welcome</p>
			</div>
			<div class="col-sm-4"></div>

		</div>		
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4"> </div>
			<div class="col-sm-4">
				<form>
					<a href="navbar.php"><i  class="fas fa-search" aria-hidden="true" id="filtersubmit" ></i></a>
					<input  type="text" name="search" placeholder="Enter your location" class="search" href="navbar.php" >
					</input></div>
				</form>
		</div>
	</div>
</body>
</html>  