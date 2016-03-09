<?php
class Data {
	var $data;
	var $md5;
	var $token;
	function setToken($token) {
		$this->token = $token;
	}
	function setData($data) {
		$this->data = $data;
	}
	function setMd5($md5) {
		$this->md5 = $md5;
	}
	function getToken() {
		return $this->token;
	}
	function getData() {
		return $this->data;
	}
	function getMd5() {
		return $this->md5;
	}
}
?>