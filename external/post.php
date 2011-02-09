<?php

// HEADERS
$to 		= 'ucc@arkodia.com';
$subject 	= '[UCC]' . $_POST['name'];
$headers	= 'From:' . $_POST['name'] . "\r\n" .
			  'Reply-To: ' . $_POST['email'];

$email 		= $_POST['email'];
$name 		= $_POST['name'];
$textarea 	= $_POST['textarea'];
$message 	= wordwrap($message, 70);

$message 	= "

Name: $name \n
Email: $email \n
Message: \n $textarea

\n\n
[ Auto Generated from Uniontowncc.com on " . date("F j, Y, g:i a") . " ]";


$sent = mail($to, $subject, $message, $headers );

if($sent) {
	header("Location: http://uniontowncc.com/sent.html");
	}
else {
	print "We've encounted an error in sending your mail, please go back and try again";
	}
?>