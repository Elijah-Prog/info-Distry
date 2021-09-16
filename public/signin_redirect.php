<!DOCTYPE html>

    
<html>   
    <head>
        <link rel="stylesheet" media="all" href="stylesheet/signin.css" />
    </head>
    
    <body>


    <div id="header_bar">
            <div style="margin:auto; width: 800px; font-size: 30px; padding: 10px; ">
            <a class="logo" href="index.php">Info:Distry</a> &nbsp; &nbsp;
            <a id ="login-button" href="signup.php">Sign up</a>
            </div>
        </div>
        <br>
            <div class="login-redirect" draggable="true">
                <img class="profile-picture" src="/info-Distry/public/images/user-icon.png" alt="" width=100px height=100px>

                <form action="user-profile.php">
                    <input class="login-input" type="email" placeholder="Email Address">

                    <input class="login-input" type="password" placeholder="Password">
                    <br>
                    <button class="submit" type="submit">Sign in</button>

                    <p>Don't have an account yet ? <a class="sign-up" href="signup.php">Sign Up</a></p>
                </form>
            </div>
</body>
</html>