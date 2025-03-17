
<?php
class HocPhanModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Lấy tất cả học phần
    public function getAllHocPhan()
    {
        $stmt = $this->conn->prepare("SELECT * FROM hocphan");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm học phần
    public function addHocPhan($maHP, $tenHP, $soTinChi)
    {
        $stmt = $this->conn->prepare("INSERT INTO hocphan (MaHP, TenHP, SoTinChi) VALUES (:maHP, :tenHP, :soTinChi)");
        $stmt->bindParam(':maHP', $maHP);
        $stmt->bindParam(':tenHP', $tenHP);
        $stmt->bindParam(':soTinChi', $soTinChi);
        return $stmt->execute();
    }

    // Lấy học phần theo mã
    public function getHocPhanById($maHP)
    {
        $stmt = $this->conn->prepare("SELECT * FROM hocphan WHERE MaHP = :maHP");
        $stmt->bindParam(':maHP', $maHP);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cập nhật học phần
    public function updateHocPhan($maHP, $tenHP, $soTinChi)
    {
        $stmt = $this->conn->prepare("UPDATE hocphan SET TenHP = :tenHP, SoTinChi = :soTinChi WHERE MaHP = :maHP");
        $stmt->bindParam(':maHP', $maHP);
        $stmt->bindParam(':tenHP', $tenHP);
        $stmt->bindParam(':soTinChi', $soTinChi);
        return $stmt->execute();
    }

    // Xóa học phần
    public function deleteHocPhan($maHP)
    {
        $stmt = $this->conn->prepare("DELETE FROM hocphan WHERE MaHP = :maHP");
        $stmt->bindParam(':maHP', $maHP);
        return $stmt->execute();
    }
}
?>