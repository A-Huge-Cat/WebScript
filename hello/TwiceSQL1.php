<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
        <title>二次注入的注册页面</title>
    </head>
    <body>
        <form method="get" action="./TwiceSQL1.php">
            <center>
                <input type="text" name="username">
                <br>
                <br>
                <input type="password" name="password">
                <br>
                <br>
                <input type="submit" value="点击注册">
            </center>
        </form>
    </body>
</html>

<?php
    error_reporting(0);
    $connect=mysqli_connect(
        "localhost",
        "123456",
        "123456",
        "user"
    );
    if (mysqli_connect_errno())
    {
        echo "连接失败".mysqli_connect_error();
    };

    $username=$_GET["username"];
    echo $username;
    echo "<br>";
    $password=$_GET["password"];
    echo $password;
    echo "<br>";
    $sql="insert into users(username,password) values ('".addslashes($username)."','".md5($password)."')";
    echo $sql;
    echo "<br>";
    $result=mysqli_query($connect,$sql);
    echo "新的id为：".mysqli_insert_id($connect);
?>