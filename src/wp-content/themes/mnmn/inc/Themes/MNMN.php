<?php

namespace EHD\Themes;

\defined( 'ABSPATH' ) || die;

final class MNMN {

	public function __construct() {
//		add_action( 'pre_get_posts', [ &$this, '__set_posts_per_page' ] );
	}

	/**
	 * @param $query
	 */
	public function __set_posts_per_page( $query ): void {

		// get default value
		$posts_per_page = get_option( 'posts_per_page' );

		if ( ! is_admin() ) {

			$ehd_posts_num_per_page_arr = apply_filters( 'ehd_posts_num_per_page', [ 10, 15, 20 ] );
			if ( isset( $_GET['pagenum'] ) ) {

				$pagenum = esc_sql( $_GET['pagenum'] );
				if ( in_array( $pagenum, $ehd_posts_num_per_page_arr ) ) {
					$posts_per_page = $pagenum;
				}

				if ( $pagenum > max( $ehd_posts_num_per_page_arr ) ) {
					$posts_per_page = max( $ehd_posts_num_per_page_arr );
				}
			}
		}

		$query->set( 'posts_per_page', $posts_per_page );
	}
}
