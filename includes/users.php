<?php
session_start();
require_once 'mysqldb.php'; ?>
<?php

/*
 * User Class will make User CRUD 
 */

class user {

    public $userId;
    public $email;
    public $password;
    public $firstName;
    public $lastName;
    public $birth;
    public $gender;
    public $occup;
    public $country;
    public $live;
    public $edu_intrest;
    public $techno_intrest;
    public $sport_intrest;
    public $car_intrest;
    public $music_intrest;
    public $movie_intrest;
    public $history_intrest;
    public $religion;
    public $color;

    // this method will fetch all users from DB
    public static function fetchAll() {
        $database = new database();
        $result = $database->query("SELECT * FROM users");
        $userSet = $database->fetchArray($result);
        if (isset($userSet)) {
            return $userSet;
        } else {
            return FALSE;
        }
    }

    // this method will fetch user by id 
    public static function fetchById($id) {
        $database = new database();
        $result = $database->query("SELECT * FROM users WHERE user_id = $id");
        $userSet = $database->fetchArray($result);
        if (isset($userSet)) {
            return $userSet;
        } else {
            return FALSE;
        }
    }

    //create new user
    public function create($record) {
        $this->instantiate($record);
        $database = new database();
        $sql = "INSERT INTO users(fname, lname, birth, gender, email, password, occup, country, live,
                                  edu_intrest, techno_intrest, sport_intrest, car_intrest, music_intrest,
                                  movie_intrest,history_intrest, religion, color)
                VALUES ('$this->firstName', '$this->lastName', "
                . "'$this->birth', '$this->gender', "
                . "'$this->email', '$this->password', '$this->occup', "
                . "'$this->country', '$this->live', '$this->edu_intrest', "
                . "'$this->techno_intrest' , '$this->sport_intrest', '$this->car_intrest',"
                . "'$this->music_intrest', '$this->movie_intrest', '$this->history_intrest',"
                . "'$this->religion','$this->color')";
        
        $result = $database->query($sql);
        if($database->lastId() !=0){
            $_SESSION['user_id'] = $database->lastId();
            return TRUE;
        }  else {
            return FALSE;
        }        
    }

    // instantiate Method 
    private function instantiate($post) {
        if (isset($post['fname'])) {
            $this->firstName = mysql_real_escape_string($post['fname']);
        }
        if (isset($post['lname'])) {
            $this->lastName = mysql_real_escape_string($post['lname']);
        }
        if (isset($post['birth'])) {
            $this->birth = mysql_real_escape_string($post['birth']);
        }
        if (isset($post['gender'])) {
            $this->gender = mysql_real_escape_string($post['gender']);
        }
        if (isset($post['email'])) {
            $this->email = mysql_real_escape_string($post['email']);
        }
        if (isset($post['password'])) {
            $this->password = mysql_real_escape_string($post['password']);
        }
        if (isset($post['country'])) {
            $this->country = mysql_real_escape_string($post['country']);
        }
        if (isset($post['live'])) {
            $this->live = mysql_real_escape_string($post['live']);
        }
        if (isset($post['edu_intrest'])) {
            $this->edu_intrest = mysql_real_escape_string($post['edu_intrest']);
        }
        if (isset($post['techno_intrest'])) {
            $this->techno_intrest = mysql_real_escape_string($post['techno_intrest']);
        }
        if (isset($post['sport_intrest'])) {
            $this->sport_intrest = mysql_real_escape_string($post['sport_intrest']);
        }
        if (isset($post['car_intrest'])) {
            $this->car_intrest = mysql_real_escape_string($post['car_intrest']);
        }
        if (isset($post['music_intrest'])) {
            $this->music_intrest = mysql_real_escape_string($post['music_intrest']);
        }
        if (isset($post['movie_intrest'])) {
            $this->movie_intrest = mysql_real_escape_string($post['movie_intrest']);
        }
        if (isset($post['history_intrest'])) {
            $this->history_intrest = mysql_real_escape_string($post['history_intrest']);
        }
        if (isset($post['religion'])) {
            $this->religion = mysql_real_escape_string($post['religion']);
        }
        if (isset($post['color'])) {
            $this->color = mysql_real_escape_string($post['color']);
        }
        if(isset($post['other_occup']) && isset($post['occup'])){
            if(empty($post['other_occup'])){
                $this->occup = mysql_real_escape_string($post['occup']);
            }else{
                $this->occup = mysql_real_escape_string($post['other_occup']);
            }
        }
    }

    // update user method
    public function update($id,$record) {
        $this->instantiate($record);
        $database = new database();
        $sql = "UPDATE users set
                  fname           ='$this->firstName',
                  lname           = '$this->lastName',
                  birth           = '$this->birth',
                  gender          = '$this->gender',
                  email           = '$this->email',
                  password        ='$this->password',
                  occup           = '$this->occup',
                  country         = '$this->country',
                  live            = '$this->live',
                  edu_intrest     = '$this->edu_intrest',
                  techno_intrest  = '$this->techno_intrest',
                  sport_intrest   = '$this->sport_intrest',
                  car_intrest     = '$this->car_intrest',
                  music_intrest   = '$this->music_intrest',
                  movie_intrest   = '$this->movie_intrest',
                  history_intrest = '$this->history_intrest',
                  movie_intrest   = '$this->movie_intrest',
                  religion        = '$this->religion',
                  color           = '$this->color'
                  WHERE user_id = $id";
        
        $result = $database->query($sql);
        return (($database->affectedRows() != 0) ? TRUE : FALSE); 
    }

    // Delete User 
    public function delete($id) {
        $database = new database();
        $sql = "DELETE FROM users WHERE user_id = $id";
        $database->query($sql);
        return (($database->affectedRows() != 0) ? TRUE : FALSE);
    }

    // Authintacete Will check if the user exist or not
    public static function Auth($email = '', $password = '') {        
        $database = new database();
        $sql = "SELECT user_id FROM users WHERE 
                email= '{$database->filter($email)}' AND password='{$database->filter($password)}'";                
        $result = $database->query($sql);
        $userSet = $database->fetchArray($result);
        if (isset($userSet[0]['user_id'])) {
            $_SESSION['user_id'] = $userSet[0]['user_id'];
            return $userSet[0]['user_id'];
        } else {
            return FALSE;
        }
    }

}
