<?php
	
	//php MD5加密
	//echo md5('abc');
	// echo "<pre>";
	// print_r($_SERVER);
	// echo "</pre>";
	//$val = empty($_SERVER['QUERY_STRING']) ? 0 : $_SERVER['QUERY_STRING'];
	//echo $val;
	$cars = array(
	  array("id"=>1, "name"=> "Michael", "email"=>"michael@php.com"),
	  array("id"=>2, "name"=> "Jacky", "email"=>"jacky@php.com")
  	);

	foreach ($cars as $val) {
		foreach ($val as $key => $value) {
			echo $key . ' = ' . $value . "&nbsp;";
		}
		echo "<br/>";
	}
?>

