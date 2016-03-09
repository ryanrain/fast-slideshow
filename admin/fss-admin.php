<?php 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'admin_menu', 'fs_add_admin_menu' );
function fs_add_admin_menu(  ) { 

	add_submenu_page( 
		'options-general.php',
		'Fast Slideshow', 
		'Fast Slideshow', 
		'manage_options', 
		'fast_slideshow', 
		'fs_options_page' 
		);

}

function fs_options_page(  ) { 
	include FS_PLUGIN_DIR . 'admin/admin-template.php';
}

add_action( 'admin_init', 'fs_settings_init' );
function fs_settings_init(  ) { 

	// SECTIONS

	register_setting( 'performance', 'fs_settings' );
	register_setting( 'home_page', 'fs_settings' );
	register_setting( 'internal_pages', 'fs_settings' );

	add_settings_section(
		'fs_performance_section', 
		__( '', 'fs' ), 
		'', 
		'performance'
	);
	add_settings_section(
		'fs_home_page_section', 
		__( '', 'fs' ), 
		'', 
		'home_page'
	);
	add_settings_section(
		'fs_internal_pages_section', 
		__( '', 'fs' ), 
		'', 
		'internal_pages'
	);

	
	// HOMEPAGE SECTION

	add_settings_field( 
		'fs_homepage_slide_duration', 
		__( 'Slide duration on the homepage', 'fs' ), 
		'fs_homepage_slide_duration', 
		'home_page', 
		'fs_home_page_section' 
	);

	add_settings_field( 
		'fs_homepage_image_size', 
		__( 'Image size for the slideshow on the homepage', 'fs' ), 
		'fs_homepage_image_size', 
		'home_page', 
		'fs_home_page_section' 
	);

	add_settings_field( 
		'fs_homepage_autostart_checkbox', 
		__( 'Start slideshows on homepage automatically', 'fs' ), 
		'fs_homepage_autostart_checkbox', 
		'home_page', 
		'fs_home_page_section' 
	);

	add_settings_field( 
		'fs_homepage_position_checkbox', 
		__( 'Show position dots below slideshow on homepage', 'fs' ), 
		'fs_homepage_position_checkbox', 
		'home_page', 
		'fs_home_page_section' 
	);


	// INTERNAL PAGES SECTION

	add_settings_field( 
		'fs_single_slide_duration', 
		__( 'Slide duration on internal pages', 'fs' ), 
		'fs_single_slide_duration', 
		'internal_pages', 
		'fs_internal_pages_section' 
	);

	add_settings_field( 
		'fs_single_image_size', 
		__( 'Image size for slideshows on internal pages', 'fs' ), 
		'fs_single_image_size', 
		'internal_pages', 
		'fs_internal_pages_section' 
	);

	add_settings_field( 
		'fs_single_autostart_checkbox', 
		__( 'Start slideshows on internal pages automatically', 'fs' ), 
		'fs_single_autostart_checkbox', 
		'internal_pages', 
		'fs_internal_pages_section' 
	);

	add_settings_field( 
		'fs_single_position_checkbox', 
		__( 'Show position dots below slideshow on internal pages', 'fs' ), 
		'fs_single_position_checkbox', 
		'internal_pages', 
		'fs_internal_pages_section' 
	);


	// PERFORMANCE SECTION

	add_settings_field( 
		'fs_js_checkbox', 
		__( 'Load slideshow javascript', 'fs' ), 
		'fs_js_checkbox', 
		'performance', 
		'fs_performance_section' 
	);

	add_settings_field( 
		'fs_css_checkbox', 
		__( 'Load slideshow css', 'fs' ), 
		'fs_css_checkbox', 
		'performance', 
		'fs_performance_section' 
	);

}

// fallback just in case no settings are present
$fs_options = ( get_option( 'fs_settings') ) ? get_option( 'fs_settings') : array();


// HOMEPAGE FIELDS 

