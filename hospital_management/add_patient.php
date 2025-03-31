<?php
require_once 'includes/config.php';
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $patient_condition = $_POST['condition'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("INSERT INTO patients (name, age, patient_condition, gender, phone, address) VALUES (:name, :age, :condition, :gender, :phone, :address)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':condition', $patient_condition);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);
    $stmt->execute();

$patient_id = $conn->lastInsertId();
$stmt = $conn->prepare("INSERT INTO patient_history (patient_id, action, changed_by) VALUES (:patient_id, 'Thêm mới', :user)");
$stmt->bindParam(':patient_id', $patient_id);
$stmt->bindParam(':user', $_SESSION['user']);
$stmt->execute();

$_SESSION['success'] = "Thêm bệnh nhân thành công!";
header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Bệnh Nhân</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container mt-4">
        <h1>Thêm Bệnh Nhân Mới</h1>
        <form method="POST" class="row g-3">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Họ và tên" required>
            </div>
            <div class="col-md-6">
                <input type="number" name="age" class="form-control" placeholder="Tuổi" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="condition" class="form-control" placeholder="Tình trạng bệnh" required>
            </div>
            <div class="col-md-6">
                <select name="gender" class="form-select" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
            </div>
            <div class="col-md-6">
                <input type="text" name="address" class="form-control" placeholder="Địa chỉ">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>