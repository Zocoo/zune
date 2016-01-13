<?php
class msgs {
	var $code;
	var $msg;
	function setCode($code) {
		$this->code = $code;
	}
	function setMsg($msg) {
		$this->msg = $msg;
	}
	function getCode() {
		return $this->code;
	}
	function getMsg() {
		return $this->msg;
	}
}
?>