function fs_homepage_slide_duration(  ) { 
	global $fs_options;
	?>
	<select name='fs_settings[fs_homepage_slide_duration]'>
		<option value='1000' <?php selected( $fs_options['fs_homepage_slide_duration'], 1000 ); ?>>1 second</option>
		<option value='2000' <?php selected( $fs_options['fs_homepage_slide_duration'], 2000 ); ?>>2 seconds</option>
		<option value='3000' <?php selected( $fs_options['fs_homepage_slide_duration'], 3000 ); ?>>3 seconds</option>
		<option value='4000' <?php selected( $fs_options['fs_homepage_slide_duration'], 4000 ); ?>>4 seconds</option>
		<option value='5000' <?php selected( $fs_options['fs_homepage_slide_duration'], 5000 ); ?>>5 seconds</option>
		<option value='6000' <?php selected( $fs_options['fs_homepage_slide_duration'], 6000 ); ?>>6 seconds</option>
		<option value='7000' <?php selected( $fs_options['fs_homepage_slide_duration'], 7000 ); ?>>7 seconds</option>
		<option value='8000' <?php selected( $fs_options['fs_homepage_slide_duration'], 8000 ); ?>>8 seconds</option>
		<option value='9000' <?php selected( $fs_options['fs_homepage_slide_duration'], 9000 ); ?>>9 seconds</option>
		<option value='10000' <?php selected( $fs_options['fs_homepage_slide_duration'], 10000 ); ?>>10 seconds</option>
		<option value='11000' <?php selected( $fs_options['fs_homepage_slide_duration'], 11000 ); ?>>11 seconds</option>
		<option value='12000' <?php selected( $fs_options['fs_homepage_slide_duration'], 12000 ); ?>>12 seconds</option>
		<option value='13000' <?php selected( $fs_options['fs_homepage_slide_duration'], 13000 ); ?>>13 seconds</option>
		<option value='14000' <?php selected( $fs_options['fs_homepage_slide_duration'], 14000 ); ?>>14 seconds</option>
		<option value='15000' <?php selected( $fs_options['fs_homepage_slide_duration'], 15000 ); ?>>15 seconds</option>
		<option value='16000' <?php selected( $fs_options['fs_homepage_slide_duration'], 16000 ); ?>>16 seconds</option>
		<option value='17000' <?php selected( $fs_options['fs_homepage_slide_duration'], 17000 ); ?>>17 seconds</option>
		<option value='18000' <?php selected( $fs_options['fs_homepage_slide_duration'], 18000 ); ?>>18 seconds</option>
		<option value='19000' <?php selected( $fs_options['fs_homepage_slide_duration'], 19000 ); ?>>19 seconds</option>
		<option value='20000' <?php selected( $fs_options['fs_homepage_slide_duration'], 20000 ); ?>>20 seconds</option>
	</select>
<?php
}

function fs_homepage_image_size() {
	global $fs_options;
	$added_sizes = get_intermediate_image_sizes();
	?>
	<select name='fs_settings[fs_homepage_image_size]'>
		<?php
		foreach( $added_sizes as $key => $value) { ?>
			<option value='<?php echo $value; ?>' <?php selected( $fs_options['fs_homepage_image_size'], $value ); ?>><?php echo $value; ?></option>
		<?php
		}
		?>
	</select>
	<?php
}

function fs_homepage_autostart_checkbox(  ) { 
	global $fs_options;
	?>
	<input type='checkbox' name='fs_settings[fs_homepage_autostart_checkbox]' <?php checked( isset( $fs_options['fs_homepage_autostart_checkbox'] ) ); ?> value='1'>
	<?php
}

function fs_homepage_position_checkbox(  ) { 
	global $fs_options;
	?>
	<input type='checkbox' name='fs_settings[fs_homepage_position_checkbox]' <?php checked( isset( $fs_options['fs_homepage_position_checkbox'] ) ); ?> value='1'>
	<?php
}

// INTERNAL PAGES FIELDS  

