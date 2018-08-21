<?php

	//中文文件名处理
	$file_name_zh = "测试.txt";
	//避免文件乱码以及找不到中文文件名问题
	//$file_name_zh = iconv('utf-8', 'gb2312', $file_name_zh);
	$file_size_zh = filesize($file_name_zh);
	echo '测试文件大小: ' . $file_size_zh . '<br/>';


	//文件名
	$file_name = "test.txt";
	//文件大小
	$file_size = filesize($file_name);
	echo 'test file size: ' . $file_size;

	//只读方式打开
	$fp = fopen($file_name, "r");

	/*
		//返回文件类型
		header("Content-type: application/octet-stream");
		//按字节返回
		header("Accept-Ranges: bytes");
		//返回文件大小
		header("Accept-Length: $file_size");
		//弹出客户端下载文件
		header("Content-Disposition: attachment; filename=$file_name");
	*/

	//一次读取的字节数
	$buf = 1024;
	$content = "";
	//判断是否读取完数据
	while(!feof($fp)){
		//读取数据
		$temp = fread($fp, $buf);
		$content = $content . $temp;
	}

	//关闭文件
	fclose($fp);
	echo '<br/>' . $content; 
?>