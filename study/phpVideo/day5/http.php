<?php
	
	//设置时区
	date_default_timezone_set("PRC");

	echo date('Y-m-d H:i:s',time()) . '<br/>';

	//获取请求信息
	foreach ($_SERVER as $key => $value) {
		echo $key . ' = ' . $value . '<br/>';
	}

	echo $_SERVER['REQUEST_URI'];


	//防盗链技术,使用Referer请求参数

?>