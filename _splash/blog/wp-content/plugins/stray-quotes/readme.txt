=== Stray Random Quotes ===
Contributors: corpodibacco
Tags: quotes, random, widget
Requires at least: 2.0.2
Tested up to: 2.6
Stable tag: 1.6.2

Display random quotes on your blog. Easy to custom and manage. Compatible with Wordpress 2.5+.

== Description ==

Stray Random Quotes is a plugin for Wordpress that collects and displays random quotes on your blog. The plugin is widget compatible, and the appearance of the quotes can be highly customized. It comes with a easy to use management tool and a option page.

== Screenshots ==

1. Your quotes are displayed in a management page, where from they can be edited or deleted, and where new quotes can be added.

2. The option page offers many ways to customize the apperance of the quotes.

3. A random quote appears in the sidebar as one of the widgets.

== Installation ==

1. Upload the content of stray-quotes.zip to your `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Check out the options in "Settings" > "Stray Random Quotes" in the admin menu
4. Check out the management in "Manage" > "Quotes" in the admin menu
5. If you use widgets to customize the sidebar of your blog, Stray Random Quotes does come with a widget. Just check "Design" > "Widgets" in the admin menu. 
6. If you don't use the widget function, or you want random quotes to appear elsewhere other than the sidebar, use this in your theme: `<?php if (function_exists('stray_random_quote')) stray_random_quote(); ?>`. 
7. To add a given quote instead of a random one use the following: `<?php if (function_exists('stray_a_quote')) stray_a_quote(id);?>`, where `id` is the id number of the quote as it appears on the management page.
8. To insert a random quote inside a post or a page, just write in the editor `[random-quote]`.
9. To insert a given quote inside a post or a page, just write in the editor `[quote id=xx]`, where `xx` is the id number of the quote as it appears on the management page.
10. To insert a list of all the quotes in a post or a page, just write in the editor `[all-quotes]`.

== Changelog ==

* 1.6.2 Fixed a compatibility issue with WP 2.6 which caused the available themes to not be displayed (thanks to all the users of Stray Random Quotes who pointed this bug out!). Also updated the layout of the option and manage pages to make them more consistent with the general design of WP.
* 1.6 This a major update (hence the slight jump forward in numbering): First of all, it takes advantage of the new Wordpress 2.5 [shortcuts_API](http://codex.wordpress.org/Shortcode_API "shortcuts API") by adding three different shortcuts to easily insert quotes inside your posts. In addition, it gives you the option to link author and source of your quotes to Wikipedia (not only to Google anymore) in all the major languages. Talking about language, this plugin is now ready for translations so come forward if you're willing to translate it in your own language. Only english and italian are available so far. This version contains a bunch of minor fixes and code rewriting, and also a few new names for its functions (you shouldn't notice any difference, but check out the installation instructions).
* 1.53 Hopefully fixed a little mishap with the code that caused the "updated table" message to persist. Also a link that didn't work should be fixed. Thanks to c for pointing these bugs out. Also I changed the name of the plugin to make it more to the point.
* 1.52 Finally managed to use "edit" and "delete" links instead of buttons in the list of quotes. Great personal achievement since I was never able to make this simple thing work. More minor fixes. 
* 1.51 Minor fixes.
* 1.50 Stray Quotes refurbished in order to work under Wordpress 2.5. Apparently it now does.
* 1.48 Corrected a typo that caused the plugin to throw a fatal error when activated. Usual messing up, no comment. While I was there I adjusted the way the plugin updates and creates the new table. It should work more cleverly now (nothing noticeable though).
* 1.47 This is a minor update to the general layout of the option and management pages. Hoping everything is more readable and usable now. Also I corrected the function where the "add new" form would display the content of the last inserted quote. Now the form does not display anything. Let me know if you don't think this way it is better. Few minor potential bugs hopefully corrected as well. Please be aware that the plugin now comes with five files (three .php, one .css and one .htm) instead than a single .php (which was getting too big and cumbersome to edit). So after you upload the folder with the new files, remember to delete the single file leftover by the old version.
* 1.46  I am really but once again I must update this plugin. Few slipping lines and a inattentive copy and paste caused an atrocious bug in the last version. Instead of editing old quotes it added them as new ones. Should be fixed now. It won't happen again for at least... a while now -- I promise.
* 1.45  Sorry for the many updates. It's because now I have the time. Anyway this version fixes the general functionality of the plugin where it would do certain crucial things (like updating the table to a new version) only if the management page was opened. Now it does what it has to do no matter what page is opened or not opened. I can't believe it I haven't solved this before, but this is how it goes.
* 1.44 As requested, a new field has been added to management page. It is now possible to specify the source of the quote and, in the option page, the relative optional formatting elements. Few potential bugs fixed.
* 1.43 Added a new option to set the default visibility for new quotes. In the options page.
* 1.42 with this update Stray Quotes should discriminate more intelligently the elements that can be added to both the sidebar and the quotes page, so that the page isn't filled with non pertinent formatting. More details on the options page itself.
* 1.41 corrected a general malfunction in the widget title, where it didn't handle unicode characters and disappeared from the sidebar or the options unexpectedly. Now everything should work. Thanks to tiosolid who addressed the bug. This is a fix version with no new features, but updating is strongly recommended.
* 1.4 first release. Numbering follows version number of the "Random Quotes" zombierobot.com/wp-quotes plugin from which my plugin takes its first steps.