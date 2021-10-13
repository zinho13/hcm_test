<?php

    namespace Models;

    class Model {

        /**
         * 
         */
        public function delete($table_name, $condition)
        {
            if (sizeof($condition) == 0) return false;

            $where = [];

            foreach ($condition as $key => $value) {
                array_push($where, "$key = '$value'");
            }

            $sql = "DELETE FROM `$table_name` WHERE ". join($where, ' AND ');
            
            return $this->pdo->exec($sql);
        }

        /**
         * 
         */
        public function lastInsertId()
        {
            return $this->pdo->lastInsertId();
        }

        /**
         * 
         */
        public function findAllIn($table_name)
        {
            return $this->get_query("select * from $table_name");
        }
    }
    