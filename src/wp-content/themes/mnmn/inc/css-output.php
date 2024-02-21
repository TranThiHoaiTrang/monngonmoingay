<?php

/**
 * CSS Output functions
 *
 * @author   WEBHD
 */

use EHD_Cores\Helper;
use EHD_Libs\CSS;

\defined( 'ABSPATH' ) || die;

// ------------------------------------------

/** inline css */
if ( ! function_exists( '__enqueue_inline_css' ) ) {
	add_action( 'wp_enqueue_scripts', '__enqueue_inline_css', 99 );

	/**
	 * Add CSS for third-party plugins.
	 *
	 * @return void
	 */
	function __enqueue_inline_css(): void {
		$css = new CSS();

		// breadcrumbs bg

		// footer bg
		$footer_bg = Helper::getThemeMod( 'footer_bg_setting' );
		$footer_bgcolor = Helper::getThemeMod( 'footer_bgcolor_setting' );

		if ( $footer_bg ) {
			$css->set_selector( 'footer .footer-bg' );
			$css->add_property( 'background-image', 'url(' . $footer_bg . ')' );
		}

		if ($footer_bgcolor) {
			$css->set_selector( 'footer .footer-bg' );
			$css->add_property( 'background-color', $footer_bgcolor );
		}

		if ( $css->css_output() ) {
			wp_add_inline_style( 'app-style', $css->css_output() );
		}
	}
}
