<!DOCTYPE html>

<?php

    include ("classes/autoload.php");

    $login = new Login();

    $user_data = $login->check_login($_SESSION['userid']);

    $profile = new Profile();

    if(isset($_GET['id']) && is_numeric($_GET['id'])){

        $profile_data = $profile->get_profile($_GET['id']);

        if(is_array($profile_data)){

            $user_data = $profile_data[0];
        }
    }


    //print_r($profile_data);die;

    //for posting

    
    //collect posts
        
        $post = new Post();
        $id = $user_data['userid'];
        $posts = $post->get_posts($id);

    //collect friends
        $user = new User();
        $id = $user_data['userid'];
        $friends = $user->get_friends($id);
        //print_r($posts);die;
    ?>

<html lang="eng">
    <head>
        <title>Profile - <?php echo $user_data['first_name']?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" media="all" href="stylesheet/user-profile.css" />
        <link rel="stylesheet" media="all" href="stylesheet/navigation.css" />
        <script src="/javascript/jquery-3.6.0.min.js"></script> 
        <script src="javascript/jquery-3.6.0.min.js"></script>

        <style>
            .bg-modal{

                width:100%;
                height:100%;
                background-color:rgba(0,0,0,0.7);
                position:fixed;
                top:0;
                display:none;
                transition:opacity 0.8s ease;
                overflow-y:show;
                z-index: 100000;
            }
            .modal-content{
                background-color:rgba(0,0,0,0);
                transition:0;
                margin:auto;
            }
            .options-settings{

                font-size:14px;
            }
            #error{

            
            transform: translateY(-50%);
            width: 15px;
            height: 15px;
            right: 0px;
            background: #ff0000;
            justify-content: center;
            align-items: center;
            margin:auto;
            }

            #error::before{
            position: absolute;
            content: '';
            width: 2px;
            height: 16px;
            background:white;
            transform: rotate(45deg);
            }

            #error::after{
            position: absolute;
            content: '';
            width: 2px;
            height: 16px;
            background:white;
            transform: rotate(315deg);
            }
        </style>
    </head>
    <body>

    
                    

    
    <br>
        <!--Top bar-->
        <div id="header_bar">
        <header class="front-header">
</id>
<a class="logo" href="index.php">WRLDNET2.0&nbsp;<sup style="font-size:10px;font-weight:normal;">ZA</sup></a>
        &nbsp;&nbsp;
        
        &nbsp; &nbsp;
        <ul class="nav-options">
            
            <li><a href="index.php">Home</a></li>
            <li><a href="notifications.php">Notifications</a></li>
            <li><a href="javascript:void(0);">About</a></li>
            <div id="myprofile" class="user-icon-log" href="#" style="" data-toggle="tooltip">
            <?php

                $image = "";

                if(file_exists($user_data['profile_image'])){

                    $image = $user_data['profile_image'];
                }
                else{

                    $image = "../public/images/user-icon.png";
                }

            ?>
            <img draggable=false class="user-post-icon" src="<?php echo $image;?>" alt="" width=50px height=50px>
            </div>
        </ul>
