<?php
session_start();
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");   


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Event</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/event.css">
		<link rel="stylesheet" type="text/css" href="font/css/all.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
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
		
			<h1 id="h1">Event</h1><hr><hr id="hr"><i class="far fa-calendar-alt"></i>
		
	</div>

<?php
		$query1="select * from event";
		$chk1=mysqli_query($connection,$query1);

	while($row=mysqli_fetch_array($chk1))
		{
	echo "<a href='eventbooking.php?ebook=".$row['RowID']."'> <div class='flex'>";
		echo	"<div class='flip-container' >";
			echo "<div class='flipper'>";
				echo "<div class='front'>";
					echo "<img src='Admin/file/".$row['Categorytype']."'>";
					echo "<h3>".$row['Eventname']."</h3>";
				echo "</div>";
				echo "<div class='back'>";
					echo "<h3>About Event</h3>";
					echo "<p>".$row['EventDetail']."</p>";
					echo "<img src='Admin/file/".$row['Categorytype']."'>";
					echo "<div class='box12'>";
						echo "<h5>".$row['restaurname']."</h5>";
					echo "</div>";
						
				echo "</div>";
			echo "</div>";
			echo "</div>";
	echo "</div></a>";
}
?>

</body>
</html>