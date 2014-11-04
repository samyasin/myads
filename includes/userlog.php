<?php require_once 'mysqldb.php'; ?>
<?php

date_default_timezone_set('America/Los_Angeles');
/*
 * User Log  Class will Dealing with user Logging to system   
 */

class userLog { 
    
    public $userId;
    public $productId;
    public $date;
    
    public function insert(){        
        $database = new database();
        $this->date = date("Y-m-d H:i:s"); 
        $sql = "INSERT INTO user_log(user_id,product_id,date) values($this->userId,$this->productId,'$this->date')";
        $result = $database->query($sql);
        return $result ? TRUE : FALSE;
    }
    
    public function fetchById($id){
        $database = new database();
        $this->date = date("Y-m-d"); 
        $sql = "SELECT user_log.user_id,user_log.product_id, products.category, products.meta FROM user_log"
                . " INNER JOIN products ON products.product_id = user_log.product_id "
                . " WHERE user_id = $id AND date = '$this->date'";        
        $result = $database->query($sql);
        $userSet = $database->fetchArray($result);
        return $userSet ? $userSet : FALSE;
    }
}
?>