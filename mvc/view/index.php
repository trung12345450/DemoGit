<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/mvc/model/DBConfig.php';
    $db = new Database;
    $db->connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./themify-icons-font (1)/themify-icons/themify-icons.css">
</head>
<body>
    <div class="main">
        <div class="header">
            <ul class="menu">
                <li class="menu-item" style="font-weight: bold;">Administration</li>
                <li class="menu-item">Trang chủ</li>
                <li class="menu-item">Trang ngoài</li>
                <li class="menu-item" style="font-weight: bold;">Thể loại</li>
                <li class="menu-item">Tác giả</li>
                <li class="menu-item">Bài viết</li>
            </ul>
        </div>
    
        <div class="content">
            <a class="btn-add" href="add.php">Thêm mới</a>
            <table class="tbl-data">
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá thành</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                <?php 
                    include "connect.php";
                    $query = "select * from product";
                    $result = mysqLi_query($conn, $query);
                    while ($row = mysqLi_fetch_array($result)) {
                        
                ?>
                    <tr>
                        <td><?php echo $row['Name']?></td>
                        <td><?php echo $row['Price']?></td>
                        <td><a href="edit.php?this_ID=<?php echo $row['ID'] ?>"><i class="ti-pencil-alt"></i></a></td>
                        <td><a href="delete.php?this_ID=<?php echo $row['ID'] ?>"><i class="ti-trash"></i></a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="footer">
            <h2 class="footer-heading">TLU'S MUSIC GARDEN</h2>
        </div>
    </div>
</body>
</html> 