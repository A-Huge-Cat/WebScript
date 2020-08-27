<html>
    <head>
        <title>
            这里是字符型SQL注入
        </title>
        <style>
            body {
                align-content: center;
            }
        </style>
    </head>
    <body>
        <form action="/StrSQL.php" method="get">
            <center><input type="text" name="user"></center>
            <br>
            <br>
            <center> <input type="submit" id="key" value="点击此处进行查询"></center>
        </form>
    </body>
</html>


<?php
    error_reporting(0);
    $mysqlconnect=mysqli_connect(
            "localhost",
            "123456",
            "123456",
            "hello"
    );
    if (mysqli_connect_errno()){
        echo "连接数据库失败";
    };
    echo "数据库连接成功";
    echo "<br>";
    $student=$_GET['user'];
//    echo $student;
    $query="select * from hello where name='$student'";
    echo $query;
    $result=mysqli_query($mysqlconnect,$query);
    if ($row=mysqli_fetch_array($result)) {
        echo "<p>$row[0]:$row[1]:$row[2]:$row[3]</p>";
    };




?>


















