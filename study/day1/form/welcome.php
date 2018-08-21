<?php
	//表单域的名称会自动成为 $_GET 数组中的键
	$name = $_POST["name"];
	$password = $_POST["password"];
	echo "username: " . $name . "<br>" . "password: " . $password;
?>