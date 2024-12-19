<!DOCTYPE html>
<html>
<head>
    <title>Quản lý sản phẩm</title>
    <!-- Thêm CSS và Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .btn-add {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-add:hover {
            background-color: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        i {
            font-size: 20px;
            cursor: pointer;
        }
        .fas {
            color: #007bff;
        }
        .fas:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php?action=add" class="btn-add">Thêm mới</a>
        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá thành</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                    <tr><td colspan="4">Không có sản phẩm nào.</td></tr>
                <?php else: ?>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= number_format($product['price'], 0, ',', '.') ?> VND</td>
                        <td>
                            <a href="index.php?action=edit&id=<?= $product['id'] ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="index.php?action=delete&id=<?= $product['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
