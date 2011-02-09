<?php
if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
} else {$name = 'No name entered';}
if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
} else {$email = 'No email entered';}
if ((isset($_POST['comments'])) && (strlen(trim($_POST['comments'])) > 0)) {
	$comments = stripslashes(strip_tags($_POST['comments']));
} else {$comments = 'No comments entered';}
ob_start();
?>
<html>
<head>
<style type="text/css">
</style>
</head>
<body>
<table width="550" border="1" cellspacing="2" cellpadding="2">
  <tr bgcolor="#eeffee">
    <td>Name</td>
    <td><?=$name;?></td>
  </tr>
  <tr bgcolor="#eeeeff">
    <td>Email</td>
    <td><?=$email;?></td>
  </tr>
  <tr bgcolor="#eeffee">
    <td>Comments</td>
    <td><?=$comments;?></td>
  </tr>
</table>
</body>
</html>
<?
$body = ob_get_contents();

$to = 'hello@mikekuzin.com';
$email = 'hello@mikekuzin.com';
$fromaddress = "hello@mikekuzin.com";
$fromname = "[mikekuzin.com]";

require("phpmailer.php");

$mail = new PHPMailer();

$mail->From     = "hello@mikekuzin.com";
$mail->FromName = "[mikekuzin.com] Contact Form";

$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->Subject  =  "[mikekuzin.com] Contact Form";
$mail->Body     =  $body;
$mail->AltBody  =  "This is the text-only body";

if(!$mail->Send()) {
	$recipient = 'hello@mikekuzin.com';
	$subject = 'Contact form failed';
	$content = $body;	
  mail($recipient, $subject, $content, "From: hello@mikekuzin.com\r\nReply-To: $email\r\nX-Mailer: DT_formmail");
  exit;
}
?>
