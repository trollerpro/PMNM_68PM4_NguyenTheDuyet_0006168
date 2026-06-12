<div class="content-container">
    <div class="header-area">
        <h1>Sửa sinh viên</h1>
        <a href="/sinhvien/index" class="btn-back">&larr; Quay lại danh sách</a>
    </div>

    <?php if (!empty($sinhvien)): ?>
    <form action="/sinhvien/update/<?php echo $sinhvien['id']; ?>" method="POST" class="form-container">
        <div class="form-group">
            <label for="ten">Tên sinh viên</label><br>
            <input type="text" name="ten" id="ten" value="<?php echo htmlspecialchars($sinhvien['ten']); ?>" required>
        </div>
        <div class="form-group">
            <label for="mssv">MSSV</label><br>
            <input type="text" name="mssv" id="mssv" value="<?php echo htmlspecialchars($sinhvien['mssv']); ?>" required>
        </div>
        <div class="form-group">
            <label for="gioitinh">Giới tính</label><br>
            <input type="text" name="gioitinh" id="gioitinh" value="<?php echo htmlspecialchars($sinhvien['gioitinh']); ?>" required>
        </div>
        <button type="submit">Cập nhật sinh viên</button>
    </form>
    <?php else: ?>
        <p>Không tìm thấy sinh viên.</p>
    <?php endif; ?>
</div>