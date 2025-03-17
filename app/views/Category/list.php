<?php include './app/views/shares/header.php'; ?>

<h2>Danh sách Ngành học</h2>
<a href="index.php?controller=category&action=create" class="btn btn-success mb-3">Thêm ngành học</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Mã ngành</th>
            <th>Tên ngành</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $cat): ?>
            <tr>
                <td><?= $cat['MaNganh'] ?></td>
                <td><?= $cat['TenNganh'] ?></td>
                <td>
                    <a href="index.php?controller=category&action=edit&MaNganh=<?= $cat['MaNganh'] ?>" class="btn btn-warning">Sửa</a>
                    <a href="index.php?controller=category&action=delete&MaNganh=<?= $cat['MaNganh'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include './app/views/shares/footer.php'; ?>