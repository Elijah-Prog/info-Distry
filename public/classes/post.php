

<?php

"<pre>";
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
"</pre>";

include_once ("classes/autoload.php");

class Post{ 
    
    private $error = "";

    public function create_post($userid, $data,$files){

        if(!empty($data['post']) || !empty($files['file']['name']) || isset($data['is_profile_image'])){

            $myimage = "";
            $myvideo = "";
            $mydoc = "";
            $has_doc = 0;
            $has_image = 0;
            $has_video = 0;

            if(isset($data['is_profile_image'])){

                $myimage = $files;
                $myvideo = $files;
                $mydoc = $files;
                $has_doc = 0;
                $has_image = 0;
                $has_video = 0;

                if(isset($data['is_profile_image'])){
                    $is_profile_image = 1;
                }
            }
            else{
                    if(!empty($_FILES['file']['name']) && $_FILES['file']['type'] == "image/jpeg" || $_FILES['file']['type'] == "image/png" || $_FILES['file']['type'] == "image/gif" || $_FILES['file']['type'] == "image/pjpeg"){

                        $folder = "uploads/". $userid ."/";

                            //create folder

                            if(!file_exists($folder)){

                                mkdir($folder,0777,true);
                                file_put_contents($folder . "index.php", "");

                            }

                            $image_class = new Image();
                            
                            $myimage = $folder . $image_class->generate_filename(30);

                            $name = $_FILES['file']['name'];

                            move_uploaded_file($_FILES['file']['tmp_name'],$myimage);

                            $has_image = 1;

                            echo $_FILES['file']['error'];
                            
                    }else{
                    $folder = "videos/". $userid ."/";

                    //create folder

                    if(!file_exists($folder)){

                        mkdir($folder,0777,true);
                        file_put_contents($folder . "index.php", "");

                    }

                    $video_class = new Video();
                    
                    $myvideo = $folder . $video_class->generate_filename(30).$_FILES['file']['name'];

                    $name = $_FILES['file']['name'];

                    $allowedExts = array("avi","3gp", "mov","mpeg","mp4");
                    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

                    if (isset($_POST['submit']) &&(($_FILES["file"]["type"] == "video/mp4")
                    || ($_FILES["file"]["type"] == "video/3gp")
                    || ($_FILES["file"]["type"] == "video/mov")
                    || ($_FILES["file"]["type"] == "video/avi")
                    || ($_FILES["file"]["type"] == "video/mpeg")
                    )

                    && in_array($extension, $allowedExts)
                    &&!empty($_FILES['file']['name'])
                    )
                    {
                    if ($_FILES["file"]["error"] > 0)
                        {
                            
                        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
                        }
                    else{

                        if (file_exists($myvideo))
                        {
                        echo $_FILES["file"]["name"] . " already exists. ";
                        }
                        else
                        {
                        move_uploaded_file($_FILES["file"]["tmp_name"],
                        $myvideo);
                        }
                        }
                        $has_video = 1;
                    }

                }
            }
            if(isset($_POST["submit"])){

                $folder = "documents/". $userid ."/";

                //create folder

                if(!file_exists($folder)){

                    mkdir($folder,0777,true);
                    file_put_contents($folder . "index.php", "");

                }

                $video_class = new Video();
                
                $mydoc = $folder . $video_class->generate_filename(30).$_FILES['file']['name'];

                $name = $_FILES['file']['name'];

                $allowedExts = array("pdf","doc", "docx","pptx","zip");
                $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

                if(in_array($extension, $allowedExts)){

                    if(file_exists($mydoc)){

                        echo $_FILES["file"]["name"]. "Already exists";
                    }else{

                        move_uploaded_file($_FILES["file"]["tmp_name"], $mydoc);
                    }

                }$has_doc = 1;
                
            }

                $post = "";
                if(!isset($data['post'])){

                    $this->error .= "Describe what you are sharing for Search Engine!";
                }else{
                    $post = addslashes($data['post']);
                }
                
                $postid = $this->create_postid();
                $query = "insert into `posts` (userid, postid, post,image,has_image,video,has_video,document,has_doc, name) values ('$userid', '$postid', '$post','$myimage','$has_image','$myvideo','$has_video','$mydoc','$has_doc','$name')";
                $DB = new DB();
                $DB->save($query);
            }else{

                $this->error .= "Post can't be empty!!<br> OR file too large!!<br> OR Unsupported file format!!";

            }

        return $this->error;

    }
    
    
    public function get_posts($id){

        $query = "select * from posts where userid = '$id' order by id desc limit 10 ";

        $DB = new DB();


        $result = $DB->read($query);

        if($result){
            return $result;
        }
        else{
            return false;
        }
        
    }
    public function get_one_post($postid){

        if(!is_numeric($postid)){
            return false;
        }

        $query = "select * from posts where postid = '$postid' limit 1 ";

        $DB = new DB();


        $result = $DB->read($query);

        if($result){
            return $result[0];
        }
        else{
            return false;
        }
        
    }

    public function delete_post($postid){

        if(!is_numeric($postid)){
            return false;
        }
        $query = "delete from posts where postid = '$postid' limit 1 ";


        $DB = new DB();
        $DB->read($query);
    }

    public function i_own_post($postid,$userid_post){

        if(!is_numeric($postid)){
            return false;
        }

        $query = "select * from posts where postid = '$postid' limit 1 ";

        $DB = new DB();
        $result = $DB->read($query);

        if(is_array($result)){

            if($result[0]['userid'] == $userid_post){

                return true;
            }

        }

            return false;
    }


    private function create_postid(){

        $length = rand(4,19);
        $number = "";
        for($i=0; $i < $length; $i++){

            $new_rand = rand(0,9);

            $number = $number . $new_rand;

        }

        return $number;
    }

 }   

?>
