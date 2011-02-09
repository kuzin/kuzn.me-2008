<?php
class JConfig {
/* Site Settings */
var $offline = '0';
var $offline_message = 'This site is down for maintenance.<br /> Please check back again soon.';
var $sitename = 'Direct-Axis Test Space';
var $editor = 'tinymce';
var $list_limit = '20';
var $legacy = '0';
/* Debug Settings */
var $debug = '0';
var $debug_lang = '0';
/* Database Settings */
var $dbtype = 'mysql';
var $host = 'internal-db.s54869.gridserver.com';
var $user = 'db54869_kuzin';
var $password = 'S5yA5GX7';
var $db = 'db54869_joomla';
var $dbprefix = 'jos_';
/* Server Settings */
var $live_site = '';
var $secret = 'BYtwg7TvinbEmu4I';
var $gzip = '0';
var $error_reporting = '-1';
var $helpurl = 'http://help.joomla.org';
var $xmlrpc_server = '0';
var $ftp_host = '127.0.0.1';
var $ftp_port = '21';
var $ftp_user = '';
var $ftp_pass = '';
var $ftp_root = '/domains/mikekuzin.com/html/joomla';
var $ftp_enable = '1';
var $force_ssl = '0';
/* Locale Settings */
var $offset = '0';
var $offset_user = '0';
/* Mail Settings */
var $mailer = 'mail';
var $mailfrom = 'mike@direct-axis.net';
var $fromname = 'Direct-Axis Test Space';
var $sendmail = '/usr/sbin/sendmail';
var $smtpauth = '0';
var $smtpuser = '';
var $smtppass = '';
var $smtphost = 'localhost';
/* Cache Settings */
var $caching = '0';
var $cachetime = '15';
var $cache_handler = 'file';
/* Meta Settings */
var $MetaDesc = 'Joomla! - the dynamic portal engine and content management system';
var $MetaKeys = 'joomla, Joomla';
var $MetaTitle = '1';
var $MetaAuthor = '1';
/* SEO Settings */
var $sef           = '0';
var $sef_rewrite   = '0';
var $sef_suffix    = '0';
/* Feed Settings */
var $feed_limit   = 10;
var $feed_email   = 'author';
var $log_path = '/nfs/c03/h03/mnt/54869/domains/mikekuzin.com/html/joomla/logs';
var $tmp_path = '/nfs/c03/h03/mnt/54869/domains/mikekuzin.com/html/joomla/tmp';
/* Session Setting */
var $lifetime = '15';
var $session_handler = 'database';
}
?>