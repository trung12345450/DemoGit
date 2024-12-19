<?php
session_start();

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ["stt" => 1, "name" => "Cẩm Tú Cầu", "description" => "Cẩm tú cầu là loại cây thường mọc thành bụi có hoa nở to thành từng chùm và đặc biệt thích hợp với mùa hè. Hoa ưa ánh nắng mặt trời từ bình minh cho đến khi lặn xuống mỗi chiều tà. Hoa có nhiều màu sắc như trắng, tím, hồng, xanh rất nhẹ nhàng. Hoa thích hợp trồng nơi sân vườn rộng rãi hoặc chậu nhỏ để trang trí nhà ở.","image" => "images/cam_tu_cau.webp"],
        ["stt" => 2, "name" => "Cúc Dại", "description" => "Với phần thân mảnh mai nhưng luôn vươn lên mạnh mẽ, lại chịu được nhiệt độ cao, thậm chí là khi tiết trời hạn hán nên hoa cúc dại cực kỳ thích hợp trồng từ mùa xuân cho đến tận mùa hè nắng gắt. Hoa có màu trắng, hồng tươi sáng hay vàng cam nổi bật, không kiêu sa nhưng sức sống bền bỉ. Thậm chí khi hoa tàn, hạt rụng xuống đất lại tiếp tục phát triển vào mùa thu.","image" => "images/cuc_dai.webp"],
        ["stt" => 3, "name" => "Cúc Lá Nho", "description" => "Cúc lá nho thuộc họ nhà Cúc, được biết đến với những bông hoa nhiều màu sắc phong phú, tươi sáng: nào là trắng, hồng cho đến tím, xanh dương,… và những chiếc lá to với hình dáng răng cưa độc đáo. Hạt cúc lá nho nảy mầm nhanh vào mùa xuân, nở hoa sang tận mùa hè lẫn mùa thu. Đây là loại hoa biểu trưng cho sự giàu có và trường thọ.","image" => "images/cuc_la_nho.jpg"],
        ["stt" => 4, "name" => "Dạ Yến Thảo", "description" => "Dạ yến thảo là lựa chọn thích hợp cho những ai yêu thích trồng hoa làm đẹp nhà ở. Hoa có thể nở rực quanh năm, kể cả tiết trời se lạnh của mùa xuân hay cả những ngày nắng nóng cao điểm của mùa hè. Dạ yến thảo được trồng ở chậu treo nơi cửa sổ hay ban công, dáng hoa mềm mại, sắc màu đa dạng nên được yêu thích vô cùng.","image" => "images/da_yen_thao.webp"],
        ["stt" => 5, "name" => "Hoa Cẩm Chướng", "description" => "Cẩm chướng là loại hoa thích hợp trồng vào dịp xuân - hè, nếu tiết trời không quá lạnh có thể kéo dài đến tận mùa đông. Hoa có phần thân mảnh, các đốt ngắn mang lá kép cùng nhiều màu sắc như hồng, vàng, đỏ, tím,… thậm chí có thể pha lẫn màu để tạo nên đường viền xinh xắn. Đặt một chậu hoa cẩm chướng trên bàn sẽ khiến căn phòng của bạn đẹp mắt hơn rất nhiều.","image" => "images/cam_chuong.webp"],
        ["stt" => 6, "name" => "Hoa Đèn Lồng", "description" => "Giống như tên gọi, hoa đèn lồng có vẻ đẹp giống như chiếc đèn lồng đỏ trên cao. Nếu giàu trí tưởng tượng hơn, chúng ta sẽ hình dung hoa khi nụ đổ xuống thành từng chùm, kết năm kết ba như những thiếu nữ xúng xính trong chiếc đầm dạ hội. Hoa đèn lồng còn có tên là hồng đăng hoa, trồng trong chậu treo, bồn, phên dậu,… gieo hạt vào mùa xuân và cho hoa quanh năm.","image" => "images/den_long.webp"],
        ["stt" => 7, "name" => "Hoa Đồng Tiền", "description" => "Hoa đồng tiền thích hợp để trồng trong mùa xuân và đầu mùa hè, khi mà cường độ ánh sáng chưa quá mạnh. Cây có hoa to, nở rộ rực rỡ, lại khá dễ trồng và chăm sóc nên sẽ là lựa chọn thích hợp của bạn trong tiết trời này. Về mặt ý nghĩa, hoa đồng tiền cũng tượng trưng cho sự sung túc, tình yêu và hạnh phúc viên mãn.","image" => "images/dong_tien.webp"],
        ["stt" => 8, "name" => "Hoa Dừa Cạn", "description" => "Hoa dừa cạn còn có các tên gọi như trường xuân hoa, dương giác, bông dừa, mỹ miều hơn thì là Hải Đằng. Hoa nở không ngừng từ mùa xuân sang mùa hè cho đến tận mùa thu. Hoa có 3 màu cơ bản là trắng, hồng nhạt và tím nhạt, lá và hoa cùng nhau vươn lên khiến cho khóm dừa cạn tuy nhỏ bé nhưng luôn tràn đầy sức sống. Loài hoa này còn tượng trưng cho sự thành đạt và có khả năng trừ tà.","image" => "images/dua_can.webp"],
        ["stt" => 9, "name" => "Hoa Giấy", "description" => "Hoa giấy có mặt ở hầu khắp mọi nơi trên đất nước ta, thích hợp với nhiều điều kiện sống khác nhau nên rất dễ trồng, không tốn quá nhiều công chăm sóc nhưng thành quả mang lại sẽ khiến bạn vô cùng hài lòng. Hoa giấy mỏng manh nhưng rất lâu tàn, với nhiều màu như trắng, xanh, đỏ, hồng, tím, vàng… cùng nhiều sắc độ khác nhau. Vào mùa khô hanh, hoa vẫn tươi sáng trên cây khiến ngôi nhà luôn luôn bừng sáng.","image" => "images/giay.webp"],
        ["stt" => 10, "name" => "Hoa Huỳnh Anh", "description" => "Nếu bạn đang đi tìm một loài hoa tô điểm cho khu vực ban công hoặc hàng rào ngôi nhà thì huỳnh anh là một lựa chọn thích hợp trong mùa này hơn cả. Hoa có màu vàng rực, hình dạng như chiếc kèn be bé inh xinh, lại dễ trồng, mọc nhanh, vươn cao… Huỳnh Anh rất thích nắng, ánh nắng giúp hoa tỏa sáng rực rỡ, nếu ở nơi bóng râm thì chúng sẽ nhạt màu, kém sắc.","image" => "images/huynh_anh.webp"],
        ["stt" => 11, "name" => "Hoa Păng-Xê", "description" => "Vào mỗi độ tháng 4 về là dịp mà loài hoa Phăng-xê nở rộ vô cùng đẹp mắt. Hoa còn được gọi tên là hay hoa bướm, hoa tử la lan, hoa tương tư,… Păng-xê thường được trồng trong chậu nhỏ, với phần cánh mỏng mượt như nhung, hình dạng cánh bướm mềm mại như đang tung tăng nhảy múa mỗi khi có làn gió thổi qua. Đây cũng là loài hoa tinh tế và sức sống bền bỉ.","image" => "images/pang_xe.webp"],
        ["stt" => 12, "name" => "Hoa Sen", "description" => "Khi những tia nắng ấm áp của mùa hè bắt đầu xuất hiện thì cũng là lúc mùa sen lại về trên những cánh đồng bạt ngàn. Hoa sen tượng trưng cho vẻ đẹp trắng trong, tao nhã của tâm hồn. Hoa có thể được trồng trong chiếc ao vườn nhà, có thể được trồng trong chậu trang trí đều đẹp cả. Những bông hoa đẹp nở rộ như báo hiệu một mùa hè tuyệt đẹp hiện hữu trong ngôi nhà của bạn.","image" => "images/sen.webp"],
        ["stt" => 13, "name" => "Hoa Sĩ Quân Tử", "description" => "Sử quân tử là loài cây leo, hoa có cánh nhỏ xinh, màu hồng pha trắng hoặc đỏ tươi, mọc thành từng chùm khoe sắc trong nắng sớm, rung rinh trong gió. Hoa toát lên một vẻ đẹp vô cùng giản dị kèm theo mùi hương nồng đượm. Tuy nhẹ nhàng là thế nhưng sử quân tử lại có khả năng chịu được nắng nóng khắc nghiệt nên có thể trồng trong cả mùa hè.","image" => "images/quan_tu.webp"],
        ["stt" => 14, "name" => "Hoa Thanh Tú", "description" => "Mang dáng hình tao nhã, màu sắc thiên thanh dịu dàng của hoa thanh tú có thể khiến bạn cảm thấy vô cùng nhẹ nhàng khi nhìn ngắm. Cây khá dễ trồng, lại nở nhiều hoa cùng một lúc, từ một bụi nhỏ có thể đâm nhánh, tạo nên những cây con phát triển sum suê. Thanh tú trồng ở nơi có nắng sẽ ra hoa nhiều, vì thế thích hợp trong cả mùa xuân lẫn mùa hè, đem lại khoảng không gian xanh mát cho ngôi nhà ngày oi nóng.","image" => "images/Thanh_tu.webp"],
    ];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addProduct'])) {
