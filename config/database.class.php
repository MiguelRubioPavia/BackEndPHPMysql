<?php

    include_once("db.const.php");

    class Database{

        private static $instance = null; // Una instancia de la propia clase
        private $conn;
        private $host = BIB_HOST;
        private $user = BIB_USER;
        private $pass = BIB_PASS;
        private $dbname = BIB_BBDD;

        public static function getInstance(){
            if(!self::$instance) { 
                self::$instance = new Database();  
            }
            return self::$instance;
        }

        public function getConnection() {  
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);           
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            } 

            return $this->conn;  
        }

    }

?>