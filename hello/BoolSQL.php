<html>
    <head>
        <title>这里是Bool型SQL注入</title>
        <style>
            body {
                align-content: center;
            }
        </style>
    </head>
    <body>
        <form action="./BoolSQL.php" method="get">
            <center><input type="text" name="key"></center>
            <br>
            <br>
           <center><input type="submit" value="点击开始"></center>
        </form>
    </body>
</html>


<?php
    error_reporting(0);
    $PayLoad=$_GET["key"];
    $database=mysqli_connect(
      "localhost",
      "123456",
      "123456",
      "hello",
    );
    if (mysqli_connect_errno()){
        echo "连接数据库失败";
    };
    echo "数据库连接成功";
    echo "<br>";
    $query="select * from good where id=$PayLoad";
    echo $query;
    echo "<br>";
    $result=mysqli_query($database,$query);
    while ($row=mysqli_fetch_array($result)){
        $end=$row["PassWord"];
    };
    if ($end!==null){
        echo "<p id='hello'>有数据</p>";
    };
?>