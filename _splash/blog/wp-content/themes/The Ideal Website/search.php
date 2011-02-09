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



<h2>Search Results</h2>



			<h4><?php next_posts_link('&laquo; Previous Entries') ?></h4>

			<h4><?php previous_posts_link('Next Entries &raquo;') ?></h4>

	<?php if (have_posts()) : ?>

		

		<?php while (have_posts()) : the_post(); ?>

			

			<div class="post">

				<p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></p>

				

		        

				

			</div>

	</small>

		<?php endwhile; ?>



		

			<h4><?php next_posts_link('&laquo; Previous Entries') ?></h4>

			<h4><?php previous_posts_link('Next Entries &raquo;') ?></h4>

	

	<?php else : ?>



		<h2 class="center">No posts found. Try a different search?</h2>

		<?php include (TEMPLATEPATH . '/searchform.php'); ?>



	<?php endif; ?>

		

	</div>





<?php get_footer(); ?>