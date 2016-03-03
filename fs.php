<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.treelinemedia.com/
 * @since             1.0.0
 * @package           Fast_Slideshow
 *
 * @wordpress-plugin
 * Plugin Name:       Fast Slideshow
 * Plugin URI:        http://www.treelinemedia.com/
 * Description:       Adds a [fast-slideshow] shortcode that displays all images attached to a post
 * Version:           1.0.0
 * Author:            Ryan Wadsworth
 * Author URI:        http://www.treelinemedia.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fss
 * Domain Path:       /languages
 */

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'FS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

include FS_PLUGIN_DIR . 'admin/fss-admin.php';

include FS_PLUGIN_DIR . 'public/fss-public.php';

register_activation_hook( __FILE__, 'activate_fss' );
function activate_fss () {
	
	add_option( 
		'fs_settings', 
		array (
			'fs_js_checkbox' => '1',
			'fs_css_checkbox' => '1',
			'fs_homepage_slide_duration' => '6000',
			'fs_homepage_image_size' => 'large',
			'fs_homepage_autostart_checkbox' => '1',
			'fs_homepage_position_checkbox' => '1',
			'fs_single_slide_duration' => '6000',
			'fs_single_image_size' => 'large',
			'fs_single_autostart_checkbox' => '0',
			'fs_single_position_checkbox' => '1'
		)
	); 

}

register_deactivation_hook( __FILE__, 'deactivate_fss' );
function deactivate_fss () {
	delete_option( 
		'fs_settings'
	); 
}