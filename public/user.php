<div id="Friends">
    <?php

        $image = "/info-Distry-v1.1/public/images/male.png";

        if($FRIEND_ROW['gender'] == "Female"){

            $image = "/info-Distry-v1.1/public/images/female.png";
        }
        if(file_exists($FRIEND_ROW['profile_image'])){

            $image = $FRIEND_ROW['profile_image'];
        }
    ?>
        <a href="user-profile.php?id=<?php echo $FRIEND_ROW['userid']?>">
            <img title="<?php  echo htmlspecialchars($FRIEND_ROW['first_name']) ." ". htmlspecialchars($FRIEND_ROW['last_name'])?>" style="border-radius: 200px;" id="friends_img" src="<?php echo $image?>">
            <br>
        </a>
</div>