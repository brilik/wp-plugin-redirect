<?php
function activation() {

	// create page options
}

function deactivation() {

	// action for deactivate
}

function uninstall() {

	// remove options and clear database
	delete_option( PLUGIN_SLUG . '_option_name' );
	delete_option( PLUGIN_SLUG . '_option_redirect' );
}

function create_page_options() {
	add_options_page( 'Options', 'New domain', 'manage_options', 'newdomain', 'newdomainredirect_options_page' );
}

function register_page_settings() {
	add_option( PLUGIN_SLUG . '_option_name' );
	register_setting( PLUGIN_SLUG . '_options_group', PLUGIN_SLUG . '_option_name', PLUGIN_SLUG . '_callback' );
	register_setting( PLUGIN_SLUG . '_options_group', PLUGIN_SLUG . '_option_redirect', PLUGIN_SLUG . '_callback' );
}

function message_about_installed_redirect() {

	if ( empty( get_option( PLUGIN_SLUG . '_option_redirect' ) ) ) {
		return false;
	}
	if ( $url = get_option( PLUGIN_SLUG . '_option_name' ) ){
		add_action( 'admin_notices', 'admin_notice_redirect' );
    }
}

function newdomainredirect_options_page() {
	$checked = (string) '';
	if ( get_option( PLUGIN_SLUG . '_option_redirect' ) ) {
		$checked = ' checked';
	}
	require( APP . '/template/content-page-settings.php' );
}

function redirect() {
	if ( is_admin() ) {
		return false;
	}
	if ( empty( get_option( PLUGIN_SLUG . '_option_name' ) ) ) {
		return false;
	}
	if ( get_option( PLUGIN_SLUG . '_option_redirect' ) ) {
		header( 'Location: ' . get_option( PLUGIN_SLUG . '_option_name' ) );
		exit;
	}
}


function admin_notice_redirect() {
	$class = 'notice notice-warning is-dismissible';
	$message = __( 'Installed redirect to ' . get_option(PLUGIN_SLUG . '_option_name'), PLUGIN_SLUG);

	printf( '<div class="%1$s"><h2>%2$s</h2></div>', esc_attr( $class ), esc_html( $message ) );
}