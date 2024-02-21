<?php

namespace EHD\Widgets;

use EHD_Cores\Abstract_Widget;
use EHD_Cores\Helper;
use EHD_Libs\CSS;

\defined( 'ABSPATH' ) || die;

class Sign_Up_Banner_Widget extends Abstract_Widget {
	public function __construct() {
		$this->widget_description = __( 'Sign up banner', EHD_TEXT_DOMAIN );
		$this->widget_name        = __( 'MNMN - Sign Up Banner *', EHD_TEXT_DOMAIN );
		$this->settings           = [
			'title' => [
				'type'  => 'text',
				'std'   => '',
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

		$title = $this->get_instance_title( $instance );

		// ACF fields
		$ACF = $this->acfFields( 'widget_' . $args['widget_id'] );

		$css_class = ! empty( $ACF->css_class ) ? ' ' . sanitize_title( $ACF->css_class ) : '';
        $background_image = $ACF->background_image ?? '';
        $sign_up_button = $ACF->sign_up_button ?? [];

        $custom_style = '';
        if ( $background_image ) {
            $bg_url = Helper::attachmentImageSrc( $background_image, 'widescreen' );
	        $custom_style = " style=\"background-image: url('" . $bg_url . "')\"";
        }

		ob_start();

		?>
		<div class="news-letter py-5 px-2<?=$css_class?>"<?=$custom_style?>>
			<div class="container flex justify-center items-center gap-14">
				<h2 class="text-white italic text-center font-extrabold uppercase condensed"><?=$title?></h2>

                <?php
                if ( $sign_up_button ) :
	                $_link_title = $sign_up_button['title'] ?? '';
	                $_link_url = $sign_up_button['url'] ?? '#';
	                $_link_target = $sign_up_button['target'] ?? '';

	                if ( ! empty( $_link_target ) ) {
		                $_link_target = ' target="_blank"';
	                }
                ?>
                <a<?=$_link_target?> href="<?=$_link_url?>" class="relative z-0 after:block after:absolute after:top-1 after:left-1 after:rounded-lg after:bg-[var(--Primary-03)] after:content-['_'] after:w-full after:h-full after:-z-10">
					<div class="flex items-center gap-3 relative z-0 py-4 px-8 bg-white rounded-lg">
						<span class="text-sm font-bold uppercase"><?=$_link_title?></span>
						<span class="icon-[ph--sign-in] text-2xl"></span>
					</div>
				</a>
                <?php endif; ?>
			</div>
		</div>
		<?php
		echo $this->cache_widget( $args, ob_get_clean() ); // WPCS: XSS ok.
	}
}
