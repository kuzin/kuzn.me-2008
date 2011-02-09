<?php
// if(isset($_POST['submit'])) {

//create
$name = $_POST ['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// recipients
$to = "dano@direct-axis.net";

//subject
$subject = "Capabilities Brochures Feedback [direct-axis]";

$headers = 'From: serveradmin@direct-axis.net' . "\r\n" .
    	   'Reply-To:' . " " . $_POST['email']; 


// format
$message = "Below are the details filled by"." "."$name"."\n\n".  
	       "Name:"." "."$name"."\n\n".
	       "Email:"." "."$email"."\n\n".
	       "Message:"." "."$message"."\n\n".
	       "[ Direct-Axis Automated Message ]"."\n\n";


// wrap
$message = wordwrap($message, 70);


//redirect and send
print "<meta http-equiv=\"refresh\" content=\"0;URL=sent.php\">";
mail($to, $subject, $message, $headers);


// }   

?>
