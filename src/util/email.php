<?php
include 'sendmail.php';
$sendmail = new sendmail ();
$mail = new mail ();
$mail->setSmtpemailto ( "815769472@qq.com" );
$mail->setMailsubject ( "phpemail" );
$mail->setMailbody ( "today is a good day" );
$mail->setSmtpusermail ( "p815769472@163.com" );
$mail->setSmtppass ( "psoxsk" );
$mail->setSmtpserverport ( 25 );
$mail->setSmtpserver ( "smtp.163.com" );
$sendmail->send ( $mail );
?>