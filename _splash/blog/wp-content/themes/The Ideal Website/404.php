<?php get_header(); ?>



		<h2 class="center">Ooops!</h2>

The contents you requested are not available anymore. Please consider

 our <a href="http://www.informationarchitects.jp/">homepage</a> or search for the term you were looking for:



<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">

<div><input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />

<input type="submit" id="searchsubmit" value="Search" />

</div>

</form>





<?php get_sidebar(); ?>



<?php get_footer(); ?>