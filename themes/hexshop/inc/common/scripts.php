<?php

define('HEXSHOP_CSS', get_template_directory_uri() . '/assets/css/');
define('HEXSHOP_JS', get_template_directory_uri() . '/assets/js/');

// hexshop CSS and JS enqueue here
function hexshop_theme_scripts() {

    // All CSS
    wp_enqueue_style( 'bootstrap',  HEXSHOP_CSS.'bootstrap.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'font-awesome',  HEXSHOP_CSS.'font-awesome.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'owl-carousel',  HEXSHOP_CSS.'owl-carousel.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'lightbox',  HEXSHOP_CSS.'lightbox.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'hexshop-main',  HEXSHOP_CSS.'templatemo-hexashop.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'hexshop-custom',  HEXSHOP_CSS.'custom.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'hexshop-style', get_stylesheet_uri() );

    // All JS
	wp_enqueue_script( 'popper', HEXSHOP_JS.'popper.js', array( ), '1.0.0', true );
	wp_enqueue_script( 'bootstrap', HEXSHOP_JS.'bootstrap.min.js', array( ), '1.0.0', true );
	wp_enqueue_script( 'owl-carousel', HEXSHOP_JS.'owl-carousel.js', array( ), '1.0.0', true );
	wp_enqueue_script( 'accordions', HEXSHOP_JS.'accordions.js', array( ), '1.0.0', true );
	wp_enqueue_script( 'datepicker', HEXSHOP_JS.'datepicker.js', array( ), '1.0.0', true );
	wp_enqueue_script( 'scrollreveal', HEXSHOP_JS.'scrollreveal.min.js', array( ), '1.0.0', true );
	wp_enqueue_script( 'waypoints', HEXSHOP_JS.'waypoints.min.js', array( ), '1.0.0', true );
	wp_enqueue_script( 'jquery-counterup', HEXSHOP_JS.'jquery.counterup.min.js', array( ), '1.0.0', true );
	wp_enqueue_script( 'imgfix', HEXSHOP_JS.'imgfix.min.js', array( ), '1.0.0', true );
	wp_enqueue_script( 'slick', HEXSHOP_JS.'slick.js', array( ), '1.0.0', true );
	wp_enqueue_script( 'lightbox', HEXSHOP_JS.'lightbox.js', array( ), '1.0.0', true );
	wp_enqueue_script( 'isotope', HEXSHOP_JS.'isotope.js', array( ), '1.0.0', true );
	wp_enqueue_script( 'hexshop-main', HEXSHOP_JS.'custom.js', array( 'jquery' ), 1.0, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'hexshop_theme_scripts' );