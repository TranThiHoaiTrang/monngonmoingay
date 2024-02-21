<?php

\defined( 'ABSPATH' ) || die;

/** ----------------------------------------------- */

if ( ! function_exists( '_dump' ) ) {

	/**
	 * @return void
	 */
	function _dump(): void {
		global $wpdb;

		if ( function_exists( 'dump' ) ) {
			dump( $wpdb->last_query );
		} else {
			var_dump( $wpdb->last_query );
		}
	}
}

/** ----------------------------------------------- */

if ( ! function_exists( 'sanitize_checkbox' ) ) {

	/**
	 * Sanitize checkbox values.
	 *
	 * @param $checked
	 *
	 * @return bool
	 */
	function sanitize_checkbox( $checked ): bool {
		return isset( $checked ) && true == $checked; // phpcs:ignore WordPress.PHP.StrictComparisons.LooseComparison -- Intentionally loose.
	}
}

/** ----------------------------------------------- */

if ( ! function_exists( 'sanitize_image' ) ) {

	/**
	 * @param $file
	 * @param $setting - WP_Customize_Image_Control
	 *
	 * @return mixed
	 */
	function sanitize_image( $file, $setting ): mixed {
		$mimes = [
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
			'bmp'          => 'image/bmp',
			'webp'         => 'image/webp',
			'tif|tiff'     => 'image/tiff',
			'ico'          => 'image/x-icon',
			'svg'          => 'image/svg+xml',
		];

		// check file type from file name
		$file_ext = wp_check_filetype( $file, $mimes );

		// if file has a valid mime type return it, otherwise return default
		return ( $file_ext['ext'] ? $file : $setting->default );
	}
}

