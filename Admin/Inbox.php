<?php

 error_reporting();
session_start();
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");

		// $a = $_GET['inboxcart'];
		// $b = $_GET['user'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>AdminUIOne</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/AdminUIOne.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 sidenavb">
				<h2>Dashboard</h2>
				<hr>
				<a  href="Dashboard.php">DASHBOARD</a></li>
				<a class="active" href="Inbox.php">INBOX</a>
				<a  href="Event.php">EVENT'S</a>
				<a  href="AddFood.php">ADD FOOD</a>
				<a  href="AdminUIOne.php">EDIT PROFILE</a>
				<a  href="Userorder.php">TABLE</a><hr>
				<a href="logout.php">Log out</a>
			</div>
		</div>
		<div class="row content">
			<div class="col-2"></div>
			<div class="col-4">
				<h3>Inbox</h3>
			</div>
			<div class="col-6">
				<input type="text" name="" id="search" class="form-control" placeholder="Search........">
			</div>
		</div>
	<div class="idcolor">	
		<div class="row">
			<div class="col-12">
				<div class="inboxcontent">
					<table class="table">
						<thead>
						<tr>
							<th>productName</th>
							<th>productQuantity</th>
							<th>productId</th>
							<th>productPrice</th>
							<th>productimage</th>
							<th>restrid</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
						</tr>
					</tbody>
					</table>
					
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
</html>