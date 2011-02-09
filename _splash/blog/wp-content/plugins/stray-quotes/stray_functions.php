<?php

//tell me about the variables, man
$widgetTitle = get_option("stray_quotes_widget_title");
$regularTitle =  get_option("stray_quotes_regular_title");
$beforeAll =  get_option ("stray_quotes_before_all");
$beforeAuthor = get_option ("stray_quotes_before_author");
$afterAuthor = get_option ("stray_quotes_after_author");
$beforeSource = get_option ("stray_quotes_before_source");
$afterSource = get_option ("stray_quotes_after_source");
$beforeQuote = get_option ("stray_quotes_before_quote");
$afterQuote = get_option ("stray_quotes_after_quote");
$afterAll = get_option ("stray_quotes_after_all");
$putQuotesFirst = get_option ("stray_quotes_put_quotes_first");
$useLinks = get_option ("stray_quotes_use_google_links");	
$wikiLan = get_option ("stray_quotes_wiki_lan");	


//print a random quote
function stray_random_quote() {

	global $wpdb,$widgetTitle,$regularTitle,$beforeAll,$beforeAuthor,$afterAuthor,$beforeSource,$afterSource,$beforeQuote,$afterQuote,$afterAll,$putQuotesFirst,$useLinks,$wikiLan;
		
	$result = $wpdb->get_results("select * from " . WP_STRAY_QUOTES_TABLE . " where visible='yes'");				
	
	if ( !empty($result) )	{
			
		// srand ((double) microtime() * 1000000);
		// srand (time());
		list($usec, $sec) = explode(' ', microtime());
		srand( (double)(float) $sec + ((float) $usec * 100000) );		
		$get_one = $result[rand(0, count($result)-1)];
		
		
		if ( !$widgetTitle) {			
			$output = $regularTitle;
		}
		else {
			$output = '';
		}
		
		if ( !$useLinks) {			
			$Author = $get_one->author;
			$Source = $get_one->source;
		}
		else {
			if ($useLinks == 'Y') { //if google links
			$Author = '<a href="http://www.google.com/search?q=%22' . str_replace('&', '%26',$get_one->author) . '%22">' . $get_one->author . '</a>';		
			$Source = '<a href="http://www.google.com/search?q=%22' . str_replace('&', '%26',$get_one->source) . '%22">' . $get_one->source . '</a>';
			}
			else if ($useLinks == 'W') { //if wikipedia links
			$Author = '<a href="http://'.$wikiLan.'.wikipedia.org/wiki/' . str_replace(' ', '_',$get_one->author) . '">' . $get_one->author . '</a>';		
			$Source = '<a href="http://'.$wikiLan.'.wikipedia.org/wiki/' . str_replace(' ', '_',$get_one->source) . '">' . $get_one->source . '</a>';
			}
		}
		
		if ( !$putQuotesFirst) {
			$output .= $beforeAll;
			if ( !empty($get_one->author) ) {
				$output .= $beforeAuthor . $Author . $afterAuthor;
			}
			if ( !empty($get_one->source) ) {
				$output .= $beforeSource . $Source . $afterSource;
			}		

			$output .= $beforeQuote . nl2br($get_one->quote) . $afterQuote;			
			$output .= $afterAll;		
		}
		else {		
			$output .= $beforeAll;		
			$output .= $beforeQuote . nl2br($get_one->quote) . $afterQuote;
			if ( !empty($get_one->author) ) {
				$output .= $beforeAuthor . $Author . $afterAuthor;
			}
			if ( !empty($get_one->source) ) {
				$output .= $beforeSource . $Source . $afterSource;
			}		
			$output .= $afterAll;		
		}		
		
		echo $output;		
	}
}

