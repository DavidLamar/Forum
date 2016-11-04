<?php
	$hash = sha1("password");
	for($i = 0; $i < 100; $i++){
		$hash = sha1($hash);
	}
	echo $hash;
?>
