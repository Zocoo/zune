<?php
include '../dao/userdao.php';
include '../util/json.php';
class useraction {
	function adduser($name, $age, $address, $sex, $password) { // add new user
		$u = new user ();
		$u->setAddress ( $address );
		$u->setName ( $name );
		$u->setAge ( $age );
		$u->setSex ( $sex );
		$u->setPassword ( $password );
		$ud = new userdao ();
		$result = $ud->add ( $u );
		if ($result > 0) {
			remsg ( 1, "success" );
		} else {
			remsg ( 0, "新增用户失败!" );
		}
	}
	function deleteuser($id) { // delete user by id
		$ud = new userdao ();
		$result = $ud->delete ( $id );
		if ($result > 0) {
			remsg ( 1, "success" );
		} else {
			remsg ( 0, "删除用户失败!" );
		}
	}
	function selectuser() { // select all user
		$ud = new userdao ();
		$array = $ud->select ();
		rearr ( $array );
	}
	function login($name, $password) { // select all user
		$ud = new userdao ();
		$u = new user ();
		$u->setName ( $name );
		$u->setPassword ( $password );
		$code = $ud->login ( $u );
		if ($code == 1) {
			remsg ( 1, "success" );
		} else {
			remsg ( 0, "登陆失败!" );
		}
	}
}
$func = $_SERVER ['PATH_INFO'];
$arr = explode ( "/", $func );
$func = $arr [1];
$ua = new useraction ();
if (! empty ( $_GET ["password"] )) {
	$password = $_GET ["password"];
}
if (! empty ( $_GET ["id"] )) {
	$id = $_GET ["id"];
}
if (! empty ( $_GET ["name"] )) {
	$name = $_GET ["name"];
}
if (! empty ( $_GET ["age"] )) {
	$age = $_GET ["age"];
} else {
	$age = 0;
}
if (! empty ( $_GET ["address"] )) {
	$address = $_GET ["address"];
}
if (! empty ( $_GET ["sex"] )) {
	$sex = $_GET ["sex"];
} else {
	$sex = "unkown";
}
switch ($func) {
	case 'login' :
		if (empty ( $name ) || empty ( $password )) {
			remsg ( 0, "请填入用户名和密码！" );
		} else {
			$ua->login ( $name, $password );
		}
		break;
	case 'selectuser' :
		$ua->selectuser ();
		break;
	case 'adduser' :
		if (! empty ( $name ) && ! empty ( $address )) {
			$ua->adduser ( $name, $age, $address, $sex, $password );
		} else {
			remsg ( 0, "未知错误，估计是name,address参数错误" );
		}
		break;
	case 'deleteuser' :
		if (! empty ( $id )) {
			$ua->deleteuser ( $id );
		} else {
			remsg ( 0, "未知错误，估计是id参数错误" );
		}
		break;
	case 'default' :
		remsg ( 0, "默认没有方法" );
		break;
	default :
		remsg ( 0, "未知错误，估计是func参数错误" );
		break;
}
$json_string = file_get_contents ( "php://input" );
// echo $json_string . "==========>";
$dddd = json_decode ( $json_string );
$datad = new data ();
$datad->setData ( $dddd->data );
// var_dump ( $datad->getData () );
// for($i=0;$i<count( $dddd['data']);++$i){
// echo var_dump ( $dddd['data'][$i] );
// }
// $d = json_decode ( $json_string, true );
// echo $d ['data'];
// var_dump ( $d );
?>
