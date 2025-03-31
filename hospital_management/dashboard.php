<?php
require_once 'includes/config.php';
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$total = $conn->query("SELECT COUNT(*) FROM patients")->fetchColumn();
$today = $conn->query("SELECT COUNT(*) FROM patients WHERE DATE(admission_date) = CURDATE()")->fetchColumn();

$search = isset($_GET['search']) ? $_GET['search'] : '';
$date = isset($_GET['date']) ? $_GET['date'] : '';
$per_page = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_page;

$query = "SELECT * FROM patients WHERE name LIKE :search";
if ($date) {
    $query .= " AND DATE(admission_date) = :date";
}
$query .= " LIMIT :start, :per_page";
$stmt = $conn->prepare($query);
$stmt->bindParam(':search', $search_param);
if ($date) {
    $stmt->bindParam(':date', $date);
}
$stmt->bindParam(':start', $start, PDO::PARAM_INT);
$stmt->bindParam(':per_page', $per_page, PDO::PARAM_INT);
$search_param = "%$search%";
$stmt->execute();

$total_query = "SELECT COUNT(*) FROM patients WHERE name LIKE '$search_param'";
if ($date) {
    $total_query .= " AND DATE(admission_date) = '$date'";
}
$total_records = $conn->query($total_query)->fetchColumn();
$pages = ceil($total_records / $per_page);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Bệnh Viện X</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .dark-mode { background-color: #333; color: #fff; }
        .dark-mode .bg-primary { background-color: #0d6efd !important; }
        .dark-mode .table { color: #fff; background-color: #444; }
        .dark-mode .table-striped tbody tr:nth-of-type(odd) { background-color: #555; }
        .dark-mode .btn-light { background-color: #666; color: #fff; }
        .dark-mode .pagination .page-item .page-link { background-color: #666; color: #fff; }
        .dark-mode .pagination .page-item.active .page-link { background-color: #0d6efd; color: #fff; }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="container mt-4">
        <h1>Quản Lý Bệnh Nhân</h1>
        <div class="row mb-3">
            <div class="col-md-6">
                <p>Tổng số bệnh nhân: <?php echo $total; ?></p>
                <p>Bệnh nhân hôm nay: <?php echo $today; ?></p>
            </div>
            <div class="col-md-6">
                <canvas id="patientChart" height="100"></canvas>
            </div>
        </div>
        <form method="GET" class="mb-3">
            <div class="input-group">
                <input type="date" name="date" class="form-control" value="<?php echo isset($_GET['date']) ? $_GET['date'] : ''; ?>">
                <input type="text" name="search" class="form-control" placeholder="Tìm theo tên" value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit" class="btn btn-primary">Lọc</button>
            </div>
        </form>
        <a href="add_patient.php" class="btn btn-success mb-3">Thêm Bệnh Nhân</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ Tên</th>
                    <th>Tuổi</th>
                    <th>Tình Trạng</th>
                    <th>Ngày Nhập Viện</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['patient_condition']; ?></td>
                        <td><?php echo $row['admission_date']; ?></td>
                        <td>
                            <a href="edit_patient.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Sửa</a>
                            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                                <a href="delete_patient.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Xác nhận xóa?')">Xóa</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <nav>
            <ul class="pagination">
                <?php for ($i = 1; $i <= $pages; $i++): ?>
                    <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                        <a class="page-link" href="dashboard.php?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?><?php echo $date ? '&date=' . urlencode($date) : ''; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script>
        const ctx = document.getElementById('patientChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Tổng', 'Hôm nay'],
                datasets: [{
                    label: 'Số bệnh nhân',
                    data: [<?php echo $total; ?>, <?php echo $today; ?>],
                    backgroundColor: ['#007bff', '#28a745']
                }]
            },
            options: { scales: { y: { beginAtZero: true } } }
        });
    </script>
    <script>
        document.getElementById('themeToggle').addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>