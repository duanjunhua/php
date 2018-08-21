<?php
	//函数是通过调用函数来执行的
	/**
	 * php函数准则：
	 * 	函数的名称应该提示出它的功能
	 * 	函数名称以字母或下划线开头
	 */
	
	function writeName(){
		echo "Michael.";
	}

	echo "My Name is ";
	writeName();

	echo "<hr>";
	
	//参数函数
	function writeNameWithVal($fname){
		echo $fname . " Refsnes.<br>";
	}

	echo "My Name is ";
	writeNameWithVal("Michael J H Duan");
	echo "My brother's name is ";
	writeNameWithVal("Bob");

	echo "<hr>";

	//带返回值的函数
	function additional($x, $y){
		$total = $x + $y;
		return $total;
	}

	echo "5 + 3 = " . additional(5, 3);
?>