<?php
session_start();

if (isset($_GET['stt'])) {
    $sttToEdit = $_GET['stt'];

    // Tìm sản phẩm cần sửa dựa vào STT
    $productToEdit = null;
    foreach ($_SESSION['products'] as $product) {
        if ($product['stt'] == $sttToEdit) {
            $productToEdit = $product;
            break;
        }
    }

    // Xử lý khi người dùng nhấn nút "Lưu"
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveProduct'])) {
        if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['image'])) {
            // Cập nhật thông tin sản phẩm
            $_SESSION['products'] = array_map(function ($product) use ($productToEdit) {
                if ($product['stt'] == $productToEdit['stt']) {
                    $product['name'] = htmlspecialchars($_POST['name']);
                    $product['description'] = htmlspecialchars($_POST['description']);
                    $product['image'] = htmlspecialchars($_POST['image']);
                }
                return $product;
            }, $_SESSION['products']);
            header('Location: Admin.php');
            exit();
        }
    }
} else {
    echo "Không tìm thấy sản phẩm cần sửa!";
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php if ($productToEdit): ?>
    <form action="editForm.php?stt=<?= $productToEdit['stt']; ?>" class="editForm" method="POST">
        <h1>SỬA LOÀI HOA</h1>
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($productToEdit['name']); ?>" required><br><br>

        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" required><?= htmlspecialchars($productToEdit['description']); ?></textarea><br><br>

        <label for="image">Đường dẫn ảnh:</label>
        <input type="text" id="image" name="image" value="<?= htmlspecialchars($productToEdit['image']); ?>" required><br><br>

        <button type="submit" name="saveProduct">Lưu</button>
        <a href="Admin.php">Hủy</a>
    </form>
<?php else: ?>
    <p>Sản phẩm không tồn tại.</p>
<?php endif; ?>
</body>
</html>