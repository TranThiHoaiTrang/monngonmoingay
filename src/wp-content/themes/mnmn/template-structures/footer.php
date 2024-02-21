<?php
/**
 * Footer elements
 *
 * @author WEBHD
 */

use EHD_Cores\Helper;

\defined( 'ABSPATH' ) || die;

// -----------------------------------------------
// wp_footer hook
// -----------------------------------------------

if ( ! function_exists( '__wp_footer' ) ) {
	add_action( 'wp_footer', '__wp_footer', 98 );

	/**
	 * Build the back to top button
	 *
	 * @return void
	 */
	function __wp_footer(): void {

		$back_to_top = apply_filters( 'ehd_back_to_top', true );
		if ( $back_to_top ) {
			echo apply_filters( // phpcs:ignore
				'end_back_to_top_output',
				sprintf(
					'<a title="%1$s" aria-label="%1$s" rel="nofollow" href="#" class="back-to-top toTop" data-scroll-speed="%2$s" data-start-scroll="%3$s" data-glyph=""></a>',
					esc_attr__( 'Scroll back to top', EHD_TEXT_DOMAIN ),
					absint( apply_filters( 'ehd_back_to_top_scroll_speed', 400 ) ),
					absint( apply_filters( 'ehd_back_to_top_start_scroll', 300 ) ),
				)
			);
		}
	}
}

// -----------------------------------------------
// ehd_footer hook
// -----------------------------------------------

if ( ! function_exists( '__construct_footer_widgets' ) ) {
	add_action( 'ehd_footer', '__construct_footer_widgets', 5 );

	/**
	 * Build our footer widgets
	 *
	 * @return void
	 */
	function __construct_footer_widgets(): void {

		if ( is_active_sidebar( 'ehd-top-footer-sidebar' ) ) :
			dynamic_sidebar( 'ehd-top-footer-sidebar' );
		endif;

		?>
        <div class="footer-bg">
            <div class="container flex flex-col items-center py-6 gap-8 px-4">
	            <?php

	            $query_args = [
                    'class' => 'p-1 bg-white rounded-[10px]',
                ];
                echo Helper::doShortcode( 'site_logo', $query_args );

	            $rows    = (int) Helper::getThemeMod( 'footer_row_setting' );
	            $regions = (int) Helper::getThemeMod( 'footer_col_setting' );

	            // If no footer widgets exist, we don't need to continue
	            if ( 1 <= $rows && 1 <= $regions ) :

                ?>
                <div id="footer-widgets" class="footer-widgets">
		            <?php
		            for ( $row = 1; $row <= $rows; $row ++ ) :

			            // Defines the number of active columns in this footer row.
			            for ( $region = $regions; 0 < $region; $region -- ) {
				            if ( is_active_sidebar( 'ehd-footer-' . esc_attr( $region + $regions * ( $row - 1 ) ) ) ) {
					            $columns = $region;
					            break;
				            }
			            }

			            if ( isset( $columns ) ) :

                    ?>
                    <div class="rows row-<?php echo $row; ?>">
	                    <?php
	                    for ( $column = 1; $column <= $columns; $column ++ ) :
		                    $footer_n = $column + $regions * ( $row - 1 );
		                    if ( is_active_sidebar( 'ehd-footer-' . esc_attr( $footer_n ) ) ) :

			                    //echo sprintf( '<div class="cell cell-%1$s">', esc_attr( $column ) );
			                    dynamic_sidebar( 'ehd-footer-' . esc_attr( $footer_n ) );
			                    //echo "</div>";

		                    endif;
	                    endfor;

	                    ?>
                    </div>
                    <?php endif; endfor; ?>
                </div><!-- #footer-widgets-->

                <?php endif; ?>

                <div class="flex flex-col-reverse lg:flex-row justify-between items-center w-full gap-4">

                    <?php do_action( 'ehd_credits' );?>

                    <div class="text-lg font-bold">
                        <div class="flex gap-4 flex-col lg:flex-row items-center">
                            <div class="flex justify-center"><?php echo __( 'Follow Us:', EHD_TEXT_DOMAIN ) ?></div>
                            <div class="flex gap-4">

                                <?php echo social_nav(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
	}
}


if ( ! function_exists( '__construct_footer' ) ) {
	add_action( 'ehd_footer', '__construct_footer', 10 );

	/**
	 * Build our footer
	 *
	 * @return void
	 */
	function __construct_footer() {}
}

if ( ! function_exists( '__ehd_credits' ) ) {
	add_action( 'ehd_credits', '__ehd_credits', 10 );

	/**
	 * Add the copyright to the footer
	 *
	 * @return void
	 */
	function __ehd_credits(): void {
		$copyright = sprintf(
			'<span class="copyright">®/™© %1$s <a class="text-[var(--Primary-02)]" href="%2$s" aria-label="%3$s">%3$s</a>. All rights reserved.</span>',
			date( 'Y' ),
			Helper::home(),
			get_bloginfo( 'name' ),
		); // phpcs:ignore

		echo apply_filters( 'ehd_copyright', $copyright ); // phpcs:ignore
	}
}
