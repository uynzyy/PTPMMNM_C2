
<?php
class Database
{
    private $host = 'localhost';
    private $dbname = 'test1'; // Sửa theo tên database thật
    private $username = 'root'; // XAMPP mặc định
    private $password = '';     // XAMPP mặc định

    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Kết nối CSDL thành công!";
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
?>