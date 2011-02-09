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

<?php get_header(); ?>

				

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		



		

		<div class="post" id="post-<?php the_ID(); ?>">



			<h4 id="navigation">

			<?php previous_post_link('%link', '&laquo; Previous') ?> 

			<?php

				$next = get_next_post();

				$previous = get_previous_post();

				if($next!=null && $previous!=null)

				echo "|";

			?>
		
			<?php next_post_link('%link', 'Next &raquo;') ?>
			</h4>
				
				

<h1><?php the_title(); ?></h1>

	
<h4>

						<?php /* This is commented, because it requires a little adjusting sometimes.

							You'll need to download this plugin, and follow the instructions:

							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */

							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?> 

						Published on <?php the_time('d/m/y') ?> <br/>by <?php the_author() ?></h4>
	

				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

	

				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>



   
<h1>That's it. What Next?</h1>


					







<!--subscribe2-->

<p>






						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {

							// Both Comments and Pings are open ?>

							Please <a href="#respond">leave your comment</a> so we know what you think about this article. Trackback URL: <a href="<?php trackback_url(true); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>.

						

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {

							// Only Pings are Open ?>

							Responses are currently closed, but you can <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> from your own site.

						

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {

							// Comments are open, Pings are not ?>

							You can skip to the end and leave a response. Pinging is currently not allowed.

			

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {

							// Neither Comments, nor Pings are open ?>

							Both comments and pings are currently closed.			

<?php } edit_post_link('<br/>Edit this entry.','',''); ?>
</p>


		<ul>
			<li>
				<?php get_archives( 'postbypost', '5', 'custom', '</li><li>'); ?>
			</li>
		</ul>

<?php endwhile; endif;?>	
</div>
	

<?php get_footer(); ?>