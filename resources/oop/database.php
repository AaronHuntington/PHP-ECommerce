<?php

class database {

    public $connection; 

    // Open Database automatically.
    function __construct(){
        $this->open_database();
    }

    // Opening the database connection. 
    public function open_database(){
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        if(mysqli_connect_errno()){
            die("Database connection fail: ".mysqli_error());
        }
    }

    // Querying the SQL Scripts.
    public function query($sql){
        $result = mysqli_query($this->connection, $sql);

        if($result){
            return $result;
        } else {
            die("SQL script query failed.");
        }
    }

    public function multi_query($sql){
        $result = mysqli_multi_query($this->connection,$sql);

        if($result){
            return $result;
        } else {
            die("SQL script query failed.");
        }
    }

    public function confirm($result){
        // global $connection; 
        if(!$result){
            die("QUERY FAILED " . mysqli_error($this->connection));
        }
    }

    // Escaping the string.
    public static function escape_string($string){
        $escaped_string = $this->connection->real_escape_string($string);
        return $escaped_string;
    }

    public static function fetch_array($result){
        return mysqli_fetch_array($result);
    }
}

$database = new database;

?>