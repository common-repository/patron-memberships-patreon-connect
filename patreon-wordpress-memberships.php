<?php

/*
Plugin Name: Patreon Connect: Patron Memberships
Plugin URI: https://uiux.me/patreon-connect-patron-memberships
Description: Use Patreon Connect with Paid Memberships Pro
Version: 1.0
Author: UIUX <me@uiux.me>
Author URI: https://uiux.me
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

include 'classes/patreon_connect_patron_memberships.php';
include 'classes/patreon_connect_patron_memberships_options.php';

if(!function_exists('is_plugin_active')) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

if( class_exists('Patreon_Wordpress') || is_plugin_active( 'patreon-wordpress/patreon.php' ) ) {
	new Patreon_Connect_Patron_Memberships;
	new Patreon_Connect_Patron_Memberships_Options;
} else {
	add_action( 'admin_notices', function() { echo '<div class="error"><p><a href="https://www.patreon.com/wordpressplugin" target="_blank">Patreon Connect</a> is required for <strong>Patreon Connect: Memberships</strong> to function.</p></div>'; } );
}

?>