<!DOCTYPE html>


<?php

    include_once ("classes/connect.php");
    include_once ("classes/signup.php");

    $first_name = "";
    $last_name = "";
    $gender = "";
    $email = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){


        

        $signup = new Signup();
        $result = $signup->evaluate($_POST);

            if($result != ""){
                        echo "<div style='text-align:center; background-color:grey;'>";
                        echo $result;
                        echo "</div>";
                    }else{header("Location:signin_redirect.php ");die;}
                        
                        

                    

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
    }

    
?>
    
<html>   
    <head>
        <link rel="stylesheet" media="all" href="stylesheet/signup.css" />
    </head>
    
    <body>

    <div id="header_bar">
            <div style="margin:auto; width: 800px; font-size: 30px; padding: 10px; ">
            <a class="logo" href="index.php">Info:Distry</a> &nbsp; &nbsp;
            <a id ="login-button" href="signin_redirect.php">Log in</a>
            </div>
        </div>
        <br>

                <form class="signup-modal-content" method="post" action="">
                <img class="profile-picture" src="/info-Distry/public/images/user-icon.png" alt="" width=100px height=100px>
                    <input value = "<?php echo $first_name ?>" name="first_name" class="signup-login-input" type="text" placeholder="Name" id="text">
                    <input value = "<?php echo $last_name ?>" name="last_name" class="signup-login-input" type="text" placeholder="Surname" id="text">
                    <input value = "<?php echo $email ?>" name="email" class="signup-login-input" type="email" placeholder="Email Address" id="text">
                    <span style="font-weight: normal;">Gender: </span><br>
                    <select name="gender" class="signup-login-input" name="" id="text">

                        <option><?php echo $gender ?></option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                    <br><br>
                    <input name="password" class="signup-login-input" type="password" placeholder="Password" id="text">
                    <input name="re-password" class="signup-login-input" type="password" placeholder="Re-Enter Password" id="text">
                    <br>
                    <input class="checkbox-terms" type="checkbox" name="terms_and_conditions" value="Yes"> I have read and understood all the terms and conditions of this <br> and willing to proceed to the profile page. If not click <a href="terms.php">here.</a><br>
                    <br>
                    <button class="submit" type="submit">Sign up</button>
                    <br>
                </form>

        <?php include 'signin.php'?>
    </body>
 </html>