<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<title>php验证文件后缀</title>
	</head>
	<body>
		<form action="./upphp.php" method="post" enctype="multipart/form-data">
			<center>
				<p>上传文件</p>
				<input type=file id=file name=file>
				<br>
				<br>
				<br>
				<input type="submit" name="Submit" value="点击此处上传文件">
			</center>
		</form>
	</body>
</html>

<?php
	if ($_FILES["file"]["error"]>0)
	{
		echo "Return Code".$_FILES["file"]["error"]."<br>";
	}
	else
	{
		$info=pathinfo($_FILES["file"]["name"]);
		$ext=$info["extension"];
		if (strtolower($ext)=="php")
		{
			exit("不允许的后缀名");
		}
		echo "Upload:".$_FILES["file"]["name"]."<br>";
		echo "Type:".$_FILES["file"]["Type"]."<br>";
		echo "Size:".($_FILES["file"]["size"]/1024)."Kb<br>";
		echo "Temp file:".$_FILES["file"]["tmp_name"]."<br>";
		if (file_exists("D:\phpstudy_pro\WWW\hello/".$_FILES["file"]["name"]))
		{
			echo $_FILES["files"]["name"]."already exists.";
		}
		else
		{
			move_uploaded_file($_FILES["file"]["tmp_name"],"D:\phpstudy_pro\WWW\hello/".$_FILES["file"]["name"]);
			echo "Stored in:"."hello".$_FILES["file"]["name"];
		}

			
	}
	
	
	
	
	
?>
