<?php
include '../dao/userdao.php';
include '../util/json.php';
include '../util/email.php';
include '../util/random.php';
class useraction {
	function adduser($email, $name, $age, $address, $sex, $password) { // add new user
		$em = new email ();
		$code = randomkeys ( 7 );
		$rs = $em->send ( $email, $code );
		if ($rs == 1) {
			$u = new user ();
			$u->setCode ( $code );
			$u->setEmail ( $email );
			$ud = new userdao ();
			$result = $ud->add ( $u );
			if ($result > 0) {
				$nu = $ud->selectbyid ( $result );
				reobj ( $nu [0] );
			} else {
				remsg ( 0, "新增用户失败!" );
			}
		} else {
			remsg ( 0, "发送邮件失败!" );
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
	function cheak($code, $password, $id) { // cheak user by code
		$ud = new userdao ();
		$un = $ud->selectbyid ( $id );
		$user = new user ();
		if (count ( $un ) == 1) {
			$user = ( object ) $un [0];
			var_dump ( $user );
			if ($user->code == $code) {
				$user->setPassword ( $password );
				remsg ( 1, "success" );
				$res = $ud->update ( $user );
				if ($res > 0) {
					remsg ( 1, "success" );
				} else {
					remsg ( 0, "1验证失败!" );
				}
			} else {
				remsg ( 0, "2验证失败!" );
			}
		} else {
			remsg ( 0, "3验证失败!" );
		}
	}
	function selectuser() { // 查询所有用户
		$ud = new userdao ();
		$array = $ud->select ();
		rearr ( $array );
	}
	function login($name, $password) { // 登陆
		$ud = new userdao ();
		$u = new user ();
		$u->setName ( $name );
		$u->setPassword ( $password );
		$code = $ud->login ( $u );
		if ($code == 1) {
			$_SESSION ['token'] = md5 ( time () );
			remsg ( 1, "success" );
		} else {
			session_destroy ();
			remsg ( 0, "账户名或密码错误!" );
		}
	}
}
$func = $_SERVER ['PATH_INFO'];
$arr = explode ( "/", $func );
$func = $arr [1];
if (0 == 0) {
	if (empty ( $func )) {
		exit ( '数据错误' );
	} else if ($func != 'login' && $func != 'adduser' && $func != 'cheak') {
		if (empty ( $_SESSION ['token'] )) {
			exit ( '你没有登陆或者token过期了' );
		} else {
			if (! empty ( $_GET ["token"] )) {
				if ($_GET ["token"] != $_SESSION ['token']) {
					exit ( '无效的token' );
				}
			} else {
				exit ( '请带上你的token' );
			}
		}
	}
}
$ua = new useraction ();
if (! empty ( $_GET ["email"] )) {
	$email = $_GET ["email"];
}
if (! empty ( $_GET ["password"] )) {
	$password = $_GET ["password"];
}
if (! empty ( $_GET ["id"] )) {
	$id = $_GET ["id"];
}
if (! empty ( $_GET ["name"] )) {
	$name = $_GET ["name"];
}
if (! empty ( $_GET ["code"] )) {
	$code = $_GET ["code"];
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
	case 'cheak' :
		if (empty ( $code ) || empty ( $password ) || empty ( $id )) {
			echo "------------->" . $id;
			remsg ( 0, "0验证失败！" );
		} else {
			$ua->cheak ( $code, $password, $id );
		}
		break;
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
		if (! empty ( $email )) {
			$ua->adduser ( $email, $name, $age, $address, $sex, $password );
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
// $json_string = file_get_contents ( "php://input" );
// echo $json_string . "==========>";
// $dddd = json_decode ( $json_string );
// $datad = new data ();
// $datad->setData ( $dddd->data );
// var_dump ( $datad->getData () );
// for($i=0;$i<count( $dddd['data']);++$i){
// echo var_dump ( $dddd['data'][$i] );
// }
// $d = json_decode ( $json_string, true );
// echo $d ['data'];
// var_dump ( $d );
?>
