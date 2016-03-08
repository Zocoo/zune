<?php
include '../pojo/user.php';
class userdao {
	function login($u) {
		include '../config/dbconf.php';
		$pdo = new PDO ( 'mysql:host=' . $mysql_server_name . ';port=' . $mysql_port . ';dbname=' . $mysql_database, $mysql_username, $mysql_password, array (
				PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8" 
		) );
		$str = "select * from user where `name` ='" . $u->getName () . "' and `password`='" . $u->getPassword () . "'";
		$rs = $pdo->query ( $str );
		$array = array ();
		while ( $row = $rs->fetch ( PDO::FETCH_ASSOC ) ) {
			$array [] = $row;
		}
		return count ( $array );
	}
	function add($u) {
		include '../config/dbconf.php';
		$pdo = new PDO ( 'mysql:host=' . $mysql_server_name . ';port=' . $mysql_port . ';dbname=' . $mysql_database, $mysql_username, $mysql_password, array (
				PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8" 
		) );
		$res = $pdo->exec ( "insert into `user` (`name`,`age`,`address`,`sex`,`password`) values ('" . $u->getName () . "'," . $u->getAge () . ",'" . $u->getAddress () . "','" . $u->getSex () . "','" . $u->getPassword () . "')" );
		return $res;
	}
	function delete($id) {
		include '../config/dbconf.php';
		$pdo = new PDO ( 'mysql:host=' . $mysql_server_name . ';port=' . $mysql_port . ';dbname=' . $mysql_database, $mysql_username, $mysql_password, array (
				PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8" 
		) );
		$res = $pdo->exec ( "delete from `user` where id=" . $id );
		return $res;
	}
	function select() {
		include '../config/dbconf.php';
		$pdo = new PDO ( 'mysql:host=' . $mysql_server_name . ';port=' . $mysql_port . ';dbname=' . $mysql_database, $mysql_username, $mysql_password, array (
				PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8" 
		) );
		$rs = $pdo->query ( "select * from user" );
		$array = array ();
		while ( $row = $rs->fetch ( PDO::FETCH_ASSOC ) ) {
			$array [] = $row;
			// var_dump ( $row );
		}
		return $array;
	}
}

?>