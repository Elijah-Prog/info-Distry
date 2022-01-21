<?php

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
     //collect post


 //collect friends
     $user = new User();
     $id = $user_data['userid'];
     $friends = $user->get_friends($id);
    ?>

<!DOCTYPE html>
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

                    <article id="user-post-info">
                        <section id="post_header" class="post-header">
                            <a id="user_profile_post" href="user-profile.php?url_address=<?php if($_SESSION['userid'] == $user_data['userid']){echo $user_data['url_address'];}else{ echo $_SESSION['url_address'];}?>">

                                <?php

                                    $image = "/info-Distry-v1.1/public/images/male.png";

                                    if($user_data['gender'] == "Female"){

                                        $image = "/info-Distry-v1.1/public/images/female.png";
                                    }

                                    if(file_exists($user_data['profile_image'])){

                                        $image = $user_data['profile_image'];
                                        }
                                
                                ?>
                                
                                <img id="user_post_icon"  class="user-post-icon" src="<?php echo $image?>" alt="" width=50px height=50px draggable=false style="border-radius:200px;">
                                        
                            </a>
                            <section id="user-information">
                                <span class="author_name">
                                    <a href="user-profile.php?url_address=<?php echo $user_data['url_address']?>" class="author_name">
                                        <?php 
                                        
                                            echo htmlspecialchars($user_data['first_name']) ." ". htmlspecialchars($user_data['last_name']);
                                        
                                            if($ROW['is_profile_image']){

                                                $pronoun = "his";

                                                if($user_data['gender'] == "Female"){

                                                    $pronoun = "her";
                                                }

                                                echo "<span  style='font-size: smaller; color:#aaa '> Updated $pronoun profile picture</span>";
                                            }
                                        
                                        ?>
                                    
                                    </a>
                                   
                                </span> 
                                <span style="font-size: 12px; color:black;height:fit-content;">•</span>&nbsp;<p style='display:inline;font-size:13px;color:#6f6f6f;'>Following</p>
                                <br>
                                <span class="post-date">
                                    <small>
                                        <?php echo $ROW['date'] ?>
                                    </small>
                                <span>
                            </section>

                            <?php

                           // if($user_data['userid'] !== $_SESSION['userid']){
                                //echo '<div id="follow-user" style="padding-top:5px;font-size:20px;justify-content:center;align-items:center; text-align:center;height: 35px;width: 60px;border-radius:50%" title="Follow User" class="add-user"><span style="width: 60px;text-align:center;font-size:14px; letter-spacing:1; background-color: #d8d8d8;box-shadow: 0 1px 2px rgba(0,0,0,0.3); border: 1px medium black;">+Follow</span></div>';
                            //}
                            ?>
                            </section>
                            <br>
                            <section class="post-content">
                               
                                <span class="user-post-description">
                                    <text id="post-text" style="text-size:10px;"><?php $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+[a-zA-Z]{2,3}(\/\S*)?/"; preg_match_all($reg_exUrl,$ROW['post'],$match);   echo htmlspecialchars($ROW['post']); ?></text>
                                </span>
                                <br>
                                <span>
                                    <p id="file_name" style="background-color:#2b2a2a;color:white;font-family:Poppins,sans-serif;border-radius:200px;margin:0;"><?php if(isset($ROW['document'])){ echo htmlspecialchars($ROW['name']); }?></p>
                                </span>
                                <br>
                                <section class="user-file">
                                    <?php

                                        if(file_exists($ROW['image'])){

                                            $post_image = ($ROW['image']);

                                            echo "<div style='background-color:black;'>";
                                            echo "<img id='img-full' controlslist='nodownload' draggable=false style='max-width: 100%; height: auto;object-fit: cover;' src='$post_image'></img>";
                                            echo "</div>";
                                        }
                                        
                                        if(file_exists($ROW['video'])){

                                            $post_video = ($ROW['video']);
                                            echo "<div style='background-color:black;'>";
                                                echo "<video title='$ROW[name]' id='vid-content' tabindex='-1' controls muted loop controlslist='nodownload' style='max-width:700px; height: auto; object-fit: cover' src='$post_video'></video>";
                                            echo "</div>";
                                        }
                                        if(file_exists($ROW['document'])){

                                            $post_doc = ($ROW['document']);
                                            echo "<div style='background-color:black;'>";
                                                echo "<embed nodownload style='max-width:600p ;height: auto; object-fit: cover' src='$post_doc'>File</embed>";
                                                echo "</div>";
                                        }

                                    
                                    ?>
                                </section>
                                    
                            </section>
                            <hr>
                            <section id="footer" class="post-footer">
                                <a title="Useful" class="like-button" href="#">&nbsp;<text style="text-decoration:none;">1.1M</text> <i style="width:20px; height: 20px; color:black;" class="far fa-thumbs-up"></i></a>
                                <a title="Not Useful" class="dislike-button" href="#">&nbsp; <text style="text-decoration:none;" >234</text> <i style="width:20px; height: 20px; color:black; height:fit-content;" class="far fa-thumbs-down"></i></a>
                                <a id="comments" title="View Comments" class="comment-link" id="comments" href="post.php?id=<?php echo $ROW['postid'];?>&media=<?php if($ROW['has_image'] || $ROW['has_video'] == 1 || $ROW['has_doc']){ echo 'true';}else{echo 'false';}?>&u=<?php echo $user_data['userid'];?>&Autoplay=<?php if($ROW['has_video'] == 1){ echo "true";}else{ echo "false";}?>&file=<?php if($_SESSION['userid'] == $user_data['userid'] && $ROW['has_video']){ echo $ROW['name'];}else if($_SESSION['userid'] == $user_data['userid'] && $ROW['has_image']){echo $ROW['name'];}else if($_SESSION['userid'] == $user_data['userid'] && $ROW['has_doc']){echo $ROW['name'];}else{ echo "none";}?>"><small class="comment-txt">Comments</small></a><span style="font-size: 10px; color:black;height:fit-content;">•</span><br>&nbsp;&nbsp;
                                <a class="report-link" href="report.php"><small class="report-txt">Report</small></a>&nbsp;&nbsp;<span style="font-size: 10px; color:black;height:fit-content;">•</span>
                                <a class="share-link" href="share.php"><small class="report-txt">Share</small></a>&nbsp;&nbsp;<br><span style="font-size: 10px; color:black;height:fit-content;">•</span>
                                <?php
                                    $post = new Post();
                                    if($post->i_own_post($ROW['postid'],$_SESSION['userid'])){
                                            echo "<a class='edit-link' href='edit.php'><small class='report-txt'>Edit</small></a>&nbsp;&nbsp;<br><span style='font-size: 10px; color:black;height:fit-content;'>•</span>";
                                            echo "<a class='delete-link' href='delete.php?id=$ROW[postid]&u=$ROW[userid]'><small class='report-txt'>delete</small></a>";
                                    }
                                ?>
                            </section>
                </article>
                <br>

                <script type="text/javascript">

                    $(window).scroll(function(){if $(window().scroll(100)){

                        var vid = document.getElementById("vid-content");
                        vid.pause();
                    }})
            
                </script>
    </body>

    </html>