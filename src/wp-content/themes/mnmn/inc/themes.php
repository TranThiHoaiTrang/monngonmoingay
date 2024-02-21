<?php

/**
 * Themes Functions
 *
 * @author WEBHD
 */

use EHD_Cores\Helper;

\defined( 'ABSPATH' ) || die;

/** ---------------------------------------- */

if ( ! function_exists( '__after_setup_theme' ) ) {
	add_action( 'after_setup_theme', '__after_setup_theme', 11 );

	/**
	 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
	 *
	 * @return void
	 */
	function __after_setup_theme(): void {
		register_nav_menus(
			[
				'main-nav'   => __( 'Primary Menu', EHD_TEXT_DOMAIN ),
				'second-nav' => __( 'Secondary Menu', EHD_TEXT_DOMAIN ),
				'mobile-nav' => __( 'Handheld Menu', EHD_TEXT_DOMAIN ),
				'social-nav' => __( 'Social menu', EHD_TEXT_DOMAIN ),
				'policy-nav' => __( 'Term menu', EHD_TEXT_DOMAIN ),
			]
		);
	}
}

/** ---------------------------------------- */

if ( ! function_exists( '__register_sidebars' ) ) {
	add_action( 'widgets_init', '__register_sidebars', 11 );

	/**
	 * Register widget area.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
	 */
	function __register_sidebars(): void {

		//----------------------------------------------------------
		// Homepage
		//----------------------------------------------------------

		register_sidebar(
			[
				'container'     => false,
				'id'            => 'ehd-home-sidebar',
				'name'          => __( 'Home-Page', EHD_TEXT_DOMAIN ),
				'description'   => __( 'Widgets added here will appear in homepage.', EHD_TEXT_DOMAIN ),
				'before_widget' => '<div class="%2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<span>',
				'after_title'   => '</span>',
			]
		);

		//----------------------------------------------------------
		// Header
		//----------------------------------------------------------

		$top_header_cols    = (int) Helper::getThemeMod( 'top_header_setting' );
		$header_cols        = (int) Helper::getThemeMod( 'header_setting' );
		$bottom_header_cols = (int) Helper::getThemeMod( 'bottom_header_setting' );

		if ( $top_header_cols > 0 ) {
			for ( $i = 1; $i <= $top_header_cols; $i ++ ) {
				$_name = sprintf( __( 'Top-Header %d', EHD_TEXT_DOMAIN ), $i );
				register_sidebar(
					[
						'container'     => false,
						'id'            => 'ehd-top-header-' . $i . '-sidebar',
						'name'          => $_name,
						'description'   => __( 'Widgets added here will appear in top header.', EHD_TEXT_DOMAIN ),
						'before_widget' => '<div class="header-widgets %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<span>',
						'after_title'   => '</span>',
					]
				);
			}
		}

		if ( $header_cols > 0 ) {
			for ( $i = 1; $i <= $header_cols; $i ++ ) {
				$_name = sprintf( __( 'Header %d', EHD_TEXT_DOMAIN ), $i );
				register_sidebar(
					[
						'container'     => false,
						'id'            => 'ehd-header-' . $i . '-sidebar',
						'name'          => $_name,
						'description'   => __( 'Widgets added here will appear in header.', EHD_TEXT_DOMAIN ),
						'before_widget' => '<div class="header-widgets %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<span>',
						'after_title'   => '</span>',
					]
				);
			}
		}

		if ( $bottom_header_cols > 0 ) {
			for ( $i = 1; $i <= $bottom_header_cols; $i ++ ) {
				$_name = sprintf( __( 'Bottom-Header %d', EHD_TEXT_DOMAIN ), $i );
				register_sidebar(
					[
						'container'     => false,
						'id'            => 'ehd-bottom-header-' . $i . '-sidebar',
						'name'          => $_name,
						'description'   => __( 'Widgets added here will appear in bottom header.', EHD_TEXT_DOMAIN ),
						'before_widget' => '<div class="header-widgets %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<span>',
						'after_title'   => '</span>',
					]
				);
			}
		}

		//----------------------------------------------------------
		// Footer
		//----------------------------------------------------------

		$footer_args = [];

		$rows    = (int) Helper::getThemeMod( 'footer_row_setting' );
		$regions = (int) Helper::getThemeMod( 'footer_col_setting' );

		for ( $row = 1; $row <= $rows; $row ++ ) {
			for ( $region = 1; $region <= $regions; $region ++ ) {
				$footer_n = $region + $regions * ( $row - 1 ); // Defines footer sidebar ID.
				$footer   = sprintf( 'footer_%d', $footer_n );
				if ( 1 === $rows ) {

					/* translators: 1: column number */
					$footer_region_name = sprintf( __( 'Footer-Column %1$d', EHD_TEXT_DOMAIN ), $region );

					/* translators: 1: column number */
					$footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of the footer.', EHD_TEXT_DOMAIN ), $region );
				} else {

					/* translators: 1: row number, 2: column number */
					$footer_region_name = sprintf( __( 'Footer-Row %1$d - Column %2$d', EHD_TEXT_DOMAIN ), $row, $region );

					/* translators: 1: column number, 2: row number */
					$footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of footer row %2$d.', EHD_TEXT_DOMAIN ), $region, $row );
				}

				$footer_args[ $footer ] = [
					'name'        => $footer_region_name,
					'id'          => sprintf( 'ehd-footer-%d', $footer_n ),
					'description' => $footer_region_description,
				];
			}
		}

		foreach ( $footer_args as $args ) {
			$footer_tags = [
				'container'     => false,
				'before_widget' => '<div class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<p class="widget-title h6">',
				'after_title'   => '</p>',
			];

			register_sidebar( $args + $footer_tags );
		}

		//----------------------------------------------------------
		// Other ...
		//----------------------------------------------------------

		// Top footer
		register_sidebar(
			[
				'container'     => false,
				'id'            => 'ehd-top-footer-sidebar',
				'name'          => __( 'Top-Footer', EHD_TEXT_DOMAIN ),
				'description'   => __( 'Widgets added here will appear in top footer.', EHD_TEXT_DOMAIN ),
				'before_widget' => '<div class="%2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<span>',
				'after_title'   => '</span>',
			]
		);

		// Top page
		register_sidebar(
			[
				'container'     => false,
				'id'            => 'ehd-top-page-sidebar',
				'name'          => __( 'Top-Page', EHD_TEXT_DOMAIN ),
				'description'   => __( 'Widgets added here will appear in top page.', EHD_TEXT_DOMAIN ),
				'before_widget' => '<div class="%2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<span>',
				'after_title'   => '</span>',
			]
		);

		// Top page
		register_sidebar(
			[
				'container'     => false,
				'id'            => 'ehd-menu-page-monan',
				'name'          => __( 'Menu-Page-Monan', EHD_TEXT_DOMAIN ),
				'description'   => __( 'Widgets added here will appear in menu page monan.', EHD_TEXT_DOMAIN ),
				'before_widget' => '<div class="%2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<span>',
				'after_title'   => '</span>',
			]
		);
	}
}

