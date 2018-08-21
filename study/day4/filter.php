<?php
	
	/**
	 *
	 * 始终对外部数据过滤
	 * 外部数据定义：
	 * 	表单数据
	 * 	Cookies
	 * 	Web Services data
	 * 	服务器变量
	 * 	数据库查询结果
	 *
	 * 函数与过滤器：
	 * 	filter_var() - 通过一个指定的过滤器来过滤单一的变量
	 * 	filter_var_array() - 通过相同的或不同的过滤器来过滤多个变量
	 * 	filter_input() - 获取输入变量，并对它进行过滤
	 * 	filter_input_array() - 获取多个输入变量，并通过相同的或不同的过滤器对它们进行过滤
	 * 	
	 */
	
	$num = 210;
	// $num = "abc";

	if(filter_var($num, FILTER_VALIDATE_INT)){
		echo($num . ": 是一个合法的整数。");
	}else{
		echo($num . ": 不是一个整数");
	}

	echo "<hr>";

	/**
	 *
	 * 过滤器有两种：Validating、Sanitizing
	 * 	Validating：
	 * 		用于验证用户输入
	 * 		严格的格式规则
	 * 		若政工则返回预期的类型，失败返回FALSE
	 * 	Sanitizing：
	 * 		用于允许或禁止字符串中指定的字符
	 * 		无数据格式规则
	 * 		始终返回字符串
	 *
	 *	选项和标志用于向指定的过滤器添加额外的过滤选项
	 */
	
	$number_range = array(
		"options" => array(
			"min_range" => 0, 
			"max_range" => 200
		)
	);

	if(filter_var($num, FILTER_VALIDATE_INT, $number_range)){
		echo($num . ": 在0~200之间");
	}else{
		echo($num . ": 不在0~200之间");
	}

	echo "<hr/>";

	/**
	 * 
	 * 使用filter_input_array()函数来过滤过个字段
	 * filter_input_array() 函数的第二个参数可以是数组或单一过滤器的 ID
	 * 	如果该参数是单一过滤器的 ID，那么这个指定的过滤器会过滤输入数组中所有的值
	 * 	如果该参数是一个数组，那么此数组必须遵循下面的规则：
	 * 		必须是一个关联数组，其中包含的输入变量是数组的键（比如 "age" 输入变量）
	 * 		此数组的值必须是过滤器的 ID ，或者是规定了过滤器、标志和选项的数组
	 * 
	 */
	
	/**http://localhost/day4/filter.php
	 * http://localhost/day4/filter.php?age=50
	 * http://localhost/day4/filter.php?age=50&email=test@abc.com
	 */

	$filters = array(
		"name" => array(
			"filter"=>FILTER_SANITIZE_STRING
		),
		"age" => array(
			"filter" => FILTER_VALIDATE_INT,
			"options" => array(
				"min_range" => 1,
				"max_range" => 100
			)
		),
		"email" => FILTER_VALIDATE_EMAIL
	);

	$result = filter_input_array(INPUT_GET, $filters);

	if(!$result["age"]){
		echo "Age must in 1 ~ 100";
	}elseif(!$result["email"]){
		echo "Email不合法";
	}else{
		echo "输入正确";
	}

?>
