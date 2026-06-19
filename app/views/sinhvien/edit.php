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
        <div class="form-group">
            <label for="lop">Lớp</label><br>
            <select name="lop" id="lop">
                <option value="">-- Chọn lớp --</option>
                <?php if (!empty($lops)): ?>
                    <?php foreach ($lops as $lop): ?>
                        <option value="<?php echo htmlspecialchars($lop['malop']); ?>" <?php echo (isset($sinhvien['lop']) && $sinhvien['lop'] == $lop['malop']) ? 'selected' : ''; ?>><?php echo htmlspecialchars($lop['tenlop']); ?></option>
                    <?php endforeach; ?>
                <?php else: ?>
                    <option value="">Không có lớp</option>
                <?php endif; ?>
            </select>
        </div>
        <button type="submit">Cập nhật sinh viên</button>
    </form>
    <?php else: ?>
        <p>Không tìm thấy sinh viên.</p>
    <?php endif; ?>
</div>