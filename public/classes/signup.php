<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Signup{


    private $error = "";
    public function evaluate($data){

        //loop through the data to be evaluated
        foreach($data as $key => $value){
            
            //check if the value evaluated is empty then if empty return an error
            if(empty($value)){

                $this->error = $this->error . $key. " is empty!<br>";
            }

            if($key == "email"){

                if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)){

                    $this->error = $this->error ."please enter valid email address!<br>";
                }
            }

                if($key == "first_name"){

                    if(is_numeric($value)){
    
                        $this->error = $this->error ."name can't be a number!<br>";
                    }
                    if(strstr($value, " ")){
    
                        $this->error = $this->error ."name can't contain empty spaces!<br>";
                    }


                }
                if($key == "password"){
                    if(empty($value)){
                        $this->error = $this->error ."Password can't be empty!<br>";
                    }else if(strlen($value < 8)){
                        $this->error = $this->error ."Password must be atleat 8 characters!<br>";
                    }else if(!preg_match("/[a-z]/", $value)||
                            !preg_match("/[A-Z]/", $value)||
                            !preg_match("/[0-9]/", $value)

                    ){
                        $this->error = $this->error ."Password require 1 each of a-z, A-Z and 0-9!<br>";
                    }
                }

                    if($key == "last_name"){

                        if(is_numeric($value)){
        
                            $this->error = $this->error ."last name can't be a number!<br>";
                        }
                        if(strstr($value, " ")){
        
                            $this->error = $this->error ."last name can't contain empty spaces!<br>";
                        }
            }
        }

        if($this->error == ""){

            $this->create_user($data);

        }else{
            return $this->error;
        }
    }

    public function create_user($data){
        
        
        $first_name = ucfirst($data['first_name']);
        $last_name = ucfirst($data['last_name']);
        $gender = $data['gender'];
        $email = $data['email'];
        $password = $data['password'];
        
        //create these from php
        $userid = $this->create_userid();
        $url_address = strtoLower($first_name) . "." . strtoLower($last_name);


        $query = "insert into users (userid, first_name, last_name, gender, email, password, url_address) values ('$userid', '$first_name', '$last_name', '$gender', '$email', '$password', '$url_address')";


        $DB = new DB();
        $DB->save($query);

    }
    private function create_userid(){

        $length = rand(4,19);
        $number = "";
        for($i=0; $i < $length; $i++){

            $new_rand = rand(0,9);

            $number = $number . $new_rand;

        }

        return $number;
    }
}
?>