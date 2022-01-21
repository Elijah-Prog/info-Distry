<?php

session_start();

if(isset($_SESSION['userid'])){

    $_SESSION['userid'] == NULL;

    unset($_SESSION['userid']);
    unset($_SESSION['email']);
    unset($_SESSION['password']);

}


header("Location: signin_redirect.php");die;