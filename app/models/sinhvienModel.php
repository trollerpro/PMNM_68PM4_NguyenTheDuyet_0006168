<?php
require_once __DIR__ . '/connectDB.php';
class sinhvienModel {
    private $conn;
    public function __construct(){
        $this->conn = ConnectDB::Connect();
    }

    private function hasColumn(string $table, string $column){
        $query = "SHOW COLUMNS FROM {$table} LIKE :column";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':column', $column, PDO::PARAM_STR);
        $stmt->execute();
        return (bool)$stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllSinhvien(){
        $query = "SELECT * FROM tbl_sinhviens";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(string $ten, string $mssv, string $gioitinh, ?string $lop = null){ 
        $id = $this->getNextId();
        $query = "INSERT INTO tbl_sinhviens (id, ten, mssv, gioitinh, lop) VALUES (:id, :ten, :mssv, :gioitinh, :lop)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':ten', $ten, PDO::PARAM_STR);
        $stmt->bindParam(':mssv', $mssv, PDO::PARAM_STR);
        $stmt->bindParam(':gioitinh', $gioitinh, PDO::PARAM_STR);
        $stmt->bindValue(':lop', $lop, $lop !== null ? PDO::PARAM_STR : PDO::PARAM_NULL);

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
        $query = "SELECT s.*, l.malop AS malop, l.tenlop AS tenlop FROM tbl_sinhviens s LEFT JOIN tbl_lop l ON s.lop = l.malop LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit',(int)$limit,PDO::PARAM_INT);
        $stmt->bindValue(':offset',(int)$offset,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $selectAllQuery = $this->conn->prepare("SELECT COUNT(*) FROM tbl_sinhviens");
        $selectAllQuery->execute();
        $totalRecord = (int)$selectAllQuery->fetchColumn();
        $totalPage = ($limit > 0) ? ceil($totalRecord / $limit) : 0;

        return ["sinhviens" => $result, "totalPage" => $totalPage];
    }

    public function getById(int $id){
        $query = "SELECT s.*, l.malop AS malop, l.tenlop AS tenlop FROM tbl_sinhviens s LEFT JOIN tbl_lop l ON s.lop = l.malop WHERE s.id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(int $id, string $ten, string $mssv, string $gioitinh, ?string $lop = null){
        $query = "UPDATE tbl_sinhviens SET ten = :ten, mssv = :mssv, gioitinh = :gioitinh, lop = :lop WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ten', $ten, PDO::PARAM_STR);
        $stmt->bindParam(':mssv', $mssv, PDO::PARAM_STR);
        $stmt->bindParam(':gioitinh', $gioitinh, PDO::PARAM_STR);
        $stmt->bindValue(':lop', $lop, $lop !== null ? PDO::PARAM_STR : PDO::PARAM_NULL);
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