<?php
	
	//通过header来控制缓存,有如下三种方式：
	header('Expires: -1');
	header('Cache-Control: no_cache');
	header('Progma: no_cache');
?>