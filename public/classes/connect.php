<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//database connect class
class DB{

    private $host = 'localhost';
    private $username = 'adminuser';
    private $password = 'Elijah@2001';
    private $db = 'infodistry_db';



    function connect(){

        $connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        return $connection;
    }

    function read($query){
        $conn = $this->connect();
        $results = mysqli_query($conn, $query);

        if(!$results){

            return false;

        }else{

            $data = false;
            while($row = mysqli_fetch_assoc($results)){
                $data[] =  $row;
            }

            return $data;
            
        }
    }

    function save($query){
        
        $conn = $this->connect();
        $results = mysqli_query($conn, $query);

        if(!$results){
            return false;
        }else{
            return true;
        }
    }
}
?>