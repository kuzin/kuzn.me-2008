<?php

$wp_to_twitter_directory = get_bloginfo( 'wpurl' ) . '/' . PLUGINDIR . '/' . dirname( plugin_basename(__FILE__) );

	//update_option( 'twitterInitialised', '0' );
	//SETS DEFAULT OPTIONS
	if( get_option( 'twitterInitialised') != '1' ) {
		update_option( 'newpost-published-update', '1' );
		update_option( 'newpost-published-text', 'Published a new post: #title#' );
		update_option( 'newpost-published-showlink', '1' );

		update_option( 'oldpost-edited-update', '1' );
		update_option( 'oldpost-edited-text', 'Blog post just edited: #title#' );
		update_option( 'oldpost-edited-showlink', '1' );

		update_option( 'jd_twit_remote', '0' );
		
		update_option( 'cligsapi','' );
		update_option( 'jd_twit_pages','0' );
		update_option( 'jd_functions_checked','0' );
		update_option( 'wp_twitter_failure','0' );
		update_option( 'wp_cligs_failure','0' );
		// Blogroll options
		update_option ('jd-use-link-title','0' );
		update_option( 'jd-use-link-description','1' );
		update_option( 'newlink-published-text', 'New link posted: ' );
		update_option( 'jd_twit_blogroll', '1');
		
		update_option( 'jd_tweet_default', '0' );
		update_option( 'twitterInitialised', '1' );

		$message = __("Set your Twitter login information and Cli.gs API to use this plugin!");
	}

	if ( $_POST['submit-type'] == 'clear-error' ) {
		update_option( 'wp_twitter_failure','0' );
		update_option( 'wp_cligs_failure','0' );
		$message =  __("WP to Twitter Errors Cleared");
	}
