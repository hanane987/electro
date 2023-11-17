<?php include "function.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Start up</title>
</head>
<body>
<header>
      <a href="#" class="logo">ELECTRO NACER</a>
      <nav class="navigation">
        <a href="index.php">Log in </a>
        <a href="products.php">Catalogue</a>
        
      
     
    </header>

	<div class="page">
		<div class="left">
			<select name="products" id="products">
				<option value="">All Products</option>
				<option value="Arduino">Arduino</option>
				<option value="Capteur">Capteur</option>
				<option value="accessories">accessories</option>
				<option value="out_of_stock">rupture</option>
			</select>
		</div>
		<div class="right">
			<h2>All Products</h2>
			<div class="product-wrapper">
            <?php 
				$products = getAllProducts();
				foreach ($products as $product) {
					?>
						<div class="product">
							<div class="left">
								<img src="<?php echo $product['image'] ?>" alt="">
							</div>
							<div class="right">
								<p class="title">Reference :<?php echo $product['reference'] ?></p>
								<p class="title">Peoduct name :<?php echo $product['libelle'] ?>&euro;</p>
								<p class="title">Unitaire price :<?php echo $product['prix_unitaire'] ?></p>
                                <p class="title"> Quantity min :<?php echo $product['quantite_min'] ?></p>
								<p class="title">Price :<?php echo $product['quantite_stock'] ?>&euro;</p>
							</div>
						</div>
					<?php
				}
			?>
			</div>
		</div>
	</div>
    <footer>
    <div class="footer-content">
        <h3>ElectroNacer</h3>
        <p>Follow us on social media :</p>
        <ul class="socials">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
        </ul>
    </div>
    <div class="footer-bottom">
        <p>copyright &copy;2020 ElectroNacer. designed by <span></span></p>
    </div>
</footer>
<script>


let selectMenu = document.querySelector("#products");
let category = document.querySelector(".right h2");
let container = document.querySelector(".product-wrapper");

selectMenu.addEventListener("change", function(){
	let categoryName = this.value;
	category.innerHTML = this[this.selectedIndex].text;  

	let http = new XMLHttpRequest();
	http.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			console.log(this.responseText); // Affichez la réponse dans la console
        try {
            let response = JSON.parse(this.responseText);
            // Reste du code pour le traitement du JSON
        } catch (e) {
            console.error("Erreur lors du parsing JSON:", e);
        }
			let response = JSON.parse(this.responseText);
			// let response = this.responseText;
			let out = "";
			for(let item of response){
				out += `
					<div class="product">
						<div class="left">
							<img src="${item.image}" alt="">
						</div>
						<div class="right">
							<p class="title">Reference :${item.reference}</p>
							<p class="title">Peoduct name :${item.libelle}&euro;</p>
							<p class="title">Unitaire price :${item.prix_unitaire}</p>
							<p class="title">Quantity min :${item.quantite_min}</p>
							<p class="title">Price :${item.quantite_stock}&euro;</p>
						</div>
					</div>
				`;
			}
			container.innerHTML = out;
		};
	}	
	http.open('POST', "script.php", true);
	http.setRequestHeader("content-type", "application/x-www-form-urlencoded");
	http.send("category="+categoryName);
});
</script>

</body>
</html>