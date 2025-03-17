<?php include './app/views/shares/header.php'; ?>

<h2>Danh sách Đăng ký học phần</h2>
<a href="index.php?controller=dangky&action=create" class="btn btn-success mb-3">Thêm đăng ký</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Mã SV</th>
            <th>Tên SV</th>
            <th>Mã HP</th>
            <th>Tên học phần</th>
            <th>Ngày đăng ký</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dangkyList as $dk): ?>
            <tr>
                <td><?= $dk['MaSV'] ?></td>
                <td><?= $dk['HoTen'] ?></td>
                <td><?= $dk['MaHP'] ?></td>
                <td><?= $dk['TenHP'] ?></td>
                <td><?= $dk['NgayDangKy'] ?></td>
                <td>
                    <a href="index.php?controller=dangky&action=delete&MaSV=<?= $dk['MaSV'] ?>&MaHP=<?= $dk['MaHP'] ?>" class="btn btn-danger" onclick="return confirm('Xóa đăng ký này?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include './app/views/shares/footer.php'; ?>