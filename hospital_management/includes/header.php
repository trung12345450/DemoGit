<header class="d-flex justify-content-between align-items-center p-3 bg-primary text-white">
    <div class="d-flex align-items-center">
        <img src="images/logo.png" alt="Logo" style="height: 40px; margin-right: 10px;">
        <h2 class="m-0">Bệnh Viện X</h2>
    </div>
    <nav>
        <a href="dashboard.php" class="btn btn-light mx-2">Trang Chủ</a>
        <a href="add_patient.php" class="btn btn-light mx-2">Thêm Bệnh Nhân</a>
        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
            <a href="users.php" class="btn btn-light mx-2">Quản Lý Người Dùng</a>
        <?php endif; ?>
        <a href="appointments.php" class="btn btn-light mx-2">Lịch Hẹn</a>
        <button id="themeToggle" class="btn btn-light mx-2">Chuyển Theme</button>
        <a href="logout.php" class="btn btn-danger mx-2">Đăng Xuất</a>
    </nav>
</header>