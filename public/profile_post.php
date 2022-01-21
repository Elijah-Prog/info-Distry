<!DOCTYPE html>

<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

    include_once ("classes/autoload.php");

    $login = new Login();

    $user_data = $login->check_login($_SESSION['userid']);

    $profile = new Profile();

    if(isset($_GET['id'])){

        $profile_data = $profile->get_profile($_GET['id']);
        
        if(is_array($profile_data)){

        $user_data = $profile_data[0];
        }
    }

    
    
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
        $id = $_SESSION['userid'];
        $posts = $post->get_posts($id);

         //collect friends
         $user = new User();
         $id = $_SESSION['userid'];
         $friends = $user->get_friends($id);

?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" media="all" href="stylesheet/user_post_info.css" />
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
    </head>

    <body>
        <div style="display: flex;">
            <div id="post-section" style="min-height :800px; flex:2; width: fit-content;">
                <div id="content-post" style="width:fit-content; margin:auto;">
                    <?php 

                    if($posts){

                        foreach($posts as $ROW){

                            
                            $user = new User();
                            $ROW_USER = $user->get_user($_SESSION['userid']);
                            
                            include 'single_post.php'; 
                        }
                    }
                    ?>
                <br>
                </div>
                
        </div>
                &nbsp; &nbsp;
    </body>
</html>