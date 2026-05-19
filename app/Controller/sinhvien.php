<?php
class sinhvien{
    public function index(){
        // echo "Đây là danh sách sinh viên";
        //trả về view index
        require_once '../app/View/sinhvien/index.php';
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