function fs_single_slide_duration(  ) { 
	global $fs_options;
	?>
	<select name='fs_settings[fs_single_slide_duration]'>
		<option value='1000' <?php selected( $fs_options['fs_single_slide_duration'], 1000 ); ?>>1 second</option>
		<option value='2000' <?php selected( $fs_options['fs_single_slide_duration'], 2000 ); ?>>2 seconds</option>
		<option value='3000' <?php selected( $fs_options['fs_single_slide_duration'], 3000 ); ?>>3 seconds</option>
		<option value='4000' <?php selected( $fs_options['fs_single_slide_duration'], 4000 ); ?>>4 seconds</option>
		<option value='5000' <?php selected( $fs_options['fs_single_slide_duration'], 5000 ); ?>>5 seconds</option>
		<option value='6000' <?php selected( $fs_options['fs_single_slide_duration'], 6000 ); ?>>6 seconds</option>
		<option value='7000' <?php selected( $fs_options['fs_single_slide_duration'], 7000 ); ?>>7 seconds</option>
		<option value='8000' <?php selected( $fs_options['fs_single_slide_duration'], 8000 ); ?>>8 seconds</option>
		<option value='9000' <?php selected( $fs_options['fs_single_slide_duration'], 9000 ); ?>>9 seconds</option>
		<option value='10000' <?php selected( $fs_options['fs_single_slide_duration'], 10000 ); ?>>10 seconds</option>
		<option value='11000' <?php selected( $fs_options['fs_single_slide_duration'], 11000 ); ?>>11 seconds</option>
		<option value='12000' <?php selected( $fs_options['fs_single_slide_duration'], 12000 ); ?>>12 seconds</option>
		<option value='13000' <?php selected( $fs_options['fs_single_slide_duration'], 13000 ); ?>>13 seconds</option>
		<option value='14000' <?php selected( $fs_options['fs_single_slide_duration'], 14000 ); ?>>14 seconds</option>
		<option value='15000' <?php selected( $fs_options['fs_single_slide_duration'], 15000 ); ?>>15 seconds</option>
		<option value='16000' <?php selected( $fs_options['fs_single_slide_duration'], 16000 ); ?>>16 seconds</option>
		<option value='17000' <?php selected( $fs_options['fs_single_slide_duration'], 17000 ); ?>>17 seconds</option>
		<option value='18000' <?php selected( $fs_options['fs_single_slide_duration'], 18000 ); ?>>18 seconds</option>
		<option value='19000' <?php selected( $fs_options['fs_single_slide_duration'], 19000 ); ?>>19 seconds</option>
		<option value='20000' <?php selected( $fs_options['fs_single_slide_duration'], 20000 ); ?>>20 seconds</option>
	</select>
<?php
}

function fs_single_image_size() {
	global $fs_options;
	$added_sizes = get_intermediate_image_sizes();
	?>
	<select name='fs_settings[fs_single_image_size]'>
		<?php
		foreach( $added_sizes as $key => $value) { ?>
			<option value='<?php echo $value; ?>' <?php selected( $fs_options['fs_single_image_size'], $value ); ?>><?php echo $value; ?></option>
		<?php
		}
		?>
	</select>
	<?php
}

function fs_single_autostart_checkbox(  ) { 
	global $fs_options;
	?>
	<input type='checkbox' name='fs_settings[fs_single_autostart_checkbox]' <?php checked( isset( $fs_options['fs_single_autostart_checkbox'] ) ); ?> value='1'>
	<?php
}

function fs_single_position_checkbox(  ) { 
	global $fs_options;
	?>
	<input type='checkbox' name='fs_settings[fs_single_position_checkbox]' <?php checked( isset( $fs_options['fs_single_position_checkbox'] ) ); ?> value='1'>
	<?php
}


// PERFORMANCE FIELDS  

function fs_js_checkbox(  ) { 
	global $fs_options;
	?>
	<input type='checkbox' name='fs_settings[fs_js_checkbox]' <?php checked( isset( $fs_options['fs_js_checkbox'] ) ); ?> value='1'>
	<?php
}

function fs_css_checkbox(  ) { 
	global $fs_options;
	?>
	<input type='checkbox' name='fs_settings[fs_css_checkbox]' <?php checked( isset( $fs_options['fs_css_checkbox'] ) ); ?> value='1'>
	<?php
}
