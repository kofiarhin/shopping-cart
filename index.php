<?php 
	

	session_start();

	include "core/init.php";


	//create cart


	$Cart = new Cart();

	$Cart->load_file('views/home.php');



	
	

 ?>
	



