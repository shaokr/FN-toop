<?php 
	$str='node r.js -o build.js';
	exec("$str",$a ,$retval);
	echo ($retval==0?1:0);
?>