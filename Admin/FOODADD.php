<?php
	session_start();
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
		$menu = "select * from foodtype" ;
		$result1=mysqli_query($connection,$menu);
			 


	if (isset($_POST['submit'])) {
		
		$Category = $_POST['foodcategory'];
		$row = uniqid();
		$cat = $_POST['Option1'];
		$insert = "insert into foodmenuall set FoodItemall = '$Category', RowID = '$row', foodtype = '$cat' ";

		$result=mysqli_query($connection,$insert);
		if ($result = True) {
	
		}
		else
		{
			echo "nhi gya----";
		}
	}
if(isset($_POST['submit'])) {
           $img=uniqid().$_FILES['xfile']['name'];


			   $path = "foomenu/".$img;
			   
			  $data=move_uploaded_file($_FILES['xfile']['tmp_name'],$path);
			   
			   if($data == true)
			   {
				
				   $file=$img;
				  $qry="update foodmenuall  set Image='$file' where RowID = '".$row."'";
				   $result=mysqli_query($connection,$qry);
				   
				      if($result == true)
					  {
						  
						 
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
?>


<!DOCTYPE html>
<html>
<head>
	<title>FOODADD</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<form method="post" enctype="multipart/form-data">
				<label>Food Category</label>
				<input type="text" name="foodcategory" class="form-control" placeholder="Enter Food Category">
				<select name="Option1" class="browser-default custom-select"  >
 						<option selected disabled="">Select your type</option>
 						<?php  while($row=mysqli_fetch_array($result1)){  ?>
 			 			<option value = "<?php echo $row['RowID'] ?>" ><?php echo $row['Category'] ?></option>
 			 			<?php }?>
					</select>
				Select Food Image<input type="file" name="xfile"class="form-control" accept="image/png,image/jpeg" multipart=>

				<input type="submit" name="submit">
			</form>
		</div>
	</div>
</body>
</html>