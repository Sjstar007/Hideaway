<?php
session_start();
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
 
 
		if (isset($_POST['submit'])){
						
						$mail=$_POST['Email'];
						$password=$_POST['Password'];

            $querys="select * from restrodetail where Email ='$mail' and Password='$password' "; 

          $record=mysqli_query($connection,$querys);

          $check=mysqli_num_rows($record);
          

         if ($check == 1) {

         		/*echo " login successful";*/
         	 $row=mysqli_fetch_array($record); 
			   $_SESSION['email'] = $row['Email'];
			   $_SESSION['ID'] = $row['RestroID'];
			   $_SESSION['ID2'] = $row['RowID'];
			   $_SESSION['Rname'] = $row['Restro_name'];
         	header("Location: AdminUIOne.php");
         }
         else {
         echo	"login failed";
         }
	

	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>
		<link rel="stylesheet" type="text/css" href="font/css/all.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				<h1>Admin Login</h1>
			</div>
			<div class="col-3"></div>
		</div>
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				<form method="post">
					<input type="email" name="Email" placeholder="Enter your Email" class="form-control">
					<input type="password" name="Password" placeholder="Enter your Password" class="form-control">
					<input type="submit" name="submit" value="Login" class="btn" id="btn">
				</form>
				<h3><a href="adminregister.php">Sign-up</a></h3>
			</div>
			<div class="col-3"></div>
		</div>
	</div>
</body>
</html>