<!Doctype html>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" media="all" href="stylesheet/public_footer.css" />

    </head>
    <body>
        <footer class="public-footer">
            Send Us Queries: 
            <br>
                    <input class="query-email" type="email" placeholder="Your email address" name="email"></input>
                    <br>
                    <br><textarea class="queries" type="text" name="query"></textarea>
                    <br>
                    &nbsp;
                    <br>
                    <input class="query-submit" type="submit" onclick="alertMe()" value="Submit Query"></input>
            &nbsp;
            &nbsp;
            &nbsp;
            <br>
            <br>
            <section class="copyright">

            <p>Copyright &copy;  <?php echo date('Y');?> infoDistry</p>
            <br>
                <small>
                    In this website we share information about relevant and even entertainment topics such as movies or tv series. </br>
                    No valgur or explicit content will be allowed on the site.
                    All those who break any of the rules will be terminated.

                </small>

            </section>
        </footer>

        <script type="text/javascript">

            function alertMe(){
                
            var email = document.getElementsByClassName('query-email')[0];
            var queries = document.getElementsByClassName('queries')[0];
            var submit = document.getElementsByTagName('button');

                
                        
            var validate = prompt("Query Submitted for: " + email.value +"\n\n" + "Query: " + "\n "+ queries.value + "\n" + "is this Correct? (Yes/No) " );
                
                var answer = "yes";

                if( validate == answer.toLowerCase() || validate == answer.toUpperCase()){

                    alert("Thank you for your Query. You will hear from us soon.")
                    email.value = null;
                    queries.value = null;
                }
                else{

                    alert("Please Uptade it.");
                }
            }

        </script>

    </body>
</html>

