
<?php
require_once './app/models/HocPhanModel.php';

class HocPhanController
{
    private $hocPhanModel;

    public function __construct($db)
    {
        $this->hocPhanModel = new HocPhanModel($db);
    }

    // Danh sách học phần
    public function index()
    {
        $hocphans = $this->hocPhanModel->getAllHocPhan();
        include './app/views/HocPhan/list.php';
    }

    // Form thêm học phần
    public function create()
    {
        include './app/views/HocPhan/add.php';
    }

    // Lưu học phần mới
    public function store($data)
    {
        $this->hocPhanModel->addHocPhan($data['MaHP'], $data['TenHP'], $data['SoTinChi']);
        header('Location: index.php?controller=hocphan&action=index');
    }

    // Form sửa học phần
    public function edit($maHP)
    {
        $hocphan = $this->hocPhanModel->getHocPhanById($maHP);
        include './app/views/HocPhan/edit.php';
    }

    // Cập nhật học phần
    public function update($data)
    {
        $this->hocPhanModel->updateHocPhan($data['MaHP'], $data['TenHP'], $data['SoTinChi']);
        header('Location: index.php?controller=hocphan&action=index');
    }

    // Xóa học phần
    public function delete($maHP)
    {
        $this->hocPhanModel->deleteHocPhan($maHP);
        header('Location: index.php?controller=hocphan&action=index');
    }
}
?>