<?php
	
	/**
	 *
	 * PHP使用MySQLi与PDO向MySQL插入数据
	 *
	 * 语法规则：
	 * 	PHP中SQL查询语句必须使用引号
	 * 	在SQL查询语句中的字符串值必须加引导
	 * 	数值的值不需要引号
	 * 	NULL值不需要引号
	 *
	 * 在table中设置了AUTO_INCREMENT与TIMESTAMP的值可以不指定
	 * 
	 */
	

	//定义连接的数据库信息
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mysqli";

	//1.面向对象
	
	//建立连接
	$conn = new mysqli($servername, $username, $password, $dbname);
	//检测连接
	if($conn->connect_error){
		die("连接失败： " . $conn->connect_error);
	}

	$sql = "
		INSERT INTO MyGuests(firstname, lastname, email)
		VALUES('Kay M', 'Xiao', 'kay.m.xiao@test.com')
	";

	//执行语句
	/*if($conn->query($sql) === true){
		echo "新记录插入成功";
	}else{
		echo "Error: " . $sql . "<br>" . $conn->connect_error;
	}*/

	//关闭连接
	$conn->close();

	echo "<hr/>";

	//2.面向过程
	
	//建立连接
	$conn2 = mysqli_connect($servername, $username, $password, $dbname);

	//检测连接
	if(!$conn2){
		die("连接失败： " . mysqli_connect_error());
	}

	//sql语句
	$sql = "
		INSERT INTO MyProgress(firstname, lastname, email)
		VALUES('James D L', 'Li', 'James.d.l.li@test.com')
	";

	//执行语句
	/*if(mysqli_query($conn2, $sql)){
		echo "数据成功插入MyProcess表.";
	}else{
		echo "Error: " . $sql . "<br>" . mysqli_error();
	}*/

	mysqli_close($conn2);

	echo "<hr/>";

	//3. PDO
	try{
		//建立连接
		$conn3 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		//设置PDO错误模式,用于抛出异常
		$conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//sql语句
		$sql = "
			INSERT INTO PDO_T(firstname, lastname, email)
			VALUES('Lucy D', 'Du', 'lucy.d.du@test.com')
		";
		//$conn3->exec($sql);
		echo "数据成功插入PDO_T表";

	}catch(PDOException $e){
		echo $sql . "<br>" . $e->getMessage();
	}	

	//关闭连接
	$conn3 = null;
?>