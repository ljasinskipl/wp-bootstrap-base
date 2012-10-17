<?php

add_action('admin_menu', 'ljpl_spamfighter_dashboard');
	if(!function_exists( 'ljpl_spamfighter_dashboard') ) {
	function ljpl_spamfighter_dashboard() {
		ljpl_admin_menu();
		add_submenu_page('ljpl-admin', 'Bootstrap theme', 'Bootstrap theme', 'manage_options', 'ljpl_bootstrap_theme_dashboard', 'ljpl_bootstrap_theme_dashboard_show');
	}

	function ljpl_bootstrap_theme_dashboard_show() {
		echo "<p>Currently enabled shortcodes</p>";
		global $shortcode_tags;
				echo "<pre>"; print_r($shortcode_tags); echo "</pre>";
	}

}
