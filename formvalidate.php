<?php
//$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
// if (isset($_POST["submit"])) {  
//     echo "ello";
//     if (empty($_POST["name"])) {
//       echo "Please enter Name";
// 		}
// 	else{
// 		echo $name = $_POST["name"];
// 	}
// }  

// Vaidate stering

// $name = $_POST ["name"];  
// if (!preg_match ("/^[a-zA-z]*$/", $name) ) {  
//     $ErrMsg = "Only alphabets and whitespace are allowed.";  
//              echo $ErrMsg;  
// } else {  
//     echo $name;  
// }  

// Email Validation

// $email = $_POST ["email"];  
// $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
// if (!preg_match ($pattern, $email) ){  
//     $ErrMsg = "Email is not valid.";  
//             echo $ErrMsg;  
// } else {  
//     echo "Your valid email address is: " .$email;  
// }  



?>


<!DOCTYPE html>
<html>
<head>
	<title>Form-validition</title>
</head>
<body>
	<form method="post">
		<label>Name</label><input type="text" name="name">
		<label>Email</label><input type="email" name="emial">
		<label>Password</label><input type="password" name="pass">
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>