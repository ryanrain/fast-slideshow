<h1>Fast Slideshow Shortcode</h1>

<form action='options.php' method='post'>

	<h2>Site Performance settings</h2>
	<?php
	echo __( 'Note: Files are loaded ONLY on pages/posts that contain the shortcode. Files are not loaded on listings, such as the blog posts page or category pages.', 'fss' );
	settings_fields( 'performance' );
	do_settings_sections( 'performance' ); 
	?>

	<h2>Home Page</h2>
	<p>These settings apply to the home page.</p>
	<?php
	settings_fields( 'homePage' );
	do_settings_sections( 'homePage' ); 
	?>

	<h2>Internal Pages</h2>
	<p>These settings apply to internal pages.</p>
 	<?php
 	settings_fields( 'internalPages' );
	do_settings_sections( 'internalPages' ); 
    
    submit_button(); ?>
	
</form>