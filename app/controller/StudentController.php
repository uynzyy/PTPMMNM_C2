
<?php
require_once './app/models/StudentModel.php';
require_once './app/models/CategoryModel.php';

class StudentController
{
    private $studentModel;
    private $categoryModel;

    public function __construct($db)
    {
        $this->studentModel = new StudentModel($db);
        $this->categoryModel = new CategoryModel($db);
    }

    // Danh sách sinh viên
    public function index()
    {
        $students = $this->studentModel->getAllStudents();
        include './app/views/Student/list.php';
    }

    // Hiển thị form thêm
    public function add()
    {
        $categories = $this->categoryModel->getAllCategories();
        include './app/views/Student/add.php';
    }

    // Xử lý thêm sinh viên
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            // Xử lý upload ảnh
            $hinh = null;
            if (isset($_FILES['Hinh']) && $_FILES['Hinh']['error'] === 0) {
                $hinh = $this->uploadImage($_FILES['Hinh']);
                if (!$hinh) {
                    echo "Upload ảnh thất bại!";
                    return;
                }
            }

            // Thêm sinh viên
            $this->studentModel->addStudent(
                $data['MaSV'],
                $data['HoTen'],
                $data['GioiTinh'],
                $data['NgaySinh'],
                $hinh,
                $data['MaNganh']
            );

            header('Location: index.php?controller=student&action=index');
        }
    }

    // Hiển thị form sửa
    public function edit()
    {
        $maSV = $_GET['id'] ?? null;
        if ($maSV) {
            $student = $this->studentModel->getStudentById($maSV);
            $categories = $this->categoryModel->getAllCategories();
            include './app/views/Student/edit.php';
        } else {
            echo "Không tìm thấy sinh viên!";
        }
    }

    // Xử lý update sinh viên
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $hinh = $data['HinhCu'] ?? null;

            if (isset($_FILES['Hinh']) && $_FILES['Hinh']['error'] === 0) {
                $upload = $this->uploadImage($_FILES['Hinh']);
                if ($upload) {
                    $hinh = $upload;
                } else {
                    echo "Upload ảnh thất bại!";
                    return;
                }
            }

            // Cập nhật sinh viên
            $this->studentModel->updateStudent(
                $data['MaSV'],
                $data['HoTen'],
                $data['GioiTinh'],
                $data['NgaySinh'],
                $hinh,
                $data['MaNganh']
            );

            header('Location: index.php?controller=student&action=index');
        }
    }

    // Xóa sinh viên
    public function delete()
    {
        $maSV = $_GET['id'] ?? null;
        if ($maSV) {
            $this->studentModel->deleteStudent($maSV);
            header('Location: index.php?controller=student&action=index');
        } else {
            echo "Không tìm thấy sinh viên cần xóa!";
        }
    }

    // Xử lý upload hình ảnh (an toàn hơn)
    private function uploadImage($file)
    {
        $target_dir = "./uploads/";

        // Tạo folder nếu chưa tồn tại
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
        $max_file_size = 2 * 1024 * 1024; // 2MB

        // Kiểm tra loại file
        if (!in_array($file['type'], $allowed_types)) {
            echo "Chỉ cho phép định dạng JPEG, PNG, GIF!";
            return false;
        }

        // Kiểm tra dung lượng
        if ($file['size'] > $max_file_size) {
            echo "File quá lớn! Giới hạn là 2MB.";
            return false;
        }

        // Tạo tên file duy nhất
        $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $new_filename = uniqid('img_') . '.' . $file_extension;

        $target_file = $target_dir . $new_filename;

        // Di chuyển file vào thư mục
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            return $new_filename;
        } else {
            echo "Di chuyển file thất bại!";
            return false;
        }
    }
}
?>