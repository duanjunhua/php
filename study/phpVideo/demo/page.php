<?php

	$server = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "php";

	$mysqli = new MySQLi($server, $username, $password, $dbname);

	if($mysqli->connect_error){
		die('数据库连接失败...' . $mysqli->connect_error);
	}


	$count = 3;
	$pageNum = empty($_REQUEST["pageNum"]) ? 0 : ($_REQUEST["pageNum"] - 1)*$count;
	
	$sql="select count(id) from users";
	$rs = $mysqli->query($sql);
	if($row = $rs->fetch_array()){
		$nums = $row[0];
	}
	$pageCount = ceil($nums/$count);


	$sql="select * from users limit $pageNum, $count";
	$rs = $mysqli->query($sql);
	
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

	for($currentPage=1; $currentPage <=$pageCount; $currentPage++){
		echo "<a href='page.php?pageNum={$currentPage}'>{$currentPage}</a>&nbsp;&nbsp;";
	}
	//释放资源
	$rs->free();

	//关闭连接
	$mysqli->close();
?>