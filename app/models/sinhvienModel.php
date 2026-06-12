<?php
require_once __DIR__ . '/connectDB.php';
class sinhvienModel {
    private $conn;
    public function __construct(){
        $this->conn = ConnectDB::Connect();
    }

    public function getAllSinhvien(){
        $query = "SELECT * FROM tbl_sinhviens";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create(string $ten, string $mssv, string $gioitinh){ 
        $id = $this->getNextId();
        $query = "INSERT INTO tbl_sinhviens (id, ten, mssv, gioitinh) VALUES (:id, :ten, :mssv, :gioitinh)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':ten', $ten, PDO::PARAM_STR);
        $stmt->bindParam(':mssv', $mssv, PDO::PARAM_STR);
        $stmt->bindParam(':gioitinh', $gioitinh, PDO::PARAM_STR);
        return $stmt->execute();
    }
    private function getNextId(){
        $query = "SELECT MAX(id) AS max_id FROM tbl_sinhviens";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row && isset($row['max_id']) ? ((int)$row['max_id'] + 1) : 1;
    }
    public function paging($limit = 5,$offset = 0,$search = ""){
        $query = "SELECT * FROM tbl_sinhviens LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit',(int)$limit,PDO::PARAM_INT);
        $stmt->bindValue(':offset',(int)$offset,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // tính tổng số bản ghi
        $selectAllQuery = $this->conn->prepare("SELECT COUNT(*) FROM tbl_sinhviens");
        $selectAllQuery->execute();
        $totalRecord = (int)$selectAllQuery->fetchColumn();
        $totalPage = ($limit > 0) ? ceil($totalRecord / $limit) : 0;

        return ["sinhviens" => $result, "totalPage" => $totalPage];
    }

    public function getById(int $id){
        $query = "SELECT * FROM tbl_sinhviens WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(int $id, string $ten, string $mssv, string $gioitinh){
        $query = "UPDATE tbl_sinhviens SET ten = :ten, mssv = :mssv, gioitinh = :gioitinh WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ten', $ten, PDO::PARAM_STR);
        $stmt->bindParam(':mssv', $mssv, PDO::PARAM_STR);
        $stmt->bindParam(':gioitinh', $gioitinh, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete(int $id){
        $query = "DELETE FROM tbl_sinhviens WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>