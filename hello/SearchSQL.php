<html>
    <head>
        <title>搜索型SQL注入</title>
    </head>
    <body>
        <form action="./SearchSQL.php" method="get">
            <center><input type="text" name="name"></center>
            <br>
            <br>
            <center><input type="submit" value="搜索"><center>
        </form>
    </body>
</html>


<?php
    error_reporting(0);
    $keywords=$_GET["name"];
    $database=mysqli_connect(
        "localhost",
        "123456",
        "123456",
        "hello",
    );
    if (mysqli_connect_errno()){
        echo "数据库连接错误";
    };
    echo "连接数据库成功";
    echo "<br>";
    $query="select * from hello where name like '%$keywords%' order by name ";
    echo $query;
    echo "<br>";
    echo "<br>";
    $result=mysqli_query($database,$query);
    while ($row=mysqli_fetch_array($result)){
        echo "姓名:   $row[0]";
        echo "<br>";
        echo "班级:   $row[1]";
        echo "<br>";
        echo "成绩:   $row[2]";
        echo "<br>";
        echo "地址:   $row[3]";
        echo "<br>";
    };
?>
