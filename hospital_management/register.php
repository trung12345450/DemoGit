<?php
require_once 'includes/config.php';
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    if ($password !== $confirm_password) {
        $error = "Mật khẩu không khớp!";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $error = "Tên đăng nhập đã tồn tại!";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, :role)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
            $success = "Đăng ký thành công! Bạn có thể đăng nhập.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Ký - Bệnh Viện X</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="text-center">Đăng Ký</h2>
                <?php if (isset($error)) echo "<p class='text-danger text-center'>$error</p>"; ?>
                <?php if (isset($success)) echo "<p class='text-success text-center'>$success</p>"; ?>
                <form action="register.php" method="POST">
                    <div class="mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Xác nhận mật khẩu" required>
                    </div>
                    <div class="mb-3">
                        <select name="role" class="form-select" required>
                            <option value="doctor">Bác sĩ</option>
                            <option value="nurse">Y tá</option>
                            <option value="admin">Quản trị viên</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Đăng Ký</button>
                </form>
                <p class="text-center mt-3">Đã có tài khoản? <a href="index.php">Đăng nhập</a></p>
            </div>
        </div>
    </div>
</body>
</html>