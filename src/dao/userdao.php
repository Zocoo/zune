<?php
include '../pojo/user.php';
class userdao {
	function add($u) {
		include '../config/dbconf.php';
		$conn = mysql_connect ( $mysql_server_name, $mysql_username, $mysql_password );
		mysql_select_db ( $mysql_database );
		mysql_query ( "SET NAMES 'UTF8'" );
		$query = "insert into `user` (`name`,`age`,`address`,`sex`) values ('" . $u->getName () . "'," . $u->getAge () . ",'" . $u->getAddress () . "','" . $u->getSex () . "')";
		$result = mysql_query ( $query, $conn );
		mysql_close ();
		return $result;
		mysql_free_result ( $result );
	}
	function delete($id) {
		include '../config/dbconf.php';
		$conn = mysql_connect ( $mysql_server_name, $mysql_username, $mysql_password );
		mysql_select_db ( $mysql_database );
		mysql_query ( "SET NAMES 'UTF8'" );
		$query = "delete from `user` where id=" . $id;
		$result = mysql_query ( $query, $conn );
		mysql_close ();
		return $result;
		mysql_free_result ( $result );
	}
	function select() {
		include '../config/dbconf.php';
		$conn = mysql_connect ( $mysql_server_name, $mysql_username, $mysql_password );
		mysql_select_db ( $mysql_database );
		mysql_query ( "SET NAMES 'UTF8'" );
		$query = "select * from user";
		$result = mysql_query ( $query, $conn );
		$array = array ();
		while ( $row = mysql_fetch_row ( $result ) ) {
			$array [] = $row;
		}
		mysql_free_result ( $result );
		mysql_close ();
		return $array;
	}
}

?>