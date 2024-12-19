<form action="" method="post" enctype="multipart/form-data">
    Tên sản phẩm: <input type="text" name = "name" value="<?php echo $result['Name'] ?>"> <br>
    Giá: <input type="text" name = "price" value="<?php echo $result['Price'] ?>"> <br>
    <button name="btn-edit">Edit</button>
</form>