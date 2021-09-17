<!DOCTYPE html>

<html>
    <head>
        <title>Info:Distry</title>
        <meta charset= "utf-8">
        <link rel="stylesheet" media="all" href="stylesheet/navigation.css" />
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
    </head>
    <body class="header-body">

<header class="front-header">
</id>
<a class="logo" href="index.php">Info:Distry</a>
        <div class="search">
            <div class="icon"></div>
            <div class="input">
                <input type="text" placeholder="Search" id="mysearch"></input>
            </div>
            <span class="clear" onclick="document.getElementById('mysearch').value = ''"></span>
        </div>
        <ul class="nav-options">
            <a class="user-icon-log" href="user-profile.php" style="">
            <?php

                $image = "";

                if(file_exists($user_data['profile_image'])){

                    $image = $user_data['profile_image'];
                }

            ?>
            <img class="user-post-icon" src="<?php echo $image;?>" alt="" width=50px height=50px>
            </a>
            <li><a href="index.php">Home</a></li>
            <li><a href="notifications.php">Notifications</a></li>
            <li><a href="about.php">About</a></li>
            <li><a id="user-sign" href="#">Account</a><li>
        </ul>
</header>

<section class="banner"></section>
<script type="text/javascript">

    window.addEventListener("scroll", function(){

        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0 )
    })


    const icon = document.querySelector('.icon');
    const search = document.querySelector('.search');

    icon.onclick = function(){
        search.classList.toggle('active')
    }
</script>
    </body>
</html>

