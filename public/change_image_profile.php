<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include_once ("classes/connect.php");
include_once ("classes/login.php");
include_once ("classes/user.php");
include_once ("classes/post.php");

$login = new Login();

$user_data = $login->check_login($_SESSION['userid']);

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] !== ""){


        if($_FILES['file']['type'] == "image/jpeg" || $_FILES['file']['type'] == "image/png" ){


            $allowed_size = (1024 * 1024) * 5;
            if($_FILES['file']['size'] < $allowed_size){

                $filename = "uploads/" . $_FILES['file']['name'];

                move_uploaded_file($_FILES['file']['tmp_name'],$filename );

            if(file_exists($filename)){

                $userid = $user_data['userid'];

                $query = "update users set profile_image = '$filename' where userid = '$userid' limit 1 ";
                $DB = new DB();
                $DB->save($query);

                header("Location: user-profile.php");die;
        
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
                echo "Only images of JPEG and PNG type allowed!";
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
            <a href="user-profile.php">
                <img src="/info-Distry/public/images/user-icon.png" style="width: 40px; float: right;"></img>
            </a>
            <a href="logout.php">
            <span style="font-size: 16px; float: right; background-color: black; border-radius: 200px; width: 70px; text-align: center; margin: 10px; color: white; height: 20px">Logout</span>
            </a>
            </div>
        </div>

<div id="user-profile-content">
            <div style="background-color: white; text-align: center;">
                <img src="/info-Distry/public/images/ashim-d-silva-WeYamle9fDM-unsplash.jpg" alt=""  style="width: 100%; height: 250px;">
                <img src="/info-Distry/public/images/user-icon.png" alt="" id="profile-picture"><br>
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