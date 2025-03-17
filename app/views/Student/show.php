<?php include './app/views/shares/header.php'; ?>

<h2>Chi tiết Sinh viên</h2>
<p><strong>Mã SV:</strong> <?= $student['MaSV'] ?></p>
<p><strong>Họ tên:</strong> <?= $student['HoTen'] ?></p>
<p><strong>Giới tính:</strong> <?= $student['GioiTinh'] == 1 ? 'Nam' : 'Nữ' ?></p>
<p><strong>Ngày sinh:</strong> <?= $student['NgaySinh'] ?></p>
<p><strong>Ngành học:</strong> <?= $student['TenNganh'] ?></p>
<p><strong>Hình ảnh:</strong> <br><img src="uploads/<?= $student['Hinh'] ?>" width="100"></p>

<a href="index.php?controller=student&action=index" class="btn btn-secondary">Quay lại</a>

<?php include './app/views/shares/footer.php'; ?>