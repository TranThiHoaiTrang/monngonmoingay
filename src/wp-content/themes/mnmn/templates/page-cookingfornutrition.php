<?php
/**
 * The template for displaying cookingfornutritionpage
 * Template Name: cookingfornutrition
 * Template Post Type: page
 */

\defined( 'ABSPATH' ) || die;

use EHD_Cores\Helper;

get_header();

if (have_posts()) the_post();

echo '<main role="main">';

do_action( 'ehd_cookingfornutrition' );

echo '</main>';

get_footer();
