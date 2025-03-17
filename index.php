<?php
require_once './app/config/database.php';

// Lấy controller/action từ URL, nếu không có thì gán mặc định
$controller = $_GET['controller'] ?? 'student';
$action     = $_GET['action'] ?? 'index';

// Kết nối database
$dbInstance = new Database();
$db = $dbInstance->getConnection();

// Điều hướng controller
switch ($controller) {
    case 'student':
        require_once './app/controller/StudentController.php';
        $controllerObject = new StudentController($db);
        break;

    case 'category':
        require_once './app/controller/CategoryController.php';
        $controllerObject = new CategoryController($db);
        break;

    default:
        echo "Không tìm thấy controller: " . htmlspecialchars($controller);
        exit;
}

// Kiểm tra action có tồn tại và gọi phương thức
if (method_exists($controllerObject, $action)) {
    $controllerObject->$action();
} else {
    echo "Không tìm thấy action: " . htmlspecialchars($action);
    echo "<pre>";
    echo "Các action khả dụng: ";
    print_r(get_class_methods($controllerObject));
    echo "</pre>";
}
