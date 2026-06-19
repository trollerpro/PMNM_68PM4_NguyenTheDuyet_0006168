<div class="content-container">
    <div class="header-area">
        <h1>Danh sách sinh viên</h1>
        <div>
            <a href="/sinhvien/create" class="btn-add">+ Thêm sinh viên</a>
            <a href="/lop/index" class="btn-add">Xem lớp</a>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>MSSV</th>
                <th>Giới tính</th>
                <th>Lớp</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $uri = explode('/', $_SERVER['REQUEST_URI']);
            $current_offset = (isset($uri[4]) && is_numeric($uri[4])) ? (int)$uri[4] : 0;
            $stt = $current_offset + 1;

            if (!empty($sinhviens)):
                foreach ($sinhviens as $sinhvien): 
            ?>
            <tr>
                <td><?php echo $stt++; ?></td>
                <td><?php echo htmlspecialchars($sinhvien['ten']); ?></td>
                <td><?php echo htmlspecialchars($sinhvien['mssv']); ?></td>
                <td><?php echo htmlspecialchars($sinhvien['gioitinh']); ?></td>
                <td><?php echo htmlspecialchars($sinhvien['malop'] ?? ($sinhvien['lop'] ?? '')); ?></td>
                <td class="action-links">
                    <a href="/sinhvien/edit/<?php echo $sinhvien['id']; ?>" class="btn-edit">Sửa</a>
                    <a href="/sinhvien/delete/<?php echo $sinhvien['id']; ?>" class="btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?')">Xóa</a>
                </td>
            </tr>
            <?php 
                endforeach; 
            else: 
            ?>
            <tr>
                <td colspan="6" style="text-align: center; padding: 20px;">Không có dữ liệu sinh viên.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="pagination">
        <?php
            if (isset($totalPage) && $totalPage > 1) {
                $pageSize = 5;
                for ($i = 1; $i <= $totalPage; $i++) {
                    $offset = ($i - 1) * $pageSize;
                    echo "<a href='/sinhvien/index/$pageSize/$offset'>$i</a>";
                }
            }
        ?>
    </div>
</div>