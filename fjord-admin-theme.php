<?php 

/*
Plugin Name: Fjord Admin Theme
Plugin URI: http://fjordcms.app/
Description: Simple wordpress admin theme for white labeling
Author: Joshua Vachon
Author URI: http://joshuavachon.dev/
Version: 1.0.0
*/

function get_fjord_css() {
  wp_enqueue_style( 'fjordcms-admin-theme', plugins_url('css/fjord.css', __FILE__));
}

function set_fjord_footer() {
  return 'Propulsé par <a href="https://www.cyberfjord.studio/" target="_blank">Cyberfjord Studio </a>🚀';
}

function set_theme_colors() {
	$user_id = get_current_user_id();
	$user_data = get_userdata($user_id);
	if ( !( $user_data instanceof WP_User ) ) {
		return;
	}
	$user_theme = $user_info->admin_color;
  include('css/' . $user_data . '.css')

}

add_action( 'admin_enqueue_scripts', 'get_fjord_css' );
add_action( 'login_enqueue_scripts', 'get_fjord_css' );
add_filter('admin_footer_text', 'set_fjord_footer');
add_action( 'admin_head', 'set_theme_colors' );
add_action( 'login_head', 'set_theme_colors' );


%>
