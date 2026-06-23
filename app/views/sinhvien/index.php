<div class="content-container">
    <div class="header-area">
        <h1>Danh sách sinh viên</h1>
        <div>
            <a href="/sinhvien/create" class="btn-add">+ Thêm sinh viên</a>
            <a href="/lop/index" class="btn-add">Xem lớp</a>
        </div>
    </div>

    <div class="search-area">
        <form method="get" action="/sinhvien/index">
            <input type="text" name="q" placeholder="Tìm theo tên hoặc MSSV" value="<?php echo htmlspecialchars($search ?? ''); ?>" />
            <button type="submit">Tìm</button>
        </form>
    </div>

    <?php
    if (!isset($sinhviens)) {
        $sinhviens = [];
    }
    if (!isset($limit)) {
        $limit = 4;
    }
    if (!isset($currentPage)) {
        $currentPage = 1;
    }
    if (!isset($totalPage)) {
        $totalPage = 0;
    }
    if (!isset($totalRecord)) {
        $totalRecord = 0;
    }
    ?>

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
            $limit = isset($limit) ? (int)$limit : 4;
            $currentPage = isset($currentPage) ? (int)$currentPage : 1;
            $current_offset = ($currentPage - 1) * $limit;
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
            if (isset($totalPage) && $totalPage > 0) {
                $pageSize = $limit;
                $start = $current_offset + 1;
                $end = $current_offset + (is_array($sinhviens) ? count($sinhviens) : 0);
                if (isset($totalRecord)) {
                    $end = min($end, $totalRecord);
                }
                echo "<div class='results-summary'>Hiển thị {$start} - {$end} / " . ($totalRecord ?? '0') . "</div>";

                // Prev button (path-style)
                if ($currentPage > 1) {
                    $prevPage = $currentPage - 1;
                    $prevPath = "/sinhvien/index/{$pageSize}/" . (($prevPage - 1) * $pageSize);
                    if (!empty($search)) $prevPath .= '?q=' . urlencode($search);
                    echo "<a href='" . $prevPath . "' class='prev'>« Prev</a> ";
                } else {
                    echo "<span class='disabled prev'>« Prev</span> ";
                }

                // Page numbers (path-style)
                for ($i = 1; $i <= $totalPage; $i++) {
                    $offset_i = ($i - 1) * $pageSize;
                    $path = "/sinhvien/index/{$pageSize}/{$offset_i}";
                    if (!empty($search)) $path .= '?q=' . urlencode($search);
                    $class = ($i == $currentPage) ? 'class="active"' : '';
                    echo "<a href='" . $path . "' {$class}>$i</a> ";
                }

                // Next button (path-style)
                if ($currentPage < $totalPage) {
                    $nextPage = $currentPage + 1;
                    $nextPath = "/sinhvien/index/{$pageSize}/" . (($nextPage - 1) * $pageSize);
                    if (!empty($search)) $nextPath .= '?q=' . urlencode($search);
                    echo "<a href='" . $nextPath . "' class='next'>Next »</a>";
                } else {
                    echo "<span class='disabled next'>Next »</span>";
                }
            }
        ?>
    </div>
</div>