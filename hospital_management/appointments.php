<?php
require_once 'includes/config.php';
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patient_id = $_POST['patient_id'];
    $appointment_date = $_POST['appointment_date'];
    $reason = $_POST['reason'];

    $stmt = $conn->prepare("INSERT INTO appointments (patient_id, appointment_date, reason) VALUES (:patient_id, :appointment_date, :reason)");
    $stmt->bindParam(':patient_id', $patient_id);
    $stmt->bindParam(':appointment_date', $appointment_date);
    $stmt->bindParam(':reason', $reason);
    $stmt->execute();

    header("Location: appointments.php");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Lịch Hẹn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container mt-4">
        <h1>Lịch Hẹn</h1>
        <form method="POST" class="row g-3 mb-4">
            <div class="col-md-4">
                <select name="patient_id" class="form-select" required>
                    <?php
                    $stmt = $conn->query("SELECT id, name FROM patients");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <input type="datetime-local" name="appointment_date" class="form-control" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="reason" class="form-control" placeholder="Lý do" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Thêm Lịch Hẹn</button>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bệnh Nhân</th>
                    <th>Ngày Hẹn</th>
                    <th>Lý Do</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $conn->query("SELECT a.id, p.name, a.appointment_date, a.reason FROM appointments a JOIN patients p ON a.patient_id = p.id");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['appointment_date']}</td>
                        <td>{$row['reason']}</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>