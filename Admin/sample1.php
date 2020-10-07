<!DOCTYPE html>
<html>
<head>
		<title>AdminUIOne</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/AdminUIOne.css">
<link rel="stylesheet" type="text/css" href="css/gearbox.css">
<script src="../js/jquery.js"></script>
</head>
<body>

</body>
</html>
<?php
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
	
	
if(isset($_GET['sr']))
{
		     $name = $_GET['sr'];  
		 $query="select * from foodmenuall where FoodItemall like '%$name%'";
		$chk1=mysqli_query($connection,$query);

	while($row=mysqli_fetch_array($chk1))
	{	
		
		echo "<a href='AdminUIOne.php?vgname=".$row['RowID']."'> <h4>".$row['FoodItemall']."<img src='foomenu/".$row['Image']."'></h4></a><hr>";




		echo 		"<tr>";
								echo 			"<td ><img src='foomenu/".$row['Image']."' class='image'></td>";
								echo 			"<td>".$row['FoodItemall']."</td>";
								echo 			"<td><input type='number' id='Pricebox' name='price[]'></td>";
								echo 	"<td><input type='checkbox' name='check[]' value='".$row['RowID']."'></td>";
								echo 		"</tr>";
	}
}

			/*$rownumber = uniqid();
			$Foodname =$_GET['vgname'];
			$RName=$_SESSION['Rname'];
			echo $FoodTable = "Zmenu_".preg_replace("! !","_",$Rname);
        	echo $foodQ="insert into $FoodTable set ROWID='$rownumber',FoodItem = '$Foodname'";
			$Known=mysqli_query($connection,$foodQ);
*/
 
?>
