<?php

namespace EHD_Widgets;

use EHD_Cores\Abstract_Widget;
use EHD_Cores\Helper;

\defined( 'ABSPATH' ) || die;

class Search_Widget extends Abstract_Widget {
	public function __construct() {
		$this->widget_description = __( 'A search form for your site.', EHD_PLUGIN_TEXT_DOMAIN );
		$this->widget_name        = __( 'Search *', EHD_PLUGIN_TEXT_DOMAIN );
		$this->settings           = [
			'title' => [
				'type'  => 'text',
				'std'   => __( 'Search' ),
				'label' => __( 'Title' ),
			]
		];

		parent::__construct();
	}

	/**
	 * Creating widget Front-End
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		if ( $this->get_cached_widget( $args ) ) {
			return;
		}

		$ACF = $this->acfFields( 'widget_' . $args['widget_id'] );

		$css_class = ! empty( $ACF->css_class ) ? ' ' . sanitize_title( $ACF->css_class ) : '';
		$title = $this->get_instance_title( $instance );

		$shortcode_content = Helper::doShortcode(
			'inline_search',
			apply_filters(
				'inline_search_widget_shortcode_args',
				[
					'title' => $title,
					'class' => $this->widget_classname . $css_class,
					'id'    => '',
				]
			)
		);

		echo $this->cache_widget( $args, $shortcode_content ); // WPCS: XSS ok.
	}
}