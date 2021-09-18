<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include_once ("classes/connect.php");
include_once ("classes/login.php");
include_once ("classes/user.php");
include_once ("classes/post.php");
include_once ("classes/image.php");

    $login = new Login();

    $user_data = $login->check_login($_SESSION['userid']);

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] !== ""){


            if($_FILES['file']['type'] == "image/jpeg"){


                
                $allowed_size = (1024 * 1024) * 5;
                if($_FILES['file']['size'] < $allowed_size){


                    $folder = "uploads/".$user_data['userid']."/";

                    //create folder

                    if(!file_exists($folder)){

                        mkdir($folder,0777,true);

                    }
                    $image = new Image();

                    $filename = $folder . $image->generate_filename(15);

                    move_uploaded_file($_FILES['file']['tmp_name'],$filename );

                    $change = "profile_picture";

                    if(isset($_GET['change'])){

                        $change = $_GET['change'];
                    }

                    

                    if($change == "cover_picture"){

                        if(file_exists($user_data['cover_image'])){

                            unlink($user_data['cover_image']);
                        }

                    $image->crop_image($filename,$filename, 1366, 488);

                    }else{

                        if(file_exists($user_data['profile_image'])){

                            unlink($user_data['profile_image']);
                        }

                         $image->crop_image($filename,$filename, 800, 800);
                    }

                if(file_exists($filename)){

                    $userid = $user_data['userid'];

                    //check for mode for redirect

                    if($change == "cover_picture"){

                        $query = "update users set cover_image = '$filename' where userid = '$userid' limit 1 ";

                    }else{

                        $query = "update users set profile_image = '$filename' where userid = '$userid' limit 1 ";
                    }
                    $DB = new DB();
                    $DB->save($query);

                    header("Location: user-profile.php");
                    
                    die;
            
                }
            }else{
                
                echo "<div style='text-align:center; background-color:grey;'>";
                echo "Following error occured: <br><br>";
                echo "Only images of size 5Mb or lower allowed!";
                echo "</div>";

            }

            }else{
                    
                    echo "<div style='text-align:center; background-color:grey;'>";
                    echo "Following error occured: <br><br>";
                    echo "Only images of JPEG type are allowed!";
                    echo "</div>";

                }

            }
            
        }


?>



<html>
    <head>

    <title>Change Profile Image | <?php echo $user_data['first_name']?></title>

    <link rel="stylesheet" media="all" href="stylesheet/image_profile.css" />

    </head>

    <body>

    <div id="header_bar">
            <div style="margin:auto; width: 800px; font-size: 30px; padding: 10px; ">
            <a class="logo" href="index.php">Info:Distry</a> &nbsp; &nbsp; <input type="text" placeholder="Search for users" id="search-box">

            <span>
            <?php

                    $image = "/info-Distry/public/images/male.png";

                    if($user_data['gender'] == "Female"){

                        $image = "/info-Distry/public/images/female.png";
                    }

                if(file_exists($user_data['profile_image'])){

                    $image = $user_data['profile_image'];
                }

                ?>
            <a href="user-profile.php">
            <img src="<?php echo $image; ?>" style="width: 40px; float: right; border-radius: 200px;"></img>
            </a>
            </span>
            <a href="logout.php">
            <span style="font-size: 16px; float: right; background-color: black; border-radius: 200px; width: 70px; text-align: center; margin: 10px; color: white; height: 20px">Logout</span>
            </a>
            </div>
        </div>
    
        

<div id="user-profile-content">
            <div style="background-color: white; text-align: center;">

            <div>

            <span>
            <?php
                        $image = "/info-Distry/public/images/placeholder.jpg";

                        if(file_exists($user_data['profile_image'])){

                        $image = $user_data['cover_image'];
                        }

                    ?>
                <img src="<?php echo $image?>" alt=""  style="width: 100%; height: 250px;">
            </span>    

                <span>
                <?php
                        $image = "/info-Distry/public/images/male.png";

                        if($user_data['gender'] == "Female"){

                            $image = "/info-Distry/public/images/female.png";
                        }

                        if(file_exists($user_data['profile_image'])){

                        $image = $user_data['profile_image'];
                        }

                    ?>
                <img src="<?php echo $image?>" alt="" id="profile-picture"><br>
                </span>
                <div id="username-profile"><?php echo $user_data['first_name'] ." ". $user_data['last_name'] ?></div>
                <br>
                <br>
            
            </div>
            <form method="post" enctype="multipart/form-data">
                <div style="background-color: #fad99b; text-align: center; height: 50px">
                <input  style="float:left; padding:15px;" type="file" name="file"> <input style="float:right; height:25px; background-color:#bec1d4;" type="submit" value="Upload Picture">
                </div>
            </form>

    </body>

</html>