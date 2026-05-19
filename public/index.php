<?php
require_once '../app/Core/App.php';
require_once '../app/middleware.php';

$middleware = new middleware();
$middleware->checkLogin();
$app = new App();
?>
