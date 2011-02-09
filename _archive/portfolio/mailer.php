<?php

/* ---------------------------
php and flash contact form. 
by www.MacromediaHelp.com
--------------------------- 
Note: most servers require that one of the emails (sender or receiver) to be an email hosted by same server, 
so make sure your email (on last line of this file) is one hosted on same server.
--------------------------- */


// read the variables form the string, (this is not needed with some servers).
$subject = $_REQUEST["subject"];
$message = $_REQUEST["message"];
$sender = $_REQUEST["sender"];


// include sender IP in the message.
$full_message = $_SERVER['REMOTE_ADDR'] . "\n\n" . $message;
$message= $full_message;

// remove the backslashes that normally appears when entering " or '
$message = stripslashes($message); 
$subject = stripslashes($subject); 
$sender = stripslashes($sender); 

// add a prefix in the subject line so that you know the email was sent by online form
$subject = "{mk} contact form ". $subject;

// send the email, make sure you replace email@yourserver.com with your email address
if(isset($message) and isset($subject) and isset($sender)){
	mail("michaelkuzin@gmail.com", $subject, $message, "From: $sender");
}
?>