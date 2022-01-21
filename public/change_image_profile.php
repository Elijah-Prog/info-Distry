<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once ("classes/autoload.php");

    $login = new Login();

    $user_data = $login->check_login($_SESSION['userid']);

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] !== ""){


            if($_FILES['file']['type'] == "image/jpeg" || $_FILES['file']['type'] == "image/png"){


                
                $allowed_size = (1024 * 1024) * 10;
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
                    
                    //create a post
                    $post = new Post();
                    $post->create_post($userid,$_POST,$filename);


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

    <title> <?php echo $_GET['change']?>| <?php echo $user_data['first_name']?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google" content="notranslate">

    <link rel="stylesheet" media="all" href="stylesheet/image_profile.css" />

    </head>

    <body>

    <div id="header_bar">
            <div style="margin:auto; width: 800px; font-size: 30px; padding: 5px; ">
            <a class="logo" href="index.php">WRLDNET2.0</a> &nbsp; &nbsp;

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

                        if(file_exists($user_data['cover_image'])){

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
                <div style="background-color: #fad99b; text-align: center; height: 100px">
                <label style="padding:5px;padding-right:5px;"><input style="display:none;" type="file" name="file" accept="image/*"><div id="file-choose" style="width:100px;background-color:#0670c7;text-align:center;height:30px;border-radius:5px;cursor:pointer;margin:0;"><p style="padding:6px;color:white;font-family: Roboto, Arial, sans-serif;font-size:14px;" >Choose File</p></div></input></label><input style="float:right; height:25px; background-color:#bec1d4;" type="submit" value="Upload Picture">
                </div>
            </form>

    </body>

</html>