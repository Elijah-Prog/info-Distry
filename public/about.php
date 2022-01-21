<!DOCTYPE html>

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

?>

<html>
    <head>
        <meta charset= "utf-8">
        <style>
            .gb_9a{

                font: 13px/27px Roboto,RobotoDraft,Arial,sans-serif;
                color: #000;
                -webkit-user-select: text;
                line-height: normal;
                white-space: nowrap;
                margin: auto;
            }

            .gb_90.gb_bb{

                font: 13px/27px Roboto,RobotoDraft,Arial,sans-serif;
                color: #000;
                -webkit-user-select: text;
                line-height: normal;
                white-space: nowrap;
                display: block;
                vertical-align: top;
                text-align: center;
            }

            .gb_ab{

                font: 13px/27px Roboto,RobotoDraft,Arial,sans-serif;
                color: #000;
                -webkit-user-select: text;
                line-height: normal;
                white-space: nowrap;
                display: block;
                vertical-align: top;
                text-align: center;
                margin-bottom: 10px;
                position: relative;
                height: 86px;
                width: 86px;
                margin-left: 101px;
            }

            .gb_bb{

                font: 13px/27px Roboto,RobotoDraft,Arial,sans-serif;
                color: #000;
                -webkit-user-select: text;
                line-height: normal;
                white-space: nowrap;
                display: block;
                vertical-align: top;
                text-align: center;
            }

            .gb_Ha{

                
                font: 13px/27px Roboto,RobotoDraft,Arial,sans-serif;
                color: #000;
                -webkit-user-select: text;
                line-height: normal;
                white-space: nowrap;
                text-align: center;
                border-radius: 50%;
                overflow: hidden;
                transform: translateZ(0px);
                border: solid 2px black;
                margin-right: 6px;
                vertical-align: top;
                height: 80px;
                width: 80px;
            }

            .gbip{

                font: 13px/27px Roboto,RobotoDraft,Arial,sans-serif;
                color: #000;
                -webkit-user-select: text;
                line-height: normal;
                white-space: nowrap;
                text-align: center;
                border-radius: 50%;
                overflow: hidden;
                transform: translateZ(0px);
                border: none;
                margin-right: 6px;
                vertical-align: top;
                height: 80px;
                width: 80px;
            }

            .gb_Eb{

                font: 13px/27px Roboto,RobotoDraft,Arial,sans-serif;
                color: #000;
                -webkit-user-select: text;
                line-height: normal;
                white-space: nowrap;
                text-align: center;
                
                overflow: hidden;
                transform: translateZ(0px);
                border: none;
                margin:auto;
                vertical-align: top;
                height: 80px;
                width: 350px;
                align-items:center;
            }

            .gb_Ib{

                font: 13px/27px Roboto,RobotoDraft,Arial,sans-serif;
                color: #000;
                -webkit-user-select: text;
                line-height: normal;
                border-top: 1px solid rgb(232, 234, 237);
            }

            .gb_lb.gb_mb{

                -webkit-user-select: text;
                white-space: nowrap;
                color: rgb(32, 33, 36);
                font: 500 16px / 22px "Google Sans", Roboto, RobotoDraft, Helvetica, Arial, sans-serif;
                letter-spacing: 0.29px;
                margin: 0px;
                text-align: center;
                text-overflow: ellipsis;
                overflow: hidden;
            }

            .gb_rb{

                -webkit-user-select: text;
                white-space: nowrap;
                background-color: rgb(255, 255, 255);
                border: 1px solid rgb(218, 220, 224);
                border-radius: 0px;
                color: rgb(60, 64, 67);
                display: inline-block;
                font: 500 14px / 16px "Google Sans", Roboto, RobotoDraft, Helvetica, Arial, sans-serif;
                letter-spacing: 0.25px;
                margin: 16px 0px 0px;
                max-width: 254px;
                outline: 0px;
                padding: 8px 16px;
                text-align: center;
                text-decoration: none;
                text-overflow: ellipsis;
                overflow: hidden;
            }

            .gb_jf{

                font: 13px/27px Roboto,RobotoDraft,Arial,sans-serif;
                color: #000;
                -webkit-user-select: text;
                line-height: normal;
                border-bottom: 1px solid rgb(232, 234, 237);
                border-top: 1px solid rgb(232, 234, 237);
                padding: 0px 17px;
                text-align: center;
            }

            .gb_cb{

                -webkit-user-select: text;
                background-color: rgb(255, 255, 255);
                border: 1px solid rgb(218, 220, 224);
                border-radius: 4px;
                display: inline-block;
                font: 500 14px / 16px "Google Sans", Roboto, RobotoDraft, Helvetica, Arial, sans-serif;
                letter-spacing: 0.15px;
                margin: 16px;
                outline: 0px;
                padding: 10px 24px;
                text-align: center;
                text-decoration: none;
                white-space: normal;
                color: rgb(60, 64, 67);
            }

            .gb_Kf{

                font: 13px/27px Roboto,RobotoDraft,Arial,sans-serif;
                -webkit-user-select: text;
                line-height: normal;
                color: rgb(95, 99, 104);
                margin: 14px 33px;
                text-align: center;
                white-space: normal;

            }

            .gb_0a{

                font: 13px/27px Roboto,RobotoDraft,Arial,sans-serif;
                background: #fff;
                border: 1px solid #ccc;
                border-color: rgba(0,0,0,.2);
                color: #000;
                box-shadow: 0 2px 10px rgba(0,0,0,.2);
                position: relative;
                top: 50px;
                animation: gb__a .2s;
                -webkit-user-select: text;
                z-index: 991;
                line-height: normal;
                outline: none;
                transform: translateZ(0px);
                display: block;
                border-radius: 5px;
                margin: auto;
                width: 800px;
                overflow: show auto;
                max-height: calc((100vh - 62px) - 100px);
                transition: opacity 0.8s ease 0.03s;
                overflow:show;
                
            }

            .gb_tb{

                -webkit-user-select: text;
                border-radius: 4px;
                color: rgb(95, 99, 104);
                display: inline-block;
                font: 400 12px / 16px Roboto, RobotoDraft, Helvetica, Arial, sans-serif;
                outline: 0px;
                padding: 4px 8px;
                text-decoration: none;
                text-align: center;
                white-space: normal;
            }
            .fade-in {
                animation: fadeIn 200ms;
            }
            
            .close{

                position: absolute;
                top:0;
                right:14px;
                font-size:30px;
                transform: rotate(45deg);
                cursor:pointer;
                display:flex;
            }
        </style>
    </head>

    <body>


        <div class="gb_0a gb_E gb_k gb_1a fade-in gb_la" aria-label="Account Information" style=" transition: opacity 0.6s ease 0.02s;" aria-hidden="false" img-loaded="1" >
        <div title="Close" class="close">+</div>
        <div class="gb_9a">
            <div class="gb_ab">
                
            </div>
        <div class="gb_bb">
            <div class="gb_lb gb_mb"><?php echo $user_data['first_name'] . " " . $user_data['last_name']?></div>
            <div class="gb_nb"><?php echo $user_data['email']?></div>
            <a class="gb_rb gb_Mf gbp1 gb_Je gb_3c" title="Edit Your Account" href="index.php">Go Back Home</a>
        </div>
        </div>
        <br>
        <div class="gb_Eb gb_Ib">
        <div class="gb_lb gb_mb"><?php echo $user_data['gender']?></div>
        <div class="gb_7b">
        </div>
        </div>
        <div class="gb_Qb" tabindex="-1">
            <a class="gb_vb gb_If" href="https://accounts.google.com/AddSession?hl=en-GB&amp;continue=https://www.google.com%3Fhl%3Den-GB&amp;ec=GAlA8wE" target="_top">
            <div class="gb_wb">
        </div>
        </a>
        </div>
        <div class="gb_Kf gb_sb">
            <a class="gb_tb gb_Hb" href="" target="_blank">Privacy Policy</a><span class="gb_Oa" aria-hidden="true">•</span>
            <a class="gb_tb gb_Fb" href="" target="_blank">Terms of Service</a>
        </div>
        </div>
</body>

</html>