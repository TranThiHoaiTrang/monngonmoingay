<?php

namespace EHD\Widgets;

use EHD_Cores\Abstract_Widget;
use EHD_Cores\Helper;

\defined( 'ABSPATH' ) || die;

class Filter_Post_Widget extends Abstract_Widget {
	public function __construct() {
		$this->widget_description = __( 'Filter posts list.', EHD_TEXT_DOMAIN );
		$this->widget_name        = __( 'MNMN - Filter Post *', EHD_TEXT_DOMAIN );
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
		$icon = $ACF->w_icon ?? '';
		$html_title = $ACF->w_html_title ?? '';
		$number = ! empty( $ACF->w_number ) ? $ACF->w_number : 0;
		$button = $ACF->w_button ?? '';

        $danh_muc = $ACF->w_danh_muc ?? [];

		if ( $html_title ) {
			$title = $html_title;
		}

		ob_start();

		?>
		<div class="container flex flex-col my-10 lg:my-14<?=$css_class?>">
			<div class="flex flex-row justify-center items-center gap-2">
				<div class="w-[60px] h-[1px] bg-[var(--Primary-03)]"></div>
				<?php echo Helper::iconImage( $icon, 'thumbnail', [ 'class' => 'icon w-[32.5px]' ] ); ?>
				<div class="w-[60px] h-[1px] bg-[var(--Primary-03)]"></div>
			</div>

			<h2 class="title sm:text-5xl"><?=$title?></h2>

            <?php

            $r = Helper::queryByTerms( $danh_muc, 'danh-muc-thong-tin-huu-ich', 'thong-tin-huu-ich', true, $number );
			if ( $r ) :

            ?>
			<div class="relative mt-5">
				<button class="btn btn-icon btn-primary btn-arrow btn-prev !hidden lg:!flex">
					<span class="icon icon-[fe--arrow-left]"></span>
				</button>

				<div class="meal-tips flex gap-10 justify-between slider-3-responsive">
					<?php
					$i = 0;
					// Load slides loop.
					while ( $r->have_posts() && $i < $number ) : $r->the_post();
						$post = get_post();

						if ( has_post_thumbnail() ) :

							$post_title     = get_the_title( $post->ID );
							$post_title          = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)', EHD_TEXT_DOMAIN );

                            $ratio_class = Helper::getAspectRatioClass( 'thong-tin-huu-ich', '', 'ar-20-13' );
							$ratio_class = $ratio_class->class ? ' res ' . $ratio_class->class : '';
                    ?>
					<div class="p-4 lg:p-5 rounded-2xl border-solid border-2 border-[var(--Gray-03)] bg-white">
						<div class="flex flex-col">
							<div class="relative<?=$ratio_class?>">
								<?php echo get_the_post_thumbnail( $post, 'medium', [ 'class' => 'rounded-2xl object-cover h-[190px] w-full' ] )?>
							</div>
							<div class="mb-6 mt-3 gap-2 flex flex-col">
								<div class="tag font-bold w-fit">
                                    <?php

                                    $term = Helper::primaryTerm( $post );
                                    if ( $term ) echo '<span>' . $term->name . '</span>';

                                    ?>
								</div>
								<div class="flex gap-2 justify-between">
									<h3 class="lg:text-xl font-bold"><?php echo $post_title; ?></h3>
								</div>

								<?php echo Helper::loopExcerpt( $post, 'line-clamp-2 text-xs font-normal text-[var(--Gray-02)] leading-4 md:text-base md:leading-6' ); ?>

							</div>
							<div>
								<a href="<?php the_permalink();?>" class="btn btn-primary btn-default flex-grow-0" title="<?php echo esc_attr__( 'TIẾP TỤC ĐỌC', EHD_TEXT_DOMAIN )?>">
									<span><?php echo __( 'TIẾP TỤC ĐỌC', EHD_TEXT_DOMAIN )?></span>
									<span class="icon icon-[ph--caret-right-bold]"></span>
								</a>
							</div>
						</div>
					</div>
                    <?php endif; endwhile;
					wp_reset_postdata();
                    ?>

				</div>

				<button class="btn btn-icon btn-primary btn-arrow btn-next !hidden lg:!flex">
					<span class="icon icon-[fe--arrow-right]"></span>
				</button>
			</div>
            <?php endif; ?>

			<?php if ( $button ) : ?>
			<div class="flex justify-center mt-10">
				<?php echo Helper::ACF_Link( $button, 'btn btn-secondary btn-small', '', '<span class="icon icon-[fe--arrow-right]"></span>' ); ?>
			</div>
			<?php endif; ?>

		</div>
		<?php
		echo $this->cache_widget( $args, ob_get_clean() ); // WPCS: XSS ok.
	}
}
