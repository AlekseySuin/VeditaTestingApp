<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $updateProduct = new CProducts('localhost', 'root', '', 'Products');
    $updateProduct->updateHiddenInformation($id);
}

class CProducts {
    private $db;
    
    public function __construct($host, $user, $pass, $dbname) {
        $this->conn = new mysqli($host, $user, $pass, $dbname);
        if($this->conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
        }
        #$this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    }
    
    public function getProducts($limit = 10){
        $query = "SELECT * FROM Products WHERE IS_HIDDEN = 0 ORDER BY DATE_CREATE DESC LIMIT $limit";
        $result = mysqli_query($this->conn,$query);
        #$stmt = $this->db->prepare();
        #$stmt = DB::table('Products')->where('IS_HIDDEN', '=', 0)->orderBy('DATE_CREATE', 'DESC')->limit($limit)->get();
        #$stmt->execute();
        return $result;
    }

    public function updateHiddenInformation($productId){
        $query = "UPDATE Products SET IS_HIDDEN = 1 WHERE PRODUCT_ID = $productId";
        $result = mysqli_query($this->conn,$query);
    }

};