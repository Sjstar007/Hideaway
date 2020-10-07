<?php
session_start();
	error_reporting();	
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
	$RestroID2=$_SESSION['ID2'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>AdminUIOne</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/AdminUIOne.css">
<link rel="stylesheet" type="text/css" href="../font/css/all.min.css">
<link rel="stylesheet" type="text/css" href="css/Eventcs.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 sidenavb">
				<h2>Dashboard</h2>
				<hr>
				<a href="Dashboard.php">DASHBOARD</a></li>
				<a  href="Inbox.php">INBOX</a>
				<a class="active" href="Event.php">EVENT'S</a>
				<a  href="AddFood.php">ADD FOOD</a>
				<a   href="Viewmenu.php">Viewmenu</a>
				<a  href="AdminUIOne.php">EDIT PROFILE</a>
				<a  href="Userorder.php">TABLE</a><hr>
				<a href="logout.php">Log out</a>
			</div>
		</div>
		<div class="row content">
			<div class="col-2"></div>
			<div class="col-4">
				<h3>Event's</h3>
			</div>
			<div class="col-6">
				<input type="text" name="" id="search" class="form-control " placeholder="Search........">
			</div>
		</div>
	<div class="idcolor">	
		<div class="row">
			<div class="col-12">
				<div class="inboxcontent">
					<div class="flex">
						<div class="row">
						<?php 
							$Datacheck = "select * from event where RestroID = '".$RestroID2."' " ;
							$result2=mysqli_query($connection,$Datacheck);
							$check=mysqli_num_rows($result2);
							if ($check >0) {
								while($row1=mysqli_fetch_array($result2))
								{	
									echo "<div class='eventcontainer'>";
									echo "<img src='file/".$row1['Categorytype']."'>";
									echo "<div class='box'>";
									echo "<h5>".$row1['Eventname']."</h5>";
									echo "</div>";
									echo "</div>";
								}
								echo "<a href='AddEvent.php'><div class='containerevent'>";
								echo "<i class='far fa-circle'> <i class='fas fa-plus'></i> </i>";
								echo "</div>";
								echo"</a>";
							}
							else{
						 echo "<a href='AddEvent.php'><div class='containerevent'>";
						echo "<i class='far fa-circle'> <i class='fas fa-plus'></i> </i>";
						echo "</div>";
						echo"</a>";
						}
						?>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
</html>