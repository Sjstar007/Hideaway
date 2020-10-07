 <?php
 error_reporting(0);
session_start();
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
	$ID =$_GET['ebook'];
	$userrow=$_SESSION['rid'];
	$ID2 =$_SESSION['rid'];
	if ($ID2 != true) {
		//echo "<script type='text/JavaScript'>alert('You are not login......!!!!!!!!!!');</script>";
	}


			      $query1="select * from event where RowID = '".$ID."'";
			    $chk1=mysqli_query($connection,$query1);

			    $row=mysqli_fetch_array($chk1);
			    	$a = $row['RestroID'];
			    	$b = $row['Categorytype'];
			    	$c = $row['Eventname'];
			    	$d = $row['Offers'];
			    	$f = $row['Price'];
			    	$g = $row['EventDateTO'];
			    	$h = $row['EventDateFrom'];
			    	$i = $row['EventAddress'];
			    	$j = $row['EventDetail'];
			    	$k = $row['RowID'];
			    	if ($userrow == true) {
			    		
			    	if (isset($_POST['submit'])) {
			    		$member=$_POST['member'];
			    		$totalprice=$member*$f;
			    		$eventrow = uniqid();
			    	  	$eventbook = "insert into eventbooking set eventid = '$k', userrow='$userrow', member='$member',Date=CURRENT_TIMESTAMP,time= CURRENT_TIMESTAMP,eventdate='$g',eventtime='$c',totalprice='$totalprice',eventrow='$eventrow' ";
			    	  	$inserted = mysqli_query($connection,$eventbook);
			    	  	if ($inserted == true) {
			    	  		echo "data gya";
			    	  	}
			    	  	else {
			    	  		echo "Data nhi gya ";
			    	  	}
			    	  } 
			    	}
			    	else{
			    		echo "login first.....!!!!!!!!!";
			    	}
		

?>

<!DOCTYPE html>
<html>
<head>
		
 
  <script src="js/j.main.js"></script>
 
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/eventbooking.css">
	<link rel="stylesheet" type="text/css" href="css/eevent.css">
<script src="js/jquery.js"></script>
<script src="js/eventcart.js"></script>

</head>
<body>
	<div class="container-fluid head">
		<div class="row">
			<div class="col-sm-5">
				<h1>Hideaway</h1><br> 
				<p>always welcome</p>
			</div>
			<div class="col-sm-4"></div>
			<div class="col-sm-3 nav ">
				<?php 
					if(!isset($_SESSION['name']))
						{

				 ?>	
				<div style="flex-grow: 1;"><a href="Login.php">Log in</a></div>
				<div style="flex-grow: 1;"><a href="Signup.php">Register</a></div>
			<?php }else {   ?>
				<div style="flex-grow: 1;"><?php echo $_SESSION['name'];?></div>
				<a href="logout.php">Log out</a>
			<?php } ?>
			</div>
		</div>
	</div>
			

	<div class="container-fluid">
		<div class="row">
			
			<div class="hole">
			<div class="content-left">
				<img src="Admin/file/<?php echo $b; ?>">
			</div>
			<div class="content-right">
			<h1><?php echo $c; ?></h1>
			<h4>Event Type</h4>
			<h6><?php echo "DateFrom-".$g."<br> DateTo-".$h ?></h6>
			<h4><?php echo $i; ?></h4>
			<div class="textarea"  disabled=""><?php echo $j; ?></div>
			<h3 class="prieceevent">Price </h3>
				<span><?php echo $f; ?></span>
				<form method="post">
		
					<input type="number" name="member" required="" placeholder="enter members">
			<button class="btn" type="submit" name="submit">Confirm Booking</button>
			<form method="post">	
			</div>
		</div>
			<div class="footer">
				<h1>Hideaway</h1>
			</div>
		


 


</div> 

</body>
</html>
 
	