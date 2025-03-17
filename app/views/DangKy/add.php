<?php include './app/views/shares/header.php'; ?>

<h2>Thêm Đăng ký học phần</h2>
<form method="POST" action="index.php?controller=dangky&action=store">
    <div class="mb-3">
        <label>Sinh viên</label>
        <select name="MaSV" class="form-control">
            <?php foreach ($students as $sv): ?>
                <option value="<?= $sv['MaSV'] ?>"><?= $sv['HoTen'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Học phần</label>
        <select name="MaHP" class="form-control">
            <?php foreach ($hocphans as $hp): ?>
                <option value="<?= $hp['MaHP'] ?>"><?= $hp['TenHP'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Lưu đăng ký</button>
</form>

<?php include './app/views/shares/footer.php'; ?>