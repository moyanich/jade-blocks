<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.google.com
 * @since             1.0.0
 * @package           Jade_Blocks
 *
 * @wordpress-plugin
 * Plugin Name:       Jade Blocks
 * Plugin URI:        www.google.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Amoy Nicholson
 * Author URI:        www.google.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       jade-blocks
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'JADE_BLOCKS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-jade-blocks-activator.php
 */
function activate_jade_blocks() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-jade-blocks-activator.php';
	Jade_Blocks_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-jade-blocks-deactivator.php
 */
function deactivate_jade_blocks() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-jade-blocks-deactivator.php';
	Jade_Blocks_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_jade_blocks' );
register_deactivation_hook( __FILE__, 'deactivate_jade_blocks' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-jade-blocks.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_jade_blocks() {

	$plugin = new Jade_Blocks();
	$plugin->run();

}
run_jade_blocks();


function jade_acf_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$jade_blocks_temp = str_replace( "acf/", "", $block['name'] );

	if( file_exists( plugin_dir_path( __FILE__ ) . 'templates/free/' . $jade_blocks_temp . '.php' ) ) { 
		include( plugin_dir_path( __FILE__ ) . 'templates/free/' . $jade_blocks_temp . '.php' );
	} 



}

	