<?php

	/**
	 *
	 * 使用MySQLi与PDO创建MySQL数据库，当创建一个新的数据库时，必须为mysqli对象指定三个参数：servername, username, password,默认端口(3306)可以不写,若使用其他端口，需要为数据库添加空字符串，如：
	 * new mysqli($host, $username, $password, "", $port);
	 * 
	 */
	
	//定义连接的数据库信息
	$servername = "localhost";
	$username = "root";
	$password = "root";

	//1.面向对象
	
	//创建连接
	$conn = new mysqli($servername, $username, $password);
	//检测连接
	if($conn->connect_error){
		die("连接失败：" . $conn->connec_error);
	}

	//创建数据库
	$sql = "CREATE DATABASE mysqli";
	if($conn->query($sql) === TRUE){
		echo "mysqli数据库【创建】成功." . "<br>";
	}else{
		echo "Error creating database: " . $conn->error;
	}


	//删除数据库
	/*$sql = "DROP DATABASE mysqli";
	if($conn->query($sql) === TRUE){
		echo "mysqli数据库【删除】成功." . "<br>";
	}else{
		echo "Error drop database: " . $conn->error;
	}	*/

	//关闭连接
	$conn->close();

	echo "<hr/>";

	//2.PDO
	
	/**
	 * 使用PDO的最大好处是在数据库查询过程出现问题时可以使用异常来处理问题
	 */

	try{
		//建立连接
		$conn2 = new PDO("mysql:host=$servername;dbname=springboot", $username, $password);
		//设置PDO错误模式为异常
		$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql2 = "CREATE DATABASE pdo";

		//使用exec()，因为没有结果返回
		$conn2->exec($sql2);
		echo "pdo数据库【创建】成功" . "<br>";

		//删除数据库
		/*$sql2 = "DROP DATABASE pdo";
		$conn2->exec($sql2);
		echo "pdo数据库【删除】成功.";*/
	}catch(PDOException $e){
		echo $sql . "<br>" . $e->getMessage();
	}

	//关闭连接
	$conn2 = null;
?>