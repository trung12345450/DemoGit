<?php 
    class Database {
        private $hostname = 'localhost';
        private $username = 'root';
        private $password = '';
        private $database = 'quanlysanpham_mvc';

        private $conn = NULL;
        private $result = NULL;

        public function connect() {
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);
            if (!$this->conn) {
                echo "kết nối thất bại";
                exit();
            } else {
                mysqli_set_charset($this->conn, 'utf8');
            }
            return $this->conn;
        }

        public function execute($sql) {
            $this->result = $this->conn->query($sql);
            return $this->result;
        }

        public function getData() {
            if ($this->result) {
                $data = mysqli_fetch_array($this->result);
            } else {
                $data = 0;
            }
            return data;
        }

        public function getAllData() {
            if (!$this->result) {
                return FALSE;
            } else {
                while ($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function insertData($tensanpham, $gia) {
            $sql = "INSERT INTO sanpham (name, price) VALUES ('$tensanpham', '$gia')";
            return this-execute($sql);
        }

        public function updateData($id, $tensanpham, $gia) {
            $sql= "UPDATE sanpham SET name = '$tensanpham', price = '$gia' WHERE id = '$id'";
            return $this->execute($sql);
        }

        public function deleteData($id) {
            $sql = "DELETE sanpham WHERE id = '$id'";
            return $this->execute($sql);
        }
    }
?>