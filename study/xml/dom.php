<?php
	
	/**
	 * PHP内建XML DOM解析器
	 *
	 * DOM解析器是基于树的解析器，如：
	 * 	<?xml version="1.0" encoding="utf-8"?>
	 * 	<from>Jani<from>
	 *
	 * XMl DOM解析视为一个树型结构：
	 * 		Level1：XML元素
	 * 		Level2：根元素，<from>
	 * 		Level3：文本元素，"Jani"
	 * 		
	 */
	
	/**
	 * 加载与输出XML文件
	 */
	
	//创建DOM对象
	$xmlDoc = new DOMDocument();

	//加载XML文件
	$xmlDoc->load("test.xml");

	//将XML文档存入一个字符串
	print $xmlDoc->saveXML();

	echo "<hr/>";

	/**
	 * 遍历XML
	 */
	
	//获取节点
	$x = $xmlDoc->documentElement;

	foreach ($x->childNodes as $item) {
		if($item->nodeName === "#text") continue;	//移除每个元素之间的空白文本节点
		echo $item->nodeName . " = " . $item->nodeValue . "<br>";
	}

?>