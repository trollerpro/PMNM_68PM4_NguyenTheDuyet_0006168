<?php
class auth{
    protected $username = ['admin' => 'admin123',
        'user1' => 'user123',];
        
    public function login(){
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? ''; 
    if (isset($this->username[$username]) && $this->username[$username] === $password) {
        
        $_SESSION ['username'] = $username;
       header('Location: /home/index');
       exit();
    } else {
       header('Location: /home/login');
       exit();
    }
}
}
}
?>