<?php
include '../pojo/user.php';
class userdao {
	function login($u) {
		include '../config/dbconf.php';
		$pdo = new PDO ( 'mysql:host=' . $mysql_server_name . ';port=' . $mysql_port . ';dbname=' . $mysql_database, $mysql_username, $mysql_password, array (
				PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8" 
		) );
		$str = "select * from user where `email` ='" . $u->getEmail () . "' and `password`='" . $u->getPassword () . "'";
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
		$sql = "insert into `user` (`code`,`updatedate`,`createdate`,`email`,`name`,`age`,`address`,`sex`,`password`) values ('" . $u->getCode () . "','" . time () . "','" . time () . "','" . $u->getEmail () . "','" . $u->getName () . "','" . $u->getAge () . "','" . $u->getAddress () . "','" . $u->getSex () . "','" . $u->getPassword () . "')";
		$res = $pdo->exec ( $sql );
		$id = $pdo->lastInsertId ();
		return $id;
	}
	function delete($id) {
		include '../config/dbconf.php';
		$pdo = new PDO ( 'mysql:host=' . $mysql_server_name . ';port=' . $mysql_port . ';dbname=' . $mysql_database, $mysql_username, $mysql_password, array (
				PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8" 
		) );
		$res = $pdo->exec ( "delete from `user` where id=" . $id );
		return $res;
	}
	function selectbyid($id) {
		include '../config/dbconf.php';
		$pdo = new PDO ( 'mysql:host=' . $mysql_server_name . ';port=' . $mysql_port . ';dbname=' . $mysql_database, $mysql_username, $mysql_password, array (
				PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8" 
		) );
		$str = "select * from user where id=" . $id;
		$rs = $pdo->query ( $str );
		$array = array ();
		while ( $row = $rs->fetch ( PDO::FETCH_ASSOC ) ) {
			$array [] = $row;
		}
		return $array;
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
	function update($u) {
		include '../config/dbconf.php';
		$pdo = new PDO ( 'mysql:host=' . $mysql_server_name . ';port=' . $mysql_port . ';dbname=' . $mysql_database, $mysql_username, $mysql_password, array (
				PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8" 
		) );
		$sql = "update `user` set `name`='" . $u->getName () . "',`phone`='" . $u->getPhone () . "',`email`='" . $u->getEmail () . "',`address`='" . $u->getAddress () . "',`password`='" . $u->getPassword () . "',`sex`='" . $u->getSex () . "',`age`='" . $u->getAge () . "',`code`='" . $u->getCode () . "',`updatedate`='" . $u->getUpdatedate () . "' where id=" . $u->getId ();
		$res = $pdo->exec ( $sql );
		return $res;
	}
}

?>