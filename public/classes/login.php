<?php

class Login{

    private $error = "";

    public function evaluate($data){
        
        if(isset($_POST['email'])){
            $email = addslashes($data['email']);
        }else{

            $this->error .= "No email was found<br>";
        }
        
        if(isset($_POST['password'])){
            $password = addslashes($data['password']);
        }
        
        
        $query = "select * from users where email = '$email' limit 1 ";


        $DB = new DB();
        $result = $DB->read($query);
        
        if($result){

            $row = $result[0];

            if($password == $row['password']){

                //create session data

                $_SESSION['userid'] = $row['userid'];

            }
            else{

                $this->error .= "Incorrect password or Email<br>";
            }

        }else{

            $this->error .= "Incorrect password or Email<br>";
        }

        return $this->error;
    }

    public function check_login($id){
        
        
        if(is_numeric($id)){

            $query = "select * from users where userid = '$id' limit 1 ";


            $DB = new DB();
            $result = $DB->read($query);

            if($result){

                $user_data = $result['0'];

                return $user_data;

            }else{

                header("Location:signin_redirect.php");die;
            }

        }else{

                header("Location:signin_redirect.php");die;
            }

    }
}

?>