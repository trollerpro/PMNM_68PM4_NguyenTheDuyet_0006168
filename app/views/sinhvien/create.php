<div class="content-container">
    <div class="header-area">
        <h1>Thêm sinh viên</h1>
        <a href="/sinhvien/index" class="btn-back">&larr; Quay lại danh sách</a>
    </div>

    <form action="/sinhvien/store" method="POST" class="form-container">
        <div class="form-group">
            <label for="ten">Tên sinh viên</label><br>
            <input type="text" name="ten" id="ten" required>
        </div>
        <div class="form-group">
            <label for="mssv">MSSV</label><br>
            <input type="text" name="mssv" id="mssv" required>
        </div>
        <div class="form-group">
            <label for="gioitinh">Giới tính</label><br>
            <input type="text" name="gioitinh" id="gioitinh" required>
        </div>
        <button type="submit">Thêm sinh viên</button>
    </form>
</div>