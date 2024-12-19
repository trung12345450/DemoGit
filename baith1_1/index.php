
<?php

// Kiểm tra nếu người dùng chọn vai trò từ các liên kết
if (isset($_GET['role'])) {
    $_SESSION['role'] = $_GET['role']; // Lưu vai trò người dùng trong session
}

// Kiểm tra vai trò của người dùng và include trang tương ứng
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        include 'Admin.php';
    } elseif ($_SESSION['role'] == 'user') {
        include 'User.php';
    }
} else {
    echo "* Vui lòng đăng nhập dưới vai trò:";
    echo '<form action="" method="GET" id="loginForm">
            <label for="role">Chọn vai trò: </label>
            <select name="role" id="role">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <button type="submit" id="login">Đăng nhập</button>
          </form>';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css"
    <title></title>
</head>
<body>

</body>
</html>