</header>

        </div>
        <!--Cover Area -->
        <div style="display:flex;" id="all-sett">
        <div style="background-color:#ffffff;min-width:250px;max-width:250px;height:auto;right:0;" id="p-settings">
        <h4 style="padding:5px;background-color:#2b2a2a;color:white;font-family: SFMono-Regular, Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace;font-size:14px;">Settings</h4>
            <ul style="list-style:none;padding:20px;height:fit-content;background-color:#2b2a2a;color:white;">
                <li class="options-settings">Privacy</li>
                &nbsp;
                <li class="options-settings">Dark Mode</li>
                &nbsp;
                <li class="options-settings">Permissions</li>
                &nbsp;
                <li class="options-settings">Deactivate</li>
            </ul>
            <h4 style="padding:5px;font-family: SFMono-Regular, Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace;font-size:14px;">System</h4>
            <ul style="list-style:none;padding:20px;height:fit-content;">
                <li class="options-settings">Insights</li>
                &nbsp;
                <li class="options-settings">Likes</li>
                &nbsp;
                <li class="options-settings">About</li>
                &nbsp;
                <li class="options-settings">Share</li>
    
            </ul>
            <div style="background-color:#2b2a2a;"><a style="text-decoration:none;" href="logout.php"><h4 style="color:white;height:40px;text-align:center;padding-top:10px;font-family: SFMono-Regular, Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace;font-size:14px;">Log Out</h4></a></div>
        </div>
            </div>
        <div  id="user-profile-content">
            <div style="background-color: white; text-align: center; height: 100%; box-shadow:2px; border-radius:2px;">

            <?php

                $image = "/info-Distry-v1.1/public/images/placeholder.jpg";

                if(file_exists($user_data['cover_image'])){

                    $image = $user_data['cover_image'];
                }

            ?>

            <a href="change_image_profile.php?change=cover_picture">

                <img draggable=false src="<?php echo $image; ?>" alt=""  style="width: 100%; height: 250px;">

            </a>
                <span style="font-size: 12px;">

                    <?php

                        $image = "/info-Distry-v1.1/public/images/male.png";

                        if($user_data['gender'] == "Female"){

                            $image = "/info-Distry-v1.1/public/images/female.png";
                        }

                        if(file_exists($user_data['profile_image'])){

                            $image = $user_data['profile_image'];
                        }
                    
                    ?>
                   
            <a style="text-decoration: none;" href="change_image_profile.php?change=profile_picture">

                <img draggable=false src="<?php echo $image ?>" alt="" id="profile-picture"><br>
        
            </a>
                    
                </span><br>
                <div id="username-profile"><?php echo $user_data['first_name'] ." ". $user_data['last_name'] ?></div>
                <br>
                <hr width=700px style="margin:auto;">
                <div class="menu-button"><a href="index.php">Timeline</a></div> 
                <div id="about-pop" class="menu-button">About</div> 
                <div class="menu-button">Followers</div> 
                <div class="menu-button">Photos</div> 
                <div class="menu-button">Documents</div>
                <div class="menu-button">Videos</div>  
                </div>
            <br>
            <?php
            if($_SERVER['REQUEST_METHOD'] == "POST"){
        

                $post = new Post();
                $id = $_SESSION['userid'];
                $result = $post->create_post($id,$_POST,$_FILES);

                if($result == ""){

                    
                }else{
                    echo "<div style='text-align:center; background-color:red;color:#fff;border-radius:5px;width:400px;margin:auto;'>";
                    echo "Following error occured: <br><br>";
                    echo "<span style='display:block;' title='Clear Search' id='error'></span>";
                    echo $result;
                    echo "</div>";
                }
    }
    ?>
    
                
            <!--below Cover Area -->
            <div style="display: flex; padding-right: 30px">

                <!--Distries Area -->
                
                        <div style="height :378px; width: 90px" id="friends-bar">
                            <p style="color: #aaa">Followers</p>

                            <?php 

                                if($friends){

                                    foreach($friends as $FRIEND_ROW){
                                        include 'user.php'; 
                                    }
                                }
                            ?>

                        </div>
                
                
                <!--Posts Area -->
                
                <div style="min-height: 400px; flex:2.5; padding: 20px; padding-right: 60px; margin:0; width: 800px;">
                        <?php include 'content.php'?>
                    </div>
                </div>
            </div>
        
          
                    <div id="post-bar" style="height: 800px;">
                            <?php
                             
                            include 'profile_post.php';
                            ?>

                        </div> 
        </div>

       

        <div class="bg-modal">

                <div class="modal-content">
            <?php
                include ('about.php');
            ?>
            </div>
        </div>
        

        
        
        <script type="text/javascript">

            document.getElementById('about-pop').addEventListener('click', function(){


            if( document.querySelector('.bg-modal').style.display = "none"){
                document.querySelector('.bg-modal').style.display = "flex";
                document.querySelector('.modal-content').style.transition = "opacity 0.8s ease 0.03";
            }
            });


            document.querySelector('.close').addEventListener('click', function(){
            document.querySelector('.bg-modal').style.display = "none";
            document.querySelector('.bg-modal').style.transition = "opacity 0.8s ease 0.03";
            });

            $('#mysearch').keyup(function(){
                document.getElementById('clear').style.display = "flex";
                document.getElementById('results').style.display = "flex";
                document.getElementById('results').style.transition = "0.5s ease 0.03";
            });

            document.getElementById('clear').addEventListener('click',function(){

                document.getElementById('clear').style.display = "none";
            });

            $(document). on('click', function(e) {
                var container = $("#results");
                if (!$( e. target). closest(container). length) {
                container. hide();
                }
                container.style.transition = "0.5s ease";
            });

            document.getElementById('content-post').style.padding = "0px";




         
        </script>
        
    </body>
</html>

