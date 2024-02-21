<?php

namespace EHD\Widgets;

use EHD_Cores\Abstract_Widget;
use EHD_Cores\Helper;

\defined( 'ABSPATH' ) || die;

class Latest_Recipe_Widget extends Abstract_Widget {
	public function __construct() {
		$this->widget_description = __( 'Latest recipes list.', EHD_TEXT_DOMAIN );
		$this->widget_name        = __( 'MNMN - Latest Recipe *', EHD_TEXT_DOMAIN );
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

		$chef_recommend = $ACF->chef_recommend ?? '';

		if ( $html_title ) {
			$title = $html_title;
		}

		ob_start();

		?>
		<div class="container flex flex-col px-4 mt-10 lg:mt-14<?=$css_class?>">

			<div class="flex flex-row justify-center items-center gap-2">
				<div class="w-[60px] h-[1px] bg-[var(--Primary-03)]"></div>
                <?php echo Helper::iconImage( $icon, 'thumbnail', [ 'class' => 'icon w-[32.5px]' ] ); ?>
				<div class="w-[60px] h-[1px] bg-[var(--Primary-03)]"></div>
			</div>

            <h2 class="title sm:text-5xl"><?=$title?></h2>

            <?php

            $query_args = [
	            'post_type'              => 'monan',
	            'post_status'            => 'publish',
	            'posts_per_page'         => $number,
	            //'update_post_meta_cache' => false,
	            //'update_post_term_cache' => false,
	            'no_found_rows'          => true,
	            'ignore_sticky_posts'    => true,
            ];

            $_query = new \WP_Query( $query_args );
		    if ( $_query->have_posts() ) :

            ?>
			<div class="relative has-[.slider]:-mx-4 group">
				<button class="btn btn-icon btn-primary btn-arrow btn-prev !hidden lg:!flex">
					<span class="icon icon-[fe--arrow-left]"></span>
				</button>

				<div class="flex lg:gap-8 justify-between slider slider-3 flex-wrap flex-col lg:flex-row">
			    <?php
                    $i = 0;
                    while ( $_query->have_posts() && $i < $number ) : $_query->the_post();
                        $post = get_post();

                        $i++;

                        if ( has_post_thumbnail() ) :

	                        $acf_post = $this->acfFields( $post->ID );
	                        $w_likes = ! empty( $acf_post->likes ) ? $acf_post->likes : 0;

	                        $w_people = ! empty( $acf_post->people ) ? $acf_post->people : 0;
	                        $w_level = $acf_post->level ?? 'Dễ';
	                        $w_preparation_time = ! empty( $acf_post->preparation_time ) ? $acf_post->preparation_time : 0;
	                        $w_time_cook = ! empty( $acf_post->time_cook ) ? $acf_post->time_cook : 0;

	                        $ratio_class = Helper::getAspectRatioClass( 'monan', '', 'ar-16-9' );
	                        $ratio_class = $ratio_class->class ? ' res ' . $ratio_class->class : '';

                    ?>
                    <div class="hidden lg:!flex flex-col mt-6 lg:mt-5 gap-5 w-full group-has-[.group-1]:lg:flex-row group-has-[.slider]:px-4 group-has-[.group-2]:flex-[0_1_calc(50%_-_20px)] group-has-[.group-3]:flex-[0_1_calc(33%_-_20px)] group-has-[.group-4]:flex-[0_1_calc(24%_-_20px)] group-has-[.group-1]:lg:border group-has-[.group-1]:lg:!p-5 group-has-[.group-1]:lg:rounded-2xl [&:nth-child(1)]:!flex [&:nth-child(2)]:!flex  pb-5 lg:pb-10">

                        <div class="relative rounded-2xl overflow-hidden group-has-[.group-1]:flex-[0_1_calc(50%_-_20px)]<?=$ratio_class?>">
							<?php echo get_the_post_thumbnail( $post->ID, 'medium', [ 'class' => 'w-full object-cover aspect-video group-has-[.group-4]:aspect-square' ] ); ?>
                            <?php if ( $chef_recommend ) echo wp_get_attachment_image( $chef_recommend, 'thumbnail', true, [ 'class' => 'absolute left-2 bottom-2' ] ); ?>
							<a href="#" data-tooltip-target="latest-<?=$i?>" data-tooltip-placement="top" class="absolute top-4 right-4 w-12 h-12 rounded-full border border-[var(--Gray-02)] bg-[var(--Gray-03)] flex items-center justify-center text-[var(--Gray-02)] hover:text-[var(--Primary-02)] hover:border-[var(--Primary-02)] hover:bg-[var(--Primary-03)] transition-all">
								<span class="icon-[ph--heart-fill] text-2xl"></span>
							</a>
						</div>
						<div id="latest-<?=$i?>" role="tooltip" class="absolute z-10 invisible inline-block px-2 py-1 text-sm font-medium text-white transition-opacity duration-300 bg-black/70 rounded-md opacity-0 tooltip">
							<?php echo __( 'Click vào đây để lưu công thức', EHD_TEXT_DOMAIN ); ?>
						</div>

						<div class="flex flex-col gap-3 w-full group-has-[.group-1]:lg:flex-[0_1_calc(50%_-_20px)]">
							<div class="flex gap-2 justify-between group-has-[.group-1]:lg:flex-col-reverse">
								<h3 class="md:text-xl font-bold"><?php echo get_the_title(); ?></h3>
								<div class="tag tag-small max-w-min">
									<?php echo number_format( $w_likes ); ?>
									<span class="icon icon-[ph--heart-fill]"></span>
								</div>
							</div>
							<div class="tags">
								<div class="tag">
									<span class="icon icon-[ph--users]"></span>
                                    <?php echo sprintf( __( '%1$s Người', EHD_TEXT_DOMAIN ), number_format( $w_people ) ); ?>
								</div>
								<div class="tag">
									<span class="icon icon-[ph--gauge]"></span>
									<?php echo $w_level; ?>
								</div>
                                <?php if ( $w_preparation_time ) : ?>
								<div class="tag">
									<span class="icon icon-[ph--timer]"></span>
									<?php echo sprintf( __( '%1$s Phút', EHD_TEXT_DOMAIN ), number_format( $w_preparation_time ) ); ?>
								</div>
                                <?php endif; ?>
	                            <?php if ( $w_time_cook ) : ?>
								<div class="tag">
									<span class="icon icon-[ph--cooking-pot]"></span>
									<?php echo sprintf( __( '%1$s Phút', EHD_TEXT_DOMAIN ), number_format( $w_time_cook ) ); ?>
								</div>
	                            <?php endif; ?>
							</div>
                            <?php echo Helper::loopExcerpt( $post, 'line-clamp-2 text-xs font-normal text-[var(--Gray-02)] leading-4 md:text-base md:leading-6' )?>
							<div>
								<a href="<?php the_permalink();?>" class="btn btn-primary btn-default flex-grow-0" title="<?php echo esc_attr__( 'Xem chi tiết', EHD_TEXT_DOMAIN ); ?>">
									<?php echo __( 'Xem chi tiết', EHD_TEXT_DOMAIN ); ?>
									<span class="icon icon-[ph--caret-right-bold]"></span>
								</a>
							</div>
						</div>
					</div>
                    <?php endif;
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
            <div class="flex justify-center mt-5 lg:mt-0">
                <?php echo Helper::ACF_Link( $button, 'btn btn-secondary btn-small', '', '<span class="icon icon-[fe--arrow-right]"></span>' ); ?>
            </div>
			<?php endif; ?>

		</div>
	    <?php
		echo $this->cache_widget( $args, ob_get_clean() ); // WPCS: XSS ok.
	}
}
