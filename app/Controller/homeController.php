<?php
class homeController{
    public function index(){
        require_once '../app/View/home/index.php';
        
    }
    public function login(){
        require_once '../app/View/home/login.php';
    }
}
?>  