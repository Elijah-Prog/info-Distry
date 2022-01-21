<?php



?>

<!DOCTYPE html>
<html>
    <head>
        <title>WRLDNET2.0</title>
        <meta charset= "utf-8">
        <link rel="stylesheet" media="all" href="stylesheet/navigation.css" />
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
        <script src="/javascript/jquery-3.6.0.min.js"></script> 
        <script src="javascript/jquery-3.6.0.min.js"></script>

        <style>
            .bg-modal{

                width:100%;
                height:fit-content;
                background-color:rgba(0,0,0,0);
                position:fixed;
                top:0;
                display:none;
                transition:opacity 0.8s ease;
                overflow-y:show;
                z-index: 1000;
            }
            .modal-content{
                background-color:white;
                overflow:show;
                transition:0;
            }
        </style>
    </head>
    <body class="header-body">

<header class="front-header">
<img style="width:45px;height:55px;text-align:center;" src="/info-Distry-v1.1/public/images/wrldnet2.0.png"></img><a class="logo" href="index.php">&nbsp;WRLDNET2.0&nbsp;<sup style="font-size:10px;font-weight:normal;">ZA</sup></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div id="search-cont" style="height:30px;min-width:200px;">
        <div id="search">
            <form id="form-search" method="GET">
                
            <div class="input">
                <input oninput="get_data(this.value)" class="jsSearch" spellcheck="off" autocomplete="off"  title="Search for Anything" type="text" name="q" placeholder="Search for keywords" id="mysearch"></input>
            </div>
            <span title="Clear Search" id="clear" onclick="document.getElementById('mysearch').value = ''"></span>
        </div>
        <div class="js-search" id="results">
            <div class="result js_search" style="width:100%;">
                
            </div>
        </div>
        </form>
        </div>
        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        <ul class="nav-options">

            <li><a href="javascript::;">Notifications</a></li>
            
            <li><a id="user-sign" href="user-profile.php">Account</a><li>
            <div id="myprofile" class="user-icon-log" href="javascript:void(0);" style="" data-toggle="tooltip" title="Your Details">
            <?php

                $image = "";

                if(file_exists($user_data['profile_image'])){

                    $image = $user_data['profile_image'];
                }
                else{

                    $image = "../public/images/user-icon.png";
                }

            ?>
            <img draggable=false class="user-post-icon" src="<?php echo $image;?>" alt="" width=50px height=50px>
            </div>
        </ul>
</header>

        <div class="bg-modal">

                <div class="modal-content">
                    <?php
                    include (PUBLIC_PATH .'/user-popup-info.php');
                    ?>
                </div>
        </div>

        




        <script type="text/javascript">

            
           
                function get_data(text){ 
                    
                    
                    var form = new FormData();
                    form.append('text',text);


                    var ajax = new XMLHttpRequest();

                    ajax.addEventListener('readystatechange', function(e){
                        if(ajax.readyState == 4 && ajax.status == 200){

                            //results are back

                            handle_results(ajax.responseText);
                        }
                    });

                    ajax.open('post','api.php', true);
                    ajax.send(form);
                }

                function handle_results(result){
                    //console.log(result);


                    var result_div = document.querySelector(".js_search");
                    var str = "";
                    var obj = JSON.parse(result);

                    for (var i = obj.length - 1; i>=0;  i--) {
                        str +=  "<div class='search-res'>" + obj[i].first_name + "</div>";
                    }
                    result_div.innerHTML = str;
                }


        </script>





        <script type="text/javascript">

            document.getElementById('myprofile').addEventListener('click', function(){


                if( document.querySelector('.bg-modal').style.display = "none"){
                     document.querySelector('.bg-modal').style.display = "flex";
                     document.querySelector('.modal-content').style.transition = "opacity 0.8s ease 0.03";
                }
            });
            

            document.querySelector('.close').addEventListener('click', function(){
                document.querySelector('.bg-modal').style.display = "none";
                document.querySelector('.bg-modal').style.transition = "opacity 0.8s ease 0.03";
            });

            $('#mysearch').keyup(function(){
                document.getElementById('clear').style.display = "flex";
                document.getElementById('results').style.display = "flex";
                document.getElementById('results').style.transition = "0.5s ease 0.03";
            });

            document.getElementById('clear').addEventListener('click',function(){
                document.getElementById('search').style.border = "none";
                document.getElementById('clear').style.display = "none";
                document.getElementById('results').style.display = "none";
            });

            $(document). on('click', function(e) {
                var container = $("#results");
                if (!$( e. target). closest(container). length) {
                container. hide();
                container.style.transition = "opacity 0.8 ease 0.05s";
                }
                
            });
                
        
         
        </script>
       
    </body>
</html>

