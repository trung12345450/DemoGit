<?php
require_once 'includes/config.php';
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập - Bệnh Viện X</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="text-center">Đăng Nhập</h2>
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
                </form>
                <p class="text-center mt-3">Chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
            </div>
        </div>
    </div>
</body>
</html>
