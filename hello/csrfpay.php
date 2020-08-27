<html>
	<head>
		 <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<title>这里是CSRF的支付页面</title>
	</head>
	<body>
		<form action="./csrfpay.php" method="post">
			<center>
				<p>输入转账人的名字 <input type="text" name="username"></p>
				<p>输入转账金额 <input type="text" name="account"></p>
				<p><input type="submit" value="点击转账">
			</center>
		</form>
		<p><a href="http://hello/attackcsrf.html">重大新闻</a></p>
		<a href="http://www.cn.bing.com">有问必应</a>
	</body>
</html>

<?php
	error_reporting(0);
	$username=$_POST["username"];
	echo "<p>$username</p>";
	$account=$_POST["account"];
	echo user_token;
	
	
	/*验证是否具有cookie*/
	$cookie=$_COOKIE["good"];
	if (!isset($cookie))
	{
		exit();
	};
	
	if ($cookie!="day")	
	{
		echo "exit";
		exit();
	};
	
	/*连接数据库*/
	$connect=mysqli_connect(
		"localhost",
		"123456",
		"123456",
		"csrf",
	);
	
	if (mysqli_connect_error())
	{
		echo "连接失败:".mysqli_connect_error();
	};
	
	/*验证收款方和支付金额是否为空*/
	if (isset($username) and isset($account))
	{
		echo "成功给".$username."转账"."$account"."元";
		echo "<br>";
	};
	
	/*对数据库操作*/
	$get=100+$account;
	$leave=100-$account;
	
	$sql1="update pay set account=".$get." where username="."\"$username\"";
	echo $sql1; 
	echo "<br>";
	$sql2="update pay set account=".$leave." where username="."\"pay\"";
	echo $sql2;
	echo "<br>";
	
	mysqli_query($connect,$sql1);
	mysqli_query($connect,$sql2);
	
	
	
	


?>
	