<?php

	/**
	 * 创建MySQL表
	 */
	
	//定义连接的数据库信息
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mysqli";

	//1.面向对象

	$conn = new mysqli($servername, $username, $password, $dbname);

	//检测连接
	if($conn->connect_error){
		die("连接失败：" . $conn->connec_error);
	}

	//创建数据表
	$sql = "CREATE TABLE MyGuests(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		firstname VARCHAR(30) NOT NULL,
		lastname VARCHAR(30) NOT NULL,
		email VARCHAR(50),
		reg_daet TIMESTAMP
	)";

	/*if($conn->query($sql) === TRUE){
		echo "Table MyGuests created successfully.";
	}else{
		echo "创建数据表错误： " . $conn->error;
	}*/

	$conn->close();

	echo "<hr/>";

	//2.面向过程

	$conn2 = mysqli_connect($servername, $username, $password, $dbname);

	if(!$conn2){
		die("连接失败：" . mysqli_connect_error());
	}

	//使用sql创建数据表
	$sql = "CREATE TABLE MyProgress(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		firstname VARCHAR(30) NOT NULL,
		lastname VARCHAR(30) NOT NULL,
		email VARCHAR(50),
		reg_daet TIMESTAMP
	)";

	/*if(mysqli_query($conn2, $sql)){
		echo "数据表 MyProcess 创建成功.";
	}else{
		echo "创建数据表错误： " . mysql_error($conn2);
	}*/

	mysqli_close($conn2);

	echo "<hr/>";

	//3. PDO
	try{
		$conn3 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

		//设置PDO错误模式，用于抛出异常
		$conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//使用sql创建数据表
		$sql = "CREATE TABLE PDO_T(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			firstname VARCHAR(30) NOT NULL,
			lastname VARCHAR(30) NOT NULL,
			email VARCHAR(50),
			reg_daet TIMESTAMP
		)";

		//使用exec()，没有返回结果
		$conn3->exec($sql);
		echo "数据表PRO_T创建成功.";
	}catch(PDOException $e){
		echo $sql . "<br>" . $e->getMessage();
	}

	//关闭连接
	$conn3 = null;

?>