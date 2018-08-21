<?php

	$server = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "php";

	$mysqli = new MySQLi($server, $username, $password, $dbname);

	if($mysqli->connect_error){
		die('数据库连接失败...' . $mysqli->connect_error);
	}


	//1. Select
	$sql = "select * from users where age > ?";

	//预编译Statement
	$stmt = $mysqli->prepare($sql);

	//绑定参数：
	$age = 30;
	//boolean mysqli_stmt::bind_param(string $types, mixed &$val[, ..]);
	//$types取值为：i(integer)、d(double)、s(string)、b(blob)
	$stmt->bind_param('i', $age);

	$stmt->bind_result($id, $name, $password, $email, $age);

	//执行,返回bool
	$rs = $stmt->execute();

	if($rs){
		echo "成功...<br/>";
		while($stmt->fetch()){
			echo $id . ' - ' . $name . ' - ' . $password . ' - ' . $email . ' - ' . $age . '<br/>';
		}
	}else{
		echo "失败...";
	}

	$stmt->free_result();

/*	
	//2.Insert
	//1. Select
	$sql_02 = "insert into users(name, password, email, age) values(?, md5(?), ?, ?)";

	//预编译Statement
	$stmt = $mysqli->prepare($sql_02) or die($mysqli->error);

	//绑定参数：
	$name = 'Iris';
	$password = 'iris';
	$email = 'irsi@php.com';
	$age = 18;
	//boolean mysqli_stmt::bind_param(string $types, mixed &$val[, ..]);
	//$types取值为：i(integer)、d(double)、s(string)、b(blob)
	$stmt->bind_param('sssi', $name, $password, $email, $age);

	//执行,返回bool
	$rs = $stmt->execute();

	if($rs){
		echo "成功插入数据...";
	}else{
		echo "插入数据失败...";
	}

*/	
	$stmt->close();

	$mysqli->close()

?>