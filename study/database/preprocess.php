<?php

	/**
	 * 预处理语句用于执行多个相同的SQL语句，并且执行效率更高
	 * 	预处理语句的工作原理：
	 * 		1.预处理：创建SQL语句模板并发送到数据库
	 * 		2.数据库解析：编译，对SQL语句模块执行查询优化，并存储结果不输出
	 * 		3.执行
	 * 	预处理语句优点：
	 * 		预处理语句大大减少了分析时间，只做了一次查询(虽然语句多次执行)
	 * 		绑定参数减少了服务器带宽，你只需要发送查询的参数，而不是整个语句
	 * 		预处理语句针对SQL注入是非常有用的，因为参数值发送后使用不同的协议，保证了数据的合法性
	 * 		
	 */
	
	//数据库参数
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mysqli";

	//1.MySQLi预处理语句
	
	//创建连接
	$conn = new mysqli($servername, $username, $password, $dbname);

	//检测连接
	if($conn->connect_error){
		die("连接错误：" . $conn->connect_error);
	}

	//预处理及绑定
	/*$stmt = $conn->prepare("insert into MyGuests(firstname, lastname, email) values(?, ?, ?)");
	$stmt->bind_param("sss", $firstname, $lastname, $email);	//sss表示三个字符串类型,每个参数都需要指定类型

	//设置参数并执行
	$firstname = "Joyce";
	$lastname = "Huang";
	$email = "joyce.huang@test.com";
	$stmt->execute();

	$firstname = "Lion";
	$lastname = "Liu";
	$email = "lion.liu@test.com";
	$stmt->execute();	

	echo "数据插入成功";

	//关闭statement
	$stmt->close();*/

	//关闭连接
	$conn->close();



	//2.PDO中的预处理
	try{

		//创建连接
		$conn2 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

		//设置PDO错误模式为异常
		$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//预处理绑定参数
		$stmt = $conn2->prepare("insert into PDO_T(firstname, lastname, email) values(:firstname, :lastname, :email)");

		$stmt->bindParam(":firstname", $firstname);
		$stmt->bindParam(":lastname", $lastname);
		$stmt->bindParam(":email", $email);

		//设置参数并执行
		$firstname = "Joyce";
		$lastname = "Huang";
		$email = "joyce.huang@test.com";
		$stmt->execute();

		$firstname = "Lion";
		$lastname = "Liu";
		$email = "lion.liu@test.com";
		$stmt->execute();

		echo "PDO Statement 数据插入成功.";

	}catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}

	//关闭Statement
	$stmt = null;

	//关闭连接
	$conn = null;
?>