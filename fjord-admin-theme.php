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
  wp_enqueue_script( 'fjord', plugins_url( "js/fjord.js", __FILE__ ), array() , '1.0.0' );
}

function set_fjord_footer() {
  return 'Propulsé par <a href="https://www.cyberfjord.studio/" target="_blank">Cyberfjord Studio </a>🚀';
}

function get_userrole() {
	$user_id = get_current_user_id();
	$user_data = get_userdata($user_id);
	if ( !( $user_data instanceof WP_User ) ) {
		return;
	}
	$user_role = implode(', ', $user_data->roles);
    return $user_role;
}


function admin_only(){
	$role = get_userrole();
	if($role !== "administrator"){
		  remove_menu_page( 'jetpack' );                    //Jetpack* 
		  remove_menu_page( 'edit.php?post_type=page' );    //Pages
		  remove_menu_page( 'edit-comments.php' );          //Comments
		  remove_menu_page( 'themes.php' );                 //Appearance
		  remove_menu_page( 'plugins.php' );                //Plugins
		  remove_menu_page( 'users.php' );                  //Users
		  remove_menu_page( 'tools.php' );                  //Tools
		  remove_menu_page( 'options-general.php' );        //Settings
		  remove_menu_page( 'litespeed');
		  remove_menu_page( 'hostinger');
	}

}

add_action( 'admin_enqueue_scripts', 'get_fjord_css' );
add_action( 'login_enqueue_scripts', 'get_fjord_css' );
add_filter('admin_footer_text', 'set_fjord_footer');
add_action( 'admin_init', 'admin_only' );
// add_action( 'admin_init', 'wpse_136058_debug_admin_menu' );

// function wpse_136058_debug_admin_menu() {

//     echo '<pre>' . print_r( $GLOBALS[ 'menu' ], TRUE) . '</pre>';
// }
?>
