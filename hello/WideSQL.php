<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
        <title>这里是宽字节注入</title>
        <form action="./WideSQL.php" method="get">
            <center>
                在这里进行宽字节注入  <input type="text" name="wider">
                <br>
                <br>
                <input type="submit" value="点击开始注入">
            </center>

        </form>
    </head>
</html>

<?php
    error_reporting(0);
    $connect=mysqli_connect(
      "localhost",
      "123456",
      "123456",
      "hello"
    );
    if (mysqli_connect_errno())
    {
        echo "连接失败".mysqli_connect_error();
    };
    mysqli_query($connect,"set names 'gbk'");
    $id=addslashes($_GET["wider"]);
    echo $id;
    echo "<br>";
    $sql="select * from good where id='$id' limit 0,1";
    echo $sql;
    echo "<br>";
    $result=mysqli_query($connect,$sql);
    $row=mysqli_fetch_array($result);
    if ($row)
    {
        echo $row["Sex"].":".$row["Admin"];
    }
    else
    {
        print_r(mysqli_error());
    }
?>
