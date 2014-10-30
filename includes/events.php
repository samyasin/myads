<?php require_once 'mysqldb.php'; ?>
<?php
date_default_timezone_set('America/Los_Angeles');

/*
 * User Class will make User CRUD 
 */

class events {

    public $eventId;
    public $userId;
    public $event_name;    
    public $event_date;
    
    // this method will fetch all subProfiles from DB
    public static function fetchAll($user_id) {
        $database = new database();
        $date = date('Y-m-d');        
        $result = $database->query("SELECT * FROM events where user_id = $user_id AND event_date='$date'");        
        $userSet = $database->fetchArray($result);
        if (isset($userSet)) {
            return $userSet;
        } else {
            return FALSE;
        }
    }

  
    //create new SubProfile
    public function create() {        
        $database = new database();
        $sql = "INSERT INTO events(user_id, event_name,event_date)
                VALUES ($this->userId, '$this->event_name', "               
                . " '$this->event_date')";
        
        $result = $database->query($sql);
        if($database->lastId() !=0){            
            return TRUE;
        }  else {
            return FALSE;
        }        
    }    
}
