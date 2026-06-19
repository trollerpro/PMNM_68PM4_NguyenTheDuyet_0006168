<?php
require 'app/models/connectDB.php';
$db = ConnectDB::Connect();
foreach ($db->query('SHOW COLUMNS FROM tbl_lop') as $row) {
    echo 'tbl_lop: ' . implode(' | ', $row) . PHP_EOL;
}
echo '---' . PHP_EOL;
foreach ($db->query('SHOW COLUMNS FROM tbl_sinhviens') as $row) {
    echo 'tbl_sinhviens: ' . implode(' | ', $row) . PHP_EOL;
}
?>