<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa thông tin sinh viên</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <!-- Navbar (giữ nguyên nếu cần) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Quản lý sinh viên</a>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4 text-center">Chỉnh sửa thông tin sinh viên</h2>

        <form action="index.php?controller=student&action=update&id=<?= $student['MaSV'] ?>" method="post" enctype="multipart/form-data" class="mx-auto" style="max-width: 600px;">
            <!-- Mã sinh viên (readonly) -->
            <div class="form-group">
                <label for="MaSV">Mã sinh viên:</label>
                <input type="text" class="form-control" id="MaSV" name="MaSV" value="<?= htmlspecialchars($student['MaSV']) ?>" readonly>
            </div>

            <!-- Họ tên -->
            <div class="form-group">
                <label for="HoTen">Họ tên:</label>
                <input type="text" class="form-control" id="HoTen" name="HoTen" value="<?= htmlspecialchars($student['HoTen']) ?>" required>
            </div>

            <!-- Giới tính -->
            <div class="form-group">
                <label for="GioiTinh">Giới tính:</label>
                <select class="form-control" id="GioiTinh" name="GioiTinh">
                    <option value="Nam" <?= ($student['GioiTinh'] == 'Nam') ? 'selected' : '' ?>>Nam</option>
                    <option value="Nữ" <?= ($student['GioiTinh'] == 'Nữ') ? 'selected' : '' ?>>Nữ</option>
                </select>
            </div>

            <!-- Ngày sinh -->
            <div class="form-group">
                <label for="NgaySinh">Ngày sinh:</label>
                <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" value="<?= htmlspecialchars($student['NgaySinh']) ?>" required>
            </div>

            <!-- Hình ảnh hiện tại -->
            <div class="form-group">
                <label>Hình ảnh hiện tại:</label><br>
                <img src="public/images/<?= htmlspecialchars($student['Hinh']) ?>" alt="Hình sinh viên" width="150" class="img-thumbnail">
            </div>

            <!-- Upload hình ảnh mới -->
            <div class="form-group">
                <label for="Hinh">Chọn hình ảnh mới (nếu muốn thay đổi):</label>
                <input type="file" class="form-control-file" id="Hinh" name="Hinh">
            </div>

            <!-- Mã ngành -->
            <div class="form-group">
                <label for="MaNganh">Mã ngành:</label>
                <select class="form-control" id="MaNganh" name="MaNganh">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['MaNganh'] ?>" <?= ($student['MaNganh'] == $category['MaNganh']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($category['TenNganh']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Nút cập nhật -->
            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="index.php?controller=student&action=index" class="btn btn-secondary">Hủy</a>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5 py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">© 2025 Quản lý sinh viên</span>
        </div>
    </footer>

</body>

</html>