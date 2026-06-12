<?php 
    class ConnectDB{
        private $servername = "localhost";
        private $username = "root";
        private $password = "duyet2005";
        private $dbname = "68pm_34";
        public $conn;
        public function connect(){
            $self = new self();
           $self->conn = null;
           try{
            $self->conn = new PDO("mysql:host=$self->servername;dbname=$self->dbname", $self->username, $self->password);
            $self->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
           }
           return $self->conn;
        }
    }