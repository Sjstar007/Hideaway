<?php
session_start();
error_reporting();
	$connect=mysqli_connect('localhost','root','','hideaway')or die("not connect");
	$RestroID2=$_SESSION['Rname'];
	$FoodTable = "Zmenu_".preg_replace("! !","_",$RestroID2);

if (isset($_POST["itemname"])) {
	$itemimage = $_POST["itemimage"];
	$itemname = $_POST["iteminame"];
	$itemprice = $_POST["itemprice"];
	$itemrowid = $_POST["itemrowid"];
	$query = "";
	for($count =0 ; $count<count($itemname);$count++){
		$itemimage_clean = mysqli_real_escape_string($connect, $itemimage[$count]);
		$itemname_clean = mysqli_real_escape_string($connect, $itemname[$count]);
		$itemprice_clean = mysqli_real_escape_string($connect, $itemprice[$count]);
		$itemrowid_clean = mysqli_real_escape_string($connect, $itemrowid[$count]);
		if ($itemimage_clean != '' && $itemname_clean != '' && $itemprice_clean != '' && $itemrowid_clean != '') {
        $query .='insert into "'.FoodTable.'"(Soon1, FoodItem, Price, ROWID) values("'.$itemimage_clean.'","'.$itemname_clean.'","'.$itemprice_clean.'","'.$itemrowid_clean.'")';
		}
	}
	if($query != ''){
		if(mysqli_multi_query($connect,$query)){
			echo "Item Inserted...............";	
		}
		else{
			echo "Erroe??????????";
		}
	}
	else{
		echo "Faild!!!!!!!!!!!!!!!!Select some field";
	}
}


?>