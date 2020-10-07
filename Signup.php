 <?php
 error_reporting(0);
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
				

	if (isset($_POST['submit'])) {

// Name Validation
    		if (empty($_POST["name"])) {
    			echo "Please enter Name";
			}
			elseif(!preg_match ("/^[a-zA-z]*$/", $name)){
		 		$ErrMsg = "Only alphabets and whitespace are allowed.";  
             	echo $ErrMsg;
			}
			else{
				echo $name = $_POST["name"];
			}
 // Email Validation

			$email = $_POST ["email"];  
			$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
			if (!preg_match ($pattern, $email) ){  
    			$ErrMsg = "Email is not valid.";  
            	echo "<script type='text/JavaScript'>alert('$ErrMsg')</script>" ; 	
			} else {  
    		$newemail = $email;  
			} 	 

//password validation
		$password = $_POST['password'];
		$number = $_POST['number'];
			$row = uniqid();

			$dcheck = " select * from userdetail where Email = '$newemail' or Name = '$name' ";
		 $record=mysqli_query($connection,$dcheck);
		 $check=mysqli_num_rows($record);
	
		if($check == 1){ 
				echo "data exiest";
		}
		else
		{

		 $insert = " insert into userdetail set Name = '$name', Email = '$newemail', Password = '$password',Number ='$number',RowID = '$row'";
		$result=mysqli_query($connection,$insert);
		 //create a new table for food
		 	$Userdetail = "User_".preg_replace("! !","_",$name);
		  $create = "CREATE TABLE $Userdetail(Billid int(255) AUTO_INCREMENT PRIMARY KEY,Orderid varchar(255) NOT NULL,Billdate Date NOT NULL,ProductName varchar(255)NOT NULL,Amount varchar(255)NOT NULL,Discount varchar(255)NOT NULL,billtime Time NOT NULL,Restroid varchar(255)NOT NULL,Soon2 varchar(255)NOT NULL)"; 
		  $result1 = mysqli_query($connection,$create);

		if ($result == true) {
		
			echo "<script type='text/JavaScript'>alert('data insert ho gya')</script>" ; 	
			header("location:Login.php");
		}
		else{
			echo "<script type='text/JavaScript'>alert('data is not  inserted')</script>" ; 	
		}
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<link rel="stylesheet" type="text/css" href="font/css/all.min.css">
</head>
<body>
	<h1>Registeration</h1>
	<div class="container-fluid">
		 <div class="row">
		 	<div class="col-3"></div>
		 	<div class="col-6">
		 			<form method="post">
					<input type="text" name="name" placeholder="Name" class="form-control"><i class="fas fa-user"></i></input>
					<input type="email" name="email" placeholder="Enter your Email" class="form-control" id="test">
					<i class="fas fa-envelope-square"></i></input>		
					<input type="number" name="number" placeholder="Enter your Mobile no	" class="form-control" id="test">		
					<input type="password" name="password" placeholder="Enter your password" class="form-control" id="test">
					<i class="fas fa-lock"></i></input>
					
					<input type="submit" name="submit" class="btn btnn" value="Register">
				</form>
		 	</div>
		 	
		 	<div class="col-3">

		 </div>
	</div>
</body>
</html>