<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="js/jquery.js"></script>
	<script src="js/ajax.js"></script>
	<script> 
$(document).ready(function(){
	$("#flip").click(function(){
	$("#panel").slideToggle("slow");
	});
});

</script>
</head>
<body>

</body>
</html>
<?php 
	$connection=mysqli_connect('localhost','root','','hideaway') or die("not connect");

	/*if (isset($_GET['sd'])) {
		 $type = $_GET['sd'];  
		$query2="select * from category where RowID like  '%$type%'";
		$chk2=mysqli_query($connection,$query2);
		$row2=mysqli_fetch_array($chk2);

		echo "<h2>".$row2['Category_name']."</h2>";
	}*/

//select restro pool bar

if(isset($_GET['sr']))
{
		     $name = $_GET['sr'];  
		$query="select * from restrodetail where CategoryID like  '%$name%'";
		$query1="select * from category where CategoryID like  '%$name%'";
		$chk1=mysqli_query($connection,$query1);
		$row1=mysqli_fetch_array($chk1);

		 $chk=mysqli_query($connection,$query) or die('query not execute');
         /*echo "<pre>";
		 var_dump($chk);
	 exit;*/

	while($row=mysqli_fetch_array($chk))
	{
	

	echo "<div class='container-fluid con' id='id'>";
	echo 	"<div class='row'>";
		echo	"<div class='col-2 flex-item'><img src='Admin/file/".$row['Image']."' >	</div>";
			echo  	"<div class='col-7' id='content'>";
				echo 	"<h3>".$row['Restro_name']."</h3>";
				echo 	"<h4>".$row1['Category_name']."</h4>";
			echo 	"<div class='box1' id='flip'>";
				echo	"<h6><i class='fas fa-map-marker-alt'></i>".$row['Location']."</h6>";
			echo 	"</div>";
				echo 	"<h6 id='review'>Very good<span id='color'>(1900 reviews)</span></h6>";
				echo 	"<p id='review'>Excellent: service Extremely clean</p>";
			echo 	"</div><div class='line'></div>";
			echo 	"<div class='col-3'>";
				echo "<a href='viewdetail.php?bookid=".$row['Restro_name']."'><button class='btn' id='btnn'>view detail</button></a>";
				echo "<a href='book.php?Prebookid=".$row['Restro_name']."' ><button class='btn'>Book now</button></a>";
			echo "</div>";
		echo "</div>";
		echo "<div id='panel'>";
			echo "<div class='row'>";
			echo 	"<div class='col-4'>Google Map</div>";
			echo	"<div class='col-8'>";
			echo		"<h4 id='h4'>".$row['Location']."</h4><br>";

			echo	"</div>";
			echo "</div>";
		echo "</div>";

	echo "</div>";
   }

}	


//Search restro list

if (isset( $_GET['list'])) {
	 $restro_name = $_GET['list'];  
		 $query="select * from restrodetail where Restro_name like '%$restro_name%'";
		$chk1=mysqli_query($connection,$query);

	while($row=mysqli_fetch_array($chk1))
	{	
		echo "<div class='container-fluid con' id='id'>";
	echo 	"<div class='row'>";
		echo	"<div class='col-2 flex-item'><img src='Admin/file/".$row['Image']."' >	</div>";
			echo  	"<div class='col-7' id='content'>";
				echo 	"<h4>".$row['Restro_name']."</h4>";
			//	echo 	"<h6>".$row1['Category_name']."</h6>";
			echo 	"<div class='box1' id='flip'>";
				echo	"<h6><i class='fas fa-map-marker-alt'></i>".$row['Location']."</h6>";
			echo 	"</div>";
				echo 	"<h6 id='review'>Very good<span id='color'>(1900 reviews)</span></h6>";
				echo 	"<p id='review'>Excellent: service Extremely clean</p>";
			echo 	"</div><div class='line'></div>";
			echo 	"<div class='col-3'>";
				echo "<a href='viewdetail.php?bookid=".$row['Restro_name']."'><button class='btn' id='btnn'>view detail</button></a>";
				echo "<a href='book.php?Prebookid=".$row['Restro_name']."' ><button class='btn'>Book now</button></a>";
			echo "</div>";
		echo "</div>";
		echo "<div id='panel'>";
			echo "<div class='row'>";
			echo 	"<div class='col-4'>Google Map</div>";
			echo	"<div class='col-8'>";
			echo		"<h4 id='h4'>".$row['Location']."</h4><br>";

			echo	"</div>";
			echo "</div>";
		echo "</div>";

	echo "</div>";
		
	}
}


?>
