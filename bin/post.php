<?php

// HEADERS
$to 		= 'hello@mikekuzin.com';
$subject 	= '[KUZIN]' . " " . $_POST['name'];
$headers	= 'From:' . $_POST['name'] . "\r\n" .
			  'Reply-To: ' . $_POST['email'];

$email 		= $_POST['email'];
$name 		= $_POST['name'];
$comments 	= $_POST['comments'];
$message 	= wordwrap($message, 70);

$message 	= "

Name: $name \n
Email: $email \n
Message: \n $comments

\n\n
[ Auto Generated from mikekuzin.com on " . date("F j, Y, g:i a") . " ]";


$sent = mail($to, $subject, $message, $headers );

if($sent) {
	//FN
	}
else {
	print "We've encounted an error in sending your mail, please go back and try again";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<meta http-equiv="Content-Style-Type" content="text/css" />
		
		<title>
			KUZIN [ Form Submitted ]
		</title>
			
		<link rel="shortcut icon" href="img/favicon.ico" />
		<link rel="apple-touch-icon" href="img/iphone-icon.png" />
		
		<link rel="stylesheet" type="text/css" href="../assets/css/styles.css" media="all" />
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>

		
	</head>
	
	<body id="submit-wrapper">
		
			<div id="submit-box">
		
				<h2>Contact Form Submitted</h2>
				<hr/>
				<p>
				Thank you for your feedback, comments, or message! <br/>I will get back to you shortly, in the meantime, why not <a href="javascript:history.go(-1) ">go back</a> and take another gander at my work.
		
			</div>	
		
	</body>

</html>