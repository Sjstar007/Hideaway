<?php
	session_start();
	error_reporting();	
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
	$RestroID2=$_SESSION['ID2'];
	$restronameevent=$_SESSION['Rname'];
	// check admin is login or not 
		    $logincheck = "select * from restrodetail where RowID = '".$RestroID2."' " ;
			$result1=mysqli_query($connection,$logincheck);
		    $row=mysqli_fetch_array($result1);


		    	// check data is all ready inserted or not		
		   $Datacheck = "select * from event where RestroID = '".$RestroID2."'" ;
			$result2=mysqli_query($connection,$Datacheck);
			$row1=mysqli_fetch_array($result2);

		if(isset($_POST['insert']))
     		{
     			$Ename = $_POST['EventName'];
     			$Dfrom = $_POST['DateFrom'];
     			$Dto = $_POST['DateTO'];
     			$time = $_POST['Time'];
     			$offer = $_POST['Offers'];
     			$price = $_POST['Price'];
     			$addr = $_POST['Address'];
     			$Detail = $_POST['Detail'];
				$rowid = uniqid();



					if($row1['Eventname'] == $Ename || $row1['EventDateFrom'] == $Dfrom || $row1['EventDateTO'] == $Dto  ){
          			echo "!!!!!!!!!!Data already inserted!!!!!!!!!!!!";
        			}
        			else{
     			$eventinsert="insert into event set Eventname='$Ename',RowID='$rowid',RestroID='$RestroID2',EventDateFrom = '$Dfrom',EventDateTo='$Dto',Time = '$time',Price = '$price',Offers='$offer',EventAddress='$addr', EventDetail='$Detail',restaurname='$restronameevent'";
		 		$eventrecord=mysqli_query($connection,$eventinsert);




		 			if ($eventrecord == true) {
						  echo"<script type='text/JavaScript'>alert('successfully....');</script>";
					//echo "sucess";
				}
				else{
						  echo"<script type='text/JavaScript'>alert('You Enter Wrong Detail');</script>";
					//echo "You Enter Wrong Detail" ;
				}

				/* Image upload  */
				
           $img=uniqid().$_FILES['xfile']['name'];


			   $path = "file/".$img;
			   
			   $data=move_uploaded_file($_FILES['xfile']['tmp_name'],$path);
			   
			   if($data == true)
			   {
				
				   $file=$img;
				   /*$qry="insert into event set Categorytype='$file'";*/
				   $qry="update event set Categorytype ='$file' where RowID = '$rowid'";
				   $result=mysqli_query($connection,$qry);
				   
				      if($result == true)
					  {
					  		echo'<script type="JavaScript">';
						  echo 'alert("successfully")';
						  echo '</script>';
					  }
					  else
					  {//Not working
					  
						  echo"<script type='text/JavaScript'>alert('data not insert');</script>";
					  }
			   
				   
			   }
			   else
			   {
						  echo"<script type='text/JavaScript'>alert('img not upload');</script>";
				    
			   }
			}
     		}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>AdminUIOne</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/AdminUIOne.css">
<link rel="stylesheet" type="text/css" href="../font/css/all.min.css">
<link rel="stylesheet" type="text/css" href="css/Eventcs.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 sidenavb">
				<h2>Dashboard</h2>
				<hr>
				<a href="Dashboard.php">DASHBOARD</a></li>
				<a  href="Inbox.php">INBOX</a>
				<a class="active" href="Event.php">EVENT'S</a>
				<a  href="AddFood.php">ADD FOOD</a><hr>
				<a  href="AdminUIOne.php">EDIT PROFILE</a>
				<a href="logout.php">Log out</a>
			</div>
		</div>
		<div class="row content">
			<div class="col-2"></div>
			<div class="col-4">
				<h3>Event's</h3>
			</div>
			<div class="col-6">
				<input type="text" name="" id="search" class="form-control " placeholder="Search........">
			</div>
		</div>
	<div class="idcolor">	
		<div class="row">
			<div class="col-12">
				<div class ="inboxcontent" >
				<h3  style=" margin-left: 10px; margin-top: 5px;">Add Events</h3>
					<form method="post" enctype="multipart/form-data">
						<div class="row lable">
							<div class="col-5">
							<lable >Event Name</lable>
							<input type="text" id="EventName" name="EventName"class="form-control" placeholder="Event Name"></div>
							<div class="col-3">
							<label>Date from</label>
							<input type="date" name="DateFrom" id="dateofbirth" class="form-control" placeholder="Enter date of event"></div>
							<div class="col-3">
							<label>Date TO</label>
							<input type="date" name="DateTO"id="dateofbirth" required="" class="form-control" placeholder="Enter end of date of event"></div>
						</div>
						<div class="row lable2">
							<div class="col-3">
							<label>Time</label>
							<input type="text" name="Time" class="form-control" placeholder="Event Time"></div>
							<div class="col-3">
							<label>Offers</label>
							<input type="text" name="Offers" class="form-control" placeholder="Offers"></div>
							<div class="col-3">
							<label>Price</label>
							<input type="text" name="Price" required="" class="form-control" placeholder="Enter pass price"></div>
						</div>
							<label>Event address</label>
							<input type="text" name="Address" required="" placeholder="addr where Event is performed" class="form-control">
							<label>Event Detail</label>
							<input type="textarea" name="Detail" required="" class="form-control" placeholder="Enter event detail ">
							<label>Event poster</label>
							<input type="file" name="xfile"class="form-control" required="" accept="image/png,image/jpeg,image/jpg" >
							<input type="submit" name="insert" class="btn" />
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
</html>