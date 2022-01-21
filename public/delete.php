<?php




include_once ("classes/autoload.php");

$DB = new DB();

    $login = new Login();

    $user_data = $login->check_login($_SESSION['userid']);

    $ERROR = "";
    $post = new Post();
    if(isset($_GET['id'])){

        
        $ROW = $post->get_one_post($_GET['id']);

        if(!$ROW){
            $ERROR = "<p style='color:white;width:fit-content;margin-left:10px;'>No such post was found!!</p>'";
        }else{

            if($_SESSION['userid'] != $ROW['userid']){

                $ERROR = "Access Denied. You Can not delete this Post!!!";
            }
        }
    }else{

        $ERROR = "<p style='color:white;width:fit-content;margin-left:10px;'>No such post was found</p>'";
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $post->delete_post($ROW['postid']);
        header("Location: user-profile.php");
        die;
    }

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport"  content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="google" content="notranslate">
        <meta lang="en">

        <style>
            #loader{

                background-color:#2b2a2a;
                width:800px;
                height:fit-content;
                margin:auto;
                margin-bottom:300px;
            }

            #results{

            background-color:#2b2a2a;
            right:500px;
            left:250px;
            width:600px;
            min-width:200px;
            top:60px;
            min-height:300px;
            position:fixed;
            z-index:5000; 
            display:none;
            overflow-x:hidden;
            box-shadow: 0 0 0 2px white;
            }
        </style>
        <script src="/javascript/jquery-3.6.0.min.js"></script> 
        <script src="javascript/jquery-3.6.0.min.js"></script>
    </head>

    <body style="background-color:rgb(214, 213, 211);height:100%;">
        <?php include_once ('../private/initialize.php'); ?>

        <?php include (SHARED_PATH .'/public_header.php')?>
        <br>
        <br>
        <br>
        <br>
       
    <?php //include (SHARED_PATH .'/public_footer.php')?>
    <a style="text-decoration:none;color:black;cursor:pointer;position:sticky;width:fit-content;" onclick="history.go(-1)"><div style="width:80px;display:flex;height:32px;background-color:#2b2a2a;text-align:center;border-radius:200px;padding:2px 8px;margin:0px 0px 0px;margin-left:10px;"><span style="text-align:center;width:100%;height:fit-content;padding-top:6px;font-family: Roboto, Arial, sans-serif ;color:white;">BACK</span></div></a>

    <div id="loader">
        <h2 style="color:white;top:30px;text-align:center;padding-top:10px;font-family: SFMono-Regular, Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace;">Delete Post!</h2>
        <br>
        <br>
        <form style="top:0px;padding-bottom:0px;height:fit-content;" method="post">

            <?php if($ERROR != ""){

                    echo $ERROR;
            }else{

                if($ROW){

                echo ' <p style="color:white;width:fit-content;margin-left:10px;">Are you sure you want to delete this post?</p>';
                echo '&nbsp;&nbsp;&nbsp;<button style="width:80px;height:30px;float:right;margin-right:10px;border:none;background-color:#0670c7;color:white;border-radius:5px;" class="submit-post" type="submit" name="submit">Delete Post</button>';
                echo '<br>';
                echo '<br>';
                echo '<hr>';
                include 'delete_post.php';

                echo '<input type="hidden" name="postid" value="<?php echo $ROW["postid"];?>';
               
                }
            }
            
            ?>
        </form>
    </div>
    
    <script type="text/javascript">

            $(window).scroll(function(){if $(window().scroll(100)){

                let vid = document.getElementById("vid-content");
                vid.pause();
            }});
            
    </script>

    </body>

    
</html>





