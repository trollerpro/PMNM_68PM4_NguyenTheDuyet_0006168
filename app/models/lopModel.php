<?php
require_once __DIR__ . '/connectDB.php';
class lopModel {
    private $conn;
    public function __construct(){
        $this->conn = ConnectDB::Connect();
    }

    public function getAll(){
        $query = "SELECT * FROM tbl_lop";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id){
        $query = "SELECT * FROM tbl_lop WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>