<?php
require_once 'includes/config.php';
if (!isset($_SESSION['user']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: index.php");
    exit();
}
$id = $_GET['id'];
$stmt = $conn->prepare("INSERT INTO patient_history (patient_id, action, changed_by) VALUES (:patient_id, 'Xóa', :user)");
$stmt->bindParam(':patient_id', $id);
$stmt->bindParam(':user', $_SESSION['user']);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM patients WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

$_SESSION['success'] = "Xóa bệnh nhân thành công!";
header("Location: dashboard.php");
?>