/** ---------------------------------------- */

if ( ! function_exists( '__wp_default_scripts' ) ) {
	add_action( 'wp_default_scripts', '__wp_default_scripts' );

	/**
	 * @param $scripts
	 *
	 * @return void
	 */
	function __wp_default_scripts( $scripts ): void {
		if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
			$script = $scripts->registered['jquery'];
			if ( $script->deps ) {

				// Check whether the script has any dependencies

				// remove jquery-migrate
				$script->deps = array_diff( $script->deps, [ 'jquery-migrate' ] );
			}
		}
	}
}

/** ---------------------------------------- */

if ( ! function_exists( '__body_classes' ) ) {
	add_filter( 'body_class', '__body_classes', 11, 1 );

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	function __body_classes( array $classes ): array {

		// Check whether we're in the customizer preview.
		if ( is_customize_preview() ) {
			$classes[] = 'customizer-preview';
		}

		foreach ( $classes as $class ) {
			if (
				str_contains( $class, 'wp-custom-logo' )
				|| str_contains( $class, 'page-template-templates' )
				|| str_contains( $class, 'page-template-default' )
				|| str_contains( $class, 'no-customize-support' )
				|| str_contains( $class, 'page-id-' )
			) {
				$classes = array_diff( $classes, [ $class ] );
			}
		}

		if ( ( is_home() || is_front_page() ) && class_exists( '\WooCommerce' ) ) {
			$classes[] = 'woocommerce';
		}

		// ...
		$classes[] = 'default-mode';

		return $classes;
	}
}

/** ---------------------------------------- */

