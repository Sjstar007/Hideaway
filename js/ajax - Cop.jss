function search_restro() {
	nm=document.getElementById("search_Data").value
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("table_data").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "search.php?sr="+nm, true);
	xhttp.send();
}