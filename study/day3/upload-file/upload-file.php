<?php
	
	/**
	 * 通过使用 PHP 的全局数组 $_FILES，你可以从客户计算机向远程服务器上传文件
	 * 第一个参数是表单的input name，第二个可以是 name, type, size等，如：
	 * 	$_FILES["file"]["name"]
	 * 	$_FILES["file"]["type"]
	 * 	$_FILES["file"]["size"]
	 * 	$_FILES["txt"]["error"]
	 * 	...
	 */

	/*if($_FILES["file"]["error"] > 0){
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
	}else{
		echo "upload file name: " . $_FILES["file"]["name"] . "<br>";
		echo "upload file type: " . $_FILES["file"]["type"] . "<br>";
		echo "upload file size: " . ($_FILES["file"]["size"] / 1024). "<br>";
		echo "upload file temp position: " . $_FILES["file"]["tmp_name"] . "<br>";
	}*/

	/**
	 * 上传限制：
	 * 	如：限制上传的文件类型、大小等
	 */
	$allowedExts = array("gif", "jpeg", "png", "jpg");	//只允许上传图片
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);

	if(($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/png")
		|| ($_FILES["file"]["type"] == "image/jpg")
		&& in_array($extension, $allowedExts)){

		if($_FILES["file"]["error"] > 0){
			echo "Error: " . $_FILES["file"]["error"] . "<br>";
		}else{
			echo "upload file name: " . $_FILES["file"]["name"] . "<br>";
			echo "upload file type: " . $_FILES["file"]["type"] . "<br>";
			echo "upload file size: " . ($_FILES["file"]["size"] / 1024). "<br>";
			echo "upload file temp position: " . $_FILES["file"]["tmp_name"] . "<br>";

			/**
			 * 保存上传的文件
			 */
			
			//判断当前目录下是否存在该文件，若没有则创建
			if(file_exists($_FILES["file"]["name"])){
				echo "File already exists.";
			}else{
				move_uploaded_file($_FILES["file"]["tmp_name"], $_FILES["file"]["name"]);
				echo "文件上传到目录下： " . $_FILES["file"]["name"];
			}
		}
	}else{
		echo "不合适的文件格式: " . $extension;
	}
	

?>