<?php 
	require "function.php";
	if(isset($_POST['category'])){
		$category = $_POST['category'];

		if($category === ""){
			$products = getAllProducts();
			}else if($category === "out_of_stock"){
				$products = getAllProductsOutOfStock();
		}else {
			$products = getProductsByCategory($category);
		}
		echo json_encode($products);
	}