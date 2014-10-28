<?php require_once 'mysqldb.php'; ?>
<?php

/*
 * User Behaviour  Class will Dealing with products Seen by the user Logging to system   
 */

class userBehaviour { 
    
    public $userId;
    public $productId;
    public $behave;
    public $refuseReason;
    
    public function insert(){
        $database = new database();        
        $sql = "INSERT INTO user_behaviour(user_id,product_id,behave,refuse_reason) "
              . "values($this->userId,$this->productId,$this->behave, $this->refuseReason)";
        $result = $database->query($sql);
        return $result ? TRUE : FALSE;
    }
}
?>