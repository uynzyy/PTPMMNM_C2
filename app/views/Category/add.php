<?php include './app/views/shares/header.php'; ?>

<h2>Thêm ngành học</h2>
<form method="POST" action="index.php?controller=category&action=store">
    <div class="mb-3">
        <label for="MaNganh">Mã ngành</label>
        <input type="text" name="MaNganh" id="MaNganh" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="TenNganh">Tên ngành</label>
        <input type="text" name="TenNganh" id="TenNganh" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Thêm mới</button>
</form>

<?php include './app/views/shares/footer.php'; ?>