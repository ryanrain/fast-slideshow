<?php 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function fs_scripts() {
	global $fs_options;
	global $post;
	if( is_a( $post, 'WP_Post' ) && is_single() && has_shortcode( $post->post_content, 'fast-slideshow') ) {
		if ( isset( $fs_options['fs_js_checkbox'] ) ) {
			wp_register_script( 'fast-slideshow-js', plugins_url() . '/fast-slideshow/public/assets/fss.js', false, '2.0', true );
			wp_enqueue_script( 'fast-slideshow-js');
		}
		if ( isset( $fs_options['fs_css_checkbox'] ) ) {
			wp_register_style( 'fast-slideshow-css', plugins_url() . '/fast-slideshow/public/assets/fss.css', false, '1.0', 'screen' );
			wp_enqueue_style( 'fast-slideshow-css');
		}
	}
}
add_action( 'wp_enqueue_scripts', 'fs_scripts');

function fs_inline_script () {
	global $fs_options;

	if(is_home() || is_front_page()) {
		$slide_duration = $fs_options['fs_homepage_slide_duration'];
	} else {
		$slide_duration = $fs_options['fs_single_slide_duration'];
	}

	$script = 
	"<script>
	document.addEventListener('DOMContentLoaded', function(){
		var sliderMarkup = document.querySelector('.js_slider');
			sliderLory = lory(sliderMarkup, {
			    infinite: 1, 
			    // enableMouseEvents: true
			});";

	if ( ( isset( $fs_options['fs_homepage_autostart_checkbox'] ) && (is_home() || is_front_page()) )
		|| ( isset( $fs_options['fs_single_autostart_checkbox'] ) && is_single() ) ) {
		
		$script .= "
		var sliderAuto = true;
		
		window.setInterval(function(){
			if (sliderAuto) {
				sliderLory.next();
			}
		}, $slide_duration);

		// pause autoscroll if user has manually interacted with slider
		function pauseSlideshow () { sliderAuto = false; }
		document.querySelector('.js_prev').addEventListener('click', pauseSlideshow);
		document.querySelector('.js_next').addEventListener('click', pauseSlideshow);
		sliderMarkup.addEventListener('on.lory.touchend', pauseSlideshow);";
	}

	if ( ( isset( $fs_options['fs_homepage_position_checkbox'] ) && (is_home() || is_front_page()) )
		|| ( isset( $fs_options['fs_single_position_checkbox'] ) && is_single() ) ) {
		
		$script .= "
		var positions = document.querySelectorAll('.js_slider_position span');
		positions['0'].classList.add('active');
				
		sliderMarkup.addEventListener('after.lory.slide', syncSliderNav);
		function syncSliderNav() {
			[].forEach.call(positions, function(item) {
				item.classList.remove('active');
			});
			positions[(sliderLory.returnIndex())].classList.add('active');
		}
		[].forEach.call(positions, function(item, slideNumber) {
			item.addEventListener('click', function(){
				pauseSlideshow();
				sliderLory.slideTo(slideNumber);
			})
		});
		";
	}

	$script .= "
	}); 
	</script>";

	return $script;
}

function fs_handle_shortcode() {
	global $post;
	if( is_a( $post, 'WP_Post' ) && is_single() && has_shortcode( $post->post_content, 'fast-slideshow') ) {
		
		global $fs_options;
		
		if(is_home() || is_front_page()) {
			$image_size .= $fs_options['fs_homepage_image_size'];
		} else {
			$image_size .= $fs_options['fs_single_image_size'];
		}

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
							$markup .= '<li class="js_slide">' . wp_get_attachment_image($image->ID, $image_size ) . '</li>';
						endforeach;
		$markup .= '	</ul>
	                </div>
					<span class="js_prev rz_slider_nav">';
		$markup .= file_get_contents( FS_PLUGIN_DIR . 'public/assets/prev.svg'); 
		$markup .= '</span>
					<span class="js_next rz_slider_nav">';
		$markup .= file_get_contents( FS_PLUGIN_DIR . 'public/assets/next.svg'); 
		$markup .= '</span>';
	    $markup .= '</div>';

	    if ( ( isset( $fs_options['fs_homepage_position_checkbox'] ) && (is_home() || is_front_page()) )
	    	|| ( isset( $fs_options['fs_single_position_checkbox'] ) && is_single() ) ) {
	    	
	    	$markup .= '<div class="js_slider_position">';
				foreach($images as $image):
	                $markup .= '<span></span>';
	            endforeach; 
            $markup .= '</div>';
	    }
	    
	    $markup .= fs_inline_script();
	    
		return $markup;
	}
}
add_shortcode( 'fast-slideshow', 'fs_handle_shortcode' );
