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

<?php // Do not delete these lines

	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))

		die ('Please do not load this page directly. Thanks!');



        if (!empty($post->post_password)) { // if there's a password

            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie

				?>

				

				<p class="nocomments">This post is password protected. Enter the password to view comments.<p>

				

				<?php

				return;

            }

        }



		/* This variable is for alternating comment background */

		$oddcomment = 'alt';

?>



<!-- You can start editing here. -->



<?php if ($comments) : ?>



<h2 id="com">Comments on <?php the_title(); ?></h2>	



<h3><?php comments_number('No Responses', 'One Response', '% Responses' );?></h3> 

	

	<?php foreach ($comments as $comment) : ?>


<h5 class="commentAuthor"> 

			<?php comment_author_link() ?></h5>


<div class="comm">

			<?php if ($comment->comment_approved == '0') : ?>

			<b>Your comment is awaiting moderation.</b>

			<?php endif; ?>
<h4><?php comment_date('d/m/y') ?><?php edit_comment_link('e','',''); ?></h4>
			<?php comment_text() ?>
			</div>



		



	<?php /* Changes every other comment to a different class */	

		if ('alt' == $oddcomment) $oddcomment = '';

		else $oddcomment = 'alt';

	?>



	<?php endforeach; /* end for each comment */ ?>





 <?php else : // this is displayed if there are no comments so far ?>



  <?php if ('open' == $post->comment_status) : ?> 

		<!-- If comments are open, but there are no comments. -->

		

	 <?php else : // comments are closed ?>

		<!-- If comments are closed. -->

				

	<?php endif; ?>

<?php endif; ?>





<?php if ('open' == $post->comment_status) : ?>



<h2 id="respond">Leave a Reply</h2>



<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>

<?php else : ?>



<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">



<?php if ( $user_ID ) : ?>



<h4>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></h4>



<?php else : ?>



<p><label for="author"><small>Name </small></label><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /> <small>(required)</small>

</p>



<p><label for="email"><small>Mail</small></label><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /> <small>(wont be published)</small>

</p>



<p><label for="url"><small>Website</small></label><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />

</p>



<?php endif; ?>



<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->



<p><textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea></p>



<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />

<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

</p>

<?php do_action('comment_form', $post->ID); ?>



</form>



<?php endif; // If registration required and not logged in ?>



<?php endif; // if you delete this the sky will fall on your head ?>

