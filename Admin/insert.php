<?php
	$connect=mysqli_connect('localhost','root','','hideaway')or die("not connect");


	if (count($_FILE["image"]["temp_name"]) > 0) {
		for ($count = 0; $count < count($_FILE["image"]["temp_name"]) ; $count++) { 
			$image_file = addslashes(file_get_contents($_FILE["image"]["temp_name"][$count]));
			$query = "INSERT INTO images(Image) VALUES ('$image_file')";
			$statement = $connect->prepare($query);
			$statement->execute();
		}
	}
?>