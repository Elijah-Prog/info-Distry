<?php include_once (SHARED_PATH .'/public_header.php')?>

<?php

include ("classes/autoload.php");


$login = new Login();

    $user_data = $login->check_login($_SESSION['userid']);

    $profile = new Profile();

    if(isset($_GET['id'])){

        $profile_data = $profile->get_profile($_GET['id']);
        
        if(is_array($profile_data)){

        $user_data = $profile_data[0];
        }
    }
     //collect posts
        
     $post = new Post();
     $id = $user_data['userid'];
     $posts = $post->get_posts($id);

?>

<head>
    <title>Comments</title>
    <script src="/javascript/jquery-3.6.0.min.js"></script> 
    <script src="javascript/jquery-3.6.0.min.js"></script>
<style>
    body{
        background-color:#2b2a2a;
    }

    #submit-comment:hover{
        opacity:0.9;
        transition:0.3s ease;
    }
    #submit-comment{

        transition:0.3s;
        font-family: Roboto, Arial, sans-serif;
    }

    #thoughts-text{

        font-family: SFMono-Regular, Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace;
        width:fit-content;
        font-size:14px;
        letter-spacing:0px;
        color:rgb(123, 123, 123);
    }

    #comment-text{
        border: 1.5px solid black;
        border-radius:5px;
        
        color:black;
    }
    #comment-bar{

        box-shadow: 0 3px 5px rgba(0,0,0,0.2);
    }

    #file-choose:hover{

        opacity:0.9;
       

    }
    #file-choose{
        margin:0;
        right:100px;
    }
</style>

</head>

<body>

    <a style="text-decoration:none;color:black;cursor:pointer;position:sticky;width:fit-content;" onclick="history.go(-1)"><div style="width:80px;display:flex;height:32px;background-color:#FFFFFF;text-align:center;border-radius:200px;padding:2px 8px;margin:0px 0px 0px"><span style="text-align:center;width:100%;height:fit-content;padding-top:7px;font-family: Roboto, Arial, sans-serif ;">BACK</span></div></a>
    
    <div style="display:flex; flex:2;width:fit-content;padding:10px;margin:0;">
        <!--PHP include single post that the user wants to view-->
        <?php
            if($posts){

                foreach($posts as $ROW){

                    if($ROW['postid'] == $_GET['id']){
                        $user = new User();
                        $ROW_USER = $user->get_user($ROW['userid']);
                    
                        include 'single_post.php';
                    }
                }
            }
        ?>
        &nbsp; &nbsp;
        <div id="comment-bar" style="background-color:white;width:600px;display:flex;min-height:700px;min-width:400px;max-height:1000px;">
        <div id="comment-share" style="padding:10px;display:block;height:fit-content;">
            <div style="width:550px;max-height:800px;min-height:500px;"><br><p style="height:fit-content; color:rgb(123, 123, 123);margin:0;font-family: SFMono-Regular, Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace;width:fit-content;">Comments:</p>
        
        
            </div>
            <hr width=500px style="margin:auto">
            <form method="POST">
        <p id="thoughts-text">Share your thoughts :&nbsp;<?php if($_SESSION['userid'] != $user_data['userid']){echo '<small style="font-family: WorkSans;">Let the person who shared know what you think.</small>';}?></p>
            <textarea id="comment-text" placeholder="Comment Here" style="min-width:500px;min-height:100px;padding:10px;max-height:200px;max-width:550px;background-color:#d6d5d3;"></textarea>
            <label><input style="display:none;" type="file" accept="image/*"><div id="file-choose" style="width:100px;background-color:#0670c7;text-align:center;height:30px;border-radius:5px;cursor:pointer;"><p style="padding:6px;color:white;font-family: Roboto, Arial, sans-serif;font-size:14px;" >Choose File</p></div></input></label>
            <br><button id="submit-comment" style="height: 30px;width:100px; border-radius:200px;border:none; background-color:#8eb9b9; cursor:pointer;" type="submit" name="submit">Comment</button>
            
            </form>
        </div>
    
        </div>
        </div>
        <script type="text/javascript">

        document.getElementById("post_header").style.height = 44;
        document.getElementById("user-information").style.height = 44;
        document.getElementById("user_post_icon").style.width = 40;
        document.getElementById("user_post_icon").style.height = 40;
        document.getElementById("user_profile_post").style.height = 40;
        
        
        document.getElementById("footer").style.height = "fit-content";
        document.getElementById("comments").href = "javascript:void(0);";
        document.getElementById("comments").title = "";
        document.getElementById("comments").style.cursor = "default";
        document.getElementById("comments").style.display = "none";
        document.getElementById("user-post-info").style.margin = "0";
        
        document.getElementById("user-post-info").style.float = "left";
        document.getElementById("vid-content").autoplay = "autoplay";
        document.getElementById("follow-user").style.display = "block";
    </script>
</body>