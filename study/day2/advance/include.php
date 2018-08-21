<!DOCTYPE html>
<html>
<head>
	<title>PHP包含文件</title>
	<meta charset="utf-8">
</head>
<body>
	<?php

		/**
		 *
		 * PHP包含文件： include & require
		 * 	include与require语句用于在执行流中插入卸载其他文件中的有用的代码
		 * 	include与require除了处理错误的方式不同，其他都是相同的
		 * 		require生成一个致命错误，在错误发生后脚本停止执行
		 * 		include生成一个警告，在错误发生后脚本会继续执行
		 * 	语法：
		 * 		include "fileName";
		 * 		
		 * 		required "fileName";
		 */
		include "header.php";
		echo "<br>";
		echo "访问include php file property(prop) : $prop";
	?>
	<h1>Welcome use include in PHP</h1>
</body>
</html>

