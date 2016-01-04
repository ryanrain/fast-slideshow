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

	add_settings_field( 
		'fss_homepage_slide_duration', 
		__( 'Slide duration on the homepage', 'fss' ), 
		'fss_homepage_slide_duration', 
		'pluginPage', 
		'fss_pluginPage_section' 
	);

	add_settings_field( 
		'fss_single_slide_duration', 
		__( 'Slide duration on internal pages', 'fss' ), 
		'fss_single_slide_duration', 
		'pluginPage', 
		'fss_pluginPage_section' 
	);


}

function fss_settings_section_callback(  ) { 

	 echo __( 'Files are loaded ONLY on pages/posts that contain the shortcode. Files are not loaded on listings, such as the blog posts page or category pages.', 'fss' );

}

// fallback just in case no settings are present
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

function fss_homepage_slide_duration(  ) { 
	global $fss_options;
	?>
	<select name='fss_settings[fss_homepage_slide_duration]'>
		<option value='1000' <?php selected( $fss_options['fss_homepage_slide_duration'], 1000 ); ?>>1 seconds</option>
		<option value='2000' <?php selected( $fss_options['fss_homepage_slide_duration'], 2000 ); ?>>2 seconds</option>
		<option value='3000' <?php selected( $fss_options['fss_homepage_slide_duration'], 3000 ); ?>>3 seconds</option>
		<option value='4000' <?php selected( $fss_options['fss_homepage_slide_duration'], 4000 ); ?>>4 seconds</option>
		<option value='5000' <?php selected( $fss_options['fss_homepage_slide_duration'], 5000 ); ?>>5 seconds</option>
		<option value='6000' <?php selected( $fss_options['fss_homepage_slide_duration'], 6000 ); ?>>6 seconds</option>
		<option value='7000' <?php selected( $fss_options['fss_homepage_slide_duration'], 7000 ); ?>>7 seconds</option>
		<option value='8000' <?php selected( $fss_options['fss_homepage_slide_duration'], 8000 ); ?>>8 seconds</option>
		<option value='9000' <?php selected( $fss_options['fss_homepage_slide_duration'], 9000 ); ?>>9 seconds</option>
		<option value='10000' <?php selected( $fss_options['fss_homepage_slide_duration'], 10000 ); ?>>10 seconds</option>
		<option value='11000' <?php selected( $fss_options['fss_homepage_slide_duration'], 11000 ); ?>>11 seconds</option>
		<option value='12000' <?php selected( $fss_options['fss_homepage_slide_duration'], 12000 ); ?>>12 seconds</option>
		<option value='13000' <?php selected( $fss_options['fss_homepage_slide_duration'], 13000 ); ?>>13 seconds</option>
		<option value='14000' <?php selected( $fss_options['fss_homepage_slide_duration'], 14000 ); ?>>14 seconds</option>
		<option value='15000' <?php selected( $fss_options['fss_homepage_slide_duration'], 15000 ); ?>>15 seconds</option>
		<option value='16000' <?php selected( $fss_options['fss_homepage_slide_duration'], 16000 ); ?>>16 seconds</option>
		<option value='17000' <?php selected( $fss_options['fss_homepage_slide_duration'], 17000 ); ?>>17 seconds</option>
		<option value='18000' <?php selected( $fss_options['fss_homepage_slide_duration'], 18000 ); ?>>18 seconds</option>
		<option value='19000' <?php selected( $fss_options['fss_homepage_slide_duration'], 19000 ); ?>>19 seconds</option>
		<option value='20000' <?php selected( $fss_options['fss_homepage_slide_duration'], 20000 ); ?>>20 seconds</option>
	</select>
<?php
}


function fss_single_slide_duration(  ) { 
	global $fss_options;
	?>
	<select name='fss_settings[fss_single_slide_duration]'>
		<option value='1000' <?php selected( $fss_options['fss_single_slide_duration'], 1000 ); ?>>1 seconds</option>
		<option value='2000' <?php selected( $fss_options['fss_single_slide_duration'], 2000 ); ?>>2 seconds</option>
		<option value='3000' <?php selected( $fss_options['fss_single_slide_duration'], 3000 ); ?>>3 seconds</option>
		<option value='4000' <?php selected( $fss_options['fss_single_slide_duration'], 4000 ); ?>>4 seconds</option>
		<option value='5000' <?php selected( $fss_options['fss_single_slide_duration'], 5000 ); ?>>5 seconds</option>
		<option value='6000' <?php selected( $fss_options['fss_single_slide_duration'], 6000 ); ?>>6 seconds</option>
		<option value='7000' <?php selected( $fss_options['fss_single_slide_duration'], 7000 ); ?>>7 seconds</option>
		<option value='8000' <?php selected( $fss_options['fss_single_slide_duration'], 8000 ); ?>>8 seconds</option>
		<option value='9000' <?php selected( $fss_options['fss_single_slide_duration'], 9000 ); ?>>9 seconds</option>
		<option value='10000' <?php selected( $fss_options['fss_single_slide_duration'], 10000 ); ?>>10 seconds</option>
		<option value='11000' <?php selected( $fss_options['fss_single_slide_duration'], 11000 ); ?>>11 seconds</option>
		<option value='12000' <?php selected( $fss_options['fss_single_slide_duration'], 12000 ); ?>>12 seconds</option>
		<option value='13000' <?php selected( $fss_options['fss_single_slide_duration'], 13000 ); ?>>13 seconds</option>
		<option value='14000' <?php selected( $fss_options['fss_single_slide_duration'], 14000 ); ?>>14 seconds</option>
		<option value='15000' <?php selected( $fss_options['fss_single_slide_duration'], 15000 ); ?>>15 seconds</option>
		<option value='16000' <?php selected( $fss_options['fss_single_slide_duration'], 16000 ); ?>>16 seconds</option>
		<option value='17000' <?php selected( $fss_options['fss_single_slide_duration'], 17000 ); ?>>17 seconds</option>
		<option value='18000' <?php selected( $fss_options['fss_single_slide_duration'], 18000 ); ?>>18 seconds</option>
		<option value='19000' <?php selected( $fss_options['fss_single_slide_duration'], 19000 ); ?>>19 seconds</option>
		<option value='20000' <?php selected( $fss_options['fss_single_slide_duration'], 20000 ); ?>>20 seconds</option>
	</select>
<?php
}

function fss_options_page(  ) { 
	include FSS_PLUGIN_DIR . 'admin/admin-template.php';
}
