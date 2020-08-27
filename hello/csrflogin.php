<html>
    <head>
        <title>这里是CSRF的登录页面</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    </head>
    <body>
            <form action="./csrflogin.php" method="get">
                <center>
                    <p>用户名:<input type="text" name="admin"></p>
                    <p>密码:<input type="password" name="passwd"></p>
                    <p><input type="submit" value="点击登录"></p>
                </center>
            </form>
    </body>
</html>

<?php
    $admin=$_GET["admin"];
    $passwd=$_GET["passwd"];
    /*这里是个简单的登录验证，意思意思，不用连接数据库了*/
    if (isset($admin) && isset($passwd))
    {
        if ($admin=="hugecat" && $passwd=="123456")
        {
            setcookie("good","day");
            header("Location:http://hello/csrfpay.php");
        }
        else
            {
            header("Location:http://hello/csrflogin.php");
            };
    };
?>


