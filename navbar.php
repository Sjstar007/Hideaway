<?php
session_start();
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
	$restrodetail = " select * from category ";

		$record=mysqli_query($connection,$restrodetail);       
		
?>

<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/navbarcss.css">
	<link https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>

	
	<title>Hideaway | Home</title>
	<script>
		function search_restrolist() {
			li=document.getElementById("search_Datarestrolist").value
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("table_data").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "search.php?list="+li, true);
	xhttp.send();
}


$(document).ready(function(){
	$(".flip").click(function(){
	$(".panel").slideToggle("slow");
	});
});
</script>
 
</head>
<body>
	<div class="container-fluid head1">
		<div class="row">
			<div class="col-sm-4">
				<h1>Hideaway</h1><br> 
				<p>always welcome</p>
			</div>
			<div class="col-2"></div>
			<div class="col-sm-6 nav ">
				<?php 
					if(!isset($_SESSION['name']))
						{

				 ?> 
				<div style="flex-grow: 1;"><a href="navbar.<?php  ?>">Home</a></div>
				<div style="flex-grow: 1;"><a href="Event.php" onclick="Event_Data_List();">Event</a></div>
				<!-- <div style="flex-grow: 1;"><a href="About">About_us</a></div>	 -->
				<div style="flex-grow: 1;"><a href="Login.php">Log in</a></div>
				<div style="flex-grow: 1;"><a href="Signup.php">Register</a></div>
			<?php }else {   ?>
				<div style="flex-grow: 1;"><a href="About">About_us</a></div>
				<div style="flex-grow: 1;"><a href="Event.php" onclick="Event_Data_List();">Event</a></div>
				<div style="flex-grow: 1;"><?php echo $_SESSION['name'];?></div>
				<a href="logout.php">Log out</a>
			<?php } ?>
			</div>
		</div>
	</div>

	<div class="container-fluid cont " id="id">
		<div class="flexcon">
			<!-- <div style="flex-grow: 2; color: rgb();"><h3>Jodhpur</h3></div> -->
			<div>
				<form>
					<select class=" custom-select" id="search_Data"  name="search" onchange="search_restro();" >
 						<option selected disabled="">Select your place</option>
 						<?php  while($row=mysqli_fetch_array($record)){  ?>
 			 			<option value = "<?php echo $row['Category_name'] ?>" ><?php echo $row['Category_name'] ?></option>
 			 			<?php }?>
					</select>
				</form>
			</div>
			<!-- <div style="flex-grow: 1;">
				<select class="browser-default custom-select custom">
 					<option selected disabled="">Theme</option>
 			 		<option value="1" >Regular</option>
 			 		<option value="2">Birthday</option>
 			 		<option value="3">Anyversery</option>
 			 		<option value="3">Party</option>
				</select>
			</div>


			<div style="flex-grow: 1;">
				<button class="btn" type="submit" id="search">Search</button>
			</div> -->
			
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-5">
				<h2>Restaurent</h2>
			</div>
			<div class="col-7">
					<input type="text" name="SearchRestro" placeholder="Search Place You Know" class="form-control" onkeyup="search_restrolist()" id="search_Datarestrolist">
			</div>
		</div>
	</div>

	<div id="table_data">
		
	</div>
	<?php 
		 $query="select * from restrodetail";
		$chk1=mysqli_query($connection,$query);

	while($row=mysqli_fetch_array($chk1))
	{	
		echo "<div class='container-fluid con' id='id'>";
	echo 	"<div class='row'>";
		echo	"<div class='col-2 flex-item'><img src='Admin/file/".$row['Image']."' >	</div>";
			echo  	"<div class='col-md-7' id='content'>";
				echo 	"<h4>".$row['Restro_name']."</h4>";
			//	echo 	"<h6>".$row1['Category_name']."</h6>";
			echo 	"<div class='box1 flip'>";
				echo	"<h6><i class='fas fa-map-marker-alt'></i>".$row['Location']."</h6>";
			echo 	"</div>";
				echo 	"<h6 id='review'>Very good<span id='color'>(1900 reviews)</span></h6>";
				echo 	"<p id='review'>Excellent: service Extremely clean</p>";
			echo 	"</div><div class='line'></div>";
			echo 	"<div class='col-3'>";
				echo "<a href='viewdetail.php?bookid=".$row['Restro_name']."'><button class='btn' id='btnn'>view detail</button></a>";
				echo "<a href='book.php?Prebookid=".$row['Restro_name']."' ><button class='btn'>Book now</button></a>";
			echo "</div>";
		echo "</div>";
		echo "<div class='panel'>";
			echo "<div class='row'>";
			echo 	"<div class='col-4'>Google Map</div>";
			echo	"<div class='col-8'>";
			echo		"<h4 id='h4'>".$row['Location']."</h4><br>";

			echo	"</div>";
			echo "</div>";
		echo "</div>";

	echo "</div>";
		
	}
	?>


	<div class="container-fluid" id="id">
		 <div class="row">
		 	<div class="footer">
		 		<h2>Hideaway</h2>
		 		
		 	</div>
		 </div>
	</div>
	
			
	
</body>
<script src="js/jquery.js"></script>
	<script src="js/ajax.js"></script>
	<script src="js/bootstrap.min.js"></script>
</html>