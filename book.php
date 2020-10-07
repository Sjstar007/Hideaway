 <?php
 error_reporting();
session_start();
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
	$ID =$_GET['Prebookid'];
	
		$query =  "select * from restrodetail where Restro_name like  '%$ID%' ";
		 $chkk=mysqli_query($connection,$query);
		 $row=mysqli_fetch_array($chkk);

		


?>

<!DOCTYPE html>
<html>
<head>
		
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="js/j.main.js"></script>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/book.css">
	<link rel="stylesheet" type="text/css" href="font/css/all.min.css">
<script src="js/jquery.js"></script>
<script src="js/cart.js"></script>

</head>
<body>
	<div class="container-fluid head1">
		<div class="row">
			<div class="col-6">
				<h1 id="h1">Hideaway</h1><br>
			</div> 
			<div class="col-6">
				<?php 
					if(!isset($_SESSION['name']))
						{

				 ?>
				<a href="Login.php"><button id="btn" onclick=""><i class="fas fa-user-circle"></i>  Account</button></a>
				<a href="#!" data-toggle="modal" data-target="#cart"><i class="fab fa-opencart"></i><span class="cart-itmes">( 0 )</span></a>
			
				<?php }else {   ?>
				<div id="btnn">
	<a href="#!" data-toggle="modal" data-target="#cart"><i class="fab fa-opencart"></i><span class="cart-itmes">( 0 )</span></a>
					<i class="fas fa-user-circle"></i>   	<?php echo $_SESSION['name'];?></div>
				
			<?php } ?>				
			</div>
			</div><hr>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<h2 id="h2"><?php echo $row['Restro_name'];?></h2><br>
				<i class="fas fa-map-marker-alt"></i><p id="p"><?php echo $row['Location'];?></p>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			
		</div> 
	</div>

	<div class="container">
		<div class="row">
			<h2 style="font-family: high tower text;">Indian</h2>
			<div class="flex-container ">
				<?php
				 $FoodTable = "Zmenu_".preg_replace("! !","_",$ID);
			     $query1="select * from $FoodTable";
			    $chk1=mysqli_query($connection,$query1);

			    while ($getname=mysqli_fetch_array($chk1)) {
			    	$Pname=$getname['FoodItem'];
			    	$Pid=$getname['ROWID'];
			    	$id=$getname['ID'];
			    	$Pprice=$getname['Price'];
			    	$image=$getname['Soon1'];
			    	$rrid=$row['RowID'];
			    	echo "<div class='foodblock'>";
		
							echo "<img src=Admin/foomenu/".$getname['Soon1']." class='img-responsive'>";
							echo "<div class='content'>";
						 	echo 	"<h3>".$getname['FoodItem']."</h3>";
                         	echo "<p>Hello</p>";
                         	echo 	"<h5 value=''>Rs.".$getname['Price']."</h5>";
echo 	"<button  class='btnn ' type='submit'  onclick= add_to_cart('$Pid','$Pname','$Pprice','$id','$image','$rrid')>Add<i class='fas fa-plus'></i></button>";
							echo "</div>";
							echo "</div>";
					
			    }
		
			?>

			</div>
			 
			<!--<div id="cart"><h3>Cart</h3></div>
			<div id="display_data"></div>-->
		</div>
<?php include 'cartview.php';?>

 


</div> 

</body>
</html>

