<?php
/*
Plugin Name: Twitter updater
Plugin URI: http://www.ingoal.info/archives/2008/07/08/twitter-updater/
Description: Updates Twitter when you create a new blog or publish one
Version: 2.07.1
Author: Ingo "Ingoal" Hildebrandt, edited by Marco Luthe
Author URI: http://www.ingoal.info/archives/2008/07/08/twitter-updater/
Based on Version 1.0
Victoria Chan
http://blog.victoriac.net/?p=87

Edited by 
Jonathan Dingman (v2.0)
http://www.firesidemedia.net/dev/software/wordpress/twitter-updater/
Edit: added tinyurl-support

Edited by
Ingo "Ingoal" Hildebrandt (v2.01)
http://www.ingoal.info/archives/2008/07/08/twitter-updater/
Edit: replaced tinyurl-support with zz.gd-support even shorter short-url

Edited by
Ingo "Ingoal" Hildebrandt (v2.02)
http://www.ingoal.info/archives/2008/07/08/twitter-updater/
Edit: added twitter source parameter to replace "from web"

Edited by
Ingo "Ingoal" Hildebrandt (v2.03)
http://www.ingoal.info/archives/2008/07/08/twitter-updater/
Edit: - fixed the multi-tweet issue in WP2.6 (due to post revisions the same post was twittered multiple times before)
      - streamlined the options...only new posts and edited old-posts from now on out...

Edited by
Ingo "Ingoal" Hildebrandt (v2.04)
http://www.ingoal.info/archives/2008/07/08/twitter-updater/
Edit: - fixed character escaping in post-title ( ' and & ) 
      - fixed empty post-title when scheduled post appears

Edited by
Ingo "Ingoal" Hildebrandt (v2.05)
Edit: - added alternative method to get shorturl (using curl instead of fopen)

Edited by
Ingo "Ingoal" Hildebrandt (v2.06)
Edit: - added cascading short-url generation (if zz.gd is down, it'll cascade to tinyurl.com)

Edited by
Marco Luthe (October 17th. 2008) - http://www.saphod.net (v2.07)
- Changed "save_post" hook to "publish_post"
- Added "future_to_publish" hook and vc_twit2

Edited by
Ingo "Ingoal" Hildebrandt (v2.07.1)
Edit: - corrected tinyurl-api-url...

*/


function vc_doTwitterAPIPost($twit, $twitterURI) {
	$host = 'twitter.com';
	$port = 80;
	$fp = fsockopen($host, $port, $err_num, $err_msg, 10);

	//check if user login details have been entered on admin page
	$thisLoginDetails = get_option('twitterlogin_encrypted');

	if($thisLoginDetails != '')
	{
		if (!$fp) {
			echo "$err_msg ($err_num)<br>\n";
		} else {	
			echo $string;
			fputs($fp, "POST $twitterURI HTTP/1.1\r\n");
			fputs($fp, "Authorization: Basic ".$thisLoginDetails."\r\n");
			fputs($fp, "User-Agent: ".$agent."\n");
                        fputs($fp, "Host: $host\n");
			fputs($fp, "Content-type: application/x-www-form-urlencoded\n");
			fputs($fp, "Content-length: ".strlen($twit)."\n");
			fputs($fp, "Connection: close\n\n");
			fputs($fp, $twit);
			for ($i = 1; $i < 10; $i++){$reply = fgets($fp, 256);}
			fclose($fp);
		}
		return $response;
	} else {
		//user has not entered details.. Do nothing? Don't wanna mess up the post saving..
		return '';
	}
}

