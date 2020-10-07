<?php
	session_start();
	$connection = mysqli_connect('localhost','root','','hideaway')or die("not connect");

		if (isset($_POST['submit'])) {
			
			$cat = $_POST['cart1'];
			$row = uniqid();	
			echo $insert = " insert into category set Category_name = '$cat', RowID = '$row'";

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
	<title>category</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<form method="post">
				<input type="text" name="cart1" placeholder="Enter category">
				<input type="submit" name="submit">
			</form>
		</div>
	</div>
</body>
</html>