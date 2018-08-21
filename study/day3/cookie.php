<?php
	
	/**
	 * Cookie常用于识别用户，是一种服务器留在用户计算机上的小文件
	 * Php能够创建并返回cookie
	 *
	 * 创建Cookie：
	 * 	setcookie()函数用于设置cookie，该函数必须位于<html>标签之前
	 *  	setcookie(name, value, expire, path, domain)
	 *
	 * 在发送cookie时，cookie的值会自动进行URL编码，在取回时自动进行解码
	 *
	 * 取回cookie：
	 * 	PHP中使用$_COOKIE变量用于访问cookie，如：取回名为user的cookie
	 * 		$_COOKIE["user"]
	 * 	
	 */
	
	$expire = time() + 60*60*24;
	setcookie("user", "testcookie", $expire);


	echo $_COOKIE["user"] . "<br>";

	//查看所有 cookie
	print_r($_COOKIE);

	/**
	 * 删除cookie：
	 * 	setcookie("user", time()-3600)
	 * 	
	 */
	//setcookie("user", "", time()-3600);

?>