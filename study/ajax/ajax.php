<?php
	
	/**
	 * AJAX：
	 * 	能在无需重新加载整个网页的情况下，更新部分网页
	 * 	创建快速动态网页
	 * 	通过在后台与服务器进行少量数据交换，使网页实现异步更新
	 *
	 * AJAX基于因特网标准，使用以下技术组合：
	 * 	XMLHttpRequest对象(与服务器异步交互数据)
	 * 	JavaScript/DOM(显示/取回信息)
	 * 	CSS(设置数据的样式)
	 *  XML(常用作数据传输的格式)
	 *
	 * AJAX应用程序与浏览器及平台无关
	 * 
	 */
	
	//将姓名填充到数组中
	$a[]="Anna";
	$a[]="Brittany";
	$a[]="Cinderella";
	$a[]="Diana";
	$a[]="Eva";
	$a[]="Fiona";
	$a[]="Gunda";
	$a[]="Hege";
	$a[]="Inga";
	$a[]="Johanna";
	$a[]="Kitty";
	$a[]="Linda";
	$a[]="Nina";
	$a[]="Ophelia";
	$a[]="Petunia";
	$a[]="Amanda";
	$a[]="Raquel";
	$a[]="Cindy";
	$a[]="Doris";
	$a[]="Eve";
	$a[]="Evita";
	$a[]="Sunniva";
	$a[]="Tove";
	$a[]="Unni";
	$a[]="Violet";
	$a[]="Liza";
	$a[]="Elizabeth";
	$a[]="Ellen";
	$a[]="Wenche";
	$a[]="Vicky";

	//从请求URL地址中获取name参数
	$name = isset($_GET["name"]) ? $_GET["name"] : "";
	if(empty(trim($name))){
		echo "";
		exit;
	}

	//查找是否有匹配值
	$hint = "";
	if(strlen($name) > 0){
		for($i = 0; $i < count($a); $i++){
			if(strtolower($name) == strtolower(substr($a[$i], 0, strlen($name)))){
				if($hint == ""){
					$hint = $a[$i];
				}else{
					$hint = $hint . " , " . $a[$i];
				}
			}
		}
	}

	//如果没有匹配值设置输出为空
	if($hint == ""){
		$response = "";
	}else{
		$response = $hint;
	}

	//输出返回值,将response返回给AJAX
	echo $response;
?>