<?php
require_once '../app/Core/DB.php';
class SinhvienModel {
    private $conn;
    public function __construct()
    {
        $this->conn = ConnectDB::connect();
    }
    public function getAllSinhvien(){
        $sql = "SELECT * FROM tbl_sinhvien";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}