<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
        <title>这里是二次注入的查询页面</title>
    </head>
    <body>
        <form action="./TwiceSQL2.php" method="get">
            <center>
                <input name="id" type="text">
                <br>
                <br>
                <input type="submit" value="点击查询">
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
    $id=intval($_GET["id"]);
    $selectquery="select * from users where id=".$id;
    $result=mysqli_query($connect,$selectquery);
    $row=mysqli_fetch_array($result);
    $username=$row["username"];
    $result2=mysqli_query($connect,"select * from users where username='".$username."'");
    if ($row2=mysqli_fetch_array($result2))
    {
        echo $row2["username"].":".$row2["password"];
    }
    else
        {
            echo mysqli_error($connect);
        }
