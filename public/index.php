<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            html{

                width:100%;
                height:100%;
            }
        </style>
    </head>
    <body>
    
        <?php include_once ('../private/initialize.php'); ?>

        <?php include (SHARED_PATH .'/public_header.php')?>
        <br>
        <br>
        <br>
        <br>
        <!--Modal Section-->
        <?php include 'content.php'?>
        <?php include 'signin.php'?> 
        
        <br>
        <br>
        <?php include 'user_post.php'?>
        <br>
        <?php include 'generalInfo.php'?>
        
    <?php include (SHARED_PATH .'/public_footer.php')?>
    </body>
</html>