if ( ! function_exists( '__post_classes' ) ) {
	add_filter( 'post_class', '__post_classes', 11, 1 );

	/**
	 * Adds custom classes to the array of post-classes.
	 *
	 * @param array $classes Classes for the post-element.
	 *
	 * @return array
	 */
	function __post_classes( array $classes ): array {

		// remove_sticky_class
		if ( in_array( 'sticky', $classes ) ) {
			$classes   = array_diff( $classes, [ "sticky" ] );
			$classes[] = 'wp-sticky';
		}

		// remove 'tag-', 'category-' classes
		foreach ( $classes as $class ) {
			if (
				str_contains( $class, 'tag-' )
				|| str_contains( $class, 'category-' )
			) {
				$classes = array_diff( $classes, [ $class ] );
			}
		}

		return $classes;
	}
}

/** ---------------------------------------- */

if ( ! function_exists( '__nav_menu_css_classes' ) ) {
	add_filter( 'nav_menu_css_class', '__nav_menu_css_classes', 11, 2 );

	/**
	 * @param $classes
	 * @param $item
	 *
	 * @return array
	 */
	function __nav_menu_css_classes( $classes, $item ): array {

		if ( ! is_array( $classes ) ) {
			$classes = [];
		}

		// Remove 'menu-item-type-', 'menu-item-object-' classes
		foreach ( $classes as $class ) {
			if ( str_contains( $class, 'menu-item-type-' )
			     || str_contains( $class, 'menu-item-object-' )
			) {
				$classes = array_diff( $classes, [ $class ] );
			}
		}

		if ( 1 == $item->current
		     || $item->current_item_ancestor
		     || $item->current_item_parent
		) {
			// $classes[] = 'is-active';
			$classes[] = 'active';
		}

		return $classes;
	}
}

/** ---------------------------------------- */

/** comment off default */
add_filter( 'wp_insert_post_data', function ( array $data ) {

	if ( $data['post_status'] == 'auto-draft' ) {
		// $data['comment_status'] = 0;
		$data['ping_status'] = 0;
	}

	return $data;

}, 99, 1 );

/** ---------------------------------------- */

/** Tags cloud font sizes */
add_filter( 'widget_tag_cloud_args', function ( array $args ) {

	$args['smallest'] = '10';
	$args['largest']  = '19';
	$args['unit']     = 'px';
	$args['number']   = 12;

	return $args;
} );

/** ---------------------------------------- */

/** Change Action Scheduler default purge to 1 days */
add_filter( 'action_scheduler_retention_period', function () {
	return DAY_IN_SECONDS; //1 ngày
	//return WEEK_IN_SECONDS; //7 ngày
} );

/** ---------------------------------------- */
/** custom filter */
/** ---------------------------------------- */

/** defer scripts */
add_filter( 'ehd_defer_script', function ( array $arr ) {

	$arr_new = [
		// defer script
		//'wc-single-product' => 'defer',
		'contact-form-7' => 'defer',

		// delay script - default 5s
		'comment-reply' => 'delay',
		'wp-embed'      => 'delay',
		'admin-bar'     => 'delay',
		'back-to-top'   => 'delay',
		'social-share'  => 'delay',
		'o-draggable'   => 'delay',
	];

	return array_merge( $arr, $arr_new );

}, 11, 1 );

/** ---------------------------------------- */

/** defer styles */
add_filter( 'ehd_defer_style', function ( array $arr ) {

	$arr_new = [
		'dashicons',
		'contact-form-7',
		//'rank-math',
	];

	return array_merge( $arr, $arr_new );

}, 11, 1 );

/** ---------------------------------------- */

/** Aspect Ratio default */
add_filter( 'ehd_aspect_ratio_default_list', function ( array $arr ) {
	$new_arr    = array_merge( $arr, [ '1-1' ] );
	$update_arr = [
		'3-2',
		'4-3',
		'16-9',
		'21-9',
	];

	return array_merge( $new_arr, $update_arr );

}, 99, 1 );

/** ---------------------------------------- */

/** Aspect Ratio */
add_filter( 'ehd_aspect_ratio_post_type', function ( array $arr ) {

	// custom value
	$update_arr = [
		//'hoi-dau-bep',
		//'lich-phat-song',
		//'dipnau',
		//'nuoccham',
		//'nguyenlieu',
		//'gia-vi-ban-can',
		'thong-tin-huu-ich',
		'monan',
		//'cachnau',
		//'ebooklet',
		//'giadinh',
		//'dinhduong'
	];

	return array_merge( $arr, $update_arr );

}, 99, 1 );

/** ---------------------------------------- */

// Terms thumbnail ( term_thumb )
add_filter( 'ehd_term_columns', function ( array $arr ) {

	$update_arr = [
		'category',
		'post_tag',
		'danh-muc-hoi-dau-bep',
		'danh-muc-lich-phat-song',
		'danhmuc_nuoccham',
		'danhmuc_nguyenlieu',
		'danh_muc_gia_vi_ban_can',
		'danh-muc-thong-tin-huu-ich',
		'danhmuc_dipnau',
		'danhmuc_monan',
		'danh-muc-gioi-thieu',
	];

	return array_merge( $arr, $update_arr );

}, 99, 1 );

