<?php
include 'sendmail.php';
$sendmail = new sendmail ();
$mail = new mail ();
$mail->setSmtpemailto ( "815769472@qq.com" );
$mail->setMailsubject ( "phpemail" );
$mail->setMailbody ( "today is a good day" );
$sendmail->send ( $mail );
?>