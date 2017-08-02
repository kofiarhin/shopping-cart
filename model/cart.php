<?php 

	include "./functions/functions.php";

	class Cart extends Model {

		protected $error;



		public function load_file($url) {

			include $url;
		}


		public function load_product() {


			$cache_file = 'data/info.txt';
			$cookie_name = 'info';
			$cookie_value = uniqid('', true);
			$time = time();

			if($this->check_cookie('info')) {

				//if there is a cookie then fetch data from file
				$ser = file_get_contents($cache_file);
				$data = unserialize($ser);
				$this->show_products($data);

				echo "There is a cookie so data fetched from file";


			} else {

				if(file_exists($cache_file)) {

					unlink($cache_file);

					$data = $this->get_data();

					$this->show_products($data);

					$ser = serialize($data);

					file_put_contents($cache_file, $ser);

					echo "file deleted and new data fetched, <br>";

					setcookie($cookie_name, $cookie_value, $time + 10);
				} else {

					$data = $this->get_data();
					$this->show_products($data);
					//serialize the data
					$ser = serialize($data);
					file_put_contents($cache_file, $ser);

					echo "file does not exist so created new one and fetched data";
					setcookie($cookie_name, $cookie_value, $time + 10);
				}

			}
			
		}



		public function check_cookie($name) {

			if(isset($_COOKIE[$name])) {

				return true;
			} else {

				return false;
			}
		}
		public function show_products($data) {

			//var_dump($data);
			echo "<div class='container'>";

			foreach($data as $product) {

				$id = $product['id'];
				$product_name = $product['product_name'];
				$product_price = $product['product_price'];


				echo "<div class='product'>";
					echo "<img src='uploads/default.jpg'>";
					echo "<p class='name'>".$product_name."</p>";
					echo "<p class='price'>$".$product_price."</p>";
					echo "<a href='controller/add.inc.php?id=$id'>Add to Cart</a>";
				
				echo "</div>"; // end product
			}

			echo "</div>"; //end container
		}

	
		

	}

 ?>