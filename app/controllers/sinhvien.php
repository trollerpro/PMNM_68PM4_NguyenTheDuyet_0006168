<?php
require_once __DIR__ . '/../Core/Controller.php';
class sinhvien extends Controller{
    public function index($limit = 5,$offset = 0,$search=""){
        $sinhvienModel = $this->model('sinhvienModel');
        $results = $sinhvienModel->paging($limit, $offset, $search);
        $sinhviens = $results['sinhviens'] ?? [];
        $totalPage = $results['totalPage'] ?? 0;
        // trả về view
        $this->view("layout/masterlayout", [
            'viewname' => 'sinhvien/index',
            'sinhviens' => $sinhviens,
            'title' => 'Danh sách sinh viên',
            'totalPage' => $totalPage
        ]);
    }
    public function create(){
        $this->view("layout/masterlayout", [
            'viewname' => 'sinhvien/create',
            'title' => 'Thêm sinh viên'
        ]);
    }

    public function store(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $ten = trim($_POST['ten'] ?? '');
            $mssv = trim($_POST['mssv'] ?? '');
            $gioitinh = trim($_POST['gioitinh'] ?? '');

            $sinhvienModel = $this->model('sinhvienModel');
            $result = $sinhvienModel->create($ten, $mssv, $gioitinh);

            if($result){
                header("Location: /sinhvien/index");
                exit();
            } else {
                echo "Lỗi khi thêm sinh viên.";
            }
        }
    }

    public function edit($id = null){
        $id = (int)$id;
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhvien = $sinhvienModel->getById($id);

        if (!$sinhvien) {
            echo "Sinh viên không tồn tại.";
            return;
        }

        $this->view("layout/masterlayout", [
            'viewname' => 'sinhvien/edit',
            'title' => 'Sửa sinh viên',
            'sinhvien' => $sinhvien
        ]);
    }

    public function update($id = null){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = (int)$id;
            $ten = trim($_POST['ten'] ?? '');
            $mssv = trim($_POST['mssv'] ?? '');
            $gioitinh = trim($_POST['gioitinh'] ?? '');

            $sinhvienModel = $this->model('sinhvienModel');
            $result = $sinhvienModel->update($id, $ten, $mssv, $gioitinh);

            if($result){
                header("Location: /sinhvien/index");
                exit();
            } else {
                echo "Lỗi khi cập nhật sinh viên.";
            }
        }
    }

    public function delete($id = null){
        $id = (int)$id;
        $sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->delete($id);

        if($result){
            header("Location: /sinhvien/index");
            exit();
        } else {
            echo "Lỗi khi xóa sinh viên.";
        }
    }
}
?> 