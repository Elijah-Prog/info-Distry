 <!DOCTYPE html>

    
<html>   
    <head>
        <link rel="stylesheet" media="all" href="stylesheet/signin.css" />
    </head>
    
    <body>
        <div class="bg-model">
            <div class="modal-content" draggable="true">

                <div class="close">+</div>
                <img class="profile-picture" src="/info-Distry/public/images/user-icon.png" alt="" width=100px height=100px>

                <form action="">
                    <input class="login-input" type="email" placeholder="Email Address">

                    <input class="login-input" type="password" placeholder="Password">
                    <br>
                    <button class="submit" type="submit">Sign in</button>

                    <p>Don't have an account yet ? <a class="sign-up" href="#">Sign Up</a></p>
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