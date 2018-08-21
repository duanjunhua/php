<?php

	/**
	 *
	 * 在 XML 中，没有预定义的标签。您必须定义自己的标签。
	 *
	 * 有两种基本的XML解析器类型：
	 * 	基于树的解析器：将xml文档转换为树型结构
	 * 	基于事件的解析器：将xml文档视为一系列的事件，当某个具体的事件发生时，解析器会调用函数来处理
	 *
	 * Expat是基于事件的解析器
	 *
	 * 基于事件的解析器比基于树型的解析器更快的访问数据
	 *
	 * 如：
	 * 	<from>Jani</from>
	 * 	基于事件的解析器将上面的XML报告为一连串的三件事：
	 * 		开始元素：from
	 * 		开始CDATA部分，值：Jani
	 * 		关闭元素：from
	 *
	 *	XML文档必须形式良好，否则Expat会生成错误
	 *	
	 */
	
	//初始化XML解析器
	$parser = xml_parser_create();

	//函数用于元素的开头
	function start($parser, $element_name, $element_attrs){
		switch ($element_name) {
			case 'NOTE':
				echo "-- NOTE -- <br>";
				break;
			case "TO":
				echo "To: ";
				break;
			case "FROM":
				echo "From: ";
				break;
			case "HEADING":
				echo "Heading: ";
				break;
			case "BODY":
				echo "Message: ";
		}
	}

	//函数用于结束的元素
	function stop($parser, $element_name){
		echo "<br>";
	}

	//函数用于查找字符数据
	function char($parser, $data){
		echo $data;
	}

	//声明元素处理器
	xml_set_element_handler($parser, "start", "stop");

	//声明字符数据处理器
	xml_set_character_data_handler($parser, "char");

	//打开XML文件
	$fp = fopen("test.xml", "r");

	//读取数据
	while($data = fread($fp, 1024)){
		xml_parse($parser, $data, feof($fp)) or
			die (sprintf("XML Error: %s at line %d",
						xml_error_string(xml_get_error_code($parser)),
						xml_get_current_line_number($parser)
			));
	}

	//释放分配给xml_parser_create()函数的内存
	xml_parser_free($parser);

?>