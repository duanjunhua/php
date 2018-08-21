<?php
	
	$server = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "php";

	$mysqli = new MySQLi($server, $username, $password, $dbname);

	if($mysqli->connect_error){
		die('数据库连接失败...' . $mysqli->connect_error);
	}


	//DML
	/*
		$sql = "insert into users(name, password, email, age) values('James', md5('james'), 'james@php.com', 30);
				insert into users(name, password, email, age) values('Cater', md5('cater'), 'cater@php.com', 45)";

		$rs = $mysqli->multi_query($sql);

		if(!$rs){
			die("数据插入失败". $mysqli->error);
		}
	*/


	//DQL
	$sqls = "desc users;select * from users";

	//$results = $mysqli->multi_query($sqls);

	if($results = $mysqli->multi_query($sqls)){			//执行SQL语句
		do{
			if($rs = $mysqli->store_result()){			//取出结果集
				while($row = $rs->fetch_assoc()){
					foreach ($row as $key => $value) {
						echo $key . ' - ' . $value . '&nbsp;';
					}
					echo "<br/>";
				}
				$rs->free();
			}else{
				echo 'rs: ' . $mysqli->error;
			}
				
			if(!$mysqli->more_results()){	//查询是否还有新的结果集
				break;
			}

			echo "<br/>************* New Result Set **************<br/>";
		}while($mysqli->next_result());
	}else{
		echo 'sql: ' . $mysqli->error;
	}

	$mysqli->close();



?>