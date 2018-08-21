<?php
    //php超级全局变量
    /**
     * $GLOBALS 是一个包含了全局变量的全局组合数组，变量的名字就是数组的键
     * $_SERVER 是一个包含了诸如头信息(header)、路径(path)、以及脚本位置(script locations)等等信息的数组，这个数组中的项目由Web服务器创建
     * $_REQUEST 用于收集HTML表单提交的数据
     * $_POST 被广泛应用于收集表单数据
     * #_GET 被广泛应用于收集表单数据，在HTML form标签的指定该属性："method="get"，可以收集URL中发送的数据
     * $_FILES
     * $_ENV
     * $_COOKIE
     * $_SESSION
     */
    

    //$GLOBALS
    $x = 75;
    $y = 25;

    function add(){
    	$GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
    }

    add();
    echo $z;	//z是一个globals数组中的超级全局变量，在函数外访问


    echo "<hr>";

	//$_SERVER
    echo $_SERVER['PHP_SELF'];
    echo "<br>";
    echo $_SERVER['SERVER_NAME'];
    echo "<br>";
    echo $_SERVER['HTTP_HOST'];
    echo "<br>";
    //echo $_SERVER['HTTP_REFERER'];
    //echo "<br>";
    echo $_SERVER['HTTP_USER_AGENT'];
    echo "<br>";
    echo $_SERVER['SCRIPT_NAME'];
    echo "<br>";
    echo $_SERVER['REQUEST_METHOD'];
    echo $_SERVER['REMOTE_ADDR'];

    echo "<hr>";
?>

<!-- $_REQUESR 与$_POST -->
<html>
	<body>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			Name: <input type="text" name="fname">
			<input type="submit">
		</form>

		<?php
			$name = $_REQUEST["fname"];
			echo '$_REQUEST Input Name: ' . $name;
			echo "<br>";
			$post_name = $_POST["fname"];
			echo '$_POST Input Name : ' . $post_name;
		?>
	</body>
</html>