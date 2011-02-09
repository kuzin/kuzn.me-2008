=== Plugin Name ===
Contributors: joedolson
Donate link: http://www.joedolson.com/donate.php
Tags: twitter, microblogging, cligs, redirect, shortener, post, links
Requires at least: 2.5
Tested up to: 2.7.0
Stable tag: trunk

Posts a Twitter status update when you update your blog or post to your blogroll, using the Cligs URL shortening service.

== Description ==

The WP-to-Twitter plugin posts a Twitter status update from your blog using the Cli.gs URL shortening service to 
provide a link back to your post from Twitter. 

Note: Scheduled posting does not work at the moment. 

New in version 1.2.5:
 - Support for publishing via XMLRPC
 - Corrected a couple minor bugs
 - Added internationalization support

New in version 1.2.0: 
 - option to post your new blogroll links to Twitter, using the description field as your status update text.
 - option to decide on a post level whether or not that blog post should be posted to Twitter

If you have a Cli.gs API key, the shortened URL will also be filed in your Cli.gs account so that you can track
statistics for the shortened URL. 

The plugin can send a default message for updating or editing posts or pages, but also allows you to write a custom
Tweet for your post which says whatever you want. By default, the shortened URL from Cli.gs is appended to the end
of your message, so you should keep that in mind when writing your custom Tweet. 

Any status update you write which is longer than the available space will automatically be truncated by the plugin. This applies to both the default messages and to your custom messages.

This plugin is based loosely on the Twitter Updater plugin by Jonathan Dingman (http://www.firesidemedia.net/dev/), which he adapted from a plugin by Victoria Chan. Other contributions by Thor Erik (http://www.thorerik.net)

(As a side note, this plugin more or less works with WordPress 2.3. It's not fully tested, however. Make a request at http://www.joedolson.com/articles/wp-to-twitter/ if this is something you need!)

== Installation ==

1. Upload the `wp-to-twitter` folder to your `/wp-content/plugins/` directory
2. Activate the plugin using the `Plugins` menu in WordPress
3. Go to Settings > WP->Twitter
4. Adjust the WP->Twitter Options as you prefer them. 
5. Supply your Twitter username and login.
6. **Optional**: Provide your Cli.gs API key ([available free from Cli.gs](http://cli.gs)), if you want to have statistics available for your URL.
7. That's it!  You're all set.

== Frequently Asked Questions ==

= Do I have to have a Twitter.com account to use this plugin? =

Yes, you need an account to use this plugin.

= Do I have to have a Cli.gs account to use this plugin? =

No, the Cli.gs account is entirely optional. Without a Cli.gs API, a "public" Clig will be generated. The redirect will work just fine, but you won't be able to access statistics on your Clig.

= Twitter goes down a lot. What happens if it's not available? =

If Twitter isn't available, you'll get a message telling you that there's been an error with your Twitter status update. The Tweet you were going to send will be saved in your post meta fields, so you can grab it and post it manually if you wish.

= What if Cli.gs isn't available when I make my post? =

If Cli.gs isn't available, your tweet will be sent using it's normal post permalink. You'll also get an error message letting you know that there was a problem contacting Cli.gs.

= What if my server doesn't support the methods you use to contact these other sites? =

Well, there isn't much I can do about that - but the plugin will check and see whether or not the needed methods work. If they don't, you will find a warning message on your settings page. 

= If I mark a blogroll link as private, will it be posted to Twitter? =

No. Private. 

= What are the changes between version 1.1 and 1.2? =

There are several additional functions available in version 1.2. First, you can now post links you add to your blogroll to Twitter. Second, you can configure whether or not you want to Tweet posts on an individual basis. Third, you can globally set whether you'd rather have posts default to be Tweeted or NOT to be Tweeted, depending on whether you're more likely to want to Tweet most posts but not all or Tweet only the occasional post.

== Screenshots ==

1. WP to Twitter custom Tweet box
2. WP to Twitter options page