//print a specific quote
function stray_a_quote($id) {

	global $wpdb,$widgetTitle,$regularTitle,$beforeAll,$beforeAuthor,$afterAuthor,$beforeSource,$afterSource,$beforeQuote,$afterQuote,$afterAll,$putQuotesFirst,$useLinks,$wikiLan;
	$result = $wpdb->get_results("select * from " . WP_STRAY_QUOTES_TABLE . " where quoteID='{$id}'");				
	
	if ( !empty($result) )	{

		$get_one = $result[0];		
		
		if ( !$widgetTitle) {			
			$output = $regularTitle;
		}
		else {
			$output = '';
		}
		
		if ( !$useLinks) {			
			$Author = $get_one->author;
			$Source = $get_one->source;
		}
		else {
			if ($useLinks == 'Y') { //if google links
			$Author = '<a href="http://www.google.com/search?q=%22' . str_replace('&', '%26',$get_one->author) . '%22">' . $get_one->author . '</a>';		
			$Source = '<a href="http://www.google.com/search?q=%22' . str_replace('&', '%26',$get_one->source) . '%22">' . $get_one->source . '</a>';
			}
			else if ($useLinks == 'W') { //if wikipedia links
			$Author = '<a href="http://'.$wikiLan.'.wikipedia.org/wiki/' . str_replace(' ', '_',$get_one->author) . '">' . $get_one->author . '</a>';		
			$Source = '<a href="http://'.$wikiLan.'.wikipedia.org/wiki/' . str_replace(' ', '_',$get_one->source) . '">' . $get_one->source . '</a>';
			}
		}
		
		if ( !$putQuotesFirst) {
			$output .= $beforeAll;
			if ( !empty($get_one->author) ) {
				$output .= $beforeAuthor . $Author . $afterAuthor;
			}
			if ( !empty($get_one->source) ) {
				$output .= $beforeSource . $Source . $afterSource;
			}		

			$output .= $beforeQuote . nl2br($get_one->quote) . $afterQuote;			
			$output .= $afterAll;		
		}
		else {		
			$output .= $beforeAll;		
			$output .= $beforeQuote . nl2br($get_one->quote) . $afterQuote;
			if ( !empty($get_one->author) ) {
				$output .= $beforeAuthor . $Author . $afterAuthor;
			}
			if ( !empty($get_one->source) ) {
				$output .= $beforeSource . $Source . $afterSource;
			}		
			$output .= $afterAll;		
		}		
		
		echo $output;		
	}
}

//does the widget
function stray_quotes_widget_init() {

	if ( !function_exists('register_sidebar_widget') )
		return;

	function stray_quotes_widget($args) {
	
	global $wpdb,$widgetTitle;

		extract($args);		
		//retrieve title
		if ( $widgetTitle != '') {
			echo $widgetTitle;
		}
		//the actual function		
		if (function_exists('stray_random_quote')) stray_random_quote();				
	}
	
	
	function stray_quotes_widget_control() {

		//update options from the form
		if ( $_POST['stray_quotes_submit'] ) {
		
			$get_title = strip_tags(stripslashes($_POST['stray_quotes_widget_title']));
			update_option('stray_quotes_widget_title', $get_title );
		}
		else {
			$get_title = get_option('stray_quotes_widget_title');		
		}
		
		$title = htmlspecialchars($get_title, ENT_QUOTES);		
		?><p style="text-align:left;"><label for="stray_quotes_widget_title"><?php echo __('Title of the widget:','stray-quotes') ?>
        <input style="width: 200px;" id="stray_quotes_widget_title" name="stray_quotes_widget_title" type="text" value="<?php echo $title ?>" /></label><br/>
		<em><?php echo __('Enter here a optional title for the widget.','stray-quotes') ?></em></p>
		<input type="hidden" id="stray_quotes_submit" name="stray_quotes_submit" value="1" /><?php		

	}

	register_sidebar_widget(array('Stray Quotes', 'widgets'), 'stray_quotes_widget');
	register_widget_control(array('Stray Quotes', 'widgets'), 'stray_quotes_widget_control', 200, 100);	
}

