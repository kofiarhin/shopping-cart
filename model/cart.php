<?php 


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



			} else {

				if(file_exists($cache_file)) {

					unlink($cache_file);

					$data = $this->get_data();

					$this->show_products($data);

					$ser = serialize($data);

					file_put_contents($cache_file, $ser);


					setcookie($cookie_name, $cookie_value, $time + 10);
				} else {

					$data = $this->get_data();
					$this->show_products($data);
					//serialize the data
					$ser = serialize($data);
					file_put_contents($cache_file, $ser);

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


				echo "<form method='post' action='controller/add.inc.php'>
					<img src='uploads/default.jpg'>
					<p>".$product_name."</p> 
					<p>$".$product_price."</p>
					<input type='hidden' name='product_id' value='$id'> 
					<input type='hidden' name='product_name' value='$product_name'> 
					<input type='hidden' name='product_price' value='$product_price'> 
					<button type='submit' name='add_submit'>Add to Cart</button>

				</form>";
			}

			echo "</div>"; //end container
		}

		
		public function get_session($name) {

			if(isset($_SESSION[$name])) {

				return true;
			} else {

				return false;
			}
		}


		public function show_session_products($data) {

			if(!empty($data)) {

				echo "<table>";
			echo "<tr>
							<td>Product Name</td>
							<td>Product Price</td>
							<td>Action</td>
			</tr>";
			foreach($data as $product) {

				$product_name = $product['name'];
				$product_price = $product['price'];
				$id = $product['id'];

				echo "<tr>
					<td>".$product_name."</td>
					<td>".$product_price."</td>
					<td><a href='controller/remove.inc.php?id=$id'>Remove</a></td>

				</tr>";
			}
			echo "</table>";


			}

			
		}	
		

	}

 ?>