/** ---------------------------------------- */

// add the category ID to admin page
add_filter( 'ehd_term_row_actions', function ( array $arr ) {

	$update_arr = [
		'category',
		'post_tag',
		'danh_muc_gia_vi_ban_can',
		'danhmuc_monan',
	];

	$new_arr = array_merge( $arr, $update_arr );
	if ( class_exists( '\WooCommerce' ) ) {
		$new_arr = array_merge( $new_arr, [ 'product_cat' ] );
	}

	return $new_arr;

}, 99, 1 );

/** ---------------------------------------- */

// post_row_actions
add_filter( 'ehd_post_row_actions', function ( array $arr ) {

	$update_arr = [
		'user',
		'post',
		'page',
	];

	return array_merge( $arr, $update_arr );

}, 99, 1 );

/** ---------------------------------------- */

// exclude thumb post column
add_filter( 'ehd_post_exclude_columns', function ( array $arr ) {

	$update_arr = [
		//'site-review',
	];

	$new_arr = array_merge( $arr, $update_arr );
	if ( class_exists( '\WooCommerce' ) ) {
		$new_arr = array_merge( $new_arr, [ 'product' ] );
	}

	if ( class_exists( '\WPCF7' ) ) {
		$new_arr = array_merge( $new_arr, [ 'wpcf7_contact_form' ] );
	}

	return $new_arr;

}, 99, 1 );

/** ---------------------------------------- */

// Add ACF attributes in menu locations
add_filter( 'ehd_location_menu_items', function ( array $arr ) {

	$update_arr = [
		//'main-nav',
		//'second-nav',
		//'mobile-nav',
	];

	return array_merge( $arr, $update_arr );

}, 99, 1 );

/** ---------------------------------------- */

// Add ACF attributes in mega menu locations
add_filter( 'ehd_location_mega_menu', function ( array $arr ) {

	$update_arr = [
		//'main-nav',
		//'second-nav',
		//'mobile-nav',
	];

	return array_merge( $arr, $update_arr );

}, 99, 1 );

/** ---------------------------------------- */
/** MNMN */
/** ---------------------------------------- */

add_filter( 'ehd_posts_num_per_page', function ( array $arr ) {
	$update_arr = [ 10, 15, 20 ];
	return array_merge( $arr, $update_arr );

}, 99, 1 );

/** ---------------------------------------- */

add_filter( 'ehd_post_type_terms', function ( array $arr ) {

	$update_arr = [
		'nguyenlieu'        => 'danhmuc_nguyenlieu',
		'dipnau'            => 'danhmuc_dipnau',
		'nuoccham'          => 'danhmuc_nuoccham',
		'gia-vi-ban-can'    => 'danh_muc_gia_vi_ban_can',
		'thong-tin-huu-ich' => 'danh-muc-thong-tin-huu-ich',
	];

	if ( class_exists( '\WooCommerce' ) ) {
		$update_arr = array_merge( $update_arr, [ 'product' => 'product_cat' ] );
	}

	return array_merge( $arr, $update_arr );
}, 99, 1 );

/** ---------------------------------------- */

add_filter( 'ehd_search_property', function ( array $arr ) {
	$update_arr = [
		'nguyenlieu'     => [ 'title' => 'Nguyên liệu', 'tax' => 'danhmuc_nguyenlieu' ],
		'cachnau'        => [ 'title' => 'Cách nấu', 'tax' => false ],
		'dipnau'         => [ 'title' => 'Dịp lễ', 'tax' => 'danhmuc_dipnau' ],
		'loaimon'        => [ 'title' => 'Món ăn', 'tax' => false ],
		'giadinh'        => [ 'title' => 'Gia đình', 'tax' => false ],
		'vungmien'       => [ 'title' => 'Vùng miền', 'tax' => false ],
		'dinhduong'      => [ 'title' => 'Dinh dưỡng', 'tax' => false ],
		'nuoccham'       => [ 'title' => 'Sốt/Nước chấm', 'tax' => 'danhmuc_nuoccham' ],
		'gia-vi-ban-can' => [ 'title' => 'Sản phẩm Ajinomoto', 'tax' => 'danh_muc_gia_vi_ban_can' ],
	];

	return array_merge( $arr, $update_arr );

}, 99, 1 );
