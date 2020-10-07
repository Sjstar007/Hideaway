<?php
	$connection = mysqli_connect('localhost','root','','hideaway')or die("not connect");

		if (isset($_POST['submit'])) {
			
			$country = $_POST['country'];
			$state = $_POST['state'];
			$city = $_POST['city'];
			$row1 = uniqid(); 	
			echo $insert = " insert into location set Country = '$country',State = '$state',  City = '$city' , RowID = '$row1'";

		$result=mysqli_query($connection,$insert);

		if ($result == true) {
			echo "data gya ";
		}
		else{
			echo "data nhi gya";
		}
		}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Location</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<form method="post">
				<input type="text" name="country" value="india" readonly="" placeholder="Enter country name">
				<input type="text" name="state" value="rajasthan" readonly="" placeholder="Enter state name">
				<input type="text" name="city"  placeholder="Enter city name">
				<input type="submit" name="submit">
			</form>
		</div>
	</div>
</body>
</html>