<?php
require_once '../app/Core/App.php';
session_start();
class middleware{
    function checkLogin(){
        $publicPage = ['/home/login','/auth/login'];
        $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if (!isset($_SESSION['username']) && !in_array($requestPath, $publicPage)) {
            header('Location: /home/login');
            exit();
        }
    }
}
?>