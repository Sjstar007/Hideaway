function search_restro() {
	var nm=document.getElementById("search_Data").value
	//alert(nm);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("table_data").innerHTML = this.responseText;
			
		}
	};
	xhttp.open("GET", "search.php?sr="+nm, true);
	xhttp.send();
}


/* 
function search_restro() {
	nmm=document.getElementById("search_Data").value
	//alert(nm);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("table_data1").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "search1.php?sd="+nmm, true);
	xhttp.send();
}*/	