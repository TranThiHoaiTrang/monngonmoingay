<?php
/**
 * The template for displaying homepage
 * Template Name: Home Page
 * Template Post Type: page
 */

\defined( 'ABSPATH' ) || die;

get_header( 'home' );

global $post;

if (post_password_required()) :
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
endif;

//the_content();

// homepage widget
if ( is_active_sidebar( 'ehd-home-sidebar' ) ) :
	dynamic_sidebar( 'ehd-home-sidebar' );
endif;

get_footer( 'home' );
