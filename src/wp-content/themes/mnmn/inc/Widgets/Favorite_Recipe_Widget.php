<?php

namespace EHD\Widgets;

use EHD_Cores\Abstract_Widget;
use EHD_Cores\Helper;

\defined( 'ABSPATH' ) || die;

class Favorite_Recipe_Widget extends Abstract_Widget {
	public function __construct() {
		$this->widget_description = __( 'Favorite recipes list.', EHD_TEXT_DOMAIN );
		$this->widget_name        = __( 'MNMN - Favorite Recipe *', EHD_TEXT_DOMAIN );
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

		if ( $html_title ) {
			$title = $html_title;
		}

		ob_start();

		?>
		<div class="container flex flex-col<?=$css_class?>" id="favoriteMeals">
			<div class="flex flex-row justify-center items-center gap-2">
				<div class="w-[60px] h-[1px] bg-[var(--Primary-03)]"></div>
				<?php echo Helper::iconImage( $icon, 'thumbnail', [ 'class' => 'icon w-[24px]' ] ); ?>
				<div class="w-[60px] h-[1px] bg-[var(--Primary-03)]"></div>
			</div>

			<h2 class="title sm:text-5xl"><?=$title?></h2>

            <?php

            $args = [
	            'post_status'         => 'publish',
	            'posts_per_page'      => $number,
	            'post_type'           => 'monan',
	            'meta_key'            => 'likes',
	            'orderby'             => 'meta_value_num',
	            'order'               => 'DESC',
	            //'update_post_meta_cache' => false,
	            //'update_post_term_cache' => false,
	            'no_found_rows'       => true,
	            'ignore_sticky_posts' => true,
            ];

            $_query = new \WP_Query( $args );
		    if ( $_query->have_posts() ) :

            ?>
            <div class="relative favorite-meal">
				<button class="btn btn-icon btn-primary btn-arrow btn-prev !hidden lg:!flex">
					<span class="icon icon-[fe--arrow-left]"></span>
				</button>

				<div class="flex mt-10 gap-12 justify-between slider-7-responsive">
                    <?php
                    $i = 0;
                    while ( $_query->have_posts() && $i < $number ) : $_query->the_post();
                        $post = get_post();

                        if ( has_post_thumbnail() ) :

	                        $post_title     = get_the_title( $post->ID );
	                        $post_title          = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)', EHD_TEXT_DOMAIN );

                            $acf_post = $this->acfFields( $post->ID );
                            $w_likes = ! empty( $acf_post->likes ) ? $acf_post->likes : 0;
                    ?>
					<a href="<?php the_permalink();?>" title="<?=esc_attr( $post_title )?>">
						<div class="w-full flex flex-col justify-end gap-4 p-3 flex-shrink-0 transition-all duration-200 ease-in-out hover:scale-110">
							<div class="relative px-3 -mb-9 z-10">
								<?php echo get_the_post_thumbnail( $post->ID, 'medium', [ 'class' => 'object-cover sm:aspect-square rounded-xl w-full max-sm:h-[130px]' ] ); ?>
								<div class="absolute tag tag-small max-w-min top-2 right-5 !bg-[var(--Gray-04)]">
									<?php echo number_format( $w_likes ); ?>
									<span class="icon icon-[ph--heart-fill]"></span>
								</div>
							</div>
							<div class="flex items-center justify-center text-center text-sm font-bold capitalize border-solid rounded-xl border-[0.5px] border-[var(--Primary-03)] px-2 pt-6 pb-2 h-20">
								<h3><?php echo $post_title; ?></h3>
							</div>
						</div>
					</a>
                    <?php endif;
	                    ++ $i;
                    endwhile;
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
