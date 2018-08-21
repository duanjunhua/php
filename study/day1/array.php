<?php
	//数组能够在单个变量中存储多个值
	$cars = array("BMW", "Volvo", "Toyota");
	// echo $cars[0];
	foreach ($cars as $value) {
		echo $value . "<br>";
	}

	echo "<br>";

	//php中有三种数组
	/**
	 * 数值数组：带有数字ID键的数组
	 * 关联数组：带有指定键的数组，每个键关联一个值
	 * 多维数组：包含一个或多个数组的数组
	 */
	
	//数值数组
	//1.自动分配ID键
	$language = array("Java", "Python", "Scala", "Php");
	//2.人工分配
	$class[0] = "English";
	$class[1] = "Chiness";
	//....

	//count函数用于获取数组的长度,implode函数将数组转换为字符串
	echo "【" . implode(",", $language) . "】length: " . count($language);

	echo "<br>";

	//关联数组，有如下两种创建方式
	$age = array('Michael' => 25, 'David' => 27, 'Jacky' => 18);

	$age['James'] = 26;
	$age['Moon'] = 30;

	//使用键访问
	echo 'James age is ' . $age['James'];

	echo "<br>";

	//遍历关联数组
	echo 'For Each遍历关联数组：<br>';
	foreach ($age as $key => $value) {
		echo '&nbsp;&nbsp;' . $key . ' age is ' . $value;
		echo '<br>';
	}

	echo '<hr>';

	//数组中的元素可以按字母或数字顺序进行降序或升序排列

	/**
	 * 数值数组排序
	 * sort()：对数组进行升序排序
	 * rsort()：对数组进行降序排序
	 *
	 * 关联数组排序
	 * asort()：根据关联数组的值，进行升序排序
	 * arsort()：根据关联数组的值，进行降序排序
	 * 
	 * ksort()：根据关联数值的键，进行升序排序
	 * krsort()：根据关联数值的键，进行降序排序
	 * 
	 */
	
	//数值数组排序
	echo "数值数组before sort: "; 
	print_r($language);
	echo "<br>";
	sort($language);
	
	echo "数值数组after sort: ";
	print_r($language);

	echo "<br>";


	//关联数组排序
	echo "关联数组before sort[ use value compare ]: "; 
	print_r($age);
	echo "<br>";

	asort($age);
	echo "关联数组[use value compare after sort ] | [use key compare before sort]: ";
	print_r($age);

	echo "<br>";
	ksort($age);
	echo "关联数组after sort[ use key compare ]: ";
	print_r($age);
?>