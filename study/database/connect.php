<?php
	
	/**
	 * PHP创建MySQL表.
	 */
	
	$servername = "localhost";
	$username = "root";
	$password = "root";

	//1.面向对象
	//创建连接
	$conn = new mysqli($servername, $username, $password);

	//检测连接
	if($conn->connect_error){
		die("连接失败：" . $conn->connec_error);
	}else{
		echo "面向对象连接： 连接成功";
	}
	//关闭连接
	$conn->close();

	echo "<hr>";
	
	//2.面向过程
	//创建连接
	$conn2 = mysqli_connect($servername, $username, $password);

	//检测连接
	if($conn2){
		echo "面向过程连接：连接成功.";
	}else{
		die("连接失败： " . mysqli_connect_error());
	}
	//关闭连接
	mysqli_close($conn2);

	echo "<hr>";

	//3. PDO
	try{
		$conn3 = new PDO("mysql:host=$servername;dbname=springboot", $username, $password);
		echo "PDO创建连接： 连接成功<br/>";
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	//关闭连接
	$conn3 = null;

	/**
	 * 关闭连接：
	 * 	连接在脚本执行完后会自动关闭
	 */
	if($conn || $conn2 || $conn3){
		echo "所有连接有未关闭的。";
	}else{
		echo "所有连接已关闭.";
	}
?>