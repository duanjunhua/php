<?php
	$web = 
		isset($_POST["web"]) ? $_POST["web"] : "";
	if(is_array($web)){
		$websites = array(
			"Baidu" => "百度：http://www.baidu.com", 
			"Google" => "谷歌：http://www.google.com",
			"Jindong" => "京东：http://www.jd.com"
		);

		foreach ($web as $key) {
			echo $websites[$key] . "<br>";
		}
	}else{
?>

<form action="checkbox.php" method="post"> 
	百度：<input type="checkbox" name="web[]" value="Baidu" checked/><br>
	谷歌：<input type="checkbox" name="web[]" value="Google"><br>
	京东：<input type="checkbox" name="web[]" value="Jindong"><br>
    <input type="submit" value="Submit">
</form>

<?php
	}
?>