<html>
    <head>
        <title>数字型SQL注入</title>
    </head>
    <body>
        <form action="/DataSQL.php" method="get">
            <center><input type="text" name="user"></center>
            <br>
            <center><input type="submit" id="key" value="Action"></center>
        </form>
    </body>
</html>


<?php
    $i=0;
    error_reporting(0);
    $databases=mysqli_connect(
            "localhost",
            "123456",
            "123456",
            "hello"
    );
    if (mysqli_connect_errno())
    {
        echo "连接失败：".mysqli_connect_error();
    }
    $number=$_GET["user"];
    $sql="select * from good where id=".$number;
    echo $sql;
    $result=mysqli_query($databases,$sql) ;
    if ($row=mysqli_fetch_array($result)) {
        echo "<p>$row[0]:$row[1]:$row[2]:$row[3]</p>";
        echo "<br>";
        echo $sql;
    };

    echo "<br>";
?>
