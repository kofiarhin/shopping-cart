<?php 
	
	session_start();

	include "init.php";


	if(isset($_GET['id'])) {

		$Cart = new Cart;
		$id = $_GET['id'];

		echo $id."<br>";

		if($Cart->get_session('cart')) {

			foreach($_SESSION['cart'] as $key => $value) {

				if($id == $value['id']) {

					unset($_SESSION['cart'][$key]);

					header("Location: ../index.php?itemremoved");
				}
			}
		} else {

			echo "There is no session";
		}


	}
 ?>