<html>
    <head>
        <title>XSS—R</title>
    </head>
    <body>
        <h1 id="test">PHP and XSS-R</h1>
        <form action="/XSS-R.php" method="get">
            <input type="text" name="Doit" value=""/>
            <input type="submit" onclick="setcookie()" value="Let's test"/>
            <button onclick="setcookie()">cookie</button>
        </form>
        <script>
            function setcookie(){
                cookies=document.getElementById("Doit").innerHTML
                document.cookie=cookies
            }
        </script>
    </body>

</html>





<?php
error_reporting(0);
$message = $_GET["Doit"];
if ($message!==null){
    echo $message;
}
?>
