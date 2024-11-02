<?php
/*
Plugin Name: ClearSpam
Plugin URI: http://www.jumping-duck.com/wordpress/clearspam/
Description: Adds an option to clear spam messages from the WordPress database.
Version: 0.1
Author: Eric Mann
Author URI: http://www.eamann.com
*/

/*  Copyright 2008  ERIC MANN  (email : eric@eamann.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/** This is the meat of the plugin.  It's basically just a function that clears any comment
  * with publish status "spam" from the database.  This cleans things up somewhat and helps maintain
  * a far smaller database overall.
  */
function cs_admin(){
/** We only want administrators or people with the 'moderate_comments' capabaility to have access to the 
  * link.
  */
if ( $can_clear_spam = current_user_can( 'moderate_comments' ) ) :
	if ( $_GET[ 'action' ] == 'clearspam') {
		global $wpdb;
		check_admin_referer('clear-spam_comments');
		$sql = 'DELETE FROM `'. $wpdb->prefix . 'comments` WHERE `comment_approved` = "spam"';

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		$wpdb->query($sql);
		?>
		<p>Spam Cleared.</p>
		<?php
	}
	$num_comm = get_comment_count( );
	$spam_comments = sprintf( __ngettext( '%1$s spammy comment', '%1$s spammy comments', $num_comm['spam'] ), number_format_i18n($num_comm['spam']) );
	$spam_itthem = sprintf( __ngettext( 'it', 'them', $num_comm['spam'] ), number_format_i18n($num_comm['spam']) );

	if ($num_comm['spam'] > 0) {
		$cs_link = 'index.php?action=clearspam';
		$cs_link = ( function_exists('wp_nonce_url') ) ? wp_nonce_url($cs_link, 'clear-spam_comments') : $cs_link;
		echo '<p>You have ' . $spam_comments . '.  Click <a href="' . $cs_link . '">here</a> to remove ' . $spam_itthem . ' from the database.</p>';
	} else {
		echo '<p>You have no spammy comments at the moment.  Good for you!</p>';
	}
endif;
}


	add_action('activity_box_end', 'cs_admin');
?>