=== ClearSpam ===
Contributors: ericmann
Donate link: http://www.jumping-duck.com/wordpress/clearspam/
Tags: spam, comments, administration, purge, database
Requires at least: 2.5
Tested up to: 2.6.2
Stable Tag: 0.1

Painlessly purge spammy comments from your WordPress database to save space.

== Description ==

If you're like me, you probably have to wade through a few hundred spammy comments on your blog.  It can be annoying, stressful, frustrating, and a waste of time.  Beyond that, spammy comments can fill up your database and make it a lot bulkier than it needs to be - particularly if you need to transfer it to a new server.

ClearSpam makes this a lot easier for you by adding a spam counter to the "Right Now" box on the dashboard along with a link that lets you instantly and easily purge spammy comments from the database.  The plugin uses WordPress nonce filters, so people won't be able to use the plugin to delete legitimate comments.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the entire `clearspam` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Check the “Right Now” section of the dashboard for information about spammy comments

== Frequently Asked Questions ==

= Can this plugin hurt my database? =

This plugin has been tested on multiple WordPress installations with various numbers of comments.  However, there is still a possibility that one or more other plugins will interfere with the way it operates.  I would strongly suggest backing up your database before using the plugin just to be safe.

= I can't see the link you're talking about! =

To prevent your subscribers from having direct access to your database, the only users that can actually see the link are those who have the authority to moderate comments.  I am working under the assumption that, if you trust someone to delete/publish/spam comments, you can trust them to delete spam comments as well.  In the future, I might add a separate capability class.

= Will this plugin work when I upgrade to WordPress 2.7 =

The plugin itself will work, but you won't have the same kind of access due to changes in the administration menu.  To correct this, expect a new version of the plugin to be released in November (2008) that will check WordPress versions and change access accordingly.