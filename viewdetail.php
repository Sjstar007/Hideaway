<?php
session_start();
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
		$ID =$_GET['bookid'];
		$query =  "select * from restrodetail where Restro_name like  '%$ID%' ";
		 $chkk=mysqli_query($connection,$query);
		 $row=mysqli_fetch_array($chkk);
?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" href="font/css/fontawesome.min.css">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/viewdetail.css">
	<link rel="stylesheet" type="text/css" href="font/css/all.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>ViewDetail</title>


 
	<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
   $("#flip").click(function(){
    $("#panel1").hide("slow");
    $("#panel2").hide("slow");
  });
});
$(document).ready(function(){
  $("#flip1").click(function(){
    $("#panel1").slideToggle("slow");
  });
   $("#flip1").click(function(){
    $("#panel").hide("slow");
    $("#panel2").hide("slow");
  });
});
$(document).ready(function(){
  $("#flip2").click(function(){
    $("#panel2").slideToggle("slow");
  });
   $("#flip2").click(function(){
    $("#panel").hide("slow");
    $("#panel1").hide("slow");
  });
});
</script>

</head>
<body>

	<div class="container-fluid head1">
		<div class="row">
			<div class="col-6">
				<h1>Hideaway</h1><br>
			</div>
			<div class="col-3"></div>
			<div class="col-3">
				<?php 
					if(!isset($_SESSION['name']))
						{

				 ?>
				<a href="login.php"><button id="btn"><i class="fas fa-user-circle"></i>  Account</button> </a>
				<?php }else {   ?>
				<div id="btnn"><i class="fas fa-user-circle"></i>   	<?php echo $_SESSION['name'];?></div>
				
			<?php } ?>
			</div>
		</div><hr>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10 box">
				<div id="carousel-id" class="carousel slide " data-ride="carousel">
					
	 				<div class="carousel-inner" role="listbox">
     				<div class="carousel-item active">
        			<img src="Admin/file/<?php echo $row['Image'];?>" alt="First slide" class="img-fluid">
      				</div>
      				<div class="carousel-item">
        				<img src="image/bgg3.png" alt="second slide" class="img-fluid">
      				</div>
      				<div class="carousel-item">
        				<img src="image/bgg2.png" alt="third slide" class="img-fluid">
      				</div>
    				</div>

    				<ol class="carousel-indicators">
     					<li data-target="#carousel-" data-slide-to="0" class="active"></li>
      					<li data-target="#carousel" data-slide-to="1"></li>
      					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
   					</ol>

    				<p class="text-xs-center">
     				<a class="" href="#carousel-id" role="button" data-slide="prev">
       			    	<span class="icon-prev" aria-hidden="true"></span> <i class="fas fa-chevron-left"></i> </a>&emsp;
      				<a class="l" href="#carousel-id" role="button" data-slide="next">
        				<span class="icon-next" aria-hidden="true"></span> <i class="fas fa-chevron-right"></i> </a>
    				</p>
				</div>
			</div>
			<div class="col-1"></div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-6 text">
				<h2><?php echo $row['Restro_name'];?></h2>
				<i class="fas fa-map-marker-alt"></i><p><?php echo $row['Location'];?></p>
				<i class="far fa-clock"></i><p id="locat">Open Hours : 10am to 10pm</p>
				
			</div>
			<div class="col-5"><?php
				echo "<a href='book.php?Prebookid=".$row['Restro_name']."'><button class='btn' id='PreBook'>PreBook</button></a>"
				?>
			</div>
		</div>
	</div>
	<div class="container-fluid subbox">
		<div class="row  ">
			<div class="col-4 block" id="flip">Ratings and reviews</div>
			<div class="col-4 block" id="flip1"> Details</div>
			<div class="col-4 block" id="flip2">Location</div>
		</div>

		<div id="panel">
			<div class="row subblock">
				<div class="col-3"></div>
				<div class="col-6">Panding......</div>
				<div class="col-3"></div>
			</div>
		</div>
		<div id="panel1">
			<div class="row subblock">
				
				<div class="col-12">
				
						<?php echo $row['Detail'];?>
				
				</div>
				
			</div>
		</div>
		<div id="panel2">
			<div class="row subblock">
				<div class="col-3">Rating</div>
				<div class="col-6">Detail</div>
				<div class="col-3"></div>
			</div>
		</div>
	</div>
	

	
	<div class="container-fluid" id="id">
		 <div class="row">
		 	<div class="footer">
		 		<h2>Hideaway</h2>
		 		
		 	</div>
		 </div>
	</div>
</body>
</html>