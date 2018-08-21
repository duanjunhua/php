<?php
	
	//设置时区
	date_default_timezone_set('PRC');	//PRC表示中国

	//触发错误
	trigger_error("手动抛出错误", E_USER_WARNING);	//第二个参数指定错误级别

	function error($error_no, $error_msg){
		// \r\n表示换行
		$date = date('Y_m_d');
		error_log(date('Y-m-d H:i:s') . ": " . "自定义错误信息\r\n", 3, $date . "_error" . ".log");
	}

	set_error_handler("error", E_ALL);

	$fp = fopen("test.txt", "r");
?>