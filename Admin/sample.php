<!DOCTYPE html>
<html>
<head>
	<title>OnKeyUp</title>

	<script>
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
	<form method="post">
				<input type="text" name="Search" placeholder="Search Food" id="search_Data" onkeyup="search_restro()">

	</form>
		<div id="Foodtable">
		
	</div>
			
	</div>
</body>
</html>