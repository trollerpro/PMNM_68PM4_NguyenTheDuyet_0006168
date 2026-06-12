<?php
class ConnectDB{
    public static function Connect(){
        $server = "localhost";
        $user = "root";
        $password = "duyet2005";
        $db = "68pm_34";

        try {
            $dsn = "mysql:host=$server;dbname=$db;charset=utf8";
            $pdo = new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            return $pdo;
        } catch (PDOException $e) {
            die("Lỗi kết nối: " . $e->getMessage());
        }
    }
}
?>