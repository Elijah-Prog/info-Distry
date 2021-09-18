<!DOCTYPE html>

<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

    include_once ("classes/connect.php");
    include_once ("classes/login.php");
    include_once ("classes/user.php");
    include_once ("classes/post.php");

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

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $post = new Post();
        $id = $_SESSION['userid'];
        $result = $post->create_post($id,$_POST);

        if($result == ""){

            header("Location: user-profile.php");die;
        }else{
            echo "<div style='text-align:center; background-color:grey;'>";
            echo "Following error occured: <br><br>";
            echo $result;
            echo "</div>";
        }
    }

    //collect posts
        $post = new Post();
        $id = $_SESSION['userid'];
        $posts = $post->get_posts($id,$_POST);

?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" media="all" href="stylesheet/user_post_info.css" />
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
    </head>

    <body>
        <div style="display: flex;">
            <div id="post-section" style="min-height :400px; flex:2;">
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
                </div>
                
        </div>
                &nbsp; &nbsp;
                <div id="news-feed" style="min-height: 400px; flex:1; min-width: 400px">
                    <?php include 'generalInfo.php'?>
                </div>
    </div>
    </body>
</html>