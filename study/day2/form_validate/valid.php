<?php
	//定义变量并默认设置为空值
	$nameErr = $emailErr = $genderErr = $websiteErr = "";
	$name = $email = $gender = $comment = $website = "";

	if($_SERVER["REQUEST_METHOD"] = "POST"){
		if(empty($_POST["name"])){
			$nameErr = "Name must be Input";
		}else{
			$name = test_input($_POST["name"]);
			//检测名字是否只包含字母与空格
			if(!preg_match("/^[a-zA-Z]*$/", $name)){
				$nameErr = "Name must character or backspace";
			}
		}

		if(empty($_POST["email"])){
			$emailErr = "Email must be input";
		}else{
			$email = test_input($_POST["email"]);
			if(!preg_match("(\[w+\-]+\@[\w\-]+\.[\w\-]+) /", $email)){
				$email = "Invalid Email format";
			}
		}

		if(empty($_POST["website"])){
			$website = "";
		}else{
			$website = test_input($_POST["website"]);
			if($preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#/%?=~_|!:,.;]*[-a-z0-9+&@#/%?=~_|]/", $website)){
				$website = "Invalid website";
			}
		}

		if (empty($_POST["comment"])){
	        $comment = "";
	    } else{
        	$comment = test_input($_POST["comment"]);
    	}
    
    	if (empty($_POST["gender"])){
        	$genderErr = "Gender must input";
    	} else{
        	$gender = test_input($_POST["gender"]);
    	}

		echo "<h2>您输入的内容是:</h2>";
		echo $name;
		echo "<br>";
		echo $email;
		echo "<br>";
		echo $website;
		echo "<br>";
		echo $comment;
		echo "<br>";
		echo $gender;
	}

	function test_input($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>