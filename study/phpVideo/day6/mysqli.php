<?php

	require_once('SqlUtils.class.php');

	$db_name = 'php';
	//sql
	$sql = 'SELECT * FROM users';

	$result = array();

	$result = SqlUtils::select($sql, $db_name, $result);

	foreach ($result as $arr) {

		// var_dump($arr);
		// echo '<br/>';

		foreach ($arr as $key => $value) {
			echo $value . '&nbsp;';
		}
		echo '<br/>';
	}

	echo '<hr>';

	$table_name = 'users';
	SqlUtils::getFieldName($sql, $db_name, $table_name);

?>
