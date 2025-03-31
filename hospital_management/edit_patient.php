<?php
require_once 'includes/config.php';
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM patients WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$patient = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $condition = $_POST['condition'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("UPDATE patients SET name = :name, age = :age, patient_condition = :condition, gender = :gender, phone = :phone, address = :address WHERE id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':condition', $condition);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $stmt = $conn->prepare("INSERT INTO patient_history (patient_id, action, changed_by) VALUES (:patient_id, 'Chỉnh sửa', :user)");
    $stmt->bindParam(':patient_id', $id);
    $stmt->bindParam(':user', $_SESSION['user']);
    $stmt->execute();

    $_SESSION['success'] = "Cập nhật thông tin bệnh nhân thành công!";
header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa Thông Tin Bệnh Nhân</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container mt-4">
        <h1>Sửa Thông Tin Bệnh Nhân</h1>
        <form method="POST" class="row g-3">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" value="<?php echo $patient['name']; ?>" required>
            </div>
            <div class="col-md-6">
                <input type="number" name="age" class="form-control" value="<?php echo $patient['age']; ?>" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="condition" class="form-control" value="<?php echo $patient['patient_condition']; ?>" required>
            </div>
            <div class="col-md-6">
                <select name="gender" class="form-select" required>
                    <option value="Nam" <?php echo $patient['gender'] === 'Nam' ? 'selected' : ''; ?>>Nam</option>
                    <option value="Nữ" <?php echo $patient['gender'] === 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                    <option value="Khác" <?php echo $patient['gender'] === 'Khác' ? 'selected' : ''; ?>>Khác</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" name="phone" class="form-control" value="<?php echo $patient['phone']; ?>">
            </div>
            <div class="col-md-6">
                <input type="text" name="address" class="form-control" value="<?php echo $patient['address']; ?>">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
            </div>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>