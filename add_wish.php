<?php
	session_start();

	//check if product is already in the wish
	if(!in_array($_GET['id'], $_SESSION['wish'])){
		array_push($_SESSION['wish'], $_GET['id']);
		$_SESSION['message'] = 'Product added to wishlist';
	}
	else{
		$_SESSION['message'] = 'Product already in wishlist';
	}

	header('location: index.php');
?>