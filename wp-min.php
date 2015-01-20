<?php
/*
Plugin Name: WP-Min by Joey D. Smith
Plugin URL: http://joeydsmith.com
Description: A set of components and functions for WordPress
Version: 1.0
Author: @joeydsmith
Author URI: http://joeydsmith.com
*/

if(!class_exists('jds_wpmin')){

	class jds_wpmin {
		public function __construct(){

			// Activation & Deactivation
			register_activation_hook( __FILE__, array( &$this, 'activate' ) );
			register_deactivation_hook( __FILE__, array( &$this, 'deactivate' ) );

			// Create Admin Menu
			add_action( 'admin_menu', array( &$this, 'menus' ) );

		}

		public function menus() {

			// Add Options Page, call function that has the include
			add_options_page( 'WPMin Settings', 'WPMin', 'manage_options', 'wpmin-general-settings', array( &$this, 'settings' ) );

			// Register WPMin Settings
			add_action( 'admin_init', array( &$this, 'register_settings' ) );

			// Include Styles & JS Specific to Settings
			if ( $_GET['page'] == 'wpmin-general-settings' ) {

				// WPMin tabs
				wp_register_script( 'wpmin-tabs-js', plugin_dir_url( __FILE__ ) . 'components/tabs/js/tabs.js', array('jquery') );
				wp_enqueue_script( 'wpmin-tabs-js' );

				wp_register_style( 'wpmin-tabs-css', plugin_dir_url(__FILE__).'components/tabs/css/tabs.css', false, '1.0' );
				wp_enqueue_style(  'wpmin-tabs-css' );

				// Specific to Settings Page
				wp_register_script( 'wpmin-general-settings-js', plugin_dir_url( __FILE__ ) . 'app/settings/js/settings.js', array('jquery') );
				wp_enqueue_script( 'wpmin-general-settings-js' );

				wp_register_style( 'wpmin-settings-css', plugin_dir_url(__FILE__).'app/settings/css/settings.css', false, '1.0' );
				wp_enqueue_style(  'wpmin-settings-css' );
			}
		}

		public function register_settings() {

			// Register WPMin Settings
			register_setting( 'wpmin-general-settings', 'wpmin_components' );

		}

		public function settings() {

			// If user can't, show error.
			if ( !current_user_can( 'manage_options' ) )  {
				wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
			}

			// Include the settings page
			require_once(plugin_dir_path( __FILE__ ) . 'app/settings/settings.php');

		}

	}

	// Initialize the plugin
	$jds_wpmin = new jds_wpmin();

}