<!Doctype html>

<html>
    <head>

        <meta charset="utf-8">
        <link rel="stylesheet" media="all" href="stylesheet/newsletter_info.css" />

    </head>
    <body> 
        
     <div id="newsletter" draggable= "true">
         <h2 class="news-header">NewsLetter</h2>

        <?php //This section will contain all the content to the newsletter of the site?>
        <section class="info-newsletter">
            
             
            <?php $currentDate = date("Y-m-d");?>
            
            <text class="admin-update">Today the MyInfo site reached top 1 in the daily website reviews. Check it Out <p><a class="review" href= "#">dailydose.com/reviews</a></p>
        
                Watch the latest Lucifer now on NETFLIX.
                Only available to premium users.
                Send Us your reviews about the show.
                Catch season 6 this upcoming September 10th.
                Only on NETFLIX.
                <br>
                <br>

                <img class="img-test" src="/info-Distry/public/images/lucifer.png">
                <br>
                <br>
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                <br>

                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                <br>
                <br>
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                What was your favourite Journal for today? Let us know.
                <br>
                <?php function dateUpdated($currentDate){

                        $date = $currentDate;

                        return $date;
                }
                echo dateUpdated($currentDate);
                
                ?>
            </text>
            <?php ?>
        </section>
        </div>
    </body>

</html>