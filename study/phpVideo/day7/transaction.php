<?php
	
	$server = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "php";

	$mysqli = new MySQLi($server, $username, $password, $dbname);

	if($mysqli->connect_error){
		die('数据库连接失败...' . $mysqli->connect_error);
	}

	//设置非自动提交
	$mysqli->autocommit(false);

	$sql_01 = "update users set age=age-2 where id=1";
	$sql_02 = "update users set age=age+2 where id=2";

	$rs_01 = $mysqli->query($sql_01);
	$rs_02 = $mysqli->query($sql_02);

	if(!$rs_01 || !$rs_02){
		echo "update error, transaction rollback: " . $mysqli->error;
		$mysqli->rollback();
	}else{
		echo "update success, commit transaction";
	}

	//提交事务
	$mysqli->commit();
	//关闭连接
	$mysqli->close();
?>