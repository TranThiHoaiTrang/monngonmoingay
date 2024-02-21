<?php
/**
 * Header elements
 *
 * @author WEBHD
 */

use EHD_Cores\Helper;

\defined( 'ABSPATH' ) || die;

// -----------------------------------------------
// wp_head hook
// -----------------------------------------------

if ( ! function_exists( '__wp_head' ) ) {
	add_action( 'wp_head', '__wp_head', 1 );

	/**
	 * @return void
	 */
	function __wp_head() : void {

		// Add viewport to wp_head
		echo apply_filters( 'ehd_meta_viewport', '<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0" />' );  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		// Add a ping-back url auto-discovery header for singularly identifiable articles.
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s" />', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}

		// Theme color
		$theme_color = Helper::getThemeMod( 'theme_color_setting' );
		if ( $theme_color ) {
			echo '<meta name="theme-color" content="' . $theme_color . '" />';
		}
	}
}

// -----------------------------------------------
// ehd_before_header hook
// -----------------------------------------------

if ( ! function_exists( '__ehd_skip_to_content_link' ) ) {
	//add_action( 'ehd_before_header', '__ehd_skip_to_content_link', 2 );

	/**
	 * Add skip to a content link before the header.
	 *
	 * @return void
	 */
	function __ehd_skip_to_content_link(): void {
		printf(
			'<a class="screen-reader-text skip-link" href="#site-content" title="%1$s">%2$s</a>',
			esc_attr__( 'Skip to content', EHD_TEXT_DOMAIN ),
			esc_html__( 'Skip to content', EHD_TEXT_DOMAIN )
		);
	}
}

// -----------------------------------------------
// ehd_header hook
// -----------------------------------------------

if ( ! function_exists( '__ehd_construct_header' ) ) {
	add_action( 'ehd_header', '__ehd_construct_header', 10 );

	/**
	 * @return void
	 */
	function __ehd_construct_header(): void {
		?>
		<header id="header" class="py-2 px-4 lg:py-4 lg:px-6 flex gap-6 items-center justify-start fixed inset-x-0 top-0 z-10" <?php echo Helper::microdata( 'header' ); ?>>
            <?php

            /**
             * @see __top_header - 10
             * @see __header - 11
             * @see __bottom_header - 12
             */
            do_action( 'masthead' );

            ?>
		</header>
		<?php
	}
}

if ( ! function_exists( '__top_header' ) ) {
	add_action( 'masthead', '__top_header', 10 );

	/**
	 * @return void
	 */
	function __top_header(): void {}
}

if ( ! function_exists( '__header' ) ) {
	add_action( 'masthead', '__header', 11 );

	/**
	 * @return void
	 */
	function __header(): void {

        Helper::siteTitleOrLogo( true, 'div', 'p-1 bg-white rounded-[10px]');

		get_template_part( 'template-parts/blocks/off_canvas' );

        ?>

        <div class="nav-wrap flex lg:justify-start lg:items-center flex-auto fixed lg:static top-0 right-0 flex-col lg:flex-row h-screen lg:h-auto w-screen lg:w-auto justify-between pointer-events-none lg:pointer-events-auto">
            <div class="menu-bg absolute inset-0 w-screen h-screen bg-[var(--Gray-01)] opacity-0 lg:hidden transition-all"></div>

            <?php get_template_part( 'template-parts/blocks/main_nav' ); ?>
            <?php get_template_part( 'template-parts/blocks/users' ); ?>

        </div>
    <?php
	}
}

if ( ! function_exists( '__bottom_header' ) ) {
	add_action( 'masthead', '__bottom_header', 12 );

	/**
	 * @return void
	 */
	function __bottom_header(): void {}
}
