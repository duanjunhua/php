<?php
	$web = 
		isset($_GET["web"]) ? $_GET["web"] : "";
		//isset($_POST["web"]) ? htmlspecialchars($_POST["web"]) : "";
	if($web){
		switch ($web) {
			case "BaiDu":
				echo "百度首页：http://www.baidu.com";
				break;
			case "Google":
				echo "谷歌首页：http://www.google.com";
				break;
			default:
				echo "Not in The Loop";
				break;
		}
	}else{
?>
<form action="" method="get"> 
	百度：<input type="radio" name="web" value="BaiDu" checked/><br>
	谷歌：<input type="radio" name="web" value="Google"><br>
	京东：<input type="radio" name="web" value="JingDong"><br>
	<input type="submit" value="Submit">
</form>
<?php
	}
?>