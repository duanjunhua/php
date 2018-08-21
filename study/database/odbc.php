<?php
	
	/**
	 *
	 * ODBC是一种应用程序编程接口(API)，使我们有能力连接到某个数据源
	 * 创建ODBC：
	 * 	通过ODBC，可以连接到网络中的任何计算机上的数据库，只要ODBC连接可用。
	 *
	 * 连接到ODBC:
	 * 	
	 * 	odbc_connect()函数用于连接到ODBC数据源，该函数有四个参数：数据源名、用户名、密码以及可选的指针类型
	 * 	
	 * 	odbc_exec()函数用于执行SQL语句
	 * 	
	 * 	odbc_fetch_row($rs)用于从结果集中返回记录，若能返回，则函数返回true，否则函数返回false，该函数只有两个参数：ODBC结果标识符与可选的行号
	 *
	 * 	odbc_result()函数用于从记录中读取字段，该函数有两个参数：ODBC结果标识符和字段编号或名称
	 * 		odbc_result($rs, 1);表示从记录返回第一个字段的值
	 * 		odbc_result($rs, "firstname");表示返回名为"firstname"的值
	 *
	 * 	odbc_close();表示关闭ODBC连接
	 * 
	 */
	
	//定义数据源信息
	$dsn = "mysqlodbc";
	$user = "root";
	$password = "root";
	
	//建立连接
	$conn = odbc_connect($dsn, $user, $password);

	//检测连接
	if(!$conn){
		exit("连接失败： " . $conn);
	}

	$sql = "select * from MyGuests";

	//执行语句
	$rs = odbc_exec($conn, $sql);

	//检查结果集
	if(!$rs){
		exit("SQL语句错误");
	}

	//遍历结果
	while(odbc_fetch_row($rs)){
		$firstname = odbc_result($rs, "firstname");
		$lastname = odbc_result($rs, "lastname");
		$email = odbc_result($rs, "email");
		echo "Name: " . $firstname . " " . $lastname . " ---- Email: " . $email . "<br>";
	}

	//关闭连接
	odbc_close($conn);
?>