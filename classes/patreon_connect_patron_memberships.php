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

class Patreon_Connect_Patron_Memberships {

	private $membership_override;

	function __construct() {

		$this->membership_override = get_option('patreon-patron-membership-override', false);

		add_filter('pmpro_get_membership_levels_for_user', array($this, 'getPatronMemebershipLevel'), 10, 2);
		add_action( 'admin_notices', array($this, 'membershipsRequiredPlugins') );
	}

	function getPatronMemebershipLevel($membership_levels, $user_id) {

		if($this->membership_override == false) {
			return $membership_levels;
		}

		$levels = $this->getPatronsMembershipLevels();

		if($levels != false && !is_admin() && !empty($levels)) {
			return $levels;
		}
		
		return $membership_levels;

	}

	function getPatronsMembershipLevels() {

		global $membership_levels;

		$user_patronage = Patreon_Wordpress::getUserPatronage();

		if($user_patronage == false) {
			return false;
		}

		$user_patronage = ($user_patronage / 100);

		$levels = array();

		foreach($membership_levels as $level) {

			if($user_patronage >= (float) $level->billing_amount) {
				$levels[] = $level;
			}

		}

		return $levels;

	}

	function membershipsRequiredPlugins() {

		if( ! function_exists('pmpro_is_plugin_active') )
			echo '<div class="error"><p>Paid Memberships Pro is required for <strong>Patreon Connect: Patron Memberships</strong> to function.</p></div>';

	}

}


?>