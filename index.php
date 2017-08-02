<?php 
	

	session_start();

	include "core/init.php";

	//create cart
	$Cart = new Cart();

	$Cart->load_file('views/home.php');

	if($Cart->get_session('cart')) {

		$Cart->show_session_products($_SESSION['cart']);
	} else {

		echo "There is no session";
	}
 ?>
	



