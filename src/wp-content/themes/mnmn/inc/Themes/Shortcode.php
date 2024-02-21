<?php

namespace EHD\Themes;

use EHD_Cores\Helper;

\defined( 'ABSPATH' ) || die;

final class Shortcode {
	/**
	 * @return void
	 */
	public static function init(): void {
		$shortcodes = [
			'main_nav' => __CLASS__ . '::main_nav',
		];

		foreach ( $shortcodes as $shortcode => $function ) {
			add_shortcode( apply_filters( "{$shortcode}_shortcode_tag", $shortcode ), $function );
		}
	}

	// ------------------------------------------------------

	/**
	 * @param array $atts
	 *
	 * @return string
	 */
	public static function main_nav( array $atts = [] ): string {
		$atts = shortcode_atts(
			[
				'location' => 'main-nav',
				'class'    => 'flex items-start lg:items-center flex-col lg:flex-row gap-1 lg:gap-0',
				'id'       => esc_attr( uniqid( 'menu-' ) ),
				'depth'    => 4,
				'items_wrap' => '<ul role="menubar" id="%1$s" class="%2$s">%3$s</ul>',
			],
			$atts,
			'main_nav'
		);

		$location = $atts['location'] ?: 'main-nav';
		$class    = $atts['class'] ?: '';
		$depth    = $atts['depth'] ? absint( $atts['depth'] ) : 1;
		$id       = $atts['id'] ?: esc_attr( uniqid( 'menu-' ) );
		$items_wrap = $atts['items_wrap'] ?: '<ul role="menubar" id="%1$s" class="%2$s">%3$s</ul>';

		return Helper::horizontalNav( [
			'menu_id'        => $id,
			'menu_class'     => $class,
			'theme_location' => $location,
			'depth'          => $depth,
			'items_wrap' => $items_wrap,
			'echo'           => false,
		] );
	}

	// ------------------------------------------------------



	// ------------------------------------------------------

}
