<?php
	/**
	 * 多维数组
	 * 	一个数组中的值可以是另一个数组，另一个数组的值也可以是一个数组
	 */
	
	//二维数组
	$cars = array(
		array("Volvo", 100, 96),
		array("BMW", 60, 59),
		array("Toyota", 100, 110) 
	);

	print("<pre>");
	print_r($cars);
	print("</pre>");

	echo "<hr/>";

	/**
	 * 多维数组是包含一个或多个数组的数组
	 *
	 * 创建自动分配ID键的多维数组
	 */
	$sites = array(
		'Baidu' => array(
			"百度",
			"http://www.baidu.com"
		), 
		'Google' =>array(
			"谷歌",
			"http://www.google.com"
		),
		'TaoBao' =>array(
			"淘宝",
			"http://www.taobao.com"
		)
	);

	print("<pre>");
	print_r($sites);
	echo "<br>";
	echo $sites['Google'][0] . " website is : " . $sites['Google'][1];
	print("</pre>");	
?>