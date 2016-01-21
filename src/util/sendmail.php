<?php
require ("smtp.php");
require ("../pojo/mail.php");
class sendmail {
	function send($mail) {
		$smtpemailto = $mail->getSmtpemailto ();
		$mailsubject = $mail->getMailsubject ();
		$mailbody = $mail->getMailbody ();
		$smtpusermail = $mail->getSmtpusermail (); // SMTP服务器的用户邮箱
		$smtpuser = $mail->getSmtpusermail (); // SMTP服务器的用户帐号
		$smtppass = $mail->getSmtppass (); // SMTP服务器的用户密码
		$mailtype = $mail->getMailtype (); // 邮件格式（HTML/TXT）,TXT为文本邮件
		$smtpserver = $mail->getSmtpserver ();
		$smtpserverport = $mail->getSmtpserverport ();
		$smtp = new smtp ( $smtpserver, $smtpserverport, true, $smtpuser, $smtppass ); // 这里面的一个true是表示使用身份验证,否则不使用身份验证.
		$smtp->debug = TRUE; // 是否显示发送的调试信息
		                     // echo "===" . $mail->getSmtpemailto ();
		$smtp->sendmail ( $smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype );
	}
}
?>