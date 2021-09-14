<!DOCTYPE html>

    
<html>   
    <head>
        <link rel="stylesheet" media="all" href="stylesheet/signup.css" />
    </head>
    
    <body>

            <h2 style="text-align:center;">Sign Up</h2>
            <div class="signup-modal-content" draggable="true">
                <br>
                <img class="profile-picture" src="/info-Distry/public/images/user-icon.png" alt="" width=100px height=100px>

                <form action="">
                    <input class="signup-login-input" type="text" placeholder="Name">
                    <input class="signup-login-input" type="text" placeholder="Surname">
                    <input class="signup-login-input" type="email" placeholder="Email Address">

                    <input class="signup-login-input" type="password" placeholder="Password">
                    <input class="signup-login-input" type="password" placeholder="Re-Enter Password">
                    <br>
                    <button class="submit" type="submit">Sign up</button>
                    <br>
                </form>
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