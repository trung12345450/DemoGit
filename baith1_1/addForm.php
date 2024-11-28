<?php
// Khởi động session để lưu trữ dữ liệu
session_start();

// Kiểm tra nếu form được gửi đi với hành động 'add'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    // Lấy dữ liệu từ form
    $stt = isset($_POST['stt']) ? $_POST['stt'] : '';
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $image = isset($_POST['image']) ? trim($_POST['image']) : '';

    // Kiểm tra dữ liệu hợp lệ
    if (!empty($name) && !empty($description) && !empty($image)) {
        // Nếu chưa có dữ liệu trong session, khởi tạo mảng
        if (!isset($_SESSION['products'])) {
            $_SESSION['products'] = [];
        }

        // STT tự động tăng dựa trên số lượng sản phẩm đã có
        $stt = count($_SESSION['products']) + 1;

        // Thêm sản phẩm mới vào danh sách
        $_SESSION['products'][] = [
            'stt' => $stt,
            'name' => $name,
            'description' => $description,
            'image' => $image,
        ];

        // Sau khi thêm sản phẩm, chuyển hướng về trang index.php
        header('Location: Admin.php');
        exit();
    } else {
        echo "<p style='color: red;'>** Dữ liệu không hợp lệ. Vui lòng kiểm tra lại.</p>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form method="POST" action="" class="addForm">
    <h1>THÊM LOÀI HOA</h1>
    <hr>
    <input type="hidden" name="action" value="add">
    <label>STT:
        <input type="text" name="stt" value="<?= isset($_SESSION['products']) ? count($_SESSION['products']) + 1 : 1 ?>" readonly>
    </label>
    <label>Tên:
        <input type="text" name="name" required>
    </label>
    <label>Mô tả:
        <textarea name="description" rows="4" required></textarea>
    </label>
    <label>Đường dẫn ảnh:
        <input type="text" name="image" id="imageInput" placeholder="Nhập URL hình ảnh" required>
    </label>
    <img src="" id="imagePreview" class="preview-img" alt="Xem trước ảnh">
    <div class="addButton">
        <button type="submit" name="action" value="add">Thêm</button>
    </div>
</form>

<script>
    // Lấy các phần tử cần dùng
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');

    // Sự kiện khi người dùng nhập vào trường đường dẫn ảnh
    imageInput.addEventListener('input', () => {
        const url = imageInput.value.trim(); // Lấy giá trị URL
        if (url) {
            imagePreview.src = url;
            imagePreview.style.display = 'block'; // Hiển thị ảnh
        } else {
            imagePreview.src = ''; // Xóa src nếu không có giá trị
            imagePreview.style.display = 'none'; // Ẩn ảnh
        }
    });
</script>
</body>
</html>