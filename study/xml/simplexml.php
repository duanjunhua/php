<?php
	
	/**
	 * PHPSimpleXML处理最普通的XML任务，其余的任务交由其他扩展处理
	 *
	 * SimpleXML：
	 * 	SimpleXML为PHP5中的新特性
	 * 	提供了一种获取XML元素的名称和文本的简单方式
	 * 	SimpleXML可把XML文档(或XML字符串)转换为对象，如：
	 * 		元素被转换为SimpleXMLElement对象的单一属性，当同一级别上存在多个元素时，会被置与数组中
	 * 		属性通过使用关联数组访问，其中的索引对应属性的名称
	 * 		元素内部的文本被转换为字符串，若一个元素拥有多个文本几点，则按照它们被找到的顺序进行排列
	 *
	 * SimpleXML优点：
	 * 	读取/提取XML文件/字符串的数据非常快
	 * 	编辑文本几点或属性更快
	 *
	 * 处理高级XML时，使用Expat与XML DOM更好
	 * 
	 */
	
	//将XML文件加载转换为对象
	$xml = simplexml_load_file("test.xml");

	/**
	 * 输出：
	 * 	SimpleXMLElement Object ( [to] => Tove [from] => Jani [heading] => Reminder [body] => Don't forget me this weekend! )
	 */
	print_r($xml);

	echo "<hr/>";

	//访问元素数据
	echo $xml->to . "<br>";
	echo $xml->from . "<br>";
	echo $xml->heading . "<br>";
	echo $xml->body . "<br>";

	echo "<hr/>";

	//输出每个子节点的元素名称与数据
	echo $xml->getName() . "<br>";
	foreach ($xml->children() as $child) {
		echo $child->getName() . " : " . $child . "<br>";
	}
?>