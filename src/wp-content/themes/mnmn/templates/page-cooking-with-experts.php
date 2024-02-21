<?php
/**
 * The template for displaying "Nấu ăn cùng chuyên gia"
 * Template Name: Cooking With Expert
 * Template Post Type: page
 */

use EHD_Cores\Helper;

\defined( 'ABSPATH' ) || die;

get_header( 'cooking-with-experts' );

global $post;

if (post_password_required()) :
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
endif;

if ( is_active_sidebar( 'ehd-top-page-sidebar' ) ) :
	dynamic_sidebar( 'ehd-top-page-sidebar' );
endif;

#
$ID = $post->ID ?? false;
$ACF = \get_fields( $ID ) ?? [];

if ( $ACF ) :

	$fl_cooking_with_experts = $ACF['fl_cooking-with-experts'] ?? [];

	foreach ( $fl_cooking_with_experts as $fl ) :

		$acf_fc_layout = $fl['acf_fc_layout'] ?? '';

		if ( 'danh_muc_thuc_don' == $acf_fc_layout ) :

			$danh_muc_title = $fl['danh_muc_title'] ?? '';
			$danh_muc_cat = $fl['danh_muc_cat'] ?? [];
?>
<div class="container flex flex-col gap-10 mb-20 cooking-with-experts">
	<?php if ( $danh_muc_title ) : ?>
	<h2 class="title sm:text-5xl"><?=$danh_muc_title?></h2>
	<?php endif; ?>

	<?php if ( $danh_muc_cat ) : ?>
	<div class="relative">

		<button class="btn btn-icon btn-primary btn-arrow btn-prev !hidden lg:!flex">
			<span class="icon icon-[fe--arrow-left]"></span>
		</button>

		<div class="nutrition-menus flex justify-between slider-5-responsive w-[175vw] md:w-auto translate-x-[-37.5vw] md:translate-x-0">
			<?php
			foreach ( $danh_muc_cat as $i => $cat_id ) :
				$r_cat = get_term_by( 'id', $cat_id, 'danhmuc_monan' );
			?>
			<a href="<?php echo get_term_link( $r_cat, 'danhmuc_monan' ); ?>" aria-label="<?=esc_attr( $r_cat->name )?>">
				<div class="nutrition-menus__item group flex flex-col justify-end mx-2 md:mx-5 py-2 px-3 gap-6 self-stretch bg-white rounded-2xl relative aspect-square border border-solid border-transparent hover:shadow-[0_4px_32px_0px_rgba(236,32,40,0.16)] hover:border-[#fbd0d2]">

					<?php echo Helper::acfTermThumb( $r_cat, 'term_thumb', 'medium', true, [ 'class' => 'object-cover rounded-[20px] aspect-square' ] ); ?>

					<h3 class="text-center text-sm capitalize sm:group-hover:text-[var(--Primary-02)] sm:group-hover:font-bold">
						<?php echo $r_cat->name; ?>
					</h3>
				</div>
			</a>
			<?php endforeach; ?>
		</div>

		<button class="btn btn-icon btn-primary btn-arrow btn-next !hidden lg:!flex">
			<span class="icon icon-[fe--arrow-right]"></span>
		</button>

	</div>
	<?php endif; ?>

</div>
<?php
		elseif ( 'thuc_don_post' == $acf_fc_layout ) :

			$thuc_don_title = $fl['thuc_don_title'] ?? '';
			$thuc_don_cat = $fl['thuc_don_cat'] ?? [];
			$thuc_don_post_number = $fl['thuc_don_post_number'] ?? 0;
			$thuc_don_link = $fl['thuc_don_link'] ?? [];

			$r = Helper::queryByTerms( $thuc_don_cat, 'category', 'post', false, $thuc_don_post_number );
			if ( $r ) :
?>
<div class="container flex flex-col gap-10 mb-20 px-1">

	<?php if ( $thuc_don_title ) : ?>
	<h2 class="title sm:text-5xl px-4 lg:px-0"><?=$thuc_don_title?></h2>
	<?php endif; ?>

	<div class="relative">

		<button class="btn btn-icon btn-primary btn-arrow btn-prev !hidden lg:!flex">
			<span class="icon icon-[fe--arrow-left]"></span>
		</button>

		<div class="cooking-with-experts__articles flex gap-10 justify-between slider-2-responsive">
			<?php
				$i = 0;
				// Load slides loop.
				while ( $r->have_posts() && $i < $thuc_don_post_number ) : $r->the_post();
					$post = get_post();

					if ( has_post_thumbnail() ) :

						$post_title = get_the_title( $post->ID );
						$post_title = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)', EHD_TEXT_DOMAIN );
			?>
			<div class="p-4 lg:p-5 rounded-2xl border-solid border-2 border-[var(--Gray-03)] bg-white">
				<div class="flex flex-col">
					<div class="relative">
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

	<?php if ( $thuc_don_link ) : ?>
    <div class="flex gap-12 justify-center">
        <?php echo Helper::ACF_Link( $thuc_don_link, 'btn btn-secondary', '', '<span class="icon icon-[fe--arrow-right]"></span>' ); ?>
    </div>
	<?php endif; ?>

</div>
<?php endif;
endif;
	endforeach;
endif;

get_footer( 'cooking-with-experts' );
