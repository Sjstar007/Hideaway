<?php
error_reporting(0);
 session_start();
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
			// fatching data for show in frontend
			$restrodetail = " select * from category ";

          $rec=mysqli_query($connection,$restrodetail);      

	if (isset($_POST['submit'])) {
		
// Name Validation
    		if (empty($_POST["Uname"])) {
    			echo "Please enter Name";
			}
			elseif(!preg_match ("/^[a-zA-z]*$/", $name)){
		 		$ErrMsg = "Only alphabets and whitespace are allowed.";  
             	echo $ErrMsg;
			}
			else{
				echo $name = $_POST["Uname"];
			}
		$email = $_POST['Uemail'];
		$password = $_POST['Upassword'];
		$location = $_POST['location'];
        $location1 = $_POST['location1'];
        $location2 = $_POST['location2'];
        $detail = $_POST['detail'];
        $numb = $_POST['number'];
		$row = uniqid();
		$cat = $_POST['Option12'];
		/*if ($cat == 'Restaurant') {
				 $Restro_Code = "R_".$name;
					
		}
		elseif ($cat == 'Pool' ) {
			 $Restro_Code = "P_".$name;
		
		}
		elseif ( $cat == 'Cafe & lounge') {
			 $Restro_Code = "C_".$name;
				
		}
		else{
			 $Restro_Code = "B_".$name;
				
		}*/
		//check Availability
		  $dcheck = " select * from restrodetail where Email = '$email' or Restro_name = '$name' ";
		 $record=mysqli_query($connection,$dcheck);
		 $check=mysqli_num_rows($record);
	
		if($check == 1){ 
				echo "data exiest";
		}
		else
		{
			
		 $insert = " insert into restrodetail set Restro_name = '$name', Email = '$email', Password = '$password',RowId ='$row', CategoryID = '$cat',Location='$location2,$location1,$location',Number ='$numb', Detail='$detail'";
		 $query1="insert into location set State='$location',City = '$location1',plocation='$location2',RowID = '$row'";
		 $result=mysqli_query($connection,$query1);
		 $rt=mysqli_query($connection,$insert);
		 //create a new table for food
		 	$FoodTable = "Zmenu_".preg_replace("! !","_",$name);
		 $create = "CREATE TABLE $FoodTable(ID int(255) AUTO_INCREMENT PRIMARY KEY,ROWID varchar(255)NOT NULL,FoodItem varchar(255) NOT NULL,Price int(25) NOT NULL,Rating varchar(255)NOT NULL,Soon1 varchar(255)NOT NULL,soon2 varchar(255)NOT NULL)"; 
		  $result1 = mysqli_query($connection,$create);

			
	
		    
		        $img=uniqid().$_FILES['xfile']['name'];
		      /* echo $img=$_FILES['xfile']['size']."<br>";
		       echo $img=$_FILES['xfile']['tmp_name']."<br>";
		       echo $img=$_FILES['xfile']['type']."<br>";*/
			   
			   $path = "file/".$img;
			   
			   $data=move_uploaded_file($_FILES['xfile']['tmp_name'],$path);
			   
			   if($data == true)
			   {
				 
				   $file=$img;
				   $qry="update restrodetail set Image='$file' where RowId = '$row'";
				   $result=mysqli_query($connection,$qry);
				   
				      if($result == true)
					  {
						  echo "data insert";
						 
					  }
					  else
					  {
						  echo "data not insert";
					  }
			   
				   
			   }
			   else
			   {
				   echo "img not upload";
			   }
			   	if ($result == true) {
					header("Location: index.php");
				}
				else{
					echo "You Enter Wrong Detail";
				}
		  
		 
	 }
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>AdminRegister</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/adminregister.css">
	<link rel="stylesheet" type="text/css" href="font/css/all.min.css">
	<link https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				<form method="post" enctype="multipart/form-data">
					<input type="text" name="Uname" placeholder="name" class="form-control" required="">
					<input type="email" name="Uemail" placeholder="email" class="form-control" required="">
					<input type="password" name="Upassword" placeholder ="password" class="form-control" required="">
					<input type="text" name="location" class="form-control" placeholder="state"  placeholder="Enter State">
						<input type="text" name="location1" class="form-control" placeholder="City" placeholder="Enter City">
						<input type="text" name="location2" class="form-control" placeholder="landmark" placeholder="Enter Detail">
						<textarea id = "myTextArea" name="detail" rows = "3" cols = "80"></textarea>
						<!--<input type="text" name="detail" class="form-control" placeholder="Detail">-->
						<input type="number" name="number" class="form-control" placeholder="Number" placeholder="Enter Number">
						<select  name="Option12" class="browser-default custom-select">
 							<option selected disabled="">Select your place</option>
 			 					<?php  while($row=mysqli_fetch_array($rec)){  ?>
 			 					<option   value=" <?php echo $row['Category_name'] ?>" > <?php echo $row['Category_name'] ?></option>
 			 					<?php }?> 
						</select>
	    				<input type="file" name="xfile" required="" />

						<input type="submit" name="submit" value="Register" class="form-control">
				</form>
			</div>
			<div class="col-3"></div>
		</div> 
	</div>
</body>
</html>