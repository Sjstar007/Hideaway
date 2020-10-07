<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="js/jquery.js"></script>
	<script src="js/ajax.js"></script>
	
</head>
<body>
<script>
	

</script>
</body>
</html> 

<?php
	session_start();
	$getid=$_SESSION['rid'];
	$connection=mysqli_connect('localhost','root','','hideaway')or die("not connect");
	$uname=$_SESSION['name'];
if(isset($_GET['init']))
	{		
		$a = $_GET['name'];
		$b = $_GET['a'];
		$c = $_GET['b'];
		//$tprice = $_GET['tprice'];
		
		$ab=json_decode($a ,true);
		$size=sizeof($ab);
		$row = uniqid();
		$forOdetail = uniqid();
		

	 	 $Userdetail = "user_".preg_replace("! !","_",$uname);
		for ($i=0; $i <$size ; $i++) { 
				$q= $ab[$i]["productName"];
				$w= $ab[$i]["productQuantity"];
				$e= $ab[$i]["productId"];
				$r= $ab[$i]["productPrice"];
				$t= $ab[$i]["productimage"];
				$y= $ab[$i]["restrid"];

				 $totalprice = $totalprice+$r*$w;
  echo $query1="insert into $Userdetail set ProductName='$q',ProductQuantity = '$w',Amount='$r',Orderid = '$row',Billdate= CURRENT_TIMESTAMP,billtime=CURRENT_TIMESTAMP,Image='$t',Restroid='$y'";
          $record=mysqli_query($connection,$query1);


		}
		
		if ($uname == true) {
			# code... 
		echo $orderdetail="insert into orderdetail set RestroId='$y',Orderid='$row',OrderTime=CURRENT_TIMESTAMP,OrderDate=CURRENT_TIMESTAMP,RowID='$forOdetail',UserID='$getid',TotalPrice='$totalprice',Members='$b',UserName = '$Userdetail'";
          $record2=mysqli_query($connection,$orderdetail);
          header("Location: Admin/Inbox.php?inboxcart=$ab&user=$getid");

        
		
}

/*
		if($a)
		{
			echo "<font color='green'> Submit successfullly is there".$a."</font>";
		}
		else
		{
			echo "<font color='red'>Not Submit successfullly </font>";
		}


		//$query1="insert into user set name='$a',email = '$b',password='$c',city = '$d'";
		//$result=mysqli_query($connection,$query1);
	}
*/

}
	?>