<div class="content-container">
    <div class="header-area">
        <h1>Danh sách lớp</h1>
        <a href="/sinhvien/index" class="btn-back">&larr; Quay lại sinh viên</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã lớp</th>
                <th>Tên lớp</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lops)): ?>
                <?php $stt = 1; ?>
                <?php foreach ($lops as $lop): ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo htmlspecialchars($lop['malop'] ?? $lop['id']); ?></td>
                        <td><?php echo htmlspecialchars($lop['tenlop'] ?? $lop['name'] ?? ''); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" style="text-align:center; padding:20px;">Không có dữ liệu lớp.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
