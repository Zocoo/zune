<?php
function randomkeys($length) {
	$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
	for($i = 0; $i < $length; $i ++) {
		$key .= $pattern {mt_rand ( 0, 35 )};
	}
	return $key;
}
?>
