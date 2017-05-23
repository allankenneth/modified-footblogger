<?php
/*
Plugin Name: modified
Plugin URI: http://modified.in
Description: Stuff for modified
Author: Allan
Version: 1
Author URI: https://modified.in
*/
show_admin_bar( true );
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
	$wp_admin_bar->remove_node( 'search' );

}
function modified_toolbar_link($wp_admin_bar) {
	$args = array(
		'id' => 'modifiedhome',
		'title' => 'All Footblogs',
		'href' => 'https://modified.in',
		'meta' => array(
			'class' => 'modified-home',
			'title' => 'modified footblogs network activity stream'
		)
	);
	$wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'modified_toolbar_link', 999);
add_action( 'wp_enqueue_scripts', 'modified_enqueue_styles' );
function modified_enqueue_styles() {
    wp_enqueue_style( 'modified-style', '/wp-content/plugins/modified/style.css' );

}
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', '/wp-content/plugins/modified/style-login.css' );
//    wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

function xyz_filter_wp_mail_from_name($from_name){
return "Footblogger";
}
add_filter("wp_mail_from_name", "xyz_filter_wp_mail_from_name");
function xyz_filter_wp_mail_from($email){
return "noreply@modified.in";
}
add_filter("wp_mail_from", "xyz_filter_wp_mail_from");
