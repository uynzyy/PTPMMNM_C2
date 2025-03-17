
<?php
require_once './app/models/DangKyModel.php';
require_once './app/models/StudentModel.php';

class DangKyController
{
    private $dangKyModel;
    private $studentModel;

    public function __construct($db)
    {
        $this->dangKyModel = new DangKyModel($db);
        $this->studentModel = new StudentModel($db);
    }

    // Danh sách đăng ký
    public function index()
    {
        $dangKys = $this->dangKyModel->getAllDangKy();
        include './app/views/DangKy/list.php';
    }

    // Form thêm đăng ký
    public function create()
    {
        $students = $this->studentModel->getAllStudents();
        include './app/views/DangKy/add.php';
    }

    // Lưu đăng ký mới
    public function store($data)
    {
        $this->dangKyModel->addDangKy($data['NgayDK'], $data['MaSV']);
        header('Location: index.php?controller=dangky&action=index');
    }

    // Xóa đăng ký
    public function delete($maDK)
    {
        $this->dangKyModel->deleteDangKy($maDK);
        header('Location: index.php?controller=dangky&action=index');
    }
}
?>