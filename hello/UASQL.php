<!DOCTYPE html>
<html>
<head>
	<title>这是在User-Agent注入</title>
</head>
<body>
	<form action="./UASQL.php" method="post">
		<center><input type="text" name="name"></center>
        	<br>
        	<br>
        	<center><input type="submit" value="提交"></center>
	</form>
</body>
</html>

<?php
    error_reporting(0);
    $header=$_SERVER["HTTP_USER_AGENT"];
    $password=$_POST["name"];

    $database1=mysqli_connect(
            "localhost",
            "123456",
            "123456",
            "hello",
    );
    $database2=mysqli_connect(
            "localhost",
            "123456",
            "123456",
            "hello",
    );
    $query="select * from hello where name='$password'";
    echo $query;
    $result=mysqli_query($database1,$query);
    $row=mysqli_fetch_array($result);
    if ($row){
        $insert="insert into good(Admin,Sex) values ('$header','$password')";
        $end=mysqli_query($database2,$insert);
        $error=mysqli_error($database2);
        echo "<br>";
        echo  "<h1>$error</h1>";
        echo "<br>";
        echo "成功登陆";
    }
    else{
        echo "<br>";
        echo "<br>";
        echo "瓜！自己姓啥子都记不得";
    }
?>


