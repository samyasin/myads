<?php require_once 'mysqldb.php'; ?>
<?php

/*
 * User Class will make User CRUD 
 */

class subProfile {

    public $subprofileId;
    public $userId;
    public $name;    
    public $electronics_intrest;
    public $furniture_intrest;
    public $beauty_intrest;
    public $toys_intrest;
    public $woman_intrest;
    public $men_intrest;

    // this method will fetch all subProfiles from DB
    public static function fetchAll($user_id) {
        $database = new database();
        $result = $database->query("SELECT * FROM sub_profiles where user_id = $user_id");        
        $userSet = $database->fetchArray($result);
        if (isset($userSet)) {
            return $userSet;
        } else {
            return FALSE;
        }
    }

  
    //create new SubProfile
    public function create($record) {
        $this->instantiate($record);
        $database = new database();
        $sql = "INSERT INTO sub_profiles(user_id, name,electronics_intrest, 
                                         furniture_intrest, beauty_intrest,
                                         toys_intrest, woman_intrest,men_intrest)
                VALUES ($this->userId, '$this->name', "               
                . " '$this->electronics_intrest', "
                . "'$this->furniture_intrest' , '$this->beauty_intrest', '$this->toys_intrest',"
                . "'$this->woman_intrest', '$this->men_intrest')";
        
        $result = $database->query($sql);
        if($database->lastId() !=0){           
            return TRUE;
        }  else {
            return FALSE;
        }        
    }

    // instantiate Method 
    private function instantiate($post) {
        if (isset($post['user_id'])) {
            $this->userId = $post['user_id'];
        }
        if (isset($post['name'])) {
            $this->name = mysql_real_escape_string($post['name']);
        }        
        if (isset($post['electronics_intrest'])) {
            $this->electronics_intrest = mysql_real_escape_string($post['electronics_intrest']);
        }
        if (isset($post['furniture_intrest'])) {
            $this->furniture_intrest = mysql_real_escape_string($post['furniture_intrest']);
        }
        if (isset($post['beauty_intrest'])) {
            $this->beauty_intrest = mysql_real_escape_string($post['beauty_intrest']);
        }
        if (isset($post['toys_intrest'])) {
            $this->toys_intrest = mysql_real_escape_string($post['toys_intrest']);
        }
        if (isset($post['woman_intrest'])) {
            $this->woman_intrest = mysql_real_escape_string($post['woman_intrest']);
        }
        if (isset($post['men_intrest'])) {
            $this->men_intrest = mysql_real_escape_string($post['men_intrest']);
        }        
    }

}
