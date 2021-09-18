
<html>
    <head>
        <link rel="stylesheet" media="all" href="stylesheet/user_post_info.css" />
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
    </head>

    <body>

                    <article id="user-post-info">
                        <section class="post-header">
                            <a href="user-profile.php">

                                <?php

                                    $image = "/info-Distry/public/images/male.png";

                                    if($ROW_USER['gender'] == "Female"){

                                        $image = "/info-Distry/public/images/female.png";
                                    }
                                
                                ?>
                                
                                <img class="user-post-icon" src="<?php echo $image?>" alt="" width=50px height=50px>
                            
                            </a>
                            <section id="user-information">
                                <span class="author_name">
                                    <a href="user-profile.php" class="author_name"><?php echo $ROW_USER['first_name'] ." ". $ROW_USER['last_name']; ?></a><span class="verified"><i style="color:black; width:15px; height: 15px;" class="fas fa-user-check"></i>verified</span>
                                </span>
                                <br>
                                <span class="post-date">
                                    <small>
                                        <?php echo $ROW['date'] ?>
                                    </small>
                                <span>
                            </section>
                            </section>
                            <br>
                            <section class="post-content">
                                <span class="user-post-description">
                                    <text style="text-size:10px;"><?php echo $ROW['post']; ?></text>
                                </span>
                                <br>
                                <br>
                                <section class="user-file">
                                <a href="https://images.unsplash.com/photo-1547826039-bfc35e0f1ea8?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8YXJ0fGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80"><img style="width: 420px; height: 300px;" src="https://images.unsplash.com/photo-1547826039-bfc35e0f1ea8?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8YXJ0fGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80"></img></a>
                                </section>
                            </section>
                            <hr>
                            <section class="post-footer">
                                <a class="like-button" href="#"><text>234</text> <i style="width:20px; height: 20px; color:black;" class="far fa-thumbs-up"></i></a>
                                <a class="dislike-button" href="#"><text>234</text> <i style="width:20px; height: 20px; color:black;" class="far fa-thumbs-down"></i></a>
                                <a class="comment-link" href="comments.php"><small class="comment-txt">Comments</small></a><br>
                                <a class="report-link" href="report.php"><small class="report-txt">. Report</small></a>
                                <a class="share-link" href="share.php"><small class="report-txt">. Share</small></a>
                            </section>
                </article>
                <br>
    </body>

    </html>