//replaces "[quote id=XX]" inside a post with a quote whose id corresponds to XX
function stray_id_shortcut($attr) {
	
	global $wpdb,$wp_version,$widgetTitle,$regularTitle,$beforeAll,$beforeAuthor,$afterAuthor,$beforeSource,$afterSource,$beforeQuote,$afterQuote,$afterAll,$putQuotesFirst,
$useLinks,$wikiLan;

	//only for WP 2.5
	if ($wp_version >= 2.5) {
		
		$result = $wpdb->get_results("select * from " . WP_STRAY_QUOTES_TABLE . " where quoteID=". $attr['id']);				
		
		if ( !empty($result) )	{
	
			$get_one = $result[0];		
			
			if ( !$useLinks) {			
				$Author = $get_one->author;
				$Source = $get_one->source;
			}
			else {
				if ($useLinks == 'Y') { //if google links
				$Author = '<a href="http://www.google.com/search?q=%22' . str_replace('&', '%26',$get_one->author) . '%22">' . $get_one->author . '</a>';		
				$Source = '<a href="http://www.google.com/search?q=%22' . str_replace('&', '%26',$get_one->source) . '%22">' . $get_one->source . '</a>';
				}
				else if ($useLinks == 'W') { //if wikipedia links
				$Author = '<a href="http://'.$wikiLan.'.wikipedia.org/wiki/' . str_replace(' ', '_',$get_one->author) . '">' . $get_one->author . '</a>';		
				$Source = '<a href="http://'.$wikiLan.'.wikipedia.org/wiki/' . str_replace(' ', '_',$get_one->source) . '">' . $get_one->source . '</a>';
				}
			}
			
			if ( !$putQuotesFirst) {
				$output .= $beforeAll;
				if ( !empty($get_one->author) ) {
					$output .= $beforeAuthor . $Author . $afterAuthor;
				}
				if ( !empty($get_one->source) ) {
					$output .= $beforeSource . $Source . $afterSource;
				}		
	
				$output .= $beforeQuote . nl2br($get_one->quote) . $afterQuote;			
			}
			else {		
				$output .= $beforeQuote . nl2br($get_one->quote) . $afterQuote;
				if ( !empty($get_one->author) ) {
					$output .= $beforeAuthor . $Author . $afterAuthor;
				}
				if ( !empty($get_one->source) ) {
					$output .= $beforeSource . $Source . $afterSource;
				}		
			}		
			
			return $output;		
		}
		
	}	
}

//replaces "[random-quote]" inside a post with a random quote
function stray_rnd_shortcut() {
		
	global $wpdb,$wp_version,$widgetTitle,$regularTitle,$beforeAll,$beforeAuthor,$afterAuthor,$beforeSource,$afterSource,$beforeQuote,$afterQuote,$afterAll,$putQuotesFirst,
$useLinks,$wikiLan;

	//only for WP-2.5
	if ($wp_version >= 2.5) {
	
		$result = $wpdb->get_results("select * from " . WP_STRAY_QUOTES_TABLE . " where visible='yes'");				
		
		if ( !empty($result) )	{
				
			 /*srand ((double) microtime() * 1000000);
			 srand (time());*/
			list($usec, $sec) = explode(' ', microtime());
			srand( (double)(float) $sec + ((float) $usec * 100000) );		
			$get_one = $result[rand(0, count($result)-1)];
			
			if ( !$useLinks) {			
				$Author = $get_one->author;
				$Source = $get_one->source;
			}
			else {
				if ($useLinks == 'Y') { //if google links
				$Author = '<a href="http://www.google.com/search?q=%22' . str_replace('&', '%26',$get_one->author) . '%22">' . $get_one->author . '</a>';		
				$Source = '<a href="http://www.google.com/search?q=%22' . str_replace('&', '%26',$get_one->source) . '%22">' . $get_one->source . '</a>';
				}
				else if ($useLinks == 'W') { //if wikipedia links
				$Author = '<a href="http://'.$wikiLan.'.wikipedia.org/wiki/' . str_replace(' ', '_',$get_one->author) . '">' . $get_one->author . '</a>';		
				$Source = '<a href="http://'.$wikiLan.'.wikipedia.org/wiki/' . str_replace(' ', '_',$get_one->source) . '">' . $get_one->source . '</a>';
				}
			}
			
			if ( !$putQuotesFirst) {
				if ( !empty($get_one->author) ) {
					$output .= $beforeAuthor . $Author . $afterAuthor;
				}
				if ( !empty($get_one->source) ) {
					$output .= $beforeSource . $Source . $afterSource;
				}		
	
				$output .= $beforeQuote . nl2br($get_one->quote) . $afterQuote;			
			}
			else {		
				$output .= $beforeQuote . nl2br($get_one->quote) . $afterQuote;
				if ( !empty($get_one->author) ) {
					$output .= $beforeAuthor . $Author . $afterAuthor;
				}
				if ( !empty($get_one->source) ) {
					$output .= $beforeSource . $Source . $afterSource;
				}		
			}		
			
			return $output;		
		}
	}
}

