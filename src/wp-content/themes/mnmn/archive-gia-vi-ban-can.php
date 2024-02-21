<?php

use EHD_Cores\Helper;

\defined( 'ABSPATH' ) || die;

get_header();

if ( is_active_sidebar( 'ehd-top-page-sidebar' ) ) :
	dynamic_sidebar( 'ehd-top-page-sidebar' );
endif;

?>
<div class="container mb-10 md:mb-20 relative px-4 lg:px-0">

	<h2 class="title sm:text-5xl"><?php echo __( 'Sản <strong>Phẩm</strong>', EHD_TEXT_DOMAIN ); ?></h2>

	<div class="flex mt-10 gap-12 justify-between">
		<ul class="tabs">

			<li class="tab tab-active">
				<a href="<?php echo get_post_type_archive_link( 'gia-vi-ban-can' ); ?>"><?php echo __( 'Tất Cả', EHD_TEXT_DOMAIN )?></a>
			</li>

            <?php
            $args = [
	            'type'     => 'gia-vi-ban-can',
	            'taxonomy' => 'danh_muc_gia_vi_ban_can',
	            'hide_empty' => false,
	            'no_found_rows'          => true,
            ];

            $categories = get_categories( $args );
            if ( $categories ) :
                foreach ( $categories as $cat ) :
	                $acf_cat = \get_fields( $cat );

                    $term_thumb = $acf_cat['term_thumb'] ?? '';
                    $html_icon = $acf_cat['html_icon'] ?? '';
                    $hide_title = $acf_cat['hide_title'] ?? false;
	                $show_archive_page = $acf_cat['show_archive_page'] ?? false;

	                if ( $show_archive_page ) :

                        $li_class = 'tab';
                        if ( $hide_title ) $li_class = 'flex items-center p-1';
            ?>
			<li class="<?=$li_class?>">
				<a href="<?php echo get_term_link( $cat, 'danh_muc_gia_vi_ban_can' ); ?>" aria-label="<?=esc_attr( $cat->name ) ?>">
                    <?php if ( $html_icon ) echo '<span class="icon icon-[ph--timer-fill]"></span>'; ?>
                    <?php
                    if ( $term_thumb ) :
                        if ( ! $hide_title ) echo wp_get_attachment_image( $term_thumb, 'thumbnail', true, [ 'class' => 'icon' ] );
                        else echo wp_get_attachment_image( $term_thumb, 'thumbnail', false, [ 'class' => 'mh-42' ] );
                    endif;

                    if ( ! $hide_title ) echo $cat->name;

                    ?>
                </a>
			</li>
            <?php endif; endforeach; endif; ?>

		</ul>
	</div>

    <?php if ( have_posts() ) : ?>
	<div class="seasoning_shelf flex flex-wrap justify-between items-center gap-x-4 gap-14 pt-14 lg:gap-y-40 lg:pb-20 lg:pt-40">

        <?php while (have_posts()) :
            the_post();

	        $post_title     = get_the_title( $post->ID );
	        $post_title          = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)', EHD_TEXT_DOMAIN );
        ?>
        <div class="seasoning_shelf--item items-center flex flex-col gap-6 sm:gap-8 w-1/2 lg:w-1/4">
            <?php echo get_the_post_thumbnail(null, 'medium', [ 'class' => 'aspect-square object-contain mh-218 mw-218' ] ); ?>
			<div class="flex flex-col gap-2 py-2 px-2 sm:px-4 sm:py-3 w-full">
				<h6 class="text-[var(--Gray-01)] text-sm leading-2 md:leading-4 text-center font-bold"><?php echo $post_title; ?></h6>

				<?php echo Helper::loopExcerpt( $post, 'text-xs md:text-sm font-normal text-center text-[var(--Gray-02)] leading-5 line-clamp-2' ); ?>

				<a href="#" class="btn btn-primary btn-default btn-sx !w-fit m-auto" title="<?php echo esc_attr__( 'Công thức', EHD_TEXT_DOMAIN )?>">
					<span><?php echo __( 'Công thức', EHD_TEXT_DOMAIN )?></span>
					<span class="icon icon-[fe--arrow-right]"></span>
				</a>
			</div>
		</div>
        <?php endwhile;
        wp_reset_postdata();
        ?>

	</div>
    <?php endif; ?>

    <?php
    $args = [
	    'post_type' => 'gia-vi-ban-can'
    ];

    $the_query      = new WP_Query( $args );
    $count_posts    = $the_query->found_posts;
    $posts_per_page = get_option( 'posts_per_page' );
//    dump($count_posts);
    $ehd_posts_num_per_page_arr = apply_filters( 'ehd_posts_num_per_page', [] );
    $page = get_query_var( 'paged' );
    $pagenum = 0;

    if ( isset( $_GET['pagenum'] ) ) {
	    $pagenum = esc_sql( $_GET['pagenum'] );

	    if ( in_array( $pagenum, $ehd_posts_num_per_page_arr ) ) {
		    $posts_per_page = $pagenum;
	    }
    }

    $col_post = ceil( $count_posts / $posts_per_page );

    if ( $col_post > 1 ) :

    ?>
	<div class="seasoning_master_pagination hidden sm:flex flex-wrap gap-4 justify-between">
		<div class="left flex gap-2 items-center">
            <select class="select_col_post flex gap-1 h-8 items-center px-3 py-1 rounded-sm outline outline-[var(--Neutral-05)] ring-0 outline-0 border-[var(--Neutral-05)]" title>
				<?php
                foreach ( $ehd_posts_num_per_page_arr as $posts_num_per_page ) :
	                $selected = '';
	                if ( $pagenum == $posts_num_per_page ) $selected = ' selected';
                ?>
                <option<?=$selected?> value="<?= $posts_num_per_page ?>" class="text-sm text-[var(--Gray-01)] font-normal" >
                    <?= $posts_num_per_page ?> / <?php echo __( 'trang', EHD_TEXT_DOMAIN );?>
                </option>
				<?php endforeach; ?>
            </select>
            <div class="text-sm text-[var(--Gray-01)] font-normal">Go to</div>
            <input type="number" data-url="<?=Helper::current( true, true )?>" min="1" max="<?= $col_post ?>" value="<?= $page >= 1 ? $page : '1' ?>" class="input_col_post w-[50px] px-3 h-7 text-sm text-[var(--Gray-01)] text-center font-normal rounded-sm outline outline-[var(--Neutral-05)]" title>
		</div>
        <div class="right">
			<?= ehd_pagination_links() ?>
        </div>
	</div>
    <?php endif; ?>

</div>
<?php

get_footer();
