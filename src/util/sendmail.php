<?php
require ("smtp.php");
require ("../pojo/mail.php");
class sendmail {
	function send($mail) {
		if (! empty ( $mail->getSmtpemailto () )) {
			
			$smtpemailto = $mail->getSmtpemailto ();
		}
		if (! empty ( $mail->getMailsubject () )) {
			$mailsubject = $mail->getMailsubject ();
		}
		if (! empty ( $mail->getMailbody () )) {
			$mailbody = $mail->getMailbody ();
		}
		if (! empty ( $mail->getSmtpusermail () )) {
			$smtpusermail = $mail->getSmtpusermail (); // SMTP服务器的用户邮箱
			$smtpuser = $mail->getSmtpusermail (); // SMTP服务器的用户帐号
		}
		if (! empty ( $mail->getSmtppass () )) {
			$smtppass = $mail->getSmtppass (); // SMTP服务器的用户密码
		}
		if (! empty ( $mail->getMailtype () )) {
			$mailtype = $mail->getMailtype (); // 邮件格式（HTML/TXT）,TXT为文本邮件
		}
		$smtpserver = "smtp.163.com"; // SMTP服务器
		$smtpserverport = 25; // SMTP服务器端口
		$smtp = new smtp ( $smtpserver, $smtpserverport, true, $smtpuser, $smtppass ); // 这里面的一个true是表示使用身份验证,否则不使用身份验证.
		$smtp->debug = TRUE; // 是否显示发送的调试信息
		                     // echo "===" . $mail->getSmtpemailto ();
		$smtp->sendmail ( $smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype );
	}
}
?>