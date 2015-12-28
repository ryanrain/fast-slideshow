<?php 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function fss_scripts() {
	global $fss_options;
	global $post;
	if( is_a( $post, 'WP_Post' ) && is_single() && has_shortcode( $post->post_content, 'fast-slideshow') ) {
		if ($fss_options['fss_js_checkbox'] == '1') {
			wp_register_script( 'fast-slideshow-js', plugins_url() . '/fast-shortcode-slideshow/public/assets/fss.js', false, '2.0', true );
			wp_enqueue_script( 'fast-slideshow-js');
		}
		if ($fss_options['fss_css_checkbox'] == '1') {
			wp_register_style( 'fast-slideshow-css', plugins_url() . '/fast-shortcode-slideshow/public/assets/fss.css', false, '1.0', 'screen' );
			wp_enqueue_style( 'fast-slideshow-css');
		}
	}
}
add_action( 'wp_enqueue_scripts', 'fss_scripts');

function fss_handle_shortcode() {
	// global $fss_options;
	global $post;
	$args = array(
		'post_type' => 'attachment',
		'numberposts' => -1,
		'post_mime_type' => 'image',
		'post_parent' => $post->ID
	);
	$images = get_posts( $args );
	$markup = '<div class="slider js_slider">
                <div class="frame js_frame">
                    <ul class="slides js_slides">';
					foreach($images as $image):
						$markup .= '<li class="js_slide">' . wp_get_attachment_image($image->ID, 'medium') . '</li>';
					endforeach;
	$markup .= '	</ul>
                </div>
				<span class="js_prev rz_slider_nav">';
	$markup .= file_get_contents( FSS_PLUGIN_DIR . 'public/assets/prev.svg'); 
	$markup .= '</span>
				<span class="js_next rz_slider_nav">';
	$markup .= file_get_contents( FSS_PLUGIN_DIR . 'public/assets/next.svg'); 
	$markup .= '</span>';
    $markup .= '</div>';
    
	return $markup;
}
add_shortcode( 'fast-slideshow', 'fss_handle_shortcode' );
