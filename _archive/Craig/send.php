<?php
		
$first_name = "first_name";
$last_name = "last_name";
$company_name = "company_name";
$email = "email";
$phone = "phone";
$event_date = "event_date";
$event_location = "event_location";
$howDidHearAbtUs = "howDidHearAbtUs";
$referral = "referral";
$comments = "comments";
	

$sid = "gbid00049c058526527c"; // GigBooks Account id
$data_arr[]="sid=".$sid;
$data_arr[]="first_name=".$first_name;
$data_arr[]="last_name=".$last_name;
$data_arr[]="company=".$company_name;
$data_arr[]="email=".$email;
$data_arr[]="phone=".$phone;
$data_arr[]="event_date=".$event_date;
$data_arr[]="event_location=".$event_location;
$data_arr[]="lead_source=".$howDidHearAbtUs;
$data_arr[]="referral=".$referral;
$data_arr[]="comments=".$comments;
$data_arr[]="submit=submit";



$host = "http://www.gigbooks.com"; 
$method = "POST";
$path = "/contactus_request.php";
$data = implode("&",$data_arr);


$url=$host.$path;

$ch = curl_init($url);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);
curl_exec ($ch);
curl_close ($ch);



?> 

<style type="text/css">
body {margin-left: auto; margin-right: auto; text-align:center; color:#999; font-size:11px; }
</style>

<body>
<br><br><br>
Thank you for contacting us! We will respond shortly. 

</body>