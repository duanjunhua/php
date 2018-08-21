<?php

	/**
	 *
	 * JSON函数：
	 * 	json_encode()：对变量进行JSON编码
	 * 	json_decode()：对JS格式的字符串进行解码，转换为PHP变量
	 * 	json_last_error：返回最后发生的错误
	 * 	
	 */
	
	/**
	 * string json_encode($value [, $options = 0])
	 * 	value：要编码的值，该函数只对UTF-8编码的数据有效
	 * 	options：由以下常量组成的二进制编码：
	 * 		JSON_HEX_QUOT, JSON_HEX_TAG, JSON_HEX_AMP, 
	 * 		JSON_HEX_APOS, JSON_NUMERIC_CHECK,JSON_PRETTY_PRINT, 
	 * 		JSON_UNESCAPED_SLASHES, JSON_FORCE_OBJECT
	 * 
	 */
	
	$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
	$json = json_encode($arr);
	echo $json;
	echo "<br>";

	//将PHP对象转换为JSON格式数据
	class Emp{
		public $name = "";
		public $hobbies = "";
		public $birthdate = "";
	}

	$e = new Emp();
	$e->name = "Michael";
	$e->hobbies = "walk";
	$e->birthdate = date("m/d/Y h:i:s:a", strtotime("8/5/1974 12:20:03 p"));

	echo json_encode($e);

	echo "<hr/>";

	/**
	 * mixed json_decode($json_string [, $assoc = false [, $depth = 512 [, $options] = 0]]])
	 * 	json_string：待解码的JSON字符串，必须是UTF-8编码数据
	 * 	assoc：当该参数为true时，将返回数组，false时返回对象，默认为false
	 * 	depth：整数类型的参数，它指定递归深度
	 * 	options：二进制掩码，目前只支持JSON_BIGINT_AS_STRING
	 * 	
	 */
	
	var_dump(json_decode($json));
	echo "<br>";
	var_dump(json_decode($json, true));
?>