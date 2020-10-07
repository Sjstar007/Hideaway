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
          	echo "data insert   ";
          }
          else
          {
          	echo "not successfull";
          }

       }
//Image upload
      if(isset($_POST['insert'])) {
           $img=uniqid().$_FILES['xfile']['name'];


			   $path = "file/".$img;
			   
			   $data=move_uploaded_file($_FILES['xfile']['tmp_name'],$path);
			   
			   if($data == true)
			   {
				
				   $file=$img;
				   $qry="update restrodetail  set Image='$file' where RestroID = '".$RestroID."'";
				   $result=mysqli_query($connection,$qry);
				   
				      if($result == true)
					  {
						  echo "successfully";
						 
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
		}  
	//---------------Get Food Item--------------
			$Foodname =$_GET['vgname'];


		// Pdf upload
     /*if(isset($_POST['insert'])) {
           $pdf=uniqid().$_FILES['file']['name'];


			   $path = "Foodpdf/".$pdf;
			   
			   $data=move_uploaded_file($_FILES['file']['tmp_name'],$path);
			   
			   if($data == true)
			   {
				
				   $file=$pdf;
				   $qry1="update restrodetail  set Foodpdf ='$file' where RestroID = '".$RestroID."'";
				   $result=mysqli_query($connection,$qry1);
				   
				      if($result == true)
					  {
						  echo "successfully";
						 
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
		}*/  
?>


<!DOCTYPE html>
<html>
<head>
	<title>AdminUI</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/adminui.css">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../font/css/all.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
$(document).ready(function(){
			  $(".slide-toggle").click(function(){
   			  $(".box").slideToggle("slow");
  			});
});
		/*funtion to show*/

function search_restro() {

			nm=document.getElementById("search_Data").value
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("Foodtable").innerHTML = this.responseText;
			}
		};
			xhttp.open("GET", "sample1.php?sr="+nm, true);
			xhttp.send();
		}
	</script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6"> 
				<h1>Hideaway</h1>
				<br>
				<p>always welcome</p>
			</div>
			<div class="col-3">
				<button class="slide-toggle" id="btnn"><i class="far fa-user-circle"></i>   Profile</button>
			</div>
		</div><hr>
	</div>


	<div class="container-fluid containerflow">
		<div class="row xox">
			<div class="line box"></div>
			<div class="col-1 box">
				<button class="btnn">Inbox</button>
				<button class="btnn">Event's</button>
				<button class="btnn">Add Category</button>
				<button class="btnn">Add Food</button>
				<button class="btnn">Add </button>
				<button class="btnn">Event's</button>
				<hr id="hr">
				<button class="btnn ShowForm">Edit profile</button>
				<button class="btnn"><a href="logout.php">Log out</a></button>
			</div>
		</div>
		<div class="row bbbox">
			<div class="col-1"></div>
				<div class="col-11">
					<!--<h1>Hello    <?php echo $_SESSION['email'];	 ?></h1>-->
					<h2>Fill your detail</h2>
					<form method="post" enctype="multipart/form-data" id="Upload_multiple_images">
						<input type="text" name="restroname" class="form-control" readonly="" value="<?php echo $row['Restro_name'];?>">
						<input type="text" name="restroemail" class="form-control" readonly="" value="<?php echo $row['Email'];?>">
						<input type="text" name="location" class="form-control" placeholder="state" value="<?php echo $row1['State'];?>">
						<input type="text" name="location1" class="form-control" placeholder="City" value="<?php echo $row1['City'];?>">
						<input type="text" name="location2" class="form-control" placeholder="landmark" value="<?php echo $row1['Plocation'];?>">
						<textarea id = "myTextArea" name="detail" rows = "3" cols = "80" value="<?php echo $row['Detail'];?>"></textarea>
						<!--<input type="text" name="detail" class="form-control" placeholder="Detail">-->
						<input type="number" name="number" class="form-control" placeholder="Number" value="<?php echo $row['Number'];?>">


						<!--file<input type="file" name="xfile" class="btn" id="i" multiple="" accept=".jpg, .jpeg, .png, .gif" />-->
						Image<input type="file" name="xfile" class="btn" />
						<!--file<input type="file" accept=".pdf" name="file" class="btn"  />-->
						<input type="submit" name="insert" class="btn" />
					</form>
				</div>
				
		</div>
	</div>



	<div class="container-fluid cont">
		<div class="row">
			<h2>Search FoodItems</h2><br>
			<form method="post">
				<input type="text" name="Search" placeholder="Search Food" id="search_Data" onkeyup="search_restro()">
			</form>
			<h1 id="Foodtable"></h1>
				<select  name="Option12" class="browser-default custom-select">
 					<option selected  disabled="">Select your place</option>
 			 			<?php  while($row=mysqli_fetch_array($Foodname)){  ?>
 			 				<option   value=" <?php echo $row['Category_name'] ?>" > <?php echo $row['Category_name'] ?><br></option>
 			 			<?php }?> 
				</select>
	</div>


	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>