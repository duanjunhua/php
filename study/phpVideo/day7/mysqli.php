<?php
	

	/**
	* 面向对象编程：
	* 
	*	MySQLi
	* 	MySQLi_STMT
	* 	MySQLi_Result{
	*		int $MySQLi_Result->current_field,
	* 		int $field_count,
	* 		array $length,
	* 		int $num_rows
	* 	}
	*/

	$server = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "php";

	$mysqli = new MySQLi($server, $username, $password, $dbname);

	if($mysqli->connect_error){
		die('数据库连接失败...' . $mysqli->connect_error);
	}

	$sql='select * from users';

	$rs = $mysqli->query($sql);
	echo "num: " . $rs->num_rows . "<br/>";
	echo "<table border='1px' cellpadding='0' cellspacing='0' width='500px'><tr>";
	while($field = $rs->fetch_field()){
		/*echo "<th>";
		echo $field->name;
		echo "</th>";*/
		echo "<th>{$field->name}</th>";

	}
	echo "</tr>";
	while($row = $rs->fetch_assoc()){
		echo "<tr>";
		foreach ($row as $key => $value) {
			// echo $key . ' - ' . $value . '&nbsp;';
			// echo "<td>" . $value . "</td>";
			echo "<td>$value</td>";
		}
		echo "</tr>";
	}

	echo "</table>";

	//释放资源
	$rs->free();

	//insert
	
	/*
	$sql="insert into users(name, password, email, age)
			values('Kay', md5('kay'), 'kay@php.com', 25)";

	$rs = $mysqli->query($sql);

	if(!$rs){
		die('数据插入失败' . $mysqli->error);
	}
	*/

	//关闭连接
	$mysqli->close();
?>