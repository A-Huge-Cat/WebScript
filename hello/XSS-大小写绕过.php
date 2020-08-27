<html>
    <head>
        <title>XSS—大小写绕过</title>    
    </head>
    <body>
        <h1>xss字符串绕过测试</h1>
        <form action="/XSS-大小写绕过.php" method="get">
            <input type="text" name="Searching"/>
            <input type="submit" value="XSS-D">
        </form>
    </body>
</html>

<?php
    function safe($xss1)
    {
        $xss1=str_replace("s","-",$xss1);
        return $xss1;
    };
    error_reporting(0);
    $hello=$_GET['Searching'];
    $hello=safe($hello);
    echo "GET: ".$hello;   
?>
