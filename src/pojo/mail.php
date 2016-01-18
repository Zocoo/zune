<?php
class mail {
	var $smtpemailto = "815769472@qq.com"; // 发送给谁
	var $mailsubject = "if the smtpemailto is null,the email to me";
	var $mailbody = "thants for you accept";
	var $smtpusermail = "yize.wu@zpdteck.com";
	var $smtppass = "Psoxsk4855";
	var $mailtype = "HTML";
	var $smtpserver = "smtp.qq.com"; // SMTP服务器
	var $smtpserverport = 25; // SMTP服务器端口
	function setSmtpserverport($smtpserverport) {
		$this->smtpserverport = $smtpserverport;
	}
	function getSmtpserverport() {
		return $this->smtpserverport;
	}
	function setSmtpserver($smtpserver) {
		$this->smtpserver = $smtpserver;
	}
	function getSmtpserver() {
		return $this->smtpserver;
	}
	function setSmtpemailto($smtpemailto) {
		$this->smtpemailto = $smtpemailto;
	}
	function getSmtpemailto() {
		return $this->smtpemailto;
	}
	function setMailsubject($mailsubject) {
		$this->mailsubject = $mailsubject;
	}
	function getMailsubject() {
		return $this->mailsubject;
	}
	function setMailbody($mailbody) {
		$this->mailbody = $mailbody;
	}
	function getMailbody() {
		return $this->mailbody;
	}
	function setSmtpusermail($smtpusermail) {
		$this->smtpusermail = $smtpusermail;
	}
	function getSmtpusermail() {
		return $this->smtpusermail;
	}
	function setSmtppass($smtppass) {
		$this->smtppass = $smtppass;
	}
	function getSmtppass() {
		return $this->smtppass;
	}
	function setMailtype($mailtype) {
		$this->mailtype = $mailtype;
	}
	function getMailtype() {
		return $this->mailtype;
	}
}
?>