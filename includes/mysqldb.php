<?php
require_once 'config.php';
/*
 * PDO Database Class
 *
 * Dealing with Database according to PDO 
 * 
 * @copyright  Copyright (c) 2014 Salameh Yssin 
 * @version    Release: 1.0
 * @author     Salameh Yasin <salameh.yasin@yahoo.com>
 */
class database {

    private $connection;
    private $databaseName;

    public function __construct() {
        $this->openConnection();
    }

    private function openConnection() {
        $this->connection = mysql_connect(DBSERVER, DBUSERNAME, DBPASSWORD);
        if (!$this->connection) {
            die(mysql_error());
        } else {
            $this->databaseName = mysql_select_db(DBNAME);
            if (!$this->databaseName) {
                die(mysql_error());
            }
        }
    }

    public function query($sql) {
        $query = mysql_query($sql);
        return $this->confirmQuery($query);
    }

    public function confirmQuery($query) {
        if (isset($query)) {
            return $query;
        } else {
            return false;
        }
    }

    public function fetchArray($result) {
        $rows = array();
        while ($querySet = mysql_fetch_array($result)) {
            $rows[] = $querySet;
        }
        if (isset($rows) && !empty($rows)) {
            return $rows;
        } else {
            return FALSE;
        }
    }

    public function lastId() {
        return mysql_insert_id();
    }
    public function affectedRows(){
        return mysql_affected_rows();
    }
    
    public function filter($value = ''){
        return mysql_real_escape_string($value);
    }

}
