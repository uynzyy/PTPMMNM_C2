
<?php
class CategoryModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Lấy tất cả ngành học
    public function getAllCategories()
    {
        $stmt = $this->conn->prepare("SELECT * FROM nganhhoc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm ngành học
    public function addCategory($maNganh, $tenNganh)
    {
        $stmt = $this->conn->prepare("INSERT INTO nganhhoc (MaNganh, TenNganh) VALUES (:maNganh, :tenNganh)");
        $stmt->bindParam(':maNganh', $maNganh);
        $stmt->bindParam(':tenNganh', $tenNganh);
        return $stmt->execute();
    }

    // Lấy thông tin ngành theo mã
    public function getCategoryById($maNganh)
    {
        $stmt = $this->conn->prepare("SELECT * FROM nganhhoc WHERE MaNganh = :maNganh");
        $stmt->bindParam(':maNganh', $maNganh);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cập nhật ngành học
    public function updateCategory($maNganh, $tenNganh)
    {
        $stmt = $this->conn->prepare("UPDATE nganhhoc SET TenNganh = :tenNganh WHERE MaNganh = :maNganh");
        $stmt->bindParam(':maNganh', $maNganh);
        $stmt->bindParam(':tenNganh', $tenNganh);
        return $stmt->execute();
    }

    // Xóa ngành học
    public function deleteCategory($maNganh)
    {
        $stmt = $this->conn->prepare("DELETE FROM nganhhoc WHERE MaNganh = :maNganh");
        $stmt->bindParam(':maNganh', $maNganh);
        return $stmt->execute();
    }
}
?>
