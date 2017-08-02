<?php 


	class Dbh {


		private $server, $username, $password, $dbname;

		protected function connect() {

			$this->server = "localhost";
			$this->username = "root";
			$this->password = "";
			$this->dbname = "shopping Cart";


			$conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);

			return $conn;
		}
	}

 ?>