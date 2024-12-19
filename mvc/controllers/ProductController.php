<?php
require_once './models/ProductModel.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

   // Controller
public function index() {
    $products = $this->productModel->getAllProducts();
    require './views/product/index.php'; // truyền $products vào view
}


    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name']) && isset($_POST['price'])) {
                $name = htmlspecialchars($_POST['name']);
                $price = (int)$_POST['price'];

                // Kiểm tra dữ liệu hợp lệ trước khi thêm sản phẩm
                if (!empty($name) && $price > 0) {
                    $this->productModel->addProduct($name, $price);
                    header('Location: index.php?controller=product&action=index');
                    exit;
                } else {
                    echo "Tên sản phẩm hoặc giá không hợp lệ.";
                }
            }
        }
        require './views/product/add.php';
    }

    public function edit() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $product = $this->productModel->getProductById($id);

        if (!$product) {
            die('Sản phẩm không tồn tại!');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name']) && isset($_POST['price'])) {
                $name = htmlspecialchars($_POST['name']);
                $price = (int)$_POST['price'];

                // Kiểm tra dữ liệu hợp lệ trước khi cập nhật sản phẩm
                if (!empty($name) && $price > 0) {
                    $this->productModel->updateProduct($id, $name, $price);
                    header('Location: index.php?controller=product&action=index');
                    exit;
                } else {
                    echo "Tên sản phẩm hoặc giá không hợp lệ.";
                }
            }
        }

        require './views/product/edit.php';
    }

    public function delete() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        // Kiểm tra sản phẩm có tồn tại trước khi xóa
        if ($id > 0) {
            $this->productModel->deleteProduct($id);
            header('Location: index.php?controller=product&action=index');
            exit;
        } else {
            die('Sản phẩm không tồn tại!');
        }
    }
}
