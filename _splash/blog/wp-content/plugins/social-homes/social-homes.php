<?php
/*
Plugin Name: Social Homes widget
Plugin URI: http://silentlycrashing.net/blog/repository/social-homes/
Description: Adds a sidebar widget containing a subtle list of all your social homes as linked favicons. Current services include BlogCatalog, Blogger, BUMPzee, Dailymotion, Delicious, Digg, Facebook, Flickr, FriendFeed, Jaiku, Last.fm, LinkedIn, LiveJournal, Ma.gnolia, MyBlogLog, MySpace, Picasa, Pownce, reddit, StumbleUpon, Technorati, Twitter, Utterz, Vimeo, VIRB&deg;, XING, YouTube, Zooomr. 
Author: Elie Zananiri
Author URI: http://www.silentlycrashing.net
Version: 2.4
Build: $Id: social-homes.php 82396 2008-12-25 00:06:04Z prisonerjohn $
*/

/*
This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


// global services list
$services[0]  = array(	
	'serv' =>'BlogCatalog',
	'link1'=>'http://www.blogcatalog.com/user/',
	'link2'=>'',
	'icon' =>'http://www.blogcatalog.com/favicon.ico'
);

$services[]  = array(	
	'serv' =>'Blogger',
	'link1'=>'http://',
	'link2'=>'.blogspot.com/',
	'icon' =>'http://blogspot.com/favicon.ico'
);

$services[]  = array(	
	'serv' =>'BUMPzee',
	'link1'=>'http://www.bumpzee.com/users/view/',
	'link2'=>'',
	'icon' =>'http://www.bumpzee.com/favicon.ico'
);

$services[]  = array(	
	'serv' =>'Dailymotion',
	'link1'=>'http://www.dailymotion.com/',
	'link2'=>'',
	'icon' =>'http://www.dailymotion.com/favicon.ico'
);
	
$services[] = array(
	'serv' =>'Delicious',
	'link1'=>'http://delicious.com/',
	'link2'=>'',
	'icon' =>'http://delicious.com/favicon.ico'
);

$services[]  = array(
	'serv' =>'Digg',
	'link1'=>'http://digg.com/users/',
	'link2'=>'',
	'icon' =>'http://digg.com/favicon.ico'
);

$services[]  = array(
	'serv' =>'Facebook',
	'link1'=>'http://www.facebook.com/profile.php?id=',
	'link2'=>'',
	'icon' =>'http://www.facebook.com/favicon.ico'
);

$services[]  = array(
	'serv' =>'Flickr',
	'link1'=>'http://www.flickr.com/people/',
	'link2'=>'',
	'icon' =>'http://www.flickr.com/favicon.ico'
);

$services[]  = array(
	'serv' =>'FriendFeed',
	'link1'=>'http://friendfeed.com/',
	'link2'=>'',
	'icon' =>'http://friendfeed.com/favicon.ico'
);

$services[]  = array(
	'serv' =>'Jaiku',
	'link1'=>'http://',
	'link2'=>'.jaiku.com/',
	'icon' =>'http://www.jaiku.com/favicon.ico'
);

$services[]  = array(	
	'serv' =>'Last.fm',
	'link1'=>'http://www.last.fm/user/',
	'link2'=>'',
	'icon' =>'http://cdn.last.fm/flatness/favicon.2.ico'
);

$services[]  = array(	
	'serv' =>'LinkedIn',
	'link1'=>'http://www.linkedin.com/in/',
	'link2'=>'',
	'icon' =>'http://www.linkedin.com/favicon.ico'
);

$services[]  = array(
	'serv' =>'LiveJournal',
	'link1'=>'http://',
	'link2'=>'.livejournal.com/',
	'icon' =>'http://www.livejournal.com/favicon.ico'
);

$services[]  = array(
	'serv' =>'Ma.gnolia',
	'link1'=>'http://ma.gnolia.com/people/',
	'link2'=>'',
	'icon' =>'http://ma.gnolia.com/favicon.ico'
);

$services[]  = array(
	'serv' =>'MyBlogLog',
	'link1'=>'http://www.mybloglog.com/buzz/members/',
	'link2'=>'',
	'icon' =>'http://www.mybloglog.com/favicon.ico'
);

$services[]  = array(
	'serv' =>'MySpace',
	'link1'=>'http://www.myspace.com/',
	'link2'=>'',
	'icon' =>'http://www.myspace.com/favicon.ico'
);

$services[]  = array(
	'serv' =>'Picasa',
	'link1'=>'http://picasaweb.google.com/',
	'link2'=>'',
	'icon' =>'http://picasa.google.com/assets/picasa.ico'
);

$services[]  = array(
	'serv' =>'Pownce',
	'link1'=>'http://pownce.com/',
	'link2'=>'',
	'icon' =>'http://pownce.com/img/favicon.ico'
);

$services[]  = array(
	'serv' =>'reddit',
	'link1'=>'http://www.reddit.com/user/',
	'link2'=>'',
	'icon' =>'http://www.reddit.com/favicon.ico'
);

$services[]  = array(
	'serv' =>'StumbleUpon',
	'link1'=>'http://',
	'link2'=>'.stumbleupon.com/',
	'icon' =>'http://www.stumbleupon.com/favicon.ico'
);

$services[]  = array(
	'serv' =>'Technorati',
	'link1'=>'http://www.technorati.com/people/technorati/',
	'link2'=>'',
	'icon' =>'http://www.technorati.com/favicon.ico'
);
	
$services[]  = array(
	'serv' =>'Twitter',
	'link1'=>'http://twitter.com/',
	'link2'=>'',
	'icon' =>'http://twitter.com/favicon.ico'
);

$services[]  = array(
	'serv' =>'Utterz',
	'link1'=>'http://www.utterz.com/~h-',
	'link2'=>'',
	'icon' =>'http://www.utterz.com/favicon.ico'
);
	
$services[]  = array(	
	'serv' =>'Vimeo',
	'link1'=>'http://www.vimeo.com/user:',
	'link2'=>'',
	'icon' =>'http://www.vimeo.com/favicon.ico'
);

$services[]  = array(
	'serv' =>'VIRB&deg;',
	'link1'=>'http://www.virb.com/',
	'link2'=>'',
	'icon' =>'http://www.virb.com/favicon.ico'
);

$services[]  = array(
	'serv' =>'XING',
	'link1'=>'https://www.xing.com/profile/',
	'link2'=>'',
	'icon' =>'https://www.xing.com/favicon.ico'
);

$services[]  = array(
	'serv' =>'YouTube',
	'link1'=>'http://www.youtube.com/profile?user=',
	'link2'=>'',
	'icon' =>'http://www.youtube.com/favicon.ico'
);

$services[]  = array(	
	'serv' =>'Zooomr',
	'link1'=>'http://www.zooomr.com/',
	'link2'=>'',
	'icon' =>'http://www.zooomr.com/favicon.ico'
);

///////////////////////////////////////////////////////////////////////////////////////////
// Social Homes init
// all Social Homes functions are encapsulated here to ensure that widget 
// funtionality exists
// called at the plugins_loaded action
///////////////////////////////////////////////////////////////////////////////////////////
function widget_socialhomes_init() {
	
	// make sure the widget functionality exists before proceeding
	if ( !function_exists('register_sidebar_widget') )
		return;

	///////////////////////////////////////////////////////////////////////////////////////
	// Social Homes output
	// prints out the registered services in order as linked favicons
	///////////////////////////////////////////////////////////////////////////////////////
	function widget_socialhomes($args) {
		global $services;
		
		// $args is an array of strings that help widgets to conform to
		// the active theme: before_widget, before_title, after_widget,
		// and after_title are the array keys. Default tags: li and h2.
		extract($args);

		// load the Social Homes data
		$options = get_option('widget_socialhomes');
		
		// generate the output
		if ($options['show-title'])
			$title = htmlspecialchars($options['title'], ENT_QUOTES);

		echo $before_widget . $before_title . $title . $after_title;
		$url_parts = parse_url(get_bloginfo('home'));
		echo '<div class="socialhomes" style="margin-top:5px;text-align:left;">';
		for ($i=0; $i < count($options); $i++) {
			if ($options[$i]['toggle']) {

				$s = $options[$i]['service'];

				$link = $services[$s]['link1'].htmlspecialchars($options[$i]['handle'], ENT_QUOTES).$services[$s]['link2'];
				$icon = $services[$s]['icon'];
				$serv = $services[$s]['serv'];

				// print the link
				echo '<a title="'.$serv.'" href="'.$link.'" rel="external"><img width="16" height="16" src="'.$icon.'" alt="'.$serv.'" /></a>&nbsp;&nbsp;';
			}
		}
		echo '</div>';
		echo $after_widget;
	}

	///////////////////////////////////////////////////////////////////////////////////////
	// Social Homes control form
	// sets up the services to register and the order to display them in
	///////////////////////////////////////////////////////////////////////////////////////
	function widget_socialhomes_control() {
		global $services;

		$servnumb = count($services);

		// get the data
		$options = get_option('widget_socialhomes');
		
		// create default data if none exists yet
		if (!is_array($options)) {
			// Set defaults
			$options = array();
			$options['show-title'] = '';
			$options['title'] = 'Social Homes';
			for ($i=0; $i < $servnumb; $i++) {
				$options[$i] = array('service'=>$i, 'toggle'=>0, 'handle'=>'username');
			}
		}
		
		// save the submitted data if there was a submit
		if ( $_POST['socialhomes-submit'] ) {
			// parse submitted data into the $options array
			if ($_POST['socialhomes-show-title']) 
				$options['show-title'] = ' checked';
			else
				$options['show-title'] = '';

			$options['title'] = strip_tags(stripslashes($_POST['socialhomes-title-text']));
			
			for ($i=0; $i < $servnumb; $i++) {
				// service type
				$options[$i]['service'] = $_POST['socialhomes-'.$i.'-service'];
				
				// toggle status
				if ($_POST['socialhomes-'.$i.'-toggle']) 
					$options[$i]['toggle'] = ' checked';
				else 
					$options[$i]['toggle'] = '';
				
				// handle
				$options[$i]['handle'] = strip_tags(stripslashes($_POST['socialhomes-'.$i.'-handle']));
			}
			
			// save all the new data in the persistent storage
			update_option('widget_socialhomes', $options);
		}
		
		// print the control form
		// general options
		echo '<p style="text-align:left;font-size:10px;">';
		echo '<input type="checkbox" id="socialhomes-show-title" name="socialhomes-show-title" '.$options['show-title'].'></input>';
		echo '&nbsp;&nbsp;';
		echo 'Show title';
		echo '</p>';
		echo '<p style="text-align:left;font-size:10px;">';
		echo 'Title';
		echo '&nbsp;&nbsp;';
		echo '<input style="width:100px;font-size:10px;margin-right:0;" id="socialhomes-title-text" name="socialhomes-title-text" type="text" value="'.htmlspecialchars($options['title'], ENT_QUOTES).'" />';
		echo '</p>';
		// services
		for ($i=0; $i < $servnumb; $i++) {
			echo '<p style="text-align:left;font-size:10px;">';
			// print a checkbox to enable or disable the service
		    echo '<input type="checkbox" id="socialhomes-'.$i.'-toggle" name="socialhomes-'.$i.'-toggle" '.$options[$i]['toggle'].'></input>';
			echo '&nbsp;&nbsp;';
			// print the list of services as a drop-down menu
			echo '<select style="font-size:10px;" id="socialhomes-'.$i.'-service" name="socialhomes-'.$i.'-service">';
			for ($j=0; $j < $servnumb; $j++) {
				echo '<option style="font-size:10px;" value="'.$j.'"';
				if ($options[$i]['service'] == $j)
					echo ' selected="yes"';
				echo'>'.$services[$j]['serv'].'</option>';
			}
			echo '</select>';
			echo '&nbsp;&nbsp;';
			// print a text field for the handle
			echo '<input style="width:100px;font-size:10px;margin-right:0;" id="socialhomes-'.$i.'-handle" name="socialhomes-'.$i.'-handle" type="text" value="'.htmlspecialchars($options[$i]['handle'], ENT_QUOTES).'" />';
			echo '</p>';
		}
		echo '<input type="hidden" id="socialhomes-submit" name="socialhomes-submit" value="1" />';
	}
	
	// registers Social Homes so it appears with the other available widgets and 
	// can be dragged and dropped into any active sidebars
	register_sidebar_widget(array('Social Homes', 'widgets'), 'widget_socialhomes');

	// registers the Social Homes control form
	register_widget_control(array('Social Homes', 'widgets'), 'widget_socialhomes_control');
}

// run the Social Homes code later in case it loads prior to any required plugins
add_action('widgets_init', 'widget_socialhomes_init');

?>
