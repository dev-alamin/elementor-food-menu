<?php
/**
 * Plugin Name: SD Food Menu
 * Description: An Elementor food menu creator addon. 
 * Plugin URI:  https://shalikdev.com/plugins/food-menu
 * Version:     1.0.0
 * Author:      ShalikDev
 * Author URI:  https://almn.me/
 * Text Domain:sd-food-menu
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function elementor_test_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );

	// Run the plugin
	Elementor_Config::instance();

}
add_action( 'plugins_loaded', 'elementor_test_addon' );

