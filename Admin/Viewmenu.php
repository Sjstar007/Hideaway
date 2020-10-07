<?php
session_start();
error_reporting();
 
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
	$RestroID2=$_SESSION['Rname'];
 $FoodTable = "Zmenu_".preg_replace("! !","_",$RestroID2);
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>AdminUIOne</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/AdminUIOne.css">
<link rel="stylesheet" type="text/css" href="css/gearbox.css">
<script src="../js/jquery.js"></script>

<script>
	function delete_data() {

			nm=document.getElementById("search_Data").value
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("Foodtable").innerHTML = this.responseText;
			}
		};
			xhttp.open("GET", "sample1.php?sr="+nm, true);
			xhttp.send();
		}

</script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 sidenavb">
				<h2>Dashboard</h2>
				<hr>
				<a href="Dashboard.php">DASHBOARD</a></li>
				<a   href="Inbox.php">INBOX</a>
				<a  href="Event.php">EVENT'S</a>
				<a  href="AddFood.php">ADD FOOD</a>
				<a class="active"  href="Viewmenu.php">Viewmenu</a>
				<a  href="AdminUIOne.php">EDIT PROFILE</a>
				<a  href="Userorder.php">TABLE</a><hr>
				<a href="logout.php">Log out</a>
			</div>
		</div>
		<div class="row content">
			<div class="col-2"></div>
			<div class="col-4">
				<h3>FoodItem</h3>
			</div>
			<div class="col-6"> 
				<!--<input type="text" name="" id="search" class="form-control" placeholder="Search........">-->
			</div>
		</div>
	<div class="idcolor">	
		<div class="row">
			<div class="col-12">
				<div class="inboxcontent">
					<div class="row leftablecont">
					<div class="col-12 ">
						<h2 id="text">Your Food Menu FoodItems</h2><br>
						<?php
								$query3="select * from $FoodTable";
								$chk3=mysqli_query($connection,$query3);
									echo "<form method='post'>";
								echo 	"<table class='table'>";
							echo "<thead>";
							echo 	"<tr>";
								echo 	"<th>Image</th>";
								echo 	"<th>FoodItem</th>";
								echo	"<th>Price</th>";
								echo 	"<th>Rating</th>";
								echo 	"<th>DElETE</th>";
								echo 	"<th>UPDATE</th>";
							echo "</tr>";
							echo "</thead>";
							echo "<tbody>";
							while($getfoodinfo1=mysqli_fetch_array($chk3)){
							echo 	"<tr>";
							echo 		"<td><img src='foomenu/".$getfoodinfo1['Soon1']."' class='image'></td>";
							echo 		"<td>".$getfoodinfo1['FoodItem']."</td>";
							echo 		"<td><input type='number' name='pricecheck[]' value='".$getfoodinfo1['Price']."' id='priceupdate'></td>";
							echo 		"<td>".$getfoodinfo1['Rating']."</td>";
							echo 		"<td><a href='#'>DElETE</a></td>";
							echo 		"<td><a href='#'>UPDATE</a></td>";
							echo 	"</tr>";

						}
						
							echo "</tbody>";echo "</table>";
							
						echo "</form>";
						
						?>
						


						<!-- <form method="post">
							<input type="text" name="Search" placeholder="Search Food" id="search_Data" class="form-control" onkeyup="search_food()">
						</form> -->

					
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
</html>