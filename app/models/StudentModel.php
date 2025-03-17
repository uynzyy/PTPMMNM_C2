
<?php
class StudentModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Lấy tất cả sinh viên
    public function getAllStudents()
    {
        $stmt = $this->conn->prepare("
        SELECT sv.*, n.TenNganh 
        FROM sinhvien sv
        LEFT JOIN nganhhoc n ON sv.MaNganh = n.MaNganh
    ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm sinh viên
    public function addStudent($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh)
    {
        $stmt = $this->conn->prepare("INSERT INTO sinhvien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh)
                                      VALUES (:maSV, :hoTen, :gioiTinh, :ngaySinh, :hinh, :maNganh)");
        $stmt->bindParam(':maSV', $maSV);
        $stmt->bindParam(':hoTen', $hoTen);
        $stmt->bindParam(':gioiTinh', $gioiTinh);
        $stmt->bindParam(':ngaySinh', $ngaySinh);
        $stmt->bindParam(':hinh', $hinh);
        $stmt->bindParam(':maNganh', $maNganh);
        return $stmt->execute();
    }

    // Lấy thông tin sinh viên theo mã
    public function getStudentById($maSV)
    {
        $stmt = $this->conn->prepare("SELECT * FROM sinhvien WHERE MaSV = :maSV");
        $stmt->bindParam(':maSV', $maSV);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cập nhật thông tin sinh viên
    public function updateStudent($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh)
    {
        $stmt = $this->conn->prepare("UPDATE sinhvien 
                                      SET HoTen = :hoTen, GioiTinh = :gioiTinh, NgaySinh = :ngaySinh, Hinh = :hinh, MaNganh = :maNganh
                                      WHERE MaSV = :maSV");
        $stmt->bindParam(':maSV', $maSV);
        $stmt->bindParam(':hoTen', $hoTen);
        $stmt->bindParam(':gioiTinh', $gioiTinh);
        $stmt->bindParam(':ngaySinh', $ngaySinh);
        $stmt->bindParam(':hinh', $hinh);
        $stmt->bindParam(':maNganh', $maNganh);
        return $stmt->execute();
    }

    // Xóa sinh viên
    public function deleteStudent($maSV)
    {
        $stmt = $this->conn->prepare("DELETE FROM sinhvien WHERE MaSV = :maSV");
        $stmt->bindParam(':maSV', $maSV);
        return $stmt->execute();
    }
}
?>