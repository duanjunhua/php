<?php
	
	/**
	 *
	 * PHP MySQL插入多条数据
	 *
	 * mysql_multi_query()函数可用来执行多条SQL语句.
	 * 
	 */
	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mysqli";

	//1.面向对象
	
	//建立连接
	$conn = new mysqli($servername, $username,$password, $dbname);

	//检查连接状态
	if($conn->connect_error){
		die("连接失败" . $conn->connect_error);
	}

	//SQL语句，每个SQL语句必须用分号隔开，连接多个SQL使用【".="】符号
	$sql = "INSERT INTO MyGuests(firstname, lastname, email)
			VALUES('Jhon', 'Doe', 'jhon.doe@test.com');";		//注意语句后有分号(;)
	$sql .= "INSERT INTO MyGuests(firstname, lastname, email)
			VALUES('Mary', 'Moe', 'mary.moe@test.com');";
	$sql .= "INSERT INTO MyGuests(firstname, lastname, email)
			VALUES('David', 'Huang', 'david.huang@test.com');";

	/*if($conn->multi_query($sql) === true){
		echo "多条数据插入成功.";
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}*/

	$conn->close();

	//2.面向过程
	
	$sql = "INSERT INTO MyProgress(firstname, lastname, email)
			VALUES('Jhon', 'Doe', 'jhon.doe@test.com');";		//注意语句后有分号(;)
	$sql .= "INSERT INTO MyProgress(firstname, lastname, email)
			VALUES('Mary', 'Moe', 'mary.moe@test.com');";
	$sql .= "INSERT INTO MyProgress(firstname, lastname, email)
			VALUES('David', 'Huang', 'david.huang@test.com');";

	//建立连接
	$conn2 = mysqli_connect($servername, $username, $password, $dbname);

	//检测连接状态
	if(!$conn2){
		die("连接失败：" . mysqli_connect_error());
	}

	/*if(mysqli_multi_query($conn2, $sql)){
		echo "成功插入多条数据.";
	}else{
		echo "Error: " . $sql . "<br>" . mysql_error();
	}*/

	//关闭连接：
	mysqli_close($conn2);

	

	//3. PDO
	
	$sql = "INSERT INTO PDO_T(firstname, lastname, email)
			VALUES('Jhon', 'Doe', 'jhon.doe@test.com');";		//注意语句后有分号(;)
	$sql .= "INSERT INTO PDO_T(firstname, lastname, email)
			VALUES('Mary', 'Moe', 'mary.moe@test.com');";
	$sql .= "INSERT INTO PDO_T(firstname, lastname, email)
			VALUES('David', 'Huang', 'david.huang@test.com');";

	try{
		//建立连接
		$conn3 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

		//设置PDO错误处理,抛出异常
		$conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//开启事务
		$conn3->beginTransaction();

		//执行语句
		//$conn3->exec($sql);
		
		//提交事务
		$conn3->commit();
		
		echo "成功插入多条数据.";

	}catch(PDOException $e){
		//失败回滚
		$conn3->rollback();

		echo "插入失败： " . $sql . "<br>" . $e->getMessage();
	}



	/**
	 * 
	 * 使用预处理语句：
	 * 	mysqli提供了第二种方式用于插入，可以预处理语句及绑定参数
	 * 	mysql扩展可以不带数据发送语句或查询到mysql数据库
	 *
	 * mysqli_stmt_bind_param($stmt, 'sss', $firstname, $lastname, $email);
	 * 	第二个参数的意义： sss 表示三个值(firstname, lastname, email)都是字符串，可取如下值：
	 * 		i - 整数
	 * 		d - 双精度浮点数
	 * 		s - 字符串
	 * 		b - 布尔值
	 * 	每个参数必须指定类型，来保证数据的安全性。通过类型的判断可以减少SQL注入漏洞带来的风险。
	 * 	
	 */
	
	//4.使用预处理语句
	
	//建立连接
	$conn4 = new mysqli($servername, $username, $password, $dbname);

	//检测连接状态
	if($conn4->connect_error){
		die("连接失败： ". $conn4->connect_error);
	}else{

		$sql = "INSERT INTO MyGuests(firstname, lastname, email) values(?, ?, ?)";

		//为mysqli_stmt_prepare()初始化statement对象.
		$stmt = mysqli_stmt_init($conn4);
		//预处理语句
		if(mysqli_stmt_prepare($stmt, $sql)){

			//绑定参数, "sss"表示传入的三个值都是字符串
			mysqli_stmt_bind_param($stmt, "sss", $firstname, $lastname, $email);

			//设置参数并执行
			$firstname = "Zero";
			$lastname = "Liu";
			$email = "zero.liu@test.com";
			mysqli_stmt_execute($stmt);

			$firstname = "Jacky";
			$lastname = "Guo";
			$email = "jacky.guo@test.com";
			mysqli_stmt_execute($stmt);

			echo "预处理SQL成功插入多条数据.";
		}
	}

?>