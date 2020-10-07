<?php  
session_start();
error_reporting();	
//For connection 
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
				// for Session Id =Rstro Id2 = row
					$RestroID=$_SESSION['ID']; 
					$RestroID2=$_SESSION['ID2'];
	// check admin is login or not 
		    $logincheck = "select * from restrodetail where RestroID = '".$RestroID."' " ;
			$result1=mysqli_query($connection,$logincheck);
		    $row=mysqli_fetch_array($result1); 

	// check data is all ready inserted or not		
		    $Datacheck = "select * from location where RowID = '".$RestroID2."' " ;
			$result2=mysqli_query($connection,$Datacheck);
			$row1=mysqli_fetch_array($result2);

			if(isset($_POST['insert']))
       		{
          		    $location = $_POST['location'];
           			$location1 = $_POST['location1'];
           			$location2 = $_POST['location2'];
          			$detail = $_POST['detail'];
            		$numb = $_POST['number'];
 				// check Data is olredy exciest or not  
 				if($row1['RowID'] == $RestroID2){
          			 $query1="update location set State='$location',City = '$location1',plocation='$location2' where RowID = '".$RestroID2."'";
        			}
        		else{
        	 		$query1="insert into location set State='$location',City = '$location1',plocation='$location2',RowID = '".$RestroID2."'";
					}
              $query="update restrodetail set Location='$location2,$location1,$location',Number ='$numb', Detail='$detail'  where RestroID = '".$RestroID."'";

             $result=mysqli_query($connection,$query1);
             $result=mysqli_query($connection,$query);

          if($result == true)
          {
          	echo'<script type="javascript">';
			echo 'alert("data insert")';
			echo '</script>';
          }
          else
          {
          	echo'<script type="javascript">';
			echo 'alert("data not insert")';
			echo '</script>';
          }

       }
//Image upload
      if(isset($_POST['insert'])) {
      		
      			$c=count($_FILES['xfile']['name']);
      			$filename  = $_FILES['xfile']['name'];
      			$temp    = $_FILES['xfile']['tmp_name'];
      	for ($i=0; $i < $c ; $i++) { 
      		  
      	
      	    $img=uniqid().$filename[$i];


			   $path = "file/".$img;
			   
			   $data=move_uploaded_file($temp[$i],$path);
			   
			   if($data == true)
			   {
				
				   $file=$img;
				   $qry="insert into Images set Image='$file' , ImageRowID='".$RestroID2."'";
				   $result=mysqli_query($connection,$qry);
				   
				      if($result == true)
					  {
					  		echo'<script type="javascript">';
						  echo 'alert("successfully")';
						  echo '</script>';
					  }
					  else
					  {//Not working
					  
						  echo'<script type="javascript">';
						  echo 'alert("data not insert")';
						  echo '</script>';
					  }
			   
				   
			   }
			   else
			   {
				    echo'<script type="javascript">';
						  echo 'alert("img not upload")';
						  echo '</script>';
			   }
		}
	}

//Youtube method
		/*if (isset($POST['insert'])) {
			$filename = $_FILES['xfile']['name'];
			$tempname = $_FILES['xfile']['tempname'];
			$filetype = $_FILES['xfile']['type'];
			for ($i=0; $i <=count($tempname) ; $i++) { 
				$name = addslashes($filename[$i]);
				$temp = addslashes(file_get_contents($tempname[$i]));
				echo $temp; 

			}
		}*/
?>


<!DOCTYPE html>
<html>
<head>
	<title>AdminUIOne</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/AdminUIOne.css">
<link rel="stylesheet" type="text/css" href="../font/css/all.min.css">
<link rel="stylesheet" type="text/css" href="css/gearbox.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 sidenavb">
				<h2>Dashboard</h2>
				<hr>
				<a  href="Dashboard.php">DASHBOARD</a>
				<a  href="Inbox.php">INBOX</a>
				<a  href="Event.php">EVENT'S</a>
				<a  href="AddFood.php">ADD FOOD</a>
				<a   href="Viewmenu.php">Viewmenu</a>
				<a class="active" href="AdminUIOne.php">EDIT PROFILE</a>
				<a  href="Userorder.php">TABLE</a><hr>
				<a href="logout.php">Log out</a>
			</div>
		</div>
		<div class="row content">
			<div class="col-2"></div>
			<div class="col-4">
				<h3>Profile</h3>
			</div>
			<div class="col-6">
				<!--<input type="text" name="" id="search" class="form-control" placeholder="Search........">-->
			</div>
		</div>
	<div class="idcolor">	
		<div class="row">
			<div class="col-12"> 
				<div class="inboxcontent">
					<h3 style=" margin-left: 10px; margin-top: 5px;">Edit Profile</h3>
					<form method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-5">
								<label class="lable1">Restro Name</label>
								<input type="text" name="restroname" id="restroname" placeholder="Restaurant name" class="form-control" value="<?php echo $row['Restro_name'];?>" >
							</div>
							<div class="col-3">
								<label class="lable">User Name</label>
								<input type="text" name="" placeholder="user name" class="form-control">
							</div>
							<div class="col-4">
								<label class="lable">Email</label>
								<input type="email" name="restroemail" placeholder="Enter Email" class="form-control" value="<?php echo $row['Email'];?>">
							</div>
						</div>
						<div class="row">
							<div class="col-4">
								<label class="lable4">Mob. Number</label>
								<input type="number" id="number" name="number" placeholder="Enter number" class="form-control" value="<?php echo $row['Number'];?>">
							</div>
							<div class="col-8">
								<label class="lable2">Address</label>
								<input type="text" id="Address" name="location2" placeholder="Address" class="form-control" value="<?php echo $row1['Plocation'];?>">
							</div>
						</div>
						<div class="row">
							<div class="col-4">
								<label class="lable3">City</label>
								<input type="text" id="city" name="location1" placeholder="City" class="form-control" value="<?php echo $row1['City'];?>">
							</div>
							<div class="col-4">
								<label class="lable">State</label>
								<input type="text" name="location" id="state" placeholder="State" class="form-control" value="<?php echo $row1['State'];?>">
							</div>
							<div class="col-4">
								<label class="lable">Zip code</label>
								<input type="text" name="" id="zip" placeholder="Zip code" class="form-control">
							</div>
						</div>
					<textarea rows="4" name="detail" cols="80" class="form-control textarea" value="<?php echo $row['Detail'];?>"></textarea>
					<input type="file" name="xfile[]"class="form-control" accept="image/png,image/jpeg" multiple="multiple" multipart= >
						<input type="submit" name="insert" class="btn" />

				</form>
				<button class="gearbox"><i class="fas fa-cog" id="loading"></i></button>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
</html>