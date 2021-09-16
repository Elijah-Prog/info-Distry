<!DOCTYPE html>

<html>
    <head>
        <title>Profile | info:Distry</title>
        <meta charset="utf-8">
        <link rel="stylesheet" media="all" href="stylesheet/user-profile.css" />
    </head>
    <body style="background-color: #d0d8d4;">
    <br>
        <!--Top bar-->
        <div id="header_bar">
            <div style="margin:auto; width: 800px; font-size: 30px; padding: 10px; ">
            <a class="logo" href="index.php">Info:Distry</a> &nbsp; &nbsp; <input type="text" placeholder="Search for users" id="search-box">
            <img src="/info-Distry/public/images/user-icon.png" style="width: 40px; float: right;"></img>
            </div>
        </div>
        
        <!--Cover Area -->

        <div id="user-profile-content">
            <div style="background-color: white; text-align: center;">
                <img src="/info-Distry/public/images/ashim-d-silva-WeYamle9fDM-unsplash.jpg" alt=""  style="width: 100%; height: 250px;">
                <img src="/info-Distry/public/images/user-icon.png" alt="" id="profile-picture"><br>
                <div id="username-profile">Mzukisi Makaluza</div>
                <br>
                <br>
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
                            <?php include 'user_post.php'?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
             <?php include (SHARED_PATH .'/public_footer.php')?>
            
        </div>
       
    </body>
</html>