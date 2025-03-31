<?php
require_once 'includes/config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        $_SESSION['user_role'] = $user['role']; // Phải có dòng này
        header("Location: dashboard.php");
    } else {
        echo "Sai tên đăng nhập hoặc mật khẩu!";
    }
}
?>