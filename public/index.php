<?php




include_once ("classes/autoload.php");

$login = new Login();

$user_data = $login->check_login($_SESSION['userid']);

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport"  content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="google" content="notranslate">
        <meta lang="en">

        <style>
            #loader{

                background-color:black;
                opacity:0.7;
                width:100%;
                height:100%;
            }
        </style>
        <script src="/javascript/jquery-3.6.0.min.js"></script> 
        <script src="javascript/jquery-3.6.0.min.js"></script>
    </head>

    <body style="background-color:rgb(214, 213, 211);">
        <?php include_once ('../private/initialize.php'); ?>

        <?php include (SHARED_PATH .'/public_header.php')?>
        <br>
        <br>
        <br>
        <br>
        <!--Modal Section-->
        <br>
        <br>
        
        <?php
            include 'user-posts.php';
        ?>
        <br>

    <?php //include (SHARED_PATH .'/public_footer.php')?>

    <div id="loader"></div>
    
    <script type="text/javascript">

            $(window).scroll(function(){if $(window().scroll(100)){

                let vid = document.getElementById("vid-content");
                vid.pause();
            }});
            
    </script>

    </body>

    
</html>





