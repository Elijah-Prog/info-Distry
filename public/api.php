<?php

//$data = file_get_contents("php://input");

if(count($_POST) > 0){

    $text = $_POST['text'];

    $string = "mysql:host=localhost;dbname=infodistry_db; ";

    try{

        $con = new PDO($string, "adminuser", "Elijah@2001");

    }catch(Exception $e){
        
        die($e->getMessage());
    }
    //read from db
    $text = addcslashes($text);
    $stm = $con->query("select * from users where first_name like '%$text%'");

    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}

?>