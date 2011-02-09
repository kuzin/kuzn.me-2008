<?php

//options page
function stray_quotes_options () {

	global $wpdb;	

	//decode and intercept
	foreach($_POST as $key => $val) {
		$_POST[$key] = stripslashes($val);
	}
	
	if(!empty($_POST['update'])) {

		update_option('stray_quotes_regular_title', $_POST['regular_title']);		
		update_option('stray_quotes_widget_title', $_POST['widget_title']);	
		update_option('stray_quotes_before_all', $_POST['before_all']);		
		update_option('stray_quotes_after_all', $_POST['after_all']);
		update_option('stray_quotes_before_quote', $_POST['before_quote']);	
		update_option('stray_quotes_after_quote', $_POST['after_quote']);	
		update_option('stray_quotes_before_author', $_POST['before_author']);	
		update_option('stray_quotes_after_author', $_POST['after_author']);
		update_option('stray_quotes_before_source', $_POST['before_source']);	
		update_option('stray_quotes_after_source', $_POST['after_source']);
		update_option('stray_quotes_put_quotes_first', $_POST['put_quotes_first']);
		update_option('stray_quotes_use_google_links', $_POST['use_links']);
		update_option('stray_quotes_default_visible', $_POST['default_visible']);
		update_option('stray_quotes_wiki_lan', $_POST['wiki_lan']);		
				
		?><div class="updated"><p><strong><?php echo __('Options saved.','stray-quotes') ?></strong></p></div><?php	
	}

	//get options
	$regularTitle =  get_option('stray_quotes_regular_title');
	$widgetTitle = get_option('stray_quotes_widget_title');
	$beforeAll =  get_option ('stray_quotes_before_all');
	$afterAll = get_option ('stray_quotes_after_all');
	$beforeQuote = get_option ('stray_quotes_before_quote');
	$afterQuote = get_option ('stray_quotes_after_quote');
	$beforeAuthor = get_option ('stray_quotes_before_author');
	$afterAuthor = get_option ('stray_quotes_after_author');
	$beforeSource = get_option ('stray_quotes_before_source');
	$afterSource = get_option ('stray_quotes_after_source');
	$putQuotesFirst = get_option ('stray_quotes_put_quotes_first');
	$useLinks = get_option ('stray_quotes_use_google_links');
	$defaultVisible = get_option ('stray_quotes_default_visible');
	$wikilan = get_option ('stray_quotes_wiki_lan');
		
	if ( $putQuotesFirst == 'Y' ) $putQuotesFirst_selected = 'checked';	
	if ( $defaultVisible == 'Y' ) $defaultVisible_selected = 'checked';
	
	//build the option form
	?>    
    <div id="stray_quotes_options" class="wrap">
    <h2>Stray Random Quotes - <?php echo __('Options','stray-quotes') ?></h2>

	<form name="frm_options" method="post" action="<?php echo ($_SERVER['REQUEST_URI']); ?>">
	<table class="form-table">    
    
	<tr valign="top"><th scope="row"><?php echo __('Widget Title &amp; Sidebar element Title','stray-quotes') ?></th><td>    	
        <div><input type="text" size="50" name="widget_title" value="<?php echo ($widgetTitle); ?>" class="stray_text" /><br />
    	<?php echo str_replace("%s",get_option('siteurl')."/wp-admin/widgets.php",__('Valid for the widget functionality only. Leave empty for no title. It can also be changed from the <a href="%s">widget page</a>. If you want to use a title with customized formatting elements use the field below instead.','stray-quotes')); ?></div>
        <p></p>        
        <div><input type="text" size="50" name="regular_title" value="<?php echo (htmlentities($regularTitle)); ?>" class="stray_text" /><br />
		<?php echo __('This is valid only when the widget functionality is not being used or when the widget title (field above) is left empty. Leave empty for no title.','stray-quotes') ?></div>    
	</td></tr>
    	
	<tr valign="top"><th scope="row"><?php echo __('Author, Quote and Source','stray-quotes') ?></th><td>    
        <div><input type="text" size="50" name="before_all" value="<?php echo (htmlentities($beforeAll)); ?>" class="stray_text" /><br />
		<?php echo __('Formatting elements before this group, which comes after the title.','stray-quotes') ?></div>
        <p></p>            
        <div><input type="text" size="50" name="after_all" value="<?php echo (htmlentities($afterAll)); ?>" class="stray_text" /><br />
		<?php echo __('Formatting elements after this group.','stray-quotes') ?></div>    
	</td></tr>
	
	<tr valign="top"><th scope="row"><?php echo __('Quote only','stray-quotes') ?></th><td>    
        <div><input type="text" size="50" name="before_quote" value="<?php echo (htmlentities($beforeQuote)); ?>" class="stray_text" /><br />
        <?php echo __('Formatting elements before the quote.','stray-quotes') ?></div>
        <p></p>        
        <div><input type="text" size="50" name="after_quote" value="<?php echo (htmlentities($afterQuote)); ?>" class="stray_text" /><br />
		<?php echo __('Formatting elements after the quote.','stray-quotes') ?></div>    
    </td></tr>
	
	<tr valign="top"><th scope="row"><?php echo __('Author only','stray-quotes') ?></th><td>    
        <div><input type="text" size="50" name="before_author" value="<?php echo (htmlentities($beforeAuthor)); ?>" class="stray_text" /><br />
		<?php echo __('Formatting elements before the author.','stray-quotes') ?></div>
        <p></p>              
        <div><input type="text" size="50" name="after_author" value="<?php echo (htmlentities($afterAuthor)); ?>" class="stray_text" /><br />
		<?php echo __('Formatting elements after the author.','stray-quotes') ?></div>        
	</td></tr>

	<tr valign="top"><th scope="row"><?php echo __('Source only','stray-quotes') ?></th><td>    
        <div><input type="text" size="50" name="before_source" value="<?php echo (htmlentities($beforeSource)); ?>" class="stray_text" /><br />
		<?php echo __('Formatting elements before the source.','stray-quotes') ?></div>
		<p></p>
        <div><input type="text" size="50" name="after_source" value="<?php echo (htmlentities($afterSource)); ?>" class="stray_text" /><br />
		<?php echo __('Formatting elements after the source.','stray-quotes') ?></div>        
	</td></tr>

	<tr valign="top"><th scope="row"><?php echo __('Link to','stray-quotes') ?></th><td>    
        <div><input type="radio" name="use_links" value="Y" <?php if ( $useLinks == 'Y' ) echo 'checked'; ?> />
        &nbsp;<strong>Google</strong>
        &nbsp;<input type="radio" name="use_links" value="W"<?php if ( $useLinks == 'W' ) echo 'checked'; ?> />&nbsp;<strong>Wikipedia in:</strong>
        &nbsp;<select name="wiki_lan" style="margin: 0pt 0.4em; padding: -4	pt; vertical-align:middle;">
        <?php echo (utf8_encode('
		<option value="ca" xml:lang="ca"')); if ($wikilan == "ca") echo "selected=\"selected\""; echo (utf8_encode('lang="ca">Català</option>
        <option value="de" xml:lang="de"')); if ($wikilan == "de") echo "selected=\"selected\""; echo (utf8_encode('lang="de">Deutsch</option>
        <option value="en" xml:lang="en"')); if ($wikilan == "en") echo "selected=\"selected\""; echo (utf8_encode('lang="en">English</option>
        <option value="es" xml:lang="es"')); if ($wikilan == "es") echo "selected=\"selected\""; echo (utf8_encode('lang="es">Español</option>
        <option value="fr" xml:lang="fr"')); if ($wikilan == "fr") echo "selected=\"selected\""; echo (utf8_encode('lang="fr">Français</option>
        <option value="it" xml:lang="it"')); if ($wikilan == "it") echo "selected=\"selected\""; echo (utf8_encode('lang="it">Italiano</option>
        <option value="nl" xml:lang="nl"')); if ($wikilan == "nl") echo "selected=\"selected\""; echo (utf8_encode('lang="nl">Nederlands</option>
        <option value="ja" xml:lang="ja"')); if ($wikilan == "ja") echo "selected=\"selected\""; echo (utf8_encode('lang="ja">Nihongo</option>
        <option value="no" xml:lang="nb"')); if ($wikilan == "nb") echo "selected=\"selected\""; echo (utf8_encode('lang="nb">Norsk (bokmål)</option>
        <option value="pl" xml:lang="pl"')); if ($wikilan == "pl") echo "selected=\"selected\""; echo (utf8_encode('lang="pl">Polski</option>
        <option value="pt" xml:lang="pt"')); if ($wikilan == "pt") echo "selected=\"selected\""; echo (utf8_encode('lang="pt">Português</option>
        <option value="ro" xml:lang="ro"')); if ($wikilan == "ro") echo "selected=\"selected\""; echo (utf8_encode(' lang="ro">Româna</option>
        <option value="ru" xml:lang="ru"')); if ($wikilan == "ru") echo "selected=\"selected\""; echo (utf8_encode('lang="ru">Russian</option>
        <option value="fi" xml:lang="fi"')); if ($wikilan == "fi") echo "selected=\"selected\""; echo (utf8_encode('lang="fi">Suomi</option>
        <option value="sv" xml:lang="sv"')); if ($wikilan == "sv") echo "selected=\"selected\""; echo (utf8_encode('lang="sv">Svenska</option>
        <option value="tr" xml:lang="tr"')); if ($wikilan == "tr") echo "selected=\"selected\""; echo (utf8_encode('lang="tr">Türkçe</option>
        <option value="uk" xml:lang="uk"')); if ($wikilan == "uk") echo "selected=\"selected\""; echo (utf8_encode('lang="uk">Ukraine</option>
        <option value="vo" xml:lang="vo"')); if ($wikilan == "vo") echo "selected=\"selected\""; echo (utf8_encode('lang="vo">Volapük</option>
        <option value="zh" xml:lang="zh"')); if ($wikilan == "zh") echo "selected=\"selected\""; echo (utf8_encode('lang="zh">Zhongwén</option>')); ?>
        </select>&nbsp;      
        <input type="radio" name="use_links" value="" <?php if ( $useLinks == '' ) echo 'checked'; ?> />&nbsp;<strong>
		<?php echo __('No link','stray-quotes') ?></strong></div>        
	</td></tr>
        
	<tr valign="top"><th scope="row"><?php echo __('Other options','stray-quotes') ?></th><td>    
    	<div><input type="checkbox" name="put_quotes_first" value="Y" <?php echo ($putQuotesFirst_selected); ?> />
        <?php echo __('If checked, returns the quote before the author. Otherwise, the author comes first. This won\'t be considered when spewing all the quotes onto a page (quote will always come first).','stray-quotes') ?></div>
        <p></p>        
        <div><input type="checkbox" name="default_visible" value="Y" <?php echo ($defaultVisible_selected); ?> />
        <?php echo __('If checked, will set "Visible" to "Yes" for all new quotes.','stray-quotes') ?></div>    
	</td></tr>
	</table>
	<input type="hidden" name="update" value="yes" /><br/>
	<div class="submit"><input type="submit" value="<?php echo __('Update Options','stray-quotes') ?> &raquo;" /><br/><br/></div></form>
    
    <div style="text-align:center;"><ul>
    <li style="display:inline;list-style:none"><a href="http://www.italyisfalling.com/stray-quotes">
	<?php echo __('Plugin\'s Homepage','stray-quotes') ?></a> | </li>
    <!--<li style="line-height:1em;display:inline;list-style:none;letter-spacing:0.5%;">Donate | </li>-->
    <li style="display:inline;list-style:none;"><a href="http://www.italyisfalling.com/coding">
	<?php echo __('Other plugins','stray-quotes') ?></a></li>
    </ul></div>
	
<?php }

//manage page
function stray_quotes_manage() {

	global $wpdb;
	
	$first_time = get_option('stray_quotes_first_time');
	if ($first_time == 1) {
	
		
		$sql = "INSERT INTO `" . WP_STRAY_QUOTES_TABLE . "` (quote, author, source, visible) values ('". __('And strange it is / That nature must compel us to lament / Our most persisted deeds.', 'stray-quotes') . "', 'William Shakespeare', 'Antony and Cleopatra', 'yes') ";
		$wpdb->query($sql);
		
		$search = array("%s1", "%s2");
		$replace = array(WP_STRAY_QUOTES_TABLE, get_option('siteurl') . "/wp-admin/options-general.php?page=stray_quotes.php");
		
		?><div class="updated"><p><?php echo str_replace($search,$replace,__(
		'Hey. Welcome to <strong>Stray Random Quotes.</strong><br />This seems to be your first time visiting this page.
		I\'ve just created the database table "%s1" to store your quotes, 
		and added one to start you off.<br />Check out the 
        <a href="%s2"> Options Page</a> too. Happy quoting!', 'stray-quotes')); ?>
        </div><?php
		
		update_option('stray_quotes_first_time', 3);
	}
	
	else if ($first_time == 2) {
	
		$search = array("%s1", "%s2", "%s3");
		$replace = array(WP_QUOTES_TABLE, WP_STRAY_QUOTES_TABLE, 
		get_option('siteurl') . "/wp-admin/options-general.php?page=stray_quotes.php");
	
		?><div class="updated"><p><?php echo str_replace($search,$replace,__(
		'Hey. Welcome to <strong>Stray Random Quotes.</strong><br />I just renamed the old tables of quotes "%s1" as "%s2".<br />
		All your quotes are still there. As you can see the new table comes with all your old quotes and a new optional field,
		"source". <br />Check out the <a href="%s3"> Options Page</a> too. Happy quoting!','stray-quotes')); ?></div><?php
		
		update_option('stray_quotes_first_time', 3);
        	
	}

	//decode and intercept
	foreach($_POST as $key => $val) {
		$_POST[$key] = stripslashes($val);
	}	

	// Messages for the user
	$debugText = '';
	$messages = '';
	
	// Global variable cleanup. 
	$edit = $create = $save = $delete = false;
			
	// How to control the app
	$action = !empty($_REQUEST['action']) ? $_REQUEST['action'] : '';
	$quoteID = !empty($_REQUEST['quoteID']) ? $_REQUEST['quoteID'] : '';
		
	//handle actions	
	if ( $action == 'add' ) {
	
		$quote = !empty($_REQUEST['quote_quote']) ? $_REQUEST['quote_quote'] : '';
		$author = !empty($_REQUEST['quote_author']) ? $_REQUEST['quote_author'] : '';
		$source = !empty($_REQUEST['quote_source']) ? $_REQUEST['quote_source'] : '';
		$visible = !empty($_REQUEST['quote_visible']) ? $_REQUEST['quote_visible'] : '';
	
		if ( ini_get('magic_quotes_gpc') )	{
		
			$quote = stripslashes($quote);
			$author = stripslashes($author);
			$source = stripslashes($source);
			$visible = stripslashes($visible);	
		}	
		
		$sql = "insert into " . WP_STRAY_QUOTES_TABLE . " set quote='" . mysql_real_escape_string($quote) 
			 . "', author='" . mysql_real_escape_string($author) . "', source='" . mysql_real_escape_string($source) 
			 . "', visible='" . mysql_real_escape_string($visible) . "'";	     
		$wpdb->get_results($sql);
		
		$sql = "select quoteID from " . WP_STRAY_QUOTES_TABLE . " where quote='" . mysql_real_escape_string($quote) . "'"
			 . " and author='" . mysql_real_escape_string($author) . "' and source='" . mysql_real_escape_string($source)
			 . "' and visible='" . mysql_real_escape_string($visible) . "' limit 1";
		$result = $wpdb->get_results($sql);
		
		if ( empty($result) || empty($result[0]->quoteID) )	{
			?><div class="error"><p><?php echo __(
			'<strong>Failure:</strong> Something went wrong when trying to insert the quote. Try again?',
			'stray-quotes'); ?></p></div><?php				
		}
			
		else {
			?><div class="updated"><p><?php echo str_replace("%s",$result[0]->quoteID,__(
			'Quote id %s successfully added to the database.','stray-quotes')); ?></p></div><?php			
		}
	}
	
	else if ( $action == 'edit_save' ) {
	
		$quote = !empty($_REQUEST['quote_quote']) ? $_REQUEST['quote_quote'] : '';	
		$author = !empty($_REQUEST['quote_author']) ? $_REQUEST['quote_author'] : '';
		$source = !empty($_REQUEST['quote_source']) ? $_REQUEST['quote_source'] : '';
		$visible = !empty($_REQUEST['quote_visible']) ? $_REQUEST['quote_visible'] : '';
		
		if ( ini_get('magic_quotes_gpc') )	{
		
			$quote = stripslashes($quote);
			$author = stripslashes($author);
			$source = stripslashes($source);
			$visible = stripslashes($visible);	
		}
		
		if ( empty($quoteID) )	{
			?><div class="error"><p><?php echo __(
			'<strong>Failure:</strong> No quote ID given.','stray-quotes') ?></p></div><?php
		}
		
		else {		
			$sql = "update " . WP_STRAY_QUOTES_TABLE . " set quote='" . mysql_real_escape_string($quote)
				 . "', author='" . mysql_real_escape_string($author) . "', source='" . mysql_real_escape_string($source) 
				 . "', visible='" . mysql_real_escape_string($visible) . "'"
				 . " where quoteID='" . mysql_real_escape_string($quoteID) . "'";		     
			$wpdb->get_results($sql);
			
			$sql = "select quoteID from " . WP_STRAY_QUOTES_TABLE . " where quote='" . mysql_real_escape_string($quote) . "'"
				 . " and author='" . mysql_real_escape_string($author) . "' and source='" . mysql_real_escape_string($source) 
				 . "' and visible='" . mysql_real_escape_string($visible) . "' limit 1";
			$result = $wpdb->get_results($sql);
			
			if ( empty($result) || empty($result[0]->quoteID) )	{			
				?><div class="error"><p><?php echo __(
				'<strong>Failure:</strong> Something went wrong. Try again?','stray-quotes') ?></p></div><?php				
			}
			else {			
				?><div class="updated"><p><?php echo str_replace("%s",$quoteID,__(
				'Quote %s updated successfully.','stray-quotes'));?></p></div><?php
			}		
		}
	}
	
	else if ( $action == 'delete' ) {
	
		if ( empty($quoteID) ) {
			
			
			?><div class="error"><p><?php echo __(
			'<strong>Failure:</strong> No quote ID given. Nothing deleted.','stray-quotes') ?></p></div><?php		
		}
			
		else {
		
			$sql = "delete from " . WP_STRAY_QUOTES_TABLE . " where quoteID='" . mysql_real_escape_string($quoteID) . "'";
			$wpdb->get_results($sql);
			
			$sql = "select quoteID from " . WP_STRAY_QUOTES_TABLE . " where quoteID='" . mysql_real_escape_string($quoteID) . "'";
			$result = $wpdb->get_results($sql);
			
			if ( empty($result) || empty($result[0]->quoteID) )	{			
				?><div class="updated"><p><?php echo str_replace("%s",$quoteID,__(
				'Quote %s deleted successfully','stray-quotes')); ?></p></div><?php
			}			
			else {						
				?><div class="error"><p><?php echo __(
				'<strong>Failure:</strong> Nothing deleted.','stray-quotes'); ?></p></div><?php	
			}		
		}
	}
	
	//edit form
	?><div class="wrap"><?php
		
	//if the page is opened after a edit action, shows only the form
	if ( $action == 'edit' ) {
	
		//edit form
		?><h2><br/>Edit Quote</h2><?php		
		
		//check if something went wrong with quote id
		if ( empty($quoteID) ) {
			?><div class="error"><p><?php echo __(
			'Something is wrong. No quote ID from the query string.','stray-quotes') ?></p></div><?php
		}
		
		else {			
			
			//query
			$data = $wpdb->get_results("select * from " . WP_STRAY_QUOTES_TABLE . " where quoteID='" 
			. mysql_real_escape_string($quoteID) . "' limit 1");
			if ( empty($data) ) {
				?><div class="error"><p><?php echo __(
				'Something is wrong. I can\'t find a quote linked up with that ID.','stray-quotes') ?></p></div><?php
				return;
			}
			$data = $data[0];
			
			//encode strings
			if ( !empty($data) ) $quote = htmlspecialchars($data->quote); 
			if ( !empty($data) ) $author = htmlspecialchars($data->author);
			if ( !empty($data) ) $source = htmlspecialchars($data->source);
			
			//set visibility
			$defaultVisible = get_option ('stray_quotes_default_visible');
			if ( empty($data)){				
				if  ($defaultVisible == 'Y') {			
					$visible_yes = "checked";
					$visible_no = "";
				}
				else {
					$visible_yes = "";
					$visible_no = "checked";				
				}				
			}
			else {			
				if ( $data->visible=='yes' ) {
					$visible_yes = "checked";
					$visible_no = "";
				}
				else {
					$visible_yes = "";
					$visible_no = "checked";				
				}		
			}			
			
			//make the edit form
			?>
            <div class="stray_form">
            <form name="quoteform" id="quoteform" method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?> ">
				<input type="hidden" name="action" value="edit_save">
				<input type="hidden" name="quoteID" value="<?php echo $quoteID; ?>">
			
				<fieldset class="small"><legend><?php echo __('Quote:','stray-quotes') ?> </legend>
					<textarea name="quote_quote" class="stray_textarea" cols=78 rows=7><?php echo $quote; ?></textarea>
				</fieldset>
				
				<fieldset class="small"><legend><?php echo __('Author:','stray-quotes') ?> </legend>
					<input type="text" name="quote_author" class="stray_textedit" size=80
					value="<?php echo $author ?>" />
				</fieldset>

				<fieldset class="small"><legend><?php echo __('Source:','stray-quotes') ?> </legend>
					<input type="text" name="quote_source" class="stray_textedit" size=80
					value="<?php echo $source ?>" />
				</fieldset>
				
				<fieldset class="small"><legend><?php echo __('Visible:','stray-quotes') ?> 
					<input type="radio" name="quote_visible" class="input" value="yes"<?php echo $visible_yes ?> /> <?php echo __('Yes','stray-quotes') ?>					
					<input type="radio" name="quote_visible" class="input" value="no"<?php echo $visible_no ?> /> <?php echo __('No','stray-quotes') ?></legend>
				</fieldset>
				<p align="right"><a href="<?php echo (get_option('siteurl'))?>/wp-admin/edit.php?page=stray_quotes.php">
                &laquo; <?php echo __('go back to the list of quotes','stray-quotes') ?></a>&nbsp;
                <input type="submit" name="save" class="button bold" value="<?php echo __('Save quote','stray-quotes') ?> &raquo;" />
                </p>				
			</form></div></div><?php 
	
		}	
	}	
	
	//in all the other cases shows the form and the list
	//it is debatable whether this form should show empty fields or values from the last insert
	else {
	
		?><h2><br/>Stray Random Quotes -  <?php echo __('Add new','stray-quotes') ?></h2><?php 	
		    
			$quoteID=false;
			$data = false;	
			if ( $quoteID !== false ) {
		
				if ( intval($quoteID) != $quoteID ) {		
					?><div class="error"><p><?php echo __('The Quote ID seems to be invalid.','stray-quotes') ?></p></div><?php
					return;
				}
				else {
					$data = $wpdb->get_results("select * from " . WP_STRAY_QUOTES_TABLE . " where quoteID='" . mysql_real_escape_string($quoteID) . "' limit 1");
					if ( empty($data) ) {
						?><div class="error"><p><?php echo __(
						'Something is wrong. I can\'t find a quote linked up with that ID.','stray-quotes') ?></p></div><?php
						return;
					}
					$data = $data[0];
				}	
			}		
			if ( !empty($data) ) $quote = htmlspecialchars($data->quote); 
			if ( !empty($data) ) $author = htmlspecialchars($data->author);
			if ( !empty($data) ) $source = htmlspecialchars($data->source);
			
			$defaultVisible = get_option ('stray_quotes_default_visible');
			if ( empty($data)){				
				if  ($defaultVisible == 'Y') {			
					$visible_yes = "checked";
					$visible_no = "";
				}
				else {
					$visible_yes = "";
					$visible_no = "checked";				
				}				
			}
			else {			
				if ( $data->visible=='yes' ) {
					$visible_yes = "checked";
					$visible_no = "";
				}
				else {
					$visible_yes = "";
					$visible_no = "checked";				
				}		
			}			
			
			//make the edit form
			?><div class="stray_form">
            <form name="quoteform" id="quoteform" method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
				<input type="hidden" name="action" value="add">
				<input type="hidden" name="quoteID" value="">
			
				<fieldset class="small"><legend><?php echo __('Quote:','stray-quotes') ?> </legend>
					<textarea name="quote_quote" class="stray_textarea" cols=78 rows=7></textarea>
				</fieldset>
				
				<fieldset class="small"><legend><?php echo __('Author:','stray-quotes') ?> </legend>
					<input type="text" name="quote_author" class="stray_textedit" size=80
					value="" />
				</fieldset>

				<fieldset class="small"><legend><?php echo __('Source:','stray-quotes') ?> </legend>
					<input type="text" name="quote_source" class="stray_textedit" size=80
					value="" />
				</fieldset>
				
				<fieldset class="small"><legend><?php echo __('Visible:','stray-quotes') ?> 
					<input type="radio" name="quote_visible" class="input" value="yes"<?php echo $visible_yes ?> /> 
					<?php echo __('Yes','stray-quotes') ?>					
					<input type="radio" name="quote_visible" class="input" value="no"<?php echo $visible_no ?> /> 
					<?php echo __('No','stray-quotes') ?></legend>
				</fieldset>
				<p align="right"><input type="submit" name="save" class="button bold" 
                value="<?php echo __('Save quote','stray-quotes') ?> &raquo;" /></p>				
			</form></div></div><?php
			
			
			
			//list of existing quotes			
			
			$orderBY = 'quoteID';			
			?><div class="wrap"><br/><h2>Stray Random Quotes - <?php echo __('Manage','stray-quotes') ?></h2><?php
			$quotes = $wpdb->get_results("SELECT * FROM " . WP_STRAY_QUOTES_TABLE . " order by ". $orderBY);
			if ( !empty($quotes) ) {
				?><script language="JavaScript"><!--
					function mTsetAction(obj, action) {
					obj.action.value = action;
					obj.submit();
					}
					//--></script>
					
                    <table class="widefat">
                    <thead>
                    <tr>                 
                    
                    <th scope="col"> ID </th>
                    <th scope="col"> <?php echo __('Quote','stray-quotes') ?> </th>
                    <th scope="col"> <?php echo __('Author','stray-quotes') ?> </th>
                    <th scope="col"> <?php echo __('Source','stray-quotes') ?> </th>
                    <th scope="col"> <?php echo __('Visible','stray-quotes') ?> </th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                    
                    </tr>
                    </thead>
                    <tbody><?php
				
				$i = 0;	
				foreach ( $quotes as $quote ) {
				
					$alt = ($i % 2 == 0) ? ' class="alternate"' : '';
			
					?> <tr <?php echo($alt); ?>>
						
						<th scope="row"><?php echo ($quote->quoteID); ?></th>
						<td><?php echo(nl2br($quote->quote)); ?></td>
						<td><?php echo($quote->author); ?></td>
						<td><?php echo($quote->source); ?></td>
						<td align="center"><?php echo($quote->visible); ?></td>
											
						<td align="center">
                        <a href="
						<?php echo (get_option('siteurl'))?>/wp-admin/edit.php?page=stray_quotes.php&action=edit&quoteID=<?php echo($quote->quoteID); ?>">
                        <?php echo __('Edit','stray-quotes') ?></a></td>
		
						<td align="center">
                        <a href="
						<?php echo (get_option('siteurl'))?>/wp-admin/edit.php?page=stray_quotes.php&action=delete&quoteID=<?php echo($quote->quoteID); ?>"
                        onclick="if ( confirm('<?php echo __(
						'You are about to delete this quote\\n\\\'Cancel\\\' to stop, \\\'OK\\\' to delete.\'',
						'stray-quotes'); ?>) ) { return true;}return false;"><?php echo __('Delete','stray-quotes') ?></a></td>			
					</tr>
					<?php $i++; 
				} ?>
				</tbody></table>			
			<?php } else { ?><p> <?php echo __('You haven\'t entered any quotes yet.','stray-quotes') ?> </p><?php	}
	} ?>
    
	<!--<div style="text-align:center;"><ul>
    <li style="display:inline;list-style:none"><a href="http://www.italyisfalling.com/stray-quotes">
	<?php echo __('Plugin\'s Homepage','stray-quotes') ?></a> | </li>
    <li style="line-height:1em;display:inline;list-style:none;letter-spacing:0.5%;">Donate | </li>
    <li style="display:inline;list-style:none;"><a href="http://www.italyisfalling.com/coding">
	<?php echo __('Other plugins','stray-quotes') ?></a></li>
    </ul>
    </div>--></div>
    
    <?php
}

?>