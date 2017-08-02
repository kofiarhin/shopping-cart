<?php 
	session_start();
	include "init.php";

	if(isset($_POST['add_submit'])) {

		$id = $_POST['product_id'];
		$name = $_POST['product_name'];
		$price = $_POST['product_price'];

	
		$Cart = new Cart();

		if($Cart->get_session('cart')) {

			$cart_ids = array_column($_SESSION['cart'], 'id');

			if(in_array($id, $cart_ids)) {

				echo "item already in cart please select another item.<br>";
				echo "<a href='../index.php'>Back</a>";
			} else {


				//inset item into array

				$count = count($_SESSION['cart']);

				$data = array(

								'id' => $id,
								'name' => $name,
								'price' => $price

								);


				$_SESSION['cart'][$count] = $data;

				header("Location: ../index.php?added");
			}

		} else {

			$data = array(

				'id' => $id,
				'name' => $name,
				'price' => $price

				);

			$_SESSION['cart'][0] = $data;
		}


	}

 ?>