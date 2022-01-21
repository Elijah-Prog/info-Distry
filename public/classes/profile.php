<?php

class Profile{

    function get_profile($id){

        $id = addslashes($id);

        $DB = new DB();

        $query = "select * from users where userid = '$id' limit 1";

       return $DB->read($query);
    }
}