
<?php
class DangKyModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Lấy tất cả đăng ký
    public function getAllDangKy()
    {
        $stmt = $this->conn->prepare("SELECT * FROM dangky");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm đăng ký
    public function addDangKy($ngayDK, $maSV)
    {
        $stmt = $this->conn->prepare("INSERT INTO dangky (NgayDK, MaSV) VALUES (:ngayDK, :maSV)");
        $stmt->bindParam(':ngayDK', $ngayDK);
        $stmt->bindParam(':maSV', $maSV);
        return $stmt->execute();
    }

    // Xóa đăng ký
    public function deleteDangKy($maDK)
    {
        $stmt = $this->conn->prepare("DELETE FROM dangky WHERE MaDK = :maDK");
        $stmt->bindParam(':maDK', $maDK);
        return $stmt->execute();
    }
}
?>