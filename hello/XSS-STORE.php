<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
        <title>XSS-STORE</title>
        <h1>Welcome to learn XSS-STORE</h1>
    </head>
    <body>
    <script>alert("xss")</script>
        <form action="/XSS-STORE.php" method="get">
            <input type="text" name="XSS-STORE"/>
            <input type="Submit" value="提交到数据库"/>
        </form>
    </body>
</html>


<?php
    error_reporting(0);
    $sql1="select * from good";
    $sql='insert into good(Sex) value("'.$_GET["XSS-STORE"].'")';

    echo $sql;
    echo "<br>";
    echo $sql."<br>";
    
    $link=mysqli_connect(
        "localhost",
        "123456",   #用户名
        '123456',   #用户密码
        "hello"
    );
    if (!$link){
        printf("Fail to connect to MySQL",mysqli_connect_error());
        exit;
    }else
        echo "已经连接上数据库". '<br>';
    
    if ($result=mysqli_query($GLOBALS["__mysqli_ston"],$sql)){
        echo "ok"."<br>";
    }
    else{
        echo "fd";
    }    

    $result=mysqli_query($link,$sql1);
    while ( $row=mysqli_fetch_array($result) ){
            echo $row[3];
            
        };
        mysqli_free_result($result);
    echo $row[1]

//    mysqli_close($link);

?>