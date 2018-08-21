<?php
	
	/**
	 *
	 * PHP session用于存储关于用户会话的信息，存储单一用户的信息
	 * Session的工作机制：
	 * 	为每一个访客创建一个唯一的id(UID)，并基于这个UID来存储变量，UID存储在cookie中，或者通过URL进行传导
	 *
	 * Session的启动：
	 * 	session_start()函数，必须位于<html>标签之前，如：
	 * 		<?php session_start() ?>
	 * 	 	<html>
	 *  	 	...
	 *   	</html>
	 * 存储Session变量：
	 * 	Session的存储和取回是使用$_SESSION变量.
	 * 
	 */
	
	session_start();

	//存储session数据
	if(isset($_SESSION["views"])){
		$_SESSION["views"] = $_SESSION["views"] + 1;
	}else{
		$_SESSION["views"] = 1;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Test Session</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		//获取session数据
		echo "浏览量： " . $_SESSION['views'];
	?>
</body>
</html>

<?php
	
	/**
	 * 
	 * 销毁Session
	 * 	使用unset()或session_destroy()函数
	 * 		unset()函数用于释放指定的session变量
	 * 	 	session_destroy()重置session，将失去所有已存储的session数据.
	 * 	
	 */
	if(isset($_SESSION["views"])){
		unset($_SESSION["views"]);
		//session_destroy();
	}
?>