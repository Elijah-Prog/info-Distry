<!DOCTYPE html>
<?php

session_start();

    include_once ("classes/connect.php");
    include_once ("classes/login.php");

    $email = "";
    $password = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){


        $login = new Login();
        $result = $login->evaluate($_POST);

            if($result != ""){
                        echo "<div style='text-align:center; background-color:grey;'>";
                        echo $result;
                        echo "</div>";
                    }else
                    {
                        header("Location:user-profile.php");
                        die;
                    }
                            

        $email = $_POST['email'];
        $password = $_POST['password'];
    }

    
?>
<html>   
    <head>
        <link rel="stylesheet" media="all" href="stylesheet/signin.css" />
    </head>
    
    <body style="background-color:#2b2a2a;">


    <div id="header_bar">
            <div style="margin:auto; width: 800px; font-size: 30px; padding: 10px; ">
            <a class="logo" href="index.php">Info:Distry</a> &nbsp; &nbsp;
            <a id ="login-button" href="signup.php">Sign up</a>
            </div>
        </div>
        <br>
            <div class="login-redirect" draggable="true">
                <img class="profile-picture" src="/info-Distry/public/images/user-icon.png" alt="" width=100px height=100px>

                <form method="post" >
                    <input name="email" value = "<?php echo $email?>" class="login-input" type="email" placeholder="Email Address">

                    <input name="password" value = "<?php echo $password ?>" class="login-input" type="password" placeholder="Password">
                    <br>
                    <button class="submit" type="submit">Sign in</button>
                </form>
            </div>
</body>
</html>