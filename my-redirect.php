<?php
/*
Plugin Name: Redirect New Domains
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: brilik
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/
require_once 'inc/functions.php';
require_once 'inc/Debug.php';
define( 'APP', dirname( __FILE__ ) );
define( 'PLUGIN_SLUG', 'redirect_new_domain' );
// activation
register_activation_hook( __FILE__, 'activation' );
// deactivation
register_deactivation_hook( __FILE__, 'deactivation' );
// uninstall
register_uninstall_hook( __FILE__, 'uninstall' );
add_action( 'admin_menu', 'create_page_options' );
add_action( 'admin_init', 'register_page_settings' );
add_action( 'admin_init', 'message_about_installed_redirect' );
add_action( 'init', 'redirect' );