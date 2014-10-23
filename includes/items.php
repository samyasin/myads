<?php require_once 'mysqldb.php'; ?>
<?php

/*
 * Products Class will Fetch Product according to specific calculations  
 */

class product {

    public $productId;
    public $category;
    public $productName;
    public $price;
    public $description;
    public $image;
    public $url;

    // this method will fetch all products from DB
    public static function fetchAll() {
        $database = new database();
        $result = $database->query("SELECT * FROM products");
        $productSet = $database->fetchArray($result);
        if (isset($productSet)) {
            return $productSet;
        } else {
            return FALSE;
        }
    }

    // this method will fetch items by its categories 
    public static function fetchByCat($cat) {
        $database = new database();
        $result = $database->query("SELECT * FROM products WHERE category = '$cat'");
        $productSet = $database->fetchArray($result);
        if (isset($productSet)) {
            return $productSet;
        } else {
            return FALSE;
        }
    }

    // this method will fetch product by id 
    public static function fetchById($id) {
        $database = new database();
        $result = $database->query("SELECT * FROM products WHERE product_id = $id");
        $productSet = $database->fetchArray($result);
        if (isset($productSet)) {
            return $productSet;
        } else {
            return FALSE;
        }
    }

    public static function fetchBySql($sql) {
        $database = new database();
        $result = $database->query($sql);
        $userSet = $database->fetchArray($result);
        if (isset($userSet)) {
            return $userSet;
        } else {
            return FALSE;
        }
    }

}
