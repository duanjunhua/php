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

<form action="" method="post"> 
    <select multiple="multiple" name="web[]">
    <option value="">Select WebSites:</option>
    <option value="Baidu">Baidu</option>
    <option value="Google">Google</option>
    <option value="Jindong">Jindong</option>
    </select>
    <input type="submit" value="Submit">
</form>

<?php
	}
?>