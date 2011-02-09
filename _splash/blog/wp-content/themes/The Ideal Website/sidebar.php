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

<?php 

if(is_home() || is_page())

{

?>



<div id="menu">


	
	<?php
	
	$pages = get_pages();
	//print_r($pages);
	//list_pages_by_category(0, true, true, '', '<br/>', '<br/>', true, false, false); ?>
	<ul class='pagelist'>
		<li class='pagecat'><br/><br/>
		<ul class='pagemain'>
		<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>

<li><a href="<?php bloginfo('url'); ?>" <?php if (is_home()) echo " class=\"selected\""; ?> title="<?php bloginfo('name')?>: Startpage" >Home</a>&nbsp; &nbsp;</li>
<?php 

$parent = '';
/*
if(is_home()) {
	$parent = '&depth=1';
}
else {
	$parent = '&child_of=' . $post->ID;
}
*/

wp_list_pages('title_li=&sort_column=menu_order');�

?>
<?php endif; ?>
      </ul>
	</li>
</ul>
	

	



</div>



<?php 

}

?>