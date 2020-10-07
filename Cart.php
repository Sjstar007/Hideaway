<?php
session_start();
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
$getid=$_SESSION['rid'];
$uname=$_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
		<meta charset="utf-8">	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/book.css">
</head>
<body> 
<div>
	<h1>Your cart product</h1>
	<?php 
	$Userdetail = "user_".preg_replace("! !","_",$uname);

		  echo $quer2="select * from orderdetail where UserID='$getid'";
						$chk6=mysqli_query($connection,$quer2);
						
					while($get=mysqli_fetch_array($chk6)){
						//echo "<h3>".$get['Orderid']."</h3>";
		  				echo $quer3="select * from $Userdetail where Orderid='".$get['Orderid']."'";
		  				 $chk7=mysqli_query($connection,$quer3);
		  				 while($get=mysqli_fetch_array($chk7)){
		  				 	echo "<h3>this is cart".$get['ProductName']."</h3>";
		  				 }

					}				
	?>
	
</div> 
</body>
</html>