//replaces "[all-quotes]" in a post with all the quotes
function stray_page_shortcut($data) {

	global $wpdb,$wp_version,$widgetTitle,$regularTitle,$beforeAll,$beforeAuthor,$afterAuthor,$beforeSource,$afterSource,$beforeQuote,$afterQuote,$afterAll,$putQuotesFirst,
$useLinks,$wikiLan;
	
	$result = $wpdb->get_results("select * from " . WP_STRAY_QUOTES_TABLE. " where visible='yes'");
	
	if ( !empty($result) ) {
	
		$contents = '';
		foreach ( $result as $row )	{		

			$contents .= $beforeQuote . nl2br($row->quote) . $afterQuote;
			if ( !empty($row->author) ) {
								
				if ( !$useLinks) $author = $row->author;
				else {
					if ($useLinks == 'Y') { //if google links
					$author = '<a href="http://www.google.com/search?q=%22' . str_replace('&', '%26',$row->author) . '%22">' . $row->author . '</a>';		
					}
					else if ($useLinks == 'W') { //if wikipedia links
					$author = '<a href="http://'.$wikiLan.'.wikipedia.org/wiki/' . str_replace(' ', '_',$row->author) . '">' . $row->author . '</a>';		
					}
				}
				
				$contents .= $beforeAuthor . $author . $afterAuthor;
			}		
			if ( !empty($row->source) ) {
								
				if ( !$useLinks) $source = $row->source;
				else {
					if ($useLinks == 'Y') { //if google links
					$source = '<a href="http://www.google.com/search?q=%22' . str_replace('&', '%26',$row->source) . '%22">' . $row->source . '</a>';
					}
					else if ($useLinks == 'W') { //if wikipedia links
					$source = '<a href="http://'.$wikiLan.'.wikipedia.org/wiki/' . str_replace(' ', '_',$row->source) . '">' . $row->source . '</a>';
					}
				}
										
				$contents .= $beforeSource . $source . $afterSource;			
				
			}		

			$contents .= '<br /><br />';			
		}
		
		//if it is not WP 2.5 do the old thing
		if ($wp_version <= 2.3) {
			$start = strpos($data, "<!--wp_quotes_page-->");
			if ( $start !== false ) $data = substr_replace($data, $contents, $start, strlen("<!--wp_quotes_page-->"));		
		}		

	if ($wp_version <= 2.3) {return $data;} else {return $contents;}
	}	
}

//compatibility with old function names
function wp_quotes_random() {return stray_random_quote();}
function wp_quotes($id) {return stray_a_quote($id);}
function wp_quotes_page($data) {return stray_page_shortcut($data);}


?>