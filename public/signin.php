 <!DOCTYPE html>
 <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//session_start();

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
        }else{header("Location:user-profile.php");die;}

        $email = $_POST['email'];
        $password = $_POST['password'];
    }
?>
    
<html>   
    <head>
        <link rel="stylesheet" media="all" href="stylesheet/signin.css" />
    </head>
    
    <body>
        <div class="bg-model">
            <div class="modal-content" draggable="true">

                <div class="close">+</div>
                <img class="profile-picture" src="/info-Distry/public/images/user-icon.png" alt="" width=100px height=100px>

                <form method="post">
                    <input name="email" value = "<?php echo $email?>"  class="login-input" type="email" placeholder="Email Address">

                    <input name="password" value = "<?php echo $password ?>" class="login-input" type="password" placeholder="Password">
                    <br>
                    <button class="submit" type="submit">Sign in</button>

                    <p>Don't have an account yet ? <a class="sign-up" href="signup.php">Sign Up</a></p>
                    <br><br>
                </form>
            </div>
        </div>

        <script type="text/javascript">
            let button = document.getElementById('user-sign');

            button.addEventListener("click", 

            function(){

                document.querySelector('.bg-model').style.display = 'flex';

            });

            let exit = document.querySelector('.close');
            
            exit.addEventListener("click", function() {
	        document.querySelector('.bg-model').style.display = "none";
            });
        </script>
    </body>
 </html>