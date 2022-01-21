
<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

    include_once ("classes/autoload.php");
    include_once ("user_post.php");
    

    if(isset($_SESSION['userid']) && is_numeric($_SESSION['userid'])){

        $id = $_SESSION['userid'];
        $login = new Login();

        $result = $login->check_login($id);

        if($result){
            
            $user = new User();

            $user_data = $user->get_data($id);

            if(!$user_data){
                
                header("Location:signin_redirect.php");die;

            }
            
        }else{

            header("Location:signin_redirect.php");die;
        }
    }
    else{

            header("Location:signin_redirect.php");die;
        }


    //for posting

    

    //collect posts
        $post = new Post();
        $id = $_SESSION['userid'];
        $posts = $post->get_posts($id);

        //collect friends

        $user = new User();
        $id = $_SESSION['userid'];
        $friends = $user->get_friends($id);

        $image_class = new Image();

?>


<?php
  // You can simulate a slow server with sleep
  sleep(2);

  function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  }

  // Typically, this would be a call to a database
  function find_user_posts($page) {
    $first_post = $ROW[0];
    $per_page = 3;
    $offset = (($page - 1) * $per_page) + 1;

    $user_posts = [];
    // This is our "fake" database
    for($i=0; $i < $per_page; $i++) {
      $id = $ROW[$i]['id'];
      $user_post = [
        $ROW[$i]
      ];
      $user_posts[] = $user_post;
    }
    return $user_posts;
  }

  if(!is_ajax_request()) { exit; }

  $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

  $user_posts = find_user_posts($page);

?>
<?php foreach($user_posts as $user_post)

    include 'single_post.php';
?>