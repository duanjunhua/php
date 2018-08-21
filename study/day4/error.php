<?php
	
	/**
	 *
	 * 错误处理方法：
	 * 	简单的die()语句
	 * 	自定义错误与错误触发器
	 * 	错误报告
	 * 
	 */
	if(!file_exists("testError.txt")){
		die("文件不存在");
	}else{
		$file = fopen("testError.txt", "r");
	}

	/**
	 *
	 * 创建自定义错误处理器：
	 * 	创建的错误处理函数必须有能力处理两个参数(error leve 与error message)，但可接受最多5个参数，file, line-number, error context
	 * 语法：
	 * 	error_function(error_level, error_message, error_file, error_line, error_context);
	 *
	 * error_level:
	 * 	2 - E_WARNING：非致命的runtime错误，不暂停执行脚本
	 * 	8 - E_NOTICE
	 * 	256 - E_USER_ERROR
	 * 	512 - E_USER_WARNING
	 * 	1024 - E_USER_NOTICE
	 * 	4096 - E_RECOVERABLE_ERROR
	 * 	8191 - E_ALL
	 * 
	 * 如：
	 * 	function customErr($errNo, $errStr){
	 * 		echo $errNo . $errStr;
	 * 		die();
	 * 	}
	 *
	 * 应用错误处理程序：
	 * 	set_error_handle("customErr");	//设置自定义错误处理所有错误，也可以传入第二个参数设置处理错误级别
	 * 
	 */
	
	//定义错误处理函数
	function testErrHandle($errNo, $errStr){
		echo "<h5>Error:</h5> [$errNo] $errStr";
	}

	//设置错误处理函数
	set_error_handler("testErrHandle");

	//错误触发
	echo $test;

	/**
	 *
	 * 触发错误：
	 * 	可以使用trigger_error()函数触发自定义错误，第一个参数定义错误信息，第二个参数定义错误级别如：
	 *
	 * 		$test = 2;
	 * 		if($test>1){
	 * 			trigger_error("变量值大于1");
	 * 		}
	 * 
	 */
?>