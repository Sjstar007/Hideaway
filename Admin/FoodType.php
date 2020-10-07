<?php
	session_start();
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");

	if (isset($_POST['submit'])) {
		
		$Category = $_POST['foodcategory'];
		$row = uniqid();

		$insert = "insert into foodtype set Category = '$Category', RowID = '$row' ";

		$result=mysqli_query($connection,$insert);
		if ($result = True) {
			echo "data gya";
		}
		else
		{
			echo "nhi gya";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>FOOD CUISINE</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<form method="post">
				<label>Food Category</label>
				<input type="text" name="foodcategory" class="form-control" placeholder="Enter Food Category">
				<input type="submit" name="submit">
			</form>
		</div>
	</div>
</body>
</html>
 