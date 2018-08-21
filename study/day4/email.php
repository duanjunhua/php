<?php
	
	/**
	 *
	 *	PHP允许从脚本直接发送电子邮件，使用mail()函数
	 *
	 * 	mail(to, subject, message, headers, parameters)
	 * 		to: email的接收者，required
	 * 		subject: email的主题，required，不能包含任何新行字符
	 * 		message: email要发送的消息，required，使用LF(\n)来分隔行，每行限制在70个字符
	 * 		headers: 附加的标题，optional
	 * 		parameters：对邮件发送程序规定额外的参数，Optional
	 * 
	 */
	
	/*$to = "1585115894@qq.com";
	$subject = "Test PHP email";
	$message = "邮件内容";
	mail($to, $subject, "From:2550564538@qq.com",$message);
	echo "邮件已发送";*/

	/**
	 *
	 * PHP Mail表单
	 * 
	 */
?>

<!DOCTYPE html>
<html>
<head>
	<title>Test PHP Mail</title>
	<meta charset="utf-8">
</head>
<body>
	<?php

		if(isset($_REQUEST["email"])){
			$email = $_REQUEST["email"];
			$subject = $_REQUEST["subject"];
			$message = $_REQUEST["message"];
			mail("someone@example.com", $subject, $message, "From: " . $email);
		}else{
			echo "
				<form method='post' action='mailform.php'>
			    	Email: <input name='email' type='text'><br>
			    	Subject: <input name='subject' type='text'><br>
			    	Message:<br>
			    	<textarea name='message' rows='15' cols='40'>
			    	</textarea><br>
			    	<input type='submit'>
			    </form>"
			;
		}

		/**
		 *
		 * FILTER_SANITIZE_EMAIL 过滤器从字符串中删除电子邮件的非法字符
		 * FILTER_VALIDATE_EMAIL 过滤器验证电子邮件地址的值
		 *
		 * Email信息过滤：
		 * 	 $field = filter_var($field, FILTER_SANITIZE_EMAIL);
		 * 	filter_var($field, FILTER_VALIDATE_EMAIL)
		 * 
		 */
	?>

</body>
</html>