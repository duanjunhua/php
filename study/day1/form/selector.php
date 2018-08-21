<?php

	/**
	 * htmlspecialchars：把一些预定义的字符转换为HTML实体，如：
	 * & => &amp;
	 * " => &quot;
	 * ' => &#039;
	 * < => &lt;
	 * > => &gt;
	 *
	 * 在html的action中，当使用$_SERVER["PHP_SELF"]时，htmlspecialchars($_SERVER["PHP_SELF"]);可以避免恶意攻击
	 */
	$web = 
		isset($_GET["web"]) ? htmlspecialchars($_GET["web"]) : "";
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
<!-- <form action="" method="post"> -->
	<select name="web">
		<option value="">Select One WebSite</option>
		<option value="BaiDu">BaiDu</option>
		<option value="Google">Google</option>
		<option value="JingDong">JinDong</option>
	</select>
	<input type="submit" value="Submit">
</form>
<?php
	}
?>