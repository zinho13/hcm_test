<?php 
	require_once('../../config/default.php');
    require_once('../../config/Database.php');

	class User
	{
		private $pdo = NULL;
		
		public function __construct()
		{
			$db = new \Database();
			$this->pdo = $db->getDb();
		}

		public function get_user($table_name, $id)
		{
			$sql = "SELECT * FROM `$table_name` WHERE id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		/**
         * REQUETE DE SELECTION RAPIDE
         * 
         * @return array
         */
        public function get_query($sql)
        {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            return $stmt->fetchAll();
        }

         /**
         * INSERTION DANS LA BASE
         * 
         * @param $table_name (string) : nom de la table 
         * @param $data (array) : les données a inserée
        */
        public function insert($table_name, $data) {

            $stmt = $this->pdo->prepare("INSERT INTO `users`(id, pseudo, email, groupe_id, date_creation, date_modif) VALUES (NULL, :pseudo, :email, :groupe_id, :date_creation, :date_modif)");
            $stmt->bindParam(':pseudo', $data['pseudo']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':groupe_id', $data['groupe_id']);
            $stmt->bindParam(':date_creation', $data['date_creation']);
            $stmt->bindParam(':date_modif', $data['date_modif']);

            return $stmt->execute();
        }

        /**
         * MODIFICATION DANS LA BASE
         * 
         * @param $table_name (string) : nom de la table 
         * @param $data (array) : les données a inserée
         * @param $condition (array) : listes des conditions
        */
        public function update($table_name, $data, $condition) {
            $stmt = $this->pdo->prepare("UPDATE users SET pseudo = ?, email = ?, groupe_id = ?, date_modif = ? WHERE id =".$condition['id']);
            
            return $stmt->execute([$data['pseudo'], $data['email'], $data['groupe_id'], $data['date_modif']]);
        } 
	}