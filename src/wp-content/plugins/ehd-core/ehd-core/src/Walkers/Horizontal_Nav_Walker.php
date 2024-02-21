<?php

namespace EHD_Walkers;

use stdClass;
use Walker_Nav_Menu;

\defined( 'ABSPATH' ) || die;

if ( ! class_exists( 'Horizontal_Nav_Walker' ) ) {
	class Horizontal_Nav_Walker extends Walker_Nav_Menu {
		/**
		 * @param string $output
		 * @param int $depth
		 * @param stdClass $args An object of wp_nav_menu() arguments.
		 */
		function start_lvl( &$output, $depth = 0, $args = null ): void {
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			$indent = str_repeat( $t, $depth );

			// Default class.
			$classes = [ 'w-[230px] p-3 lg:p-4 bg-white rounded-lg border border-[var(--Gray-03)]' ];

			/**
			 * Filters the CSS class(es) applied to a menu list element.
			 *
			 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
			 * @param stdClass $args An object of `wp_nav_menu()` arguments.
			 * @param int $depth Depth of menu item. Used for padding.
			 *
			 * @since 4.8.0
			 *
			 */
			$class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$wrap_tag = '<div class="relative lg:absolute top-full left-0 group-hover:pt-2 pl-2 opacity-0 transition-all pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto group-hover:h-auto h-0 group-hover:scale-y-100 lg:h-auto transform scale-y-0 lg:scale-1 origin-top">';

			$output .= "{$n}{$indent}{$wrap_tag}<ul$class_names>{$n}";
		}

		/**
		 * Ends the list of after the elements are added.
		 *
		 * @since 3.0.0
		 *
		 * @see Walker::end_lvl()
		 *
		 * @param string   $output Used to append additional content (passed by reference).
		 * @param int      $depth  Depth of menu item. Used for padding.
		 * @param stdClass $args   An object of wp_nav_menu() arguments.
		 */
		public function end_lvl( &$output, $depth = 0, $args = null ): void {
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			$indent  = str_repeat( $t, $depth );
			$output .= "$indent</ul></div>{$n}";
		}
	}
}
