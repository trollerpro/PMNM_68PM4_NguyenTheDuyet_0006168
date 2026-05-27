<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>
<body>
    <h1>Danh sách Sinh viên</h1>
    <p>Đây là trang danh sách sinh viên.</p>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên sinh viên</th>
            <th>Giới tính</th>
            <th>MSSV</th>
        </tr>
        <?php foreach ($sinhviens as $index => $sinhvien): ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo $sinhvien['ten']; ?></td>
                <td><?php echo $sinhvien['gioitinh']; ?></td>
                <td><?php echo $sinhvien['mssv']; ?></td>
            </tr>
            <?php endforeach; ?>
    </table>
</body>

</html>