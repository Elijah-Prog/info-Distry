<?php include_once (SHARED_PATH .'/public_header.php')?>

<?php


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
    <div style="display:flex; flex:2;width:fit-content;padding:10px;margin:auto;">
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
        </div>
        <script type="text/javascript">
            document.getElementById("search-cont").style.display = "none";
        document.getElementById("user-post-info").style.width = "700";
        document.getElementById("post_header").style.height = 44;
        document.getElementById("user-information").style.height = 44;
        document.getElementById("user_post_icon").style.width = 40;
        document.getElementById("user_post_icon").style.height = 40;
        document.getElementById("user_profile_post").style.height = 40;

        document.getElementById("post-text").style.width = "600";
        
        
        document.getElementById("footer").style.height = "fit-content";
        document.getElementById("footer").style.display = "none";
        document.getElementById("comments").href = "javascript:void(0);";
        document.getElementById("comments").title = "";
        document.getElementById("comments").style.cursor = "default";
        document.getElementById("comments").style.display = "none";
        document.getElementById("user-post-info").style.margin = "0";
        
        document.getElementById("user-post-info").style.float = "left";
        document.getElementById("vid-content").autoplay = "autoplay";
         document.getElementById("vid-content").style.width = "600";
        document.getElementById("follow-user").style.display = "block";
       
        
    </script>
</body>