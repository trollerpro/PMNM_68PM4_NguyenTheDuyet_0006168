<?php
require_once __DIR__ . '/../Core/Controller.php';
class lop extends Controller {
    public function index(){
        $lopModel = $this->model('lopModel');
        $lops = $lopModel->getAll();

        $this->view('layout/masterlayout', [
            'viewname' => 'sinhvien/class',
            'title' => 'Danh sách lớp',
            'lops' => $lops
        ]);
    }
}
?>