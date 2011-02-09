<?php
/*
  	THE SOFTWARE IS PROVIDED "AS-IS". NO WARRANTIES OF
   	ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO,
   	IMPLIED WARRANTIES, OF MERCHANTABILITY OR FITNESS FOR ANY PURPOSE
   	WITH RESPECT TO THE SOFTWARE ARE MADE AS TO IT OR ANY MEDIUM IT
   	MAY BE ON. AUTHOR DOES NOT WARRANT THAT THE OPERATION OF THE
   	SOFTWARE WILL BE ERROR FREE OR MEET ANY REQUIREMENTS. THE
   	WARRANTY SET FORTH ABOVE IS IN LIEU OF ALL OTHER WARRANTIES
   	WHETHER ORAL OR WRITTEN. NO ONE BUT AUTHOR IS AUTHORISED TO MAKE
   	MODIFICATIONS OR ADDITIONS TO THIS WARRANTY. 

	BY USING THIS SOFTWARE YOU AGREE TO THE LICENCE AGREEMENT LOCATED IN LICENCE.TXT.
	IF YOU DID NOT RECEIVE A COPY PLEASE EMAIL OLIVER@INFORMATIONARCHITECTS.JP.
	
	COPYRIGHT 2007 INFORMATION ARCHITECTS K.K, JAPAN. 
	
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

 

<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

 

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; iA Notebook <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="iA <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

 

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/color.css" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<style type="text/css" media="screen">
ul li {
	text-align:	left;
	list-style-image:	url(<?php bloginfo('template_url');?>/i/arrow.gif);
	vertical-align:	baseline;
}
</style>

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />

<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

</head>

<body>

<div id="logo"> 
		<a href="<?php print bloginfo("url");?>"><img src="<?php bloginfo('template_url');?>/i/logo.gif" alt="Logo" title="Logo" /></a>
</div>



<div id="content">

<div id="main">
	<form method="get" id="searchform" action="<?php bloginfo('home');?>/">
		<h4 class="search">
			<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
			<input type="submit" id="searchsubmit" value="Search" />
		</h4>
	</form>
	
	<div class="headerText">
		<?php	
		$sep = "> ";	
		$isBreadcrumbActive = false;		
		if(function_exists('get_breadcrumb'))
		{
			$breadcrumb = get_breadcrumb();
			$isBreadcrumbActive = true;
		}
		if(is_home() || !$isBreadcrumbActive)
		{ ?>
			<?php bloginfo('name'); ?> <span id="tagline"><?php bloginfo('description'); ?></span>
		<?php
		}
		else
		{?>
			<a href="<?php echo bloginfo("url") ?>" title="<?php bloginfo("name") ?>">Home</a> 
			<?php print $sep?> 
			<?php
			if(!is_home() && !is_page() && !is_search())
			{?>
				Blog		
				<?php print $sep;	
			}
			else if(is_search())
			{?>
				Search
				<?php print $sep?>
				<?php
			}	
			breadcrumb("sep=>&home_never=true"); 
		} ?>
	</div>

