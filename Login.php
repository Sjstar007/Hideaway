<?php
session_start();
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");


		if (isset($_POST['submit'])){
						
						$mail=$_POST['email'];
		                $password=$_POST['password'];

            $querys="select * from userdetail where Email ='$mail' and Password='$password' "; 

          $record=mysqli_query($connection,$querys);

          $check=mysqli_num_rows($record);


         if ($check == 1) {
         	$rec=mysqli_fetch_array($record); 
         		echo " login successful";
         		 $_SESSION['name'] = $rec['Name'];  
         		 $_SESSION['rid'] = $rec['RowID'];  
				header("Location: navbar.php");
         }
         else {
         echo	"login failed";
         }
	

	}
?>	


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
		<link rel="stylesheet" type="text/css" href="font/css/all.min.css">
	
	<script src="js/jquery.js"></script>
	<script src="js/animat.js"></script>
	<script src="js/bootstrap.min.js"></script>


	<!--<script>
		$(document).ready(function(){
  $(".push").click(function(){
    $(this).hide();
  });
});

		$("#button").click(function(){
			$("test").hide();
			$("test").show();
		});
</script>
*/--> 
 



</head>
<body >

	<div class="container-fluid bodybox ">
		<div class="row">
			<div>
				<h1>Log in</h1>
					
				<span class="use">
 					 <i class="fas fa-user"></i>
				</span>
				<hr id="hr"><hr>
			</div>
			<div>
				<form method="post">
					
					<input type="email" name="email" placeholder="Enter your Email" class="form-control" id="test" required="">
					
					<input type="password" name="password" placeholder="Enter your password" class="form-control" id="test">
					<input type="submit" name="submit" class="btn btnn" value="Login">
				</form>
			</div>
			<div>
				<p>Or login with</p>
			</div>
			<!--<div class="box1">
				<span class="fab fa-facebook-square"></span>
				<h6>Facebook</h6>
			</div>
			<div class="box2">
				<span class="fab fa-google"></span>
				<h6>Google</h6>
			</div>-->

			<button class="btn btn1">
				<span class="fab fa-facebook-square"></span>
				<h6>Facebook</h6>
			</button>
			<button class="btn btn2">
				<span class="fab fa-google"></span>
				<h6>Google</h6>
			</button>
			<h4>Not a member?<a href="Signup.php">Sign up now</a></h4>

		</div>
	</div>
	
</body>
</html>

<!--
 <i class="fas fa-user"></i> <i class="fab fa-user 5x"></i>  <i class="far fa-user"></i>
 	<span style="font-size: 150px; color: gray;margin-left: 80px;">
  <i class="far fa-user"></i>
</span>
		 style="height: 300px;width: 300px; background-color: orange; border-radius: 150px;\\\\











<div class="container-fluid ">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				<h1>Log in</h1>
				<span class="use">
 					 <i class="fas fa-user"></i>
				</span>
				<hr><hr id="hr">
			</div>
			<div class="col-3"></div>
		</div>
	</div>


	
		<div class="container-fluid" >
		<div class="row">
			<div class="col-1">	</div>
			<div class="col-5">
				<form>
					
					<input type="email" name="email" placeholder="Enter your Email" class="form-control" id="test">
					
					<input type="password" name="password" placeholder="Enter your password" class="form-control" id="test">
					<input type="submit" name="submit" class="btn" value="Login">
				</form>
			</div>
			<div class="col-1">	</div>
			<div class="col-5"></div>
		</div>
	</div>
			



	<div class="container-fluid push">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-2 box" >
				<span class="user">
 					 <i class="far fa-user"></i>
				</span>
				<h5>login as user</h5>
			</div>
			<div class="col-2"></div>
			<div class="col-2 box">
				<span class="user">
 					 <i class="far fa-user"></i>
				</span>
				<h5>login as user</h5>
			</div>
			
		</div>		
	</div>




	<i class="fab fa-facebook-square"></i>
	<i class="fab fa-google"></i>




-->











	