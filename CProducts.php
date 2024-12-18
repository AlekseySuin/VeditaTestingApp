<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['is_hidden']){
        $id = $_POST['id'];
        $updateProduct = new CProducts('localhost', 'root', '', 'Products');
        $updateProduct->hideProduct($id);
    }
    else{
        $id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        $updateQuantitty = new CProducts('localhost','root','','Products');
        $updateQuantitty->updateQuanity($id,$quantity);
    }
}

class CProducts {
    private $db;
    
    public function __construct($host, $user, $pass, $dbname) {
        $this->conn = new mysqli($host, $user, $pass, $dbname);
        if($this->conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
        }        
    }
    
    public function getProducts($limit = 10){
        $query = "SELECT * FROM Products WHERE IS_HIDDEN = 0 ORDER BY DATE_CREATE DESC LIMIT $limit";
        $result = mysqli_query($this->conn,$query);
        return $result;
    }

    public function hideProduct($productId){
        $query = "UPDATE Products SET IS_HIDDEN = 1 WHERE PRODUCT_ID = $productId";
        $result = mysqli_query($this->conn,$query);
    }

    public function updateQuanity($productId, $quantity){
        $query = "UPDATE Products SET PRODUCT_QUANTITY = $quantity WHERE PRODUCT_ID = $productId";
        $result = mysqli_query($this->conn,$query);
    }
};