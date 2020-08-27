<html>
    <head>
        <title>XSS的闭合标签绕过</title>
        <h1>XSS的闭合标签绕过的学习</h1>
    </head>
    <body>
        <form action="/XSS-闭合标签绕过.php" method="get">
            <input name="keywords" value="">    
            <input type="submit" name="submit" value="插入">
        </form>
    </body>
    <!-- --!>
</html>

<?php
    error_reporting(0);
    $message=$_GET["keywords"];
    if ($message!==null){
        echo $message;
    };
?>