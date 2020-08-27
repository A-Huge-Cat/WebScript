<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<title>JS检查文件后缀</title>
	</head>
	<body>
		<script type="text/javascript">
			function selectFile(fnUpload)
				{
					var filename=fnUpload.value;
					var mime=filename.toLowerCase().substr(filename.lastIndexOf("."));
					if (mime!=".jpg")
					{
						alert("请选择jpg格式的照片上传");
						fnUpload.outerHTML=fnUpload.outerHTML;
					}
				}

		</script>
		
		<form action="./upjs.php" method="post" enctype="multipart/form-data">
			<center>
				<label for="file">Filename:</label>
				<input type="file" name="file" id="file" onchange="selectFile(this)">
				<br>
				<br>
				<br>
				<input type="submit" name="submit" value="提交你的jpg照片"/>
			</center>
		</form>	
	</body>
</html>


<?php
	if ($_FILES["file"]["error"]>0)
	{
		echo "Return Code:".$_FILES["file"]["error"]."<br>";
	}
	else
	{
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