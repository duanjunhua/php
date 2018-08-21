<?php
	
	/**
	 *
	 * 
	 */
	
	//定义数据库参数
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mysqli";

	//1.面向对象

	echo "面向对象查询： <br>";	

	//创建连接
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	//检测连接状态
	if($conn->connect_error){
		die("连接失败：" . $conn->connect_error);
	}

	//查询语句
	$sql = "select id, firstname, lastname, email from MyGuests";
	
	//执行语句
	$result = $conn->query($sql);

	//函数 num_rows() 判断返回的数据
	if($result->num_rows > 0){
		//输出数据,函数 fetch_assoc() 将结合集放入到关联数组并循环输出
		while($row = $result->fetch_assoc()){
			echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] //. " - Email: " . $row["email"] 
			. "<br>";
		}
	}else{
		echo "查询结果为空.";
	}

	//关闭连接
	$conn->close();

	echo "<hr/>";

	//2.面向过程
	echo "面向过程查询： <br>";	
	//创建连接
	$conn2 = mysqli_connect($servername, $username, $password, $dbname);

	//检测连接状态
	if(!$conn2){
		die("连接失败：" . mysqli_connect_error());
	}

	//查询语句
	$sql = "select id, firstname, lastname, email from MyProgress";

	//执行语句
	$result = mysqli_query($conn2, $sql);

	//输出结果
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
		}
	}else{
		echo "查询结果为空.";
	}

	//关闭连接
	mysqli_close($conn2);
	
	echo "<hr/>";

	//3.PDO+预处理
	
	echo "PDO+预处理查询: <br>";

	echo "<table style='border: solid 1px black;'>";
	echo "<tr>
			<th style='width:150px; border:1px solid black;'>Id</th>
			<th style='width:150px; border:1px solid black;'>Firstname</th>
			<th style='width:150px; border:1px solid black;'>Lastname</th>
			<th style='width:150px; border:1px solid black;'>Email</th>
		</tr>";

	class TableRows extends RecursiveIteratorIterator{
		function __construct($it){
			parent::__construct($it, self::LEAVES_ONLY);
		}

		function current(){
			return "<td style='width:150px; border:1px solid black;'>" . parent::current() . "</td>";
		}

		function beginChildren(){
			echo "<tr>";
		}

		function endChildren(){
			echo "</tr>" . "<br>";
		}
	}

	try{

		//建立连接
		$conn3 = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
		//设置错误模式为异常
		$conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn3->prepare("select id, firstname, lastname, email from PDO_T");
		$stmt->execute();

		//设置结果集为关联数组
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $key => $value) {
			echo $value;
		}
	}catch(PDOException $e){
		echo $sql . " Error: " . $e->getMessage();
	}

	//关闭连接
	$conn3 = null;
	echo "</table>";

?>