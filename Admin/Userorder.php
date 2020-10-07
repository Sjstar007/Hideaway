<?php
session_start();
error_reporting();	
//For connection 
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
				// for Session Id =Rstro Id2 = row
					$RestroID=$_SESSION['ID']; 
					$RestroID2=$_SESSION['ID2'];
	// check admin is login or not 
		    $logincheck = "select * from restrodetail where RestroID = '".$RestroID."' " ;
			$result1=mysqli_query($connection,$logincheck);
		    $row=mysqli_fetch_array($result1); 

		
		   

if ($RestroID == true) {


?>
<!DOCTYPE html>
<html> 
<head>
	<title>AdminUIOne</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/test.css">
<link rel="stylesheet" type="text/css" href="css/gearbox.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
<script>

		$(document).ready(function(){
	$("#flip").click(function(){
	$("#tableview").slideToggle("slow");
	});
});
</script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class=" sidenavb" data-background-color="white">
				<div class="sidebar" data-color="purple" data-background-color="white">
					<h2>Dashboard</h2>
				</div>
				<div class="othercontent">
					<ul>
						<li ><a  href="Dsahboard.php">DASHBOARD</a></li>
						<li><a  href="Inbox.php">INBOX</a></li>
						<li> <a  href="Event.php">EVENT'S</a></li>
						<li><a  href="AddFood.php">ADD FOOD</a></li>
						<li><a   href="Viewmenu.php">Viewmenu</a></li>
						<li><a  href="AdminUIOne.php">EDIT PROFILE</a></li>
						<li id="one"><a  href="Userorder.php">TABLE</a></li>
						<li><a href="logout.php">Log out</a></li>
					</ul>
			</div>
			</div>
		</div>
	</div>
	<!-- Table for onder summery -->
	<!-- Table of orderdetail   -->
			<div class="container-fluid">
				<div class="row right-side">
					<div class="col-md-11">
					<div class="table-info">
						<div class="table-box">
							<h4>Edit Profile</h4>
							<p>Complete your profile</p>
						</div>
						<div class="table-cont">
							<table class="table">
								<thead class="text-primary">
									
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>orderTime</th>
										<th>OrderDate</th>
										<th>Members</th>
										<th>TotalPrice</th>
										<!--<th>two</th>
										<th>two</th>
										<th>two</th>
										<th>two</th>-->
										</tr>									
								</thead>
								<tbody>
				<?php
						 $Datacheck = "select * from orderdetail where RestroId = '".$RestroID2."' " ;
						 $result2=mysqli_query($connection,$Datacheck);
			$i = 0;
						while($row1=mysqli_fetch_array($result2)){
							

									echo "<tr id='flip'>";
									echo "<td>$i</td>";
									echo 	"<td>".$row1['UserName']."</td>";
									echo 	"<td>".$row1['OrderTime']."</td>";
									echo 	"<td>".$row1['OrderDate']."</td>";
									echo 	"<td>".$row1['Members']."</td>";
									echo 	"<td>".$row1['TotalPrice']."</td>";
									/*echo 	"<td>".$row1['UserName']."</td>";
									echo 	"<td>".$row1['UserName']."</td>";
									echo 	"<td>".$row1['UserName']."</td>";
									echo 	"<td>".$row1['UserName']."</td>";*/
									echo "</tr>";
									/*echo "<tr id='tableview'>";
										echo "<td colspan='10'>";
										echo "<div class='leftone'>";
										echo"<h2>Hello</h2>";
										echo "</div>";
										echo "<div class='rightone'>";
										echo"<h2>Hello</h2>";
										echo "</div>";
										echo "</td>";
									echo "</tr>";*/
									
									$i++;
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
						</div>
				</div>
			</div>
		 <?php 
		}
			else{
		?>
		<h1>Error 404</h1>
	<?php } ?>
	
</body>
</html>