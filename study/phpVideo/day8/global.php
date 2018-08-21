<?php
	echo "<pre>";
	print_r($_SERVER);
	echo "</pre>";

	echo ($_SERVER['REQUEST_METHOD'] === 'GET');

	echo "<br/>";
	if(empty($_SERVER['REQUEST_URI'])){
		echo "Not exist";
	}else{
		echo $_SERVER['REQUEST_URI'];
	}

	echo "<br/>";
	if(empty($_SERVER['QUERY_STRING'])){
		echo "No request param.";
	}else{
		echo $_SERVER['QUERY_STRING'];
	}

	echo "<br/>";
	echo "<pre>";
	echo print_r($GLOBALS);
	echo "</pre>";
?>