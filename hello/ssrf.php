<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<title>这里是SSRF的演示</title>
	</head>
	<body>
		<center>
			<p>
				<h1>SSRF的展示<h1>
			</p>
		</center>
	</body>
</html>


<?php
	function curl($url)
	{
		$ch=curl_init();		
		curl_setopt($ch,CURLOPT_URL,$url);	
		curl_setopt($ch,CURLOPT_HEADER,0);	
		curl_exec($ch);				
		curl_close($ch);				
	};
	$url=$_GET["url"];
	curl($url);
?>