<?php

	/**
	 *
	 * PHP MySQL where 语句必须使用mysqli_query()函数,尤其是【update，delete】语句
	 * 该函数用于向MySQL连接发送查询或命令
	 * 
	 */
	
	//定义数据库参数
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mysqli";

	//建立连接
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	//检测连接
	if(mysqli_connect_errno()){	//或if(!$conn)
		die("连接失败：" . mysql_connect_error());
	}

	$sql = "select * from MyGuests where lastname='Liu'";

	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_array($result)){
		echo $row["firstname"] . " " . $row["lastname"] . "<br>";
	}

	//关闭连接
	mysqli_close($conn);
?>