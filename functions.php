<?php
/**
 * @package Stresslimit
 */


include_once( 'inc/stresspress.php' );
include_once( 'inc/types.php' );
include_once( 'inc/helpers.php' );
include_once( 'inc/ajax.php' );


add_action( 'init', 'sld_init' );
function sld_init() {

	set_post_thumbnail_size( 240, 135, true );	// 16:9
	add_image_size( 'medium-cropped', 400, 225, true );

	if ( !is_admin() && !is_login_page() ) {
		// scripts
		wp_deregister_script( 'l10n' );
		wp_deregister_script( 'jquery');
		wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', false, '1.7.1');
		wp_enqueue_script( 'jquery' );
		// wp_enqueue_script( 'isotope', get_bloginfo('template_url').'/js/jquery.isotope.min.js"', array('jquery') );
		wp_enqueue_script( 'masonry', get_bloginfo('template_url').'/js/jquery.masonry.min.js"', array('jquery') );
		wp_enqueue_script( 'stress', get_bloginfo('template_url').'/js/stress.js', 'jquery' );

		// stylesheets
		wp_enqueue_style( 'style', get_bloginfo('stylesheet_url') );
	}

}

