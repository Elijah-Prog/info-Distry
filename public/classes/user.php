<?php

class User{

    public function get_data($id){


        $query = "select * from users where userid = '$id' limit 1 ";

        $DB = new DB();
        $result = $DB->read($query);

        if($result){

            $row = $result[0];
            
            return $row;

        }else{

            return false;
        }

    }

    public function get_user($id){

        $query = "select * from users where userid = '$id' limit 1";

        $DB = new DB();
        $result = $DB->read($query);

        if($result){

            return $result[0];
        }
        else{

            return false;
        }
    }
    public function get_friends($id){

        $query = "select * from users where userid != '$id' limit 6 ";

        $DB = new DB();
        $result = $DB->read($query);

        if($result){

            return $result;
        }
        else{

            return false;
        }
    }
}


?>