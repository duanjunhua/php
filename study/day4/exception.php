<?php
	/**
	 *
	 * 异常被触发时，通常会发生：
	 * 	当前代码状态被保存
	 * 	代码执行被切换到预定义(自定义)的异常处理函数
	 * 	...
	 *
	 * 错误处理方法：
	 * 	异常的基本使用
	 * 	创建自定义的异常处理器
	 * 	多个异常
	 * 	重新抛出异常
	 * 	设置顶层异常处理
	 *
	 * try、throw、catch
	 * 
	 */
	
	function textException($num){
		if($num < 0){
			throw new Exception("变量的值必须大于等于0");
		}
		return true;
	}

	try{
		$number = -1;
		textException($number);
		echo "若输出内容，则说明$number 大于等于0";
	}catch(Exception $e){
		echo "Message: " . $e->getMessage() . ", currentVal: " . $number;
	}

	/**
	 *
	 * 自定义Exception，必须为Exception的扩展，
	 *
	 * 使用 set_exception_handler(exceptionName)来设置顶层Exception处理
	 * 
	 */
	
	class CustomException extends Exception{
		public function errorMessage(){
			$errorMsg = $this->getLine() . $this->getFile() . $this->getMessage();
			return $errorMsg；
		}
	}
?>