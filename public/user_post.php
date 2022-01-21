<!DOCTYPE html>

<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

    include_once ("classes/autoload.php");
    

    if(isset($_SESSION['userid']) && is_numeric($_SESSION['userid'])){

        $id = $_SESSION['userid'];
        $login = new Login();

        $result = $login->check_login($id);

        if($result){
            
            $user = new User();

            $user_data = $user->get_data($id);

            if(!$user_data){
                
                header("Location:signin_redirect.php");die;

            }
            
        }else{

            header("Location:signin_redirect.php");die;
        }
    }
    else{

            header("Location:signin_redirect.php");die;
        }


    //for posting

    

    //collect posts

        $post = new Post();
        $id = $user_data['userid'];
        $posts = $post->get_posts($id);
        //collect friends

        $user = new User();
        $id = $_SESSION['userid'];
        $friends = $user->get_friends($id);

        $image_class = new Image();

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google" content="notranslate">
        <link rel="stylesheet" media="all" href="stylesheet/user_post_info.css" />
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
        <script src="/javascript/jquery-3.6.0.min.js"></script> 
        <script src="javascript/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        <div style="display: flex; height: auto;">
            <div id="post-section" style="height :fit-content; flex:2;">
                <br>
                <div id="content-post">
                 <br>
                    <?php 

                    if($posts){

                        foreach($posts as $ROW){
                            $user = new User();
                            $ROW_USER = $user->get_user($ROW['userid']);
                            
                            include 'single_post.php'; 
                        }
                    }
                    ?>
                <br>
                <br>
                </div>
                
        </div>
                &nbsp; &nbsp;
                <div id="news-feed" style="height:auto; flex:0.8; min-width: 400px">
                
                    <?php include 'generalInfo.php'?>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?php include 'somesiteinfo.php'?>
                    <br>
                    
                </div>
                
                
    </div>

    <!--<script type="text/javascript">
        var start = 0;
        var limit = 5;

        var reachedMax = false;

        $(document).ready(function(){

            getData();
        });

        function getData(){
            if(reachedMax){
                return;

                $.ajax({
                    url: 'classes/post.php',
                    method: 'POST',
                    dataType:'text',
                    dataType: {
                        getData:1,
                        start: start,
                        limit: limit
                    },
                    success: function(response){
                        if(response == "reachedMax"){

                            reachedMax = true;
                        }
                    }
                });
            }
        }
    </script>-->
    
    </body>
</html>