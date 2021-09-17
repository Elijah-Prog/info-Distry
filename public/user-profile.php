<!DOCTYPE html>

<?php

    session_start();

    include_once ("classes/connect.php");
    include_once ("classes/login.php");
    include_once ("classes/user.php");
    include_once ("classes/post.php");

    $login = new Login();

    $user_data = $login->check_login($_SESSION['userid']);

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
        <title>Profile | <?php echo $user_data['first_name']?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" media="all" href="stylesheet/user-profile.css" />
    </head>
    <body style="background-color: #d0d8d4;">
    <br>
        <!--Top bar-->
        <div id="header_bar">
            <div style="margin:auto; width: 800px; font-size: 30px; padding: 10px; ">
            <a class="logo" href="index.php">Info:Distry</a> &nbsp; &nbsp; <input type="text" placeholder="Search for users" id="search-box">

            <?php

                $image = "";

                if(file_exists($user_data['profile_image'])){

                    $image = $user_data['profile_image'];
                }

                ?>
            
            <img src="<?php echo $image; ?>" style="width: 40px; float: right; border-radius: 200px;"></img>
            <a href="logout.php">
            <span style="font-size: 16px; float: right; background-color: black; border-radius: 200px; width: 70px; text-align: center; margin: 10px; color: white; height: 20px">Logout</span>
            </a>
            </div>
        </div>
        
        <!--Cover Area -->

        <div id="user-profile-content">
            <div style="background-color: white; text-align: center;">
                <img src="/info-Distry/public/images/ashim-d-silva-WeYamle9fDM-unsplash.jpg" alt=""  style="width: 100%; height: 250px;">
                <span style="font-size: 12px;">

                    <?php

                        $image = "";

                        if(file_exists($user_data['profile_image'])){

                            $image = $user_data['profile_image'];
                        }
                    
                    ?>
                    <img src="<?php echo $image ?>" alt="" id="profile-picture"><br>
            <a style="text-decoration: none;" href="change_image_profile.php">Change Image</a>
                    
                </span><br>
                <div id="username-profile"><?php echo $user_data['first_name'] ." ". $user_data['last_name'] ?></div>
                <br>
                <br>
                <hr>
                <div id="menu-button"><a href="index.php">Timeline</a></div> 
                <div id="menu-button"><a href="">About</a></div> 
                <div id="menu-button"><a href="">Friends</a></div> 
            </div>

            <!--below Cover Area -->
            <div style="display: flex;">

                <!--Distries Area -->
                <div style="min-height :400px; flex:1;">
                
            </div>

                <!--Posts Area -->
                <div style="min-height: 400px; flex:2.5; padding: 20px; padding-right: 20px; margin:0; width: 100%;">
                    <div id="share-text" style="border: solid thin #aaa; padding: 10px; background-color:rgb(43, 42, 42);">
                        <?php include 'content.php'?>
                    </div>
                    <br>
                    <div id="post-bar">
                            <?php 
                            include 'user_post.php'
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>