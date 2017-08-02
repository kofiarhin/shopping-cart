<?php 

	
	class Model  extends Dbh {


		//get data and return to cart class
		protected function get_data() {

			$sql = "SELECT * FROM products";
			$data = $this->query_database($sql);

			return $data;
		}

		//query database for data and return to result to function  

		protected function query_database($sql) {

			$result = $this->connect()->query($sql);
			$check = $result->num_rows;

			if($check > 0) {
				while($row = $result->fetch_assoc()) {

					$data[] = $row;
				}
				return $data;
			}
		}




	}


 ?>