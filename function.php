<?php 
	function connect(){
		$mysqli = new mysqli('localhost', 'root', '', 'electro');
		if($mysqli->connect_errno != 0){
			return $mysqli->connect_error;
		}else{
			$mysqli->set_charset("utf8mb4");	
		}
		return $mysqli;
	}

	function getAllProducts(){
		$mysqli = connect();
		$res = $mysqli->query("SELECT * FROM products ORDER BY RAND()");
		while($row = $res->fetch_assoc()){
			$products[] = $row;
		}
		return $products;
	}

	function getProductsByCategory($category){
		$mysqli = connect();
		$res = $mysqli->query("SELECT * FROM products WHERE categorie = '$category'");
		while($row = $res->fetch_assoc()){
			$products[] = $row;
		}
		return $products;
	}
	function getAllProductsOutOfStock(){
		$mysqli = connect();
	
		// Utilisez COUNT(*) pour obtenir le nombre de produits hors stock
		$res2 = $mysqli->query("SELECT COUNT(*) as count FROM products WHERE quantite_stock <= quantite_min");
		$row2 = $res2->fetch_assoc();
	    
		// Vérifiez le nombre de produits hors stock
		$count = $row2['count'];
		if ($count >= 1) {
			// S'il y a un ou plusieurs produits hors stock, récupérez-les
			$res = $mysqli->query("SELECT * FROM products WHERE quantite_stock <= quantite_min");
			while($row = $res->fetch_assoc()){
				$products[] = $row;
			}
			return $products;
		} else {
			// S'il n'y a aucun produit hors stock, retournez un tableau vide
			return [];
		}
	}
	