// Kiểm tra và lấy dữ liệu từ form
    if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['image'])  ) {
        $newProduct = [
            'stt' => count($_SESSION['products']) + 1, // Tự động tăng STT
            'name' => htmlspecialchars($_POST['name']),
            'description' => htmlspecialchars($_POST['description']),
            'image' => htmlspecialchars($_POST['image']),
        ];

        // Thêm sản phẩm mới vào session
        $_SESSION['products'][] = $newProduct;
        header('Location: Admin.php');
        exit();
    }
}

// Xử lý khi người dùng nhấn nút "Xóa"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $sttToDelete = $_POST['delete'];

    // Tìm sản phẩm có STT tương ứng và xóa
    foreach ($_SESSION['products'] as $stt => $product) {
        if ($product['stt'] == $sttToDelete) {
            unset($_SESSION['products'][$stt]);
            $_SESSION['products'] = array_values($_SESSION['products']);
            $_SESSION['message'] = "Loài hoa với STT $sttToDelete đã được xóa.";
            header('Location: Admin.php');
            exit();
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
</head>
<body>
<div class="product-management">
    <form action="addForm.php" method="POST">
        <button class="add-btn" type="submit" name="addProduct">Thêm mới</button>
    </form>
    <table>
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Ảnh</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['products'] as $product): ?>
            <tr>
                <td><?= htmlspecialchars($product['stt']); ?></td>
                <td><?= htmlspecialchars($product['name']); ?></td>
                <td><?= htmlspecialchars($product['description']); ?></td>
                <td><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="80" height="80"></td>
                <td>
                    <form action="editForm.php" method="GET">
                        <input type="hidden" name="stt" value="<?= $product['stt']; ?>">
                        <button type="submit" class="edit">🖊️</button>
                    </form>
                </td>

                <td><button class="delete" onclick="openModal(<?= $product['stt']; ?>)">🗑️</button></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div id="ModDelete" class="ModDelete">
    <div class="modal-content">
        <span class="close" onclick="closeModDelete()">&times;</span>
        <p>Bạn chắc chắn muốn xóa sản phẩm này?</p>
        <form action="Admin.php" method="POST">
            <input type="hidden" id="sttToDelete" name="delete">
            <button type="submit" id="btnModDel">Xóa</button>
            <button type="button" id="btnModCancel" onclick="closeModDelete()">Hủy</button>
        </form>
    </div>
</div>
</body>
</html>
<script>
    // Mở modal xác nhận
    function openModal(stt) {
        document.getElementById('sttToDelete').value = stt;
        document.getElementById('ModDelete').style.display = "block";
    }

    // Đóng modal
    function closeModDelete() {
        document.getElementById('ModDelete').style.display = "none";
    }

    // Đóng modal nếu người dùng nhấn ngoài modal
    window.onclick = function(event) {
        if (event.target === document.getElementById('ModDelete')) {
            closeModDelete();
        }
    }
</script>