if ( get_option( 'wp_twitter_failure' ) == '1' || get_option( 'wp_cligs_failure' ) == '1' ) {
	if ( get_option( 'wp_cligs_failure' ) == '1' ) {
		$wp_to_twitter_failure .= "<div class='error'><p>" . __("Cli.gs request failed! We couldn't shrink that URL, so we attached the normal URL to your Tweet.") . "</p></div>";
	}
	if ( get_option( 'wp_twitter_failure' ) == '1' ) {
		$wp_to_twitter_failure .= "<div class='error'><p>" . __("Sorry! I couldn't get in touch with the Twitter servers. Your tweet has been stored in a custom field attached to your post, so you can Tweet it manually if you wish!") . "</p></div>";
	} else if ( get_option( 'wp_twitter_failure' ) == '2') {
		$wp_to_twitter_failure .= "<div class='error'><p>" . __("Sorry! I couldn't get in touch with the Twitter servers to post your new link! You'll have to post it manually, I'm afraid.") . "</p></div>";
	}
} else {
$wp_to_twitter_failure = '';
}

	
	if ( $_POST['submit-type'] == 'options' ) {
		//UPDATE OPTIONS
		update_option( 'newpost-published-update', $_POST['newpost-published-update'] );
		update_option( 'newpost-published-text', $_POST['newpost-published-text'] );
		update_option( 'newpost-published-showlink', $_POST['newpost-published-showlink'] );
		update_option( 'jd_tweet_default', $_POST['jd_tweet_default'] );
		update_option( 'oldpost-edited-update', $_POST['oldpost-edited-update'] );
		update_option( 'oldpost-edited-text', $_POST['oldpost-edited-text'] );
		update_option( 'oldpost-edited-showlink', $_POST['oldpost-edited-showlink'] );
		update_option( 'jd_twit_pages',$_POST['jd_twit_pages'] );
		update_option( 'jd_twit_remote',$_POST['jd_twit_remote'] );
		
		if ( $_POST['jd-use-link-field'] == '2' ) {
		update_option( 'jd-use-link-description', '1' );
		update_option( 'jd-use-link-title', '0' );
		
		} else if ( $_POST['jd-use-link-field'] == '1' ) {
		update_option( 'jd-use-link-title', '1' );	
		update_option( 'jd-use-link-description', '0' );
		}
		update_option( 'newlink-published-text', $_POST['newlink-published-text'] );
		update_option( 'jd_twit_blogroll',$_POST['jd_twit_blogroll'] );
		
		$message = "WP to Twitter Options Updated";

	}else if ( $_POST['submit-type'] == 'login' ){
		//UPDATE LOGIN
		if( ( $_POST['twitterlogin'] != '' ) AND ( $_POST['twitterpw'] != '' ) ) {
			update_option(  'twitterlogin', $_POST['twitterlogin'] );
			update_option(  'twitterlogin_encrypted', base64_encode( $_POST['twitterlogin'].':'.$_POST['twitterpw'] ) );
			$message = __("Twitter login and password updated.");
		} else {
			$message = __("You need to provide your twitter login and password!");
		}
	} else if ( $_POST['submit-type'] == 'cligsapi' ) {
		if ( $_POST['cligsapi'] != '' ) {
			update_option( 'cligsapi',$_POST['cligsapi'] );
			$message = __("Cligs API Key Updated");
		} else {
			$message = __("Cli.gs API Key not added - <a href='http://cli.gs/user/api/'>get one here</a>!");
		}
	}

	// FUNCTION to see if checkboxes should be checked
	function jd_checkCheckbox( $theFieldname ){
		if( get_option( $theFieldname ) == '1'){
			echo 'checked="checked"';
		}
	}
	// Check whether the server has supported for needed functions.
	if ( get_option('jd-functions-checked') == '0') {
		$wp_twitter_error = FALSE;
		if ( !function_exists( 'fputs' ) ) {
			$wp_twitter_error = TRUE;
			$message = __("Your server does not support <code>fputs</code>, the function used to send information to Twitter.");
		} 
		if ( !function_exists( 'curl_init' ) && ( file_get_contents ( "http://www.joedolson.com/scripts/wp-to-twitter-check.txt"  ) != 1 ) ) {
			$wp_twitter_error = TRUE;
			$message .= __("Your server does not support the <code>file_get_contents</code> or <code>cURL</code> functions which this plugin uses to send information to Cli.gs. At least one of the above is required for this plugin to work.");
		}
		// If everything's OK, there's  no reason to do this again.
		if ($wp_twitter_error == FALSE) {
			update_option( 'jd-functions-checked','1' );		
		}
	}

?>
<style type="text/css">
<!-- 
#wp-to-twitter fieldset {
margin: 0;
padding:0;
border: none;
}
#wp-to-twitter form p {
background: #eaf3fa;
padding: 10px 5px;
margin: 4px 0;
border: 1px solid #eee;
}
#wp-to-twitter form .error p {
background: none;
border: none;
}
.floatright {
float: right;
}
.cligs {
background: #efecdb url(<?php echo $wp_to_twitter_directory; ?>/images/cligs.png)  right 50% no-repeat;
padding: 2px!important;
}
.twitter {
background: url(<?php echo $wp_to_twitter_directory; ?>/images/twitter.png)  right 50% no-repeat;
padding: 2px!important;
}
-->
</style>
<?php if ($wp_twitter_error == TRUE) {
echo "<div class='error'><p>";
_e("This plugin will not work in your server environment.");
echo "</p></div>";
}
if ( get_option( 'wp_twitter_failure' ) == '1' || get_option( 'wp_cligs_failure' ) == '1' ) {
echo $wp_to_twitter_failure;
}
?>
<?php if ($message) : ?>
<div id="message" class="updated fade"><p><?php echo $message; ?></p></div>
<?php endif; ?>
<div id="dropmessage" class="updated" style="display:none;"></div>

