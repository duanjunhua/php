<?php
	/**
	 *
	 * fopen()函数用于在PHP中打开文件
	 * 	第一个参数为要打开的文件的名称，第二个参数规定了使用哪种模式来打开
	 * 	r 	=>	只读
	 * 	r+ 	=>	读/写，在文件的开头开始
	 * 	w 	=>	只写，打开并清空文件的内容，若文件不存在，则创建新文件
	 *  w+	=>	读/写，打开并清空文件内容，若文件不存在，则创建新文件
	 *  a 	=>	追加，打开并在末尾添加内容，文件不存在则创建新文件
	 *  a+	=>	读/追加，通过向文件末尾写内容，来保持文件内容
	 *  x 	=>	只写，创建新文件，若文件存在则返回false与一个错误
	 *  x+	=>	读/写，创建新文件，若文件存在则返回false与一个错误
	 *
	 * 函数无法打开指定文件，则返回0(false)
	 * 
	 */
	
	$file = fopen("test.txt", "r") or exit("Unable to open file");

	/**
	 * 
	 * feof()
	 * 	检测是否已到达文件末尾，一般用于循环遍历未知长度的数据时
	 * 
	 */
	if(feof($file)){
		echo "文件结尾";
	}

	/**
	 *
	 * fgets()
	 * 	用于从文件中逐行读取文件，在函数调用之后，文件指针会移动到下一行
	 * 	
	 */
	
	// echo "Start to read file by line: <br>";
	// while (!feof($file)) {
	// 	echo fgets($file) . "<br>";
	// }
	
	/**
	 *
	 * fgetc()
	 * 	逐字符读取文件，函数调用过后，文件指针会移动到下一个字符
	 */
	echo "Start to read file by character: <br>";
	while (!feof($file)) {
		$character = fgetc($file);
		if(" " == $character){
			echo "<br>";
		}else{
			echo $character;
		}
	}

	//关闭文件
	fclose($file);

?>