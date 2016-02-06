<h1>Fast Slideshow</h1>
<div class="wrap">
     
    <?php settings_errors(); ?>
     
    <h2 class="nav-tab-wrapper">
        <a href="#" class="nav-tab nav-tab-active">Home Page</a>
        <a href="#" class="nav-tab">Internal Pages</a>
        <a href="#" class="nav-tab">Performance</a>
    </h2>

	<form action='options.php' method='post'>

		<section>
			<h2>Home Page</h2>
			<p>These settings apply to slideshows that appear on the home page.</p>
			<?php
			settings_fields( 'home_page' );
			do_settings_sections( 'home_page' ); 
			?>
		</section>

		<section style="display:none;">
			<h2>Internal Pages</h2>
			<p>These settings apply to slideshows that appear on internal pages.</p>
		 	<?php
		 	settings_fields( 'internal_pages' );
			do_settings_sections( 'internal_pages' ); ?>
	    </section>

		<section style="display:none;">
			<h2>Site Performance settings</h2>
			<?php
			echo __( 'Uncheck these options if you prefer to include the <a href="https://github.com/meandmax/lory">slideshow files</a> in your theme. Note that if checked, files will ONLY be loaded by the plugin on pages/posts that contain the shortcode. Files are not loaded on listings, such as the blog posts page or category pages.', 'fs' );
			settings_fields( 'performance' );
			do_settings_sections( 'performance' ); 
			?>
		</section>

	    <?php submit_button(); ?>
		
	</form>

</div><!-- /.wrap -->

<script type="text/javascript">
	(function($) {
		
		$(document).on( 'click', '.nav-tab-wrapper a', function() {
			$('.nav-tab-wrapper a').removeClass('nav-tab-active');
			$(this).addClass('nav-tab-active');
			$('section').hide();
			$('section').eq($(this).index()).show();
			return false;
		})
		
	})( jQuery );
</script>

<style type="text/css">
	.form-table th {
		width: 50%;
	}
</style>