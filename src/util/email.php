<?php
include 'sendmail.php';
class email {
	function send($email, $code) {
		$sendmail = new sendmail ();
		$mail = new mail ();
		$mail->setSmtpemailto ( $email );
		$mail->setMailsubject ( "邮箱验证" );
		$mail->setMailbody ( "感谢你的支持，你的验证码为：" . $code );
		$rs = $sendmail->send ( $mail );
		return $rs;
	}
}
?>