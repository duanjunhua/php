<?php
	
	try {
		$fp = fopen("test.txt", "r");
	} catch (Exception $e) {
		echo $e->getMessage();
	}	
?>