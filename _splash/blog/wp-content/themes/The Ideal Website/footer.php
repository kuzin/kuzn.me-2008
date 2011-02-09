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



 </div></div>  



<div id="footer">

	<div id="comments">

		<?php 

		

		if(!is_page() && !is_home()):

			comments_template(); 

			wp_footer();

		endif;

		

		if(is_page()||is_home()||is_search()||is_paged()||!is_single()):

			

			//validate email address

			function is_valid_email($email)

			{

				return (eregi ("^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,4}$", $email));

			}



			//clean up text

			function clean($text)

			{
				return stripslashes($text);
			}



			//encode special chars (in name and subject)

			function encodeMailHeader ($string, $charset = 'UTF-8')

			{
				return sprintf ('=?%s?B?%s?=', strtoupper ($charset),base64_encode ($string));
			}



			$bx_name    = (!empty($_POST['bx_name']))    ? $_POST['bx_name']    : "";

			$bx_email   = (!empty($_POST['bx_email']))   ? $_POST['bx_email']   : "";

			$bx_subject = (!empty($_POST['bx_subject'])) ? $_POST['bx_subject'] : "";

			$bx_message = (!empty($_POST['bx_message'])) ? $_POST['bx_message'] : "";



			$bx_subject = clean($bx_subject);

			$bx_message = clean($bx_message);

			$error_msg = "";

			$send = 0;

			
			if (!empty($_POST['submit'])) {

				$send = 1;

				if (empty($bx_name) || empty($bx_email) || empty($bx_subject) || empty($bx_message)) {

					$error_msg.= "<p><strong>Please fill in all required fields.</strong></p>\n";

					$send = 0;

				}

				if (!is_valid_email($bx_email)) {

					$error_msg.= "<p><strong>Your email adress failed to validate.</strong></p>\n";

					$send = 0;

				}
				
				if (strpos(strtolower($bx_message),strtolower("<a "))  
					&& strpos(strtolower($bx_message),strtolower(" href="))
					|| strpos(strtolower($bx_message),strtolower("<img "))
					) 
				{
					$error_msg .= 
					"<strong>Please remove all HTML tags from your message</strong>";
					
					$send = 0;
				}

			}



			if (!$send) { ?>



				<h2>Let's Get in Touch</h2>

				<?php

					

					echo $error_msg;

				?>



				<form method="post" action="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" id="contactform">

					<fieldset>

						<p><label for="bx_name"><small>Name*</small></label> <input type="text" size="22" name="bx_name" id="bx_name" value="<?php echo $bx_name; ?>" tabindex="1" /></p>

						<p> <label for="bx_email"><small>Email*</small></label><input type="text"size="22" name="bx_email" id="bx_email" value="<?php echo $bx_email; ?>" tabindex="2" /></p>

						<p><label for="bx_subject"><small>Subject*</small></label><input type="text" size="22"name="bx_subject" id="bx_subject" value='<?php echo $bx_subject; ?>' tabindex="4" /> </p>

						<p> <textarea name="bx_message" id="bx_message" cols="50" rows="10" tabindex="5"><?php echo $bx_message; ?></textarea></p>
						<p><small>No HTML Tags allowed</small></p>
						<p><input type="submit" name="submit" value="Submit" class="button" tabindex="6" /></p>
						
					</fieldset>

				</form>



			<?php

			} else {



				$displayName_array	= explode(" ",$bx_name);

				$displayName = htmlentities(utf8_decode($displayName_array[0]));



				$header  = "MIME-Version: 1.0\n";

				$header .= "Content-Type: text/plain; charset=\"utf-8\"\n";

				$header .= "From:" . encodeMailHeader($bx_name) . "<" . $bx_email . ">\n";

				$email_subject	= "[" . get_settings('blogname') . "] " . encodeMailHeader($bx_subject);

				$email_text		= "From......: " . $bx_name . "\n" .

								  "Email.....: " . $bx_email . "\n" .

								  "..........................................................\n" .

								  "Subject...: " . $bx_subject . "\n" .

								  "..........................................................\n\n" .

								  $bx_message;



				if (@mail(get_settings('admin_email'), $email_subject, $email_text, $header)) {

					echo "<h2>Hey " . $displayName . ",</h2><p>thanks for your message! I'll get back to you as soon as possible.</p>";

				}

			}

		

		endif;?>

	</div>

</div>		

<div id="links">

	<div id="linklist">
		<ul>
			<?php get_links(0, '<li><small>', "</small></li>", "\n", true, 'name', false); ?> 
			<li><small><a href="http://www.informationarchitects.jp/the-ideal-website/">Template by iA Japan</a></small></li>
			<li><small><a href="http://validator.w3.org/check?uri=referer">XHTML1.0</a></small></li>
		</ul>
	</div>


</body>



</html>