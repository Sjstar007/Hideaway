function add_to_cart(Pid,Pname,Price,id,img,rrid){

	let cart = localStorage.getItem("cart");
	if (cart == null) {
		//cart is empty
		let products=[];
		var product={productId : Pid,productName :Pname,productQuantity: 1,productPrice: Price,productid : id,productimage : img,restrid : rrid}
		products.push(product);
		localStorage.setItem("cart",JSON.stringify(products));
		console.log("product is added for the first time");
		//showToast("Item is Added to cart")

	}  
	else{
		//cart is already present 
		let pcart = JSON.parse(cart);
		let oldproduct = pcart.find((item)=> item.productId == Pid)
		if (oldproduct) {
			//we have to increase the quantity
			oldproduct.productQuantity = oldproduct.productQuantity+1
			pcart.map((item)=>{

				if (item.productId==oldproduct.productId) {
					item.productQuantity=oldproduct.productQuantity;
				}

			})

		localStorage.setItem("cart",JSON.stringify(pcart))
		console.log("product quantity is increased")
		//showToast(oldproduct.productName + "product quantity is increased")
		}
		else{
			//we have add the product
		
		let product={productId:Pid,productName:Pname,productQuantity:1,productPrice:Price,productid:id,productimage : img,restrid : rrid}
		pcart.push(product)
		localStorage.setItem("cart",JSON.stringify(pcart))
		console.log("product is added")
		//showToast("Product is added")
		}
	}

	updateCart();

}


//--------------Udate cart--------------

function updateCart(){
	let cartString = localStorage.getItem("cart");
	let cart=JSON.parse(cartString);
	if (cart==null || cart.length==0) {
		console.log("cart is empty!!!!!!")
		$(".cart-itmes").html("( 0 )");
		$(".cart-body").html("<h3>Cart does not have any item.....</h3>");
		$(".checkout-btn").addClass('disabled');
	}
	else{
		//there is some in cart to show
		console.log(cart)
		$(".cart-itmes").html(`( ${cart.length} )`);
		let table = `
			<table class='table'>
			<thead class='thead-lihgt'>
				<tr>
				<th>Item Name</th>
				<th>Item Id</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total Price</th>
				<th>Action</th>
				</tr>
			</thead>

		`;
		let totalPrice = 0;
		cart.map((item) => {
			
			table+=`
					<tr>
						<td><img src='Admin/foomenu/${item.productimage}' class='imgcart'></td>
						<td>${item.productName}</td>			
						<td>${item.productid}</td>			
						<td>${item.productPrice}</td>			
						<td>${item.productQuantity}</td>			
						<td>${item.productQuantity * item.productPrice}</td>
						<td><button onclick='deleteItemFromCart(${item.productid})' class='btn btn-danger btn-sm'>Remove</button></td>			
					</tr>

			`
			totalPrice+=item.productPrice*item.productQuantity;
			
		})


		table = table + `
		<tr><td colspan='5' class='text-right <font-weight-bold></font-weight-bold>'>Total Price : ${totalPrice}</td></tr>
		</table>`
		$(".cart-body").html(table);

	}
} 
// delete Items

 function deleteItemFromCart(id){
	let cart = JSON.parse(localStorage.getItem('cart')); 
	let newcart = cart.filter((item) => item.productid != id)
	localStorage.setItem('cart' , JSON.stringify(newcart))
	updateCart() 
	//showToast("product is removed")
}
 
/*------------Adding Toast----------

function showToast(content){
	$("#toast").addClass("display");
	$("#toast").html(content);
	setTimeout(()=>{
		$("toast").removeClass("display");
	}, 2000);
}

+"&email="
*/ 


	
function insert(a,b){

	let cartString = localStorage.getItem("cart");
	let cart=JSON.parse(cartString);

	
		
	var xhttp = new XMLHttpRequest();

	 //onreadystatechange listen 
	 //2 init kiya
	xhttp.onreadystatechange = function() { 
		if (this.readyState == 4 && this.status == 200) {
			//alert(nm+email+pass+mobile_number);
			document.getElementById("demo").innerHTML = this.responseText;
			
		}
	};
	xhttp.open("GET", "insertCart.php?init=true&name="+cartString+"&a="+a+"&b="+b, true);
	xhttp.send();

}
 