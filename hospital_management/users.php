<?php
require_once 'includes/config.php';
if (!isset($_SESSION['user']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản Lý Người Dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container mt-4">
        <h1>Quản Lý Người Dùng</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Đăng Nhập</th>
                    <th>Vai Trò</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $conn->query("SELECT * FROM users");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['role']}</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>