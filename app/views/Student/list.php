<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Trang Sinh Viên</title>
    <!-- Bootstrap CSS (để có style gọn đẹp hơn) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <!-- Menu top -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Test1</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="#">Sinh Viên</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Học Phần</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Đăng Kí</a></li>
            </ul>
            <a class="btn btn-outline-light" href="#">Đăng Nhập</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="mb-3">TRANG SINH VIÊN</h2>
        <a href="index.php?controller=student&action=add" class="btn btn-primary mb-3">Add Student</a>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>MaSV</th>
                    <th>HoTen</th>
                    <th>GioiTinh</th>
                    <th>NgaySinh</th>
                    <th>Hình</th>
                    <th>MaNganh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= htmlspecialchars($student['MaSV']) ?></td>
                        <td><?= htmlspecialchars($student['HoTen']) ?></td>
                        <td><?= htmlspecialchars($student['GioiTinh']) ?></td>
                        <td><?= date('d/m/Y', strtotime($student['NgaySinh'])) ?></td>
                        <td>
                            <img src="public/images/<?= htmlspecialchars($student['Hinh']) ?>" alt="Hình sinh viên" width="120" height="150">
                        </td>
                        <td><?= htmlspecialchars($student['TenNganh']) ?></td>
                        <td>
                            <a href="index.php?controller=student&action=edit&id=<?= $student['MaSV'] ?>">Edit</a> |
                            <a href="index.php?controller=student&action=detail&id=<?= $student['MaSV'] ?>">Details</a> |
                            <a href="index.php?controller=student&action=delete&id=<?= $student['MaSV'] ?>" onclick="return confirm('Bạn có chắc muốn xóa?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>