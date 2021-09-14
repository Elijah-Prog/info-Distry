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
            <div style="margin:auto; width: 800px; font-size: 30px; ">
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
                <div id="menu-button">Timeline</div> 
                <div id="menu-button">About</div> 
                <div id="menu-button">Friends</div> 
            </div>

            <!--below Cover Area -->
            <div style="display: flex;">

                <!--Distries Area -->
                <div style="min-height :400px; flex:1;">
                    <div id="friends-bar">
                        Friends<br>

                    <div id="friends">
                        <img id="friends-img" src="/info-Distry/public/images/user-icon.png" alt="">
                        <br>
                        User1
                    </div>
                    <div id="friends">
                        <img id="friends-img" src="/info-Distry/public/images/user-icon.png" alt="">
                        <br>
                        User1
                    </div>
                    <div id="friends">
                        <img id="friends-img" src="/info-Distry/public/images/user-icon.png" alt="">
                        <br>
                        User1
                    </div>
                    
                </div>
            </div>

                <!--Posts Area -->
                <div style="min-height: 400px; flex:2.5; padding: 20px; padding-right: 0px;">
                    <div style="border: solid thin #aaa; padding: 10px;">
                        <textarea placeholder="What's new?"></textarea>
                        <input id="post-button-submit" type="submit" value="Post">
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>