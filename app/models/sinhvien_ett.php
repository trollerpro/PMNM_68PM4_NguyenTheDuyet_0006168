<?php
class Sinhvien_ett{
    public string $hoten;
    public string $mssv;
    public string $gioitinh;

    public function __construct(string $hoten, string $mssv, string $gioitinh) {
        $this->hoten = $hoten;
        $this->mssv = $mssv;
        $this->gioitinh = $gioitinh;
    }
}
?>