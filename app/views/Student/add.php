<?php
// File: create.php
require_once './config/db.php';  // Kết nối CSDL từ file config
require_once './app/models/StudentModel.php';

$db = new PDO("mysql:host=localhost;dbname=test1", "root", "");
$studentModel = new StudentModel($db);

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maSV = $_POST['maSV'] ?? '';
    $hoTen = $_POST['hoTen'] ?? '';
    $gioiTinh = $_POST['gioiTinh'] ?? '';
    $ngaySinh = $_POST['ngaySinh'] ?? '';
    $maNganh = $_POST['maNganh'] ?? '';

    // Validate dữ liệu cơ bản (bạn có thể bổ sung thêm nếu cần)
    if (empty($maSV) || empty($hoTen) || empty($ngaySinh)) {
        $error = 'Vui lòng nhập đầy đủ thông tin!';
    } else {
        // Xử lý upload hình ảnh
        $hinhAnh = '';
        if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';

            // Kiểm tra và tạo thư mục nếu không tồn tại
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileTmp = $_FILES['hinh']['tmp_name'];
            $fileName = uniqid() . '_' . basename($_FILES['hinh']['name']);
            $targetFile = $uploadDir . $fileName;

            // Kiểm tra loại file ảnh
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

            if (!in_array($imageFileType, $allowedTypes)) {
                $error = 'Chỉ cho phép các định dạng JPG, JPEG, PNG, GIF!';
            } elseif ($_FILES['hinh']['size'] > 5 * 1024 * 1024) { // 5MB
                $error = 'Kích thước ảnh không được vượt quá 5MB!';
            } else {
                // Di chuyển file vào thư mục uploads
                if (move_uploaded_file($fileTmp, $targetFile)) {
                    $hinhAnh = $fileName;
                } else {
                    $error = 'Lỗi khi upload ảnh!';
                }
            }
        }

        // Nếu không có lỗi thì thêm sinh viên
        if (empty($error)) {
            $result = $studentModel->addStudent($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinhAnh, $maNganh);

            if ($result) {
                $success = 'Thêm sinh viên thành công!';
                header('Location: index.php');
                exit();
            } else {
                $error = 'Thêm sinh viên thất bại!';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên Mới</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a href="index.php" class="navbar-brand">Test1</a>
            <div class="navbar-menu">
                <a href="index.php" class="nav-link">Sinh Viên</a>
                <a href="#" class="nav-link">Học Phần</a>
                <a href="#" class="nav-link">Đăng Ký</a>
                <a href="#" class="nav-link">Đăng Nhập</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Thêm Sinh Viên Mới</h1>

        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (!empty($success)) : ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form action="create.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="maSV">Mã Sinh Viên:</label>
                <input type="text" id="maSV" name="maSV" value="<?= htmlspecialchars($maSV ?? '') ?>" required>
            </div>

            <div class="form-group">
                <label for="hoTen">Họ Tên:</label>
                <input type="text" id="hoTen" name="hoTen" value="<?= htmlspecialchars($hoTen ?? '') ?>" required>
            </div>

            <div class="form-group">
                <label for="gioiTinh">Giới Tính:</label>
                <select id="gioiTinh" name="gioiTinh">
                    <option value="1" <?= (isset($gioiTinh) && $gioiTinh == '1') ? 'selected' : '' ?>>Nam</option>
                    <option value="0" <?= (isset($gioiTinh) && $gioiTinh == '0') ? 'selected' : '' ?>>Nữ</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ngaySinh">Ngày Sinh:</label>
                <input type="date" id="ngaySinh" name="ngaySinh" value="<?= htmlspecialchars($ngaySinh ?? '') ?>" required>
            </div>

            <div class="form-group">
                <label for="hinh">Hình Ảnh:</label>
                <input type="file" id="hinh" name="hinh" accept="image/*">
            </div>

            <div class="form-group">
                <label for="maNganh">Ngành Học:</label>
                <select id="maNganh" name="maNganh">
                    <option value="1" <?= (isset($maNganh) && $maNganh == '1') ? 'selected' : '' ?>>CNTT</option>
                    <option value="2" <?= (isset($maNganh) && $maNganh == '2') ? 'selected' : '' ?>>QTKD</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="index.php" class="btn btn-secondary">Hủy</a>
        </form>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2025 Quản lý sinh viên</p>
        </div>
    </footer>
</body>

</html>