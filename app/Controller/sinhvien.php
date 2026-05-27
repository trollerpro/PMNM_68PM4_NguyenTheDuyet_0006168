<?php
require_once '../app/core/Controller.php';
class sinhvien extends Controller{
    public function index(){
        $sinhvienModel = $this->model('SinhvienModel');
        $sinhviens = $sinhvienModel->getAllSinhvien();
        // echo "Đây là danh sách sinh viên";
        //trả về view index
        //require_once '../app/View/sinhvien/index.php';
        $this->view('sinhvien/index', ['sinhviens' => $sinhviens,'title'=>"DSSV"]);
    }
    public function create(){
        // echo "Đây là trang tạo sinh viên";
        //trả về view create
        require_once '../app/View/sinhvien/create.php';
    }
    public function login(){
        require_once '../app/View/home/login.php';
    }
}
?>