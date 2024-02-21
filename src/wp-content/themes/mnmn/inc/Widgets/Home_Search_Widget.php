<?php

namespace EHD\Widgets;

use EHD_Cores\Abstract_Widget;
use EHD_Cores\Helper;

\defined( 'ABSPATH' ) || die;

class Home_Search_Widget extends Abstract_Widget {
	public function __construct() {
		$this->widget_description = __( 'A search form for home page.', EHD_TEXT_DOMAIN );
		$this->widget_name        = __( 'MNMN - Search *', EHD_TEXT_DOMAIN );
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
		$banner_cat = $ACF->w_banner_cat ?? '';
		$search_title = $ACF->w_search_title ?? '';
		$placeholder_title = $ACF->w_placeholder_title ?? '';

        //...
		$slides_query = false;
		if ( $banner_cat ) {
			$term = get_term_by( 'id', $banner_cat, 'banner_cat' );
			if ( $term ) {
				$slides_query = Helper::queryByTerm( $term, 'banner', false, -1, [ 'menu_order' => 'DESC' ] );
			}
		}

		ob_start();

		?>
		<section id="banner" class="container mt-4 relatives z-20 px-4<?=$css_class?>">

            <?php if ( $slides_query ) : ?>
            <div class="banner-slider lg:rounded-xl overflow-hidden w-screen -ml-4 lg:ml-0 lg:w-full aspect-auto lg:aspect-[1280/320]">
				<?php
                // Load slides loop.
                while ( $slides_query->have_posts() ) : $slides_query->the_post();
	                $post = get_post();
	                if ( has_post_thumbnail() ) :

		                $ACF_banner = $this->acfFields( $post->ID );
		                $banner_url = $ACF_banner->banner_url ?? '';
		                $responsive_image = $ACF_banner->responsive_image ?? '';

		                $_video_class = '';
		                $video_url = $ACF_banner->video_url ?? '';
		                if ( $video_url ) :
			                $_video_class = ' has-video';
		                endif;

		                $_bg_class = '';
		                $bg_color = $ACF_banner->bg_color ?? '';
		                if ( $bg_color ) :
			                $_bg_class = ' style="background-color: ' . $bg_color . '"';
		                endif;
                ?>
                <div class="banner-slider__item relative<?= $_bg_class ?>">
					<picture class="w-full h-full object-cover<?=$_video_class?>">
						<source srcset="<?= Helper::postImageSrc( $post->ID, 'widescreen' ) ?>" media="(min-width: 1280px)">
                        <?php if ( $responsive_image ) : ?>
						<source srcset="<?= Helper::attachmentImageSrc( $responsive_image, 'post-thumbnail' ) ?>" media="(min-width: 0px)">
                        <?php else : ?>
                        <source srcset="<?= Helper::postImageSrc( $post->ID, 'post-thumbnail' ) ?>" media="(min-width: 0px)">
                        <?php endif; ?>
						<?php echo get_the_post_thumbnail( $post->ID, 'widescreen', [ 'class' => 'w-full h-full object-cover' ] ); ?>
					</picture>
	                <?php if ( $banner_url ) echo Helper::ACF_Link_Wrapper( '', $banner_url, 'link-overlay' ); ?>
	                <?php if ( $video_url ) echo Helper::ACF_Link_Wrapper( '', $video_url, 'link-overlay fcy-video' ); ?>
				</div>
                <?php endif;
                endwhile;
				wp_reset_postdata();
                ?>
			</div>
            <?php endif; ?>

            <div id="search" class="searchform p-3 rounded-xl bg-white m-auto relative flex flex-col items-center gap-4 mb-10 group">
                <?php if ( $search_title ) : ?>
                <h2 class="lobster text-2xl"><?=$search_title?></h2>
                <?php endif; ?>

                <form role="search" class="w-full flex gap-4 items-center justify-between" action="<?php echo Helper::home(); ?>">
                    <input type="hidden" name="post_type" value="monan">
                    <label for="searchinput" class="sr-only">Search</label>

                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                            <span class="icon-[ph--magnifying-glass] text-[var(--Gray-02)] text-xl"></span>
                        </div>

                        <input name="s" type="text" id="searchinput" class="text-[var(--Gray-02)] text-base border-none rounded-lg block w-full ps-12 pe-14 p-2 bg-[var(--Gray-03)] hover:ring-1 hover:ring-[var(--Primary-03)] focus:ring-1 focus:ring-[var(--Primary-02)] focus:ring-offset-0 focus:ring-offset-transparent focus:outline-none group-has-[.advanced]:ring-1 group-has-[.advanced]:ring-[var(--Primary-02)]" placeholder="<?php echo esc_attr( $placeholder_title ); ?>">
                        <button type="button" class="advanced-btn absolute inset-y-2 end-2 flex items-center p-2 border-l border-gray-300 group-has-[.advanced]:border-none group-has-[.advanced]:rounded-md group-has-[.advanced]:bg-[var(--Primary-03)]">
                            <span class="icon-[ph--sliders-fill] text-[var(--Primary-02)] group-has-[.advanced]:hidden"></span>
                            <span class="icon-[ph--x-bold] text-[var(--Primary-02)] hidden group-has-[.advanced]:inline-flex"></span>
                        </button>

                        <div id="accordion-advanced-search" data-active-classes="bg-white text-[var(--Primary-02)]" data-inactive-classes="text-[var(--Gray-01)]" class="advanced-search visible opacity-0 transition-all fixed h-screen lg:h-auto lg:absolute inset-x-0 top-0 lg:top-16 bg-white rounded-2xl p-4 pr-0 z-10 pointer-events-none group-has-[.advanced]:opacity-100 group-has-[.advanced]:pointer-events-auto">
                            <div class="flex justify-end px-3 lg:hidden">
                                <button type="button" class="advanced-btn flex items-center p-2">
                                    <span class="icon-[ph--x] text-xl"></span>
                                </button>
                            </div>
                            <div class="advanced-search-inner flex flex-col gap-4 max-h-[calc(100vh_-_66px)] lg:max-h-[45vh] scrollbox pr-2 mr-2">

                                <?php
                                $ehd_search_property_arr = apply_filters( 'ehd_search_property', [] );
                                foreach ( $ehd_search_property_arr as $prop => $pro_arr ) :
	                                $args = [
		                                'type'     => $prop,
		                                //'orderby'  => 'date, name',
		                                //'order'    => 'ASC',
		                                'taxonomy' => $pro_arr['tax'],
	                                ];

	                                $categories = get_categories( $args );

	                                ?>
                                <div class="advanced-group p-4 pb-0 border border-[var(--Gray-03)] rounded-lg" id="accordion-flush-<?=$prop?>">
                                    <h2 id="accordion-flush-heading-<?=$prop?>">
                                        <button type="button" class="flex items-center justify-between w-full gap-3 font-bold pb-4" data-accordion-target="#accordion-flush-body-<?=$prop?>" aria-expanded="true" aria-controls="accordion-flush-body-<?=$prop?>">
                                            <span><?=$pro_arr['title']?></span>
                                            <span class="advanced-count rounded-3xl text-xs bg-[var(--Primary-02)] py-0.5 px-2 text-white ml-auto hidden">0</span>
                                            <span class="icon icon-[ph--caret-down-fill] transition-all shrink-0"></span>
                                        </button>
                                    </h2>

                                    <div id="accordion-flush-body-<?=$prop?>" class="hidden transition-all border-t border-[var(--Gray-03)] text-[var(--Gray-01)] pb-4" aria-labelledby="accordion-flush-heading-<?=$prop?>">

                                        <?php
                                        if ( $categories ) :
                                            foreach ( $categories as $cat ) :

                                                $acf_cat = \get_fields( $cat );
	                                            $hide_search_filter = $acf_cat['hide_search_filter'] ?? false;
                                                if ( ! $hide_search_filter ) :

                                                $posts_query = Helper::queryByTerm( $cat, $prop, false, -1, [ 'menu_order' => 'ASC', 'date' => 'ASC' ] );
                                                if ( $posts_query ) :
                                        ?>
                                        <h3 class="font-bold py-4"><?php echo $cat->name?></h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <?php
                                                    while ( $posts_query->have_posts() ) : $posts_query->the_post();
	                                                    $post = get_post();
                                            ?>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="<?=esc_attr( $post->post_name )?>" name="<?=esc_attr( $prop )?>" class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> <?=$post->post_title?></span>
                                            </label>
                                            <?php endwhile;
                                            wp_reset_postdata();
                                            ?>
                                        </div>
                                        <?php endif; endif; endforeach; else :

	                                        $args = [
		                                        'post_type'      => $prop,
		                                        'post_status'    => 'publish',
		                                        'posts_per_page' => -1,
		                                        //'orderby'        => 'menu_order',
		                                        //'order'          => 'ASC',
	                                        ];

	                                        $posts_query = new \WP_Query( $args );
	                                        if ( $posts_query->have_posts() ) :
                                        ?>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none pt-4">
                                            <?php
		                                        while ( $posts_query->have_posts() ) : $posts_query->the_post();
			                                        $post = get_post();
                                            ?>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="<?=esc_attr( $post->post_name )?>" name="<?=esc_attr( $prop )?>" class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> <?=$post->post_title?></span>
                                            </label>
                                            <?php endwhile;
                                            wp_reset_postdata();
                                            ?>
                                        </div>
                                        <?php endif; endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-search">
                        <span class="w-8 h-8 aspect-square"></span>
                    </button>
                </form>
            </div>
		</section>
		<?php

		echo $this->cache_widget( $args, ob_get_clean() ); // WPCS: XSS ok.
	}
}
