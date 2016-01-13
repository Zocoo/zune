<?php
include '../pojo/data.php';
include '../pojo/msg.php';
function arrayRecursive(&$array, $function, $apply_to_keys_also = false) {
	static $recursive_counter = 0;
	if (++ $recursive_counter > 1000) {
		die ( 'possible deep recursion attack' );
	}
	foreach ( $array as $key => $value ) {
		if (is_array ( $value )) {
			arrayRecursive ( $array [$key], $function, $apply_to_keys_also );
		} else {
			$array [$key] = $function ( $value );
		}
		if ($apply_to_keys_also && is_string ( $key )) {
			$new_key = $function ( $key );
			if ($new_key != $key) {
				$array [$new_key] = $array [$key];
				unset ( $array [$key] );
			}
		}
	}
	$recursive_counter --;
}
function remsg($code, $msg) {
	$msg = urldecode ( $msg );
	$msgs = new msgs ();
	$msgs->setCode ( $code );
	$msgs->setMsg ( urlencode ( $msg ) );
	$data = new Data ();
	$data->setData ( $msgs );
	$data->setMd5 ( md5 ( urldecode ( json_encode ( $msgs ) ) ) );
	echo urldecode ( json_encode ( $data ) );
}
function rearr($array) {
	arrayRecursive ( $array, 'urlencode', true );
	$data = new Data ();
	$data->setData ( $array );
	$data->setMd5 ( md5 ( urldecode ( json_encode ( $array ) ) ) );
	echo urldecode ( json_encode ( $data ) );
}
?>