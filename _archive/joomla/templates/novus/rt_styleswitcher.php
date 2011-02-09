<?php
defined( '_JEXEC' ) or die( 'Restricted index access' );
$cookie_prefix = "nbus-";
$cookie_time = time()+31536000;
if (isset($_GET['fontstyle'])) {
    $font = JRequest::getString('fontstyle', null, 'get');
	//$font = $_GET['fontstyle'];
	$_SESSION[$cookie_prefix. 'fontstyle'] = $font;
	setcookie ($cookie_prefix. 'fontstyle', $font, $cookie_time, '/', false);
}

if (isset($_GET['mtype'])) {
    $mtype = JRequest::getString('mtype', null, 'get');
	$_SESSION[$cookie_prefix. 'mtype'] = $mtype;
	setcookie ($cookie_prefix. 'mtype', $mtype, $cookie_time, '/', false);
}

?>
