<?php
session_start();
error_reporting(0);
 
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
	$RestroID2=$_SESSION['Rname'];
 $FoodTable = "Zmenu_".preg_replace("! !","_",$RestroID2);
	if(isset($_POST['insert']))
       		{
          		  	$foodrowid = $_POST['check'];
          		  	$a=implode("','", $foodrowid);
          		    $foodprice = $_POST['price']; 


          		   $query2="select * from foodmenuall where RowID in('$a')";
						$chk3=mysqli_query($connection,$query2);
						
						while($getfoodinfoinsert=mysqli_fetch_array($chk3)){

          		  	 $query4 = "insert into $FoodTable set ROWID = '".$getfoodinfoinsert['RowID']."' ,FoodItem = '".$getfoodinfoinsert['FoodItemall']."',Soon1 = '".$getfoodinfoinsert['Image']."'";
          		   	$execute=mysqli_query($connection,$query4);

}
          		   $result=sizeof($foodprice);
          		   for ($i=0; $i <$result ; $i++) { 
          		   		if ($foodprice[$i] != '') {
          		   			$newarray[]=$foodprice[$i];
          		   		}

          		   }
				$arraysize = sizeof($newarray);
			    $arraysize = sizeof($foodrowid);
					for ($i=0; $i < $arraysize ; $i++) { 
          		    		
          		    		 $NewPrice=$newarray[$i];
          		    		 $rowchange=$foodrowid[$i];
     
          		    		  $query1="update $FoodTable set Price='$NewPrice' where ROWID = '$rowchange'";
						$chk4=mysqli_query($connection,$query1);
					}
          		    	         		   
					
          	}

         
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
	function search_food() {

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
				<a class="active"  href="AddFood.php">ADD FOOD</a>
				<a   href="Viewmenu.php">Viewmenu</a>
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
					<div class="row">
					<div class="col-6">
						<!-- <form method="post">
							<input type="text" name="Search" placeholder="Search Food" id="search_Data" class="form-control" onkeyup="search_food()">
						</form> -->

					
					</div>
					<div class="col-12">
						<div class="">
							<h3>Select Your Menu</h3>
								<form method="post" enctype="multipart/form-data" class="check">
							<?php 
								$query2="select * from foodmenuall";
								$chk2=mysqli_query($connection,$query2);
								echo"<table class='table  maintable'>";
								echo	"<thead>";
								echo		"<tr class='tablehead'>";
								echo 			"<th>Image</th>";
								echo 			"<th>Food Item</th>";
								echo 			"<th>Enter Price</th>";
								echo 			"<th>select item</th>";
								echo 		"</tr>";
								echo 	"</thead>";
								echo 	"<tbody>";
								
								echo		"<span id='Foodtable'></span>";
											/*<!--<h4>Alu Gobi <img src="foomenu/5d7ccca801172f1.jpg"></h4>*/
											
								while($getfoodinfo=mysqli_fetch_array($chk2)){
								
								echo 		"<tr>";
								echo 			"<td ><img src='foomenu/".$getfoodinfo['Image']."' class='image'></td>";
								echo 			"<td>".$getfoodinfo['FoodItemall']."</td>";
								echo 			"<td><input type='number' id='Pricebox' name='price[]'></td>";
								echo 	"<td><input type='checkbox' name='check[]' value='".$getfoodinfo['RowID']."'></td>";

								//echo 	"<td><input type='checkbox' name='ArrayName[][]' value='$ArrayName'></td>";



								echo 		"</tr>";}
								echo 	"</tbody>";
								echo "</table>";
								echo "<input type='submit' name='insert' id='save' class='btn transferrow'/>";
							?>
						</form>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
</html>