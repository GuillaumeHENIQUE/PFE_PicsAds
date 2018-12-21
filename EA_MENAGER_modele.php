<?php
	class DBConnection {

		private $conn;
		private $servername = "localhost";
		private $myDB = "routes";
		private $username = "root";
		private $password = "root";

		public function Connect() {
			try {
				$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->myDB", $this->username, $this->password); 
				$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				//echo "Connected successfully"; 
			} catch (Exception $e) {
				echo 'Connection failed: ' . $e->getMessage();
			}
		}

		public function Prepare($sql) {
			return $this->conn->prepare($sql);
		}
	}

?>