function vc_twit($post_ID)  {
   $twitterURI = "/statuses/update.xml?source=ingoalstwitterupdate";
   $getthisposttitle = get_post($post_ID);	// edited by Marco Luthe
   $thisposttitle = $getthisposttitle->post_title; // edited by Marco Luthe
   $thispostlink = get_permalink($post_ID);
   $sentence = "";
 
   if(wp_is_post_revision($post_ID)) {
     return $post_ID;
   }

   else if (wp_is_post_autosave($post_ID)) {
     return $post_ID;
   }

   else {
	//is new post
	if($_POST['prev_status'] == 'draft') {
		if($_POST['publish'] == 'Publish'){
			// publish new post
			if(get_option('newpost-published-update') == '1'){
				$sentence = get_option('newpost-published-text');
				if(get_option('newpost-published-showlink') == '1'){
                                        if(get_option('short-method') == '1') {
						$tinyurl = file_get_contents_curl("http://zz.gd/api-create.php?url=".$thispostlink);
						if ($tinyurl == '') {
							$tinyurl = file_get_contents_curl("http://tinyurl.com/create.php?url=".$thispostlink);
                                                }
					}
					else {
						$tinyurl = file_get_contents("http://zz.gd/api-create.php?url=".$thispostlink);
						if ($tinyurl == '') {
                                                        $tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=".$thispostlink);                                    
                                                }
					}
                                        $thisposttitle = $thisposttitle . 
' @' . $tinyurl;
				}
				$sentence = str_replace ( '#title#', $thisposttitle, $sentence);
			}
		}
	} else if ($_POST['prev_status'] == 'publish') {
		// is old post
		if(get_option('oldpost-edited-update') == '1') {
			$sentence = get_option('oldpost-edited-text');
			// new fix for scheduled posts (thanks uniqueculture)
			if (strlen(trim($thisposttitle)) == 0) {
				$post = get_post($post_ID);
				if ($post) {
					$thisposttitle = $post->post_title;
				}
			}

			if(get_option('oldpost-edited-showlink') == '1') {
				        if(get_option('short-method') == '1') {
                                                $tinyurl = file_get_contents_curl("http://zz.gd/api-create.php?url=".$thispostlink);
                                                if ($tinyurl == '') {
                                                        $tinyurl = file_get_contents_curl("http://tinyurl.com/api-create.php?url=".$thispostlink);                                    
                                                }
                                        }
                                        else {
                                                $tinyurl = file_get_contents("http://zz.gd/api-create.php?url=".$thispostlink);
                                                if ($tinyurl == '') {
                                                        $tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=".$thispostlink);                                    
                                                }
                                        }
                                $thisposttitle = $thisposttitle . ' @' . $tinyurl;
			}
			$sentence = str_replace ( '#title#', $thisposttitle, $sentence);
		}
	} else {}
      

   } //else  


	if($sentence != ""){
              $urlstatus = 'status='.$sentence;
		$status = utf8_encode($urlstatus);
		$sendToTwitter = vc_doTwitterAPIPost($status, $twitterURI);
	}
   return $post_ID;
}

// vc_twit2
// copied from vc_twit and  adjusted to have a function that works with the future_to_publish hook
// added by Marco Luthe
function vc_twit2($post_ID)  {
   $twitterURI = "/statuses/update.xml?source=ingoalstwitterupdate";
   $getthisposttitle = get_post($post_ID);	// edited by Marco Luthe
   $thisposttitle = $getthisposttitle->post_title;	//edited by Marco Luthe
   $thispostlink = get_permalink($post_ID);
   $sentence = "";
 
	if(get_option('newpost-published-update') == '1'){
		$sentence = get_option('newpost-published-text');
		if(get_option('newpost-published-showlink') == '1'){
            if(get_option('short-method') == '1') {
				$tinyurl = file_get_contents_curl("http://zz.gd/api-create.php?url=".$thispostlink);
					if ($tinyurl == '') {
						$tinyurl = file_get_contents_curl("http://tinyurl.com/create.php?url=".$thispostlink);
					}
			} else {
				$tinyurl = file_get_contents("http://zz.gd/api-create.php?url=".$thispostlink);
					if ($tinyurl == '') {
						$tinyurl = file_get_contents("http://tinyurl.com/create.php?url=".$thispostlink);
                    }
			}
            $thisposttitle = $thisposttitle . ' @' . $tinyurl;
		}
		$sentence = str_replace ( '#title#', $thisposttitle, $sentence);
	}

	if($sentence != ""){
              $urlstatus = 'status='.$sentence;
		$status = utf8_encode($urlstatus);
		$sendToTwitter = vc_doTwitterAPIPost($status, $twitterURI);
	}
   return $post_ID;
}


function file_get_contents_curl($url) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $url);
      $data = curl_exec($ch);
      curl_close($ch);
      return $data;
}




// ADMIN PANEL - under Manage menu
function vc_addTwitterAdminPages() {
    if (function_exists('add_management_page')) {
		 add_management_page('Twitter Updater', 'Twitter Updater', 8, __FILE__, 'vc_Twitter_manage_page');
    }
 }

function vc_Twitter_manage_page() {
    include(dirname(__FILE__).'/twitter_updater_manage.php');
}


//HOOKIES
// add_action ('save_post', 'vc_twit');	would be on every save, even if it is a future scheduled post?
add_action('publish_post', 'vc_twit');	// should be fired only if a post is actually published/edited, but not just saved - edited by Marco Luthe
add_action('future_to_publish', 'vc_twit2');	// should be fired only if a future post is actually published - edited by Marco Luthe
add_action('admin_menu', 'vc_addTwitterAdminPages');
?>
