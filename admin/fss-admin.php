<?php 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'admin_menu', 'fss_add_admin_menu' );
function fss_add_admin_menu(  ) { 

	add_submenu_page( 
		'options-general.php',
		'Fast Shortcode Slideshow', 
		'Fast Shortcode Slideshow', 
		'manage_options', 
		'fast_shortcode_slideshow', 
		'fss_options_page' 
		);

}


add_action( 'admin_init', 'fss_settings_init' );
function fss_settings_init(  ) { 

	register_setting( 'pluginPage', 'fss_settings' );

	add_settings_section(
		'fss_pluginPage_section', 
		__( '', 'fss' ), 
		'fss_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'fss_js_checkbox', 
		__( 'Load slideshow javascript?', 'fss' ), 
		'fss_js_checkbox', 
		'pluginPage', 
		'fss_pluginPage_section' 
	);

	add_settings_field( 
		'fss_css_checkbox', 
		__( 'Load slideshow css?', 'fss' ), 
		'fss_css_checkbox', 
		'pluginPage', 
		'fss_pluginPage_section' 
	);


}

function fss_settings_section_callback(  ) { 

	 echo __( 'Files are loaded ONLY on pages/posts that contain the shortcode. Files are not loaded on listings, such as the blog posts page or category pages.', 'fss' );

}

$fss_options = ( get_option( 'fss_settings') ) ? get_option( 'fss_settings') : array();


function fss_js_checkbox(  ) { 
	global $fss_options;
	?>
	<input type='checkbox' name='fss_settings[fss_js_checkbox]' <?php checked( $fss_options['fss_js_checkbox'], 1 ); ?> value='1'>
	<?php
}

function fss_css_checkbox(  ) { 
	global $fss_options;
	?>
	<input type='checkbox' name='fss_settings[fss_css_checkbox]' <?php checked( $fss_options['fss_css_checkbox'], 1 ); ?> value='1'>
	<?php
}


function fss_options_page(  ) { 
	include FSS_PLUGIN_DIR . 'admin/admin-template.php';
}
