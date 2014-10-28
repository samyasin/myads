<?php require_once 'mysqldb.php'; ?>
<?php

/*
 * User Feedback  Class will Dealing with products Seen by the user Logging to system   
 */

class userFeedback { 
    
    public $userId;
    public $productId;
    public $rate;
    public $comment;
    
    public function insert(){
        $database = new database();        
        $sql = "INSERT INTO user_feedback(user_id,product_id,rate,comment) "
              . "values($this->userId,$this->productId,$this->rate, '$this->comment')";
        $result = $database->query($sql);
        return $result ? TRUE : FALSE;
    }
}
?>