<div class="wrap" id="wp-to-twitter">
<?php if ( get_option( 'wp_twitter_failure' ) == '1' || get_option( 'wp_cligs_failure' ) == '1' ) { ?>
	<form method="post" action="">
		<div class="error">
		<div>
		<input type="hidden" name="submit-type" value="clear-error">
		</div>
		<p><input type="submit" name="submit" value="Clear 'WP to Twitter' Error" /> <strong><?php _e("Why are you seeing this field?"); ?></strong><br />
		<?php if ( get_option( 'wp_twitter_failure' ) == '1' ) {
		_e("One or more of your last posts has failed to send it's status update to Twitter. Your Tweet has been saved in the custom meta data for your post, and you can re-Tweet it at your leisure.");
		}
		if ( get_option( 'wp_cligs_failure' ) == '1' ) {
		_e("The query to the Cli.gs API failed, and your URL was not shrunk. The normal post URL was attached to your Tweet.");
		}
		?>
		If you see these errors frequently, please <a href="http://www.joedolson.com/articles/wp-to-twitter/">notify the developer</a>.
		</p>
		</div>
	</form>
<?php
}
?>

<h2><?php _e("WP to Twitter Options"); ?></h2>
<p>
<?php _e("For any update field, you can use the codes <code>#title#</code> for the title of your blog post or <code>#blog#</code> for the title of your blog! Given the character limit for Twitter, you may not want to include your blog title."); ?>
</p>
		
	<form method="post" action="">
	<div>
		<fieldset>
			<legend><?php _e("Wordpress to Twitter Publishing Options"); ?></legend>
			<p>
				<input type="checkbox" name="jd_twit_pages" id="jd_twit_pages" value="1" <?php jd_checkCheckbox('jd_twit_pages')?> />
				<label for="jd_twit_pages"><strong><?php _e("Update Twitter when new Wordpress Pages are published"); ?></strong></label>
			</p>		
			<p>
				<input type="checkbox" name="newpost-published-update" id="newpost-published-update" value="1" <?php jd_checkCheckbox('newpost-published-update')?> />
				<label for="newpost-published-update"><strong><?php _e("Update Twitter when the new post is published"); ?></strong></label>
			</p>
			<p>
				<label for="newpost-published-text"><?php _e("Text for this Twitter update"); ?></label><br />
				<input type="text" name="newpost-published-text" id="newpost-published-text" size="60" maxlength="146" value="<?php echo(get_option('newpost-published-text')) ?>" />
				&nbsp;&nbsp;
				<input type="checkbox" name="newpost-published-showlink" id="newpost-published-showlink" value="1" <?php jd_checkCheckbox('newpost-published-showlink')?> />
				<label for="newpost-published-showlink"><?php _e("Provide link to blog?"); ?></label>
			</p>

			<p>
				<input type="checkbox" name="oldpost-edited-update" id="oldpost-edited-update" value="1" <?php jd_checkCheckbox('oldpost-edited-update')?> />
				<label for="oldpost-edited-update"><strong><?php _e("Update Twitter when an old post has been edited"); ?></strong></label>
			</p>
			<p>
				<label for="oldpost-edited-text">Text for this Twitter update</label><br />
				<input type="text" name="oldpost-edited-text" id="oldpost-edited-text" size="60" maxlength="146" value="<?php echo(get_option('oldpost-edited-text')) ?>" />
				&nbsp;&nbsp;
				<input type="checkbox" name="oldpost-edited-showlink" id="oldpost-edited-showlink" value="1" <?php jd_checkCheckbox('oldpost-edited-showlink')?> />
				<label for="oldpost-edited-showlink"><?php _e("Provide link to blog?"); ?></label>			
			</p>
			
			<p>
				<input type="checkbox" name="jd_twit_blogroll" id="jd_twit_blogroll" value="1" <?php jd_checkCheckbox('jd_twit_blogroll')?> />
				<label for="oldpost-edited-update"><strong><?php _e("Update Twitter when you post a Blogroll link"); ?></strong></label>
			</p>
			<p>
				<input type="radio" name="jd-use-link-field" id="jd-use-link-title" value="1" <?php jd_checkCheckbox('jd-use-link-title')?> /> <label for="jd-use-link-title"><?php _e("Use <strong>link title</strong> for Twitter updates"); ?></label> <input type="radio" name="jd-use-link-field" id="jd-use-link-description" value="2" <?php jd_checkCheckbox('jd-use-link-description')?> />	<label for="jd-use-link-description"><?php _e("Use <strong>link description</strong> for Twitter updates"); ?></label>			
			</p>			
						
			<p>
				<label for="newlink-published-text"><?php _e("Text for this Twitter update (used if above choice isn't available.)"); ?></label><br />
				<input type="text" name="newlink-published-text" id="newlink-published-text" size="60" maxlength="146" value="<?php echo(get_option('newlink-published-text')) ?>" />
			</p>
	
			<p>
				<input type="checkbox" name="jd_tweet_default" id="jd_tweet_default" value="1" <?php jd_checkCheckbox('jd_tweet_default')?> />
				<label for="jd_tweet_default"><?php _e("Set default Tweet status to 'No.'"); ?></label><br />
				<strong><?php _e("Twitter updates can be set on a post by post basis. By default, posts WILL be posted to Twitter. Check this to change the default to NO."); ?></strong>
			</p>
			<p>
				<input type="checkbox" name="jd_twit_remote" id="jd_twit_remote" value="1" <?php jd_checkCheckbox('jd_twit_remote')?> />
				<label for="jd_twit_remote"><?php _e("Send Twitter Updates on remote publication (Post by Email or XMLRPC Client)"); ?></label>
			</p>
			
			
		<div>
		<input type="hidden" name="submit-type" value="options" />
		</div>
		<input type="submit" name="submit" value="<?php _e("Save WP->Twitter Options"); ?>" />
	</fieldset>

	</div>
	</form>

	<h2 class="twitter"><?php _e("Your Twitter account details"); ?></h2>
	
	<form method="post" action="" >
	<div>
		<p>
		<label for="twitterlogin"><?php _e("Your Twitter username:"); ?></label>
		<input type="text" name="twitterlogin" id="twitterlogin" value="<?php echo(get_option('twitterlogin')) ?>" />
		</p>
		<p>
		<label for="twitterpw"><?php _e("Your Twitter password:"); ?></label>
		<input type="password" name="twitterpw" id="twitterpw" value="" />
		</p>
		<input type="hidden" name="submit-type" value="login" />
		<p><input type="submit" name="submit" value="<?php _e("Save Twitter Login Info"); ?>" /> <?php _e("&raquo; <small>Don't have a Twitter account? <a href='http://www.twitter.com'>Get one for free here</a>"); ?></small></p>
	</div>
	</form>

<h2 class="cligs"><?php _e("Your Cli.gs account details"); ?></h2>

	<form method="post" action="">
	<div>
		<p>
		<label for="cligsapi"><?php _e("Your Cli.gs <abbr title='application programming interface'>API</abbr> Key:"); ?></label>
		<input type="text" name="cligsapi" id="cligsapi" size="40" value="<?php echo(get_option('cligsapi')) ?>" />
		</p>
		<div>
		<input type="hidden" name="submit-type" value="cligsapi" />
		</div>
		<p><input type="submit" name="submit" value="Save Cli.gs API Key" /> &raquo; <small><?php _e("Don't have a Cli.gs account or Cligs API key? <a href='http://cli.gs/user/api/'>Get one free here</a>! You'll need an API key in order to associate the Cligs you create with your Cligs account."); ?></small></p>
	</div>
	<div>
	

	</div>
	</form>
	
</div>


<div class="wrap">
	<h3><?php _e("Need help?"); ?></h3>
	<p><?php _e("Visit the <a href='http://www.joedolson.com/articles/wp-to-twitter/'>WP to Twitter plugin page</a>."); ?></p>
</div>