<?php 
	class Database {

		protected $db = NULL;
		protected $host = 'localhost';
		// protected $username = 'root';
		// protected $dbname = 'db_diversity';
		// protected $password = '';
		protected $username = 'testdes189971com';
		protected $dbname = 'dbtestdevphpzinhos189971com';
		protected $password = 'S2nPKnR';

		/**
		* Connection à la base de donnée
		* 
		* @return $pdo
		*/
		public function __construct() {
			
			try {
			    $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
			    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    // echo "success";
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
		}

		/**
		 * 
		 */
		public function getDb()
		{
			if ($this->db instanceof PDO) {
				return $this->db;
			}
		}
	}
?>