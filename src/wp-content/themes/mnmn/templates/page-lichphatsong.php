<?php
/**
 * The template for displaying lichphatsongpage
 * Template Name: lichphatsong
 * Template Post Type: page
 */

\defined( 'ABSPATH' ) || die;

use EHD_Cores\Helper;

get_header( 'cooking-with-experts' );
if (post_password_required()) :
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
endif;

if ( is_active_sidebar( 'ehd-top-page-sidebar' ) ) :
	dynamic_sidebar( 'ehd-top-page-sidebar' );
endif;
do_action( 'ehd_lichphatsong' );
?>
<?php

?>

<?php
get_footer();
?>