<?php

use EHD_Cores\Helper;

\defined( 'ABSPATH' ) || die;

get_header();

if ( is_active_sidebar( 'ehd-top-page-sidebar' ) ) :
	dynamic_sidebar( 'ehd-top-page-sidebar' );
endif;

?>
    <div class="container recipe-filter-form">
        <form action="<?php echo get_post_type_archive_link( 'recipes' ); ?>">
            <div class="flex flex-col ">
                <h2 class="title !text-5xl">Danh mục thực đơn</h2>

                <div class="flex mt-10 gap-12 justify-between">
					<?php
					if ( is_active_sidebar( 'ehd-menu-page-monan' ) ) :
						dynamic_sidebar( 'ehd-menu-page-monan' );
					endif;
					?>
                    <div class="tabs">
						<?php if ( empty( $_GET['thucdon'] ) ) { ?>
                            <li class="tab">
                                <a href="#" class="advanced-btn"><span
                                            class="icon icon-[ph--funnel-fill] !text-[var(--Gray-01)]"></span>Show
                                    Filter:
                                    <strong>0</strong></a>
                            </li>
						<?php } ?>
                        <li class="tab" id="sort-toggle">
                          <span data-dropdown-toggle="dropdown-sort" data-dropdown-placement="bottom-end">Sort: <span>Phổ
                              Biến</span></span>
                        </li>
                    </div>
                </div>
                <div id="dropdown-sort" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-[var(--Primary-03)]" data-sort="popular">Phổ
                                Biến</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-[var(--Primary-03)]" data-sort="newest">Mới
                                Nhất</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-[var(--Primary-03)]" data-sort="oldest">Cũ
                                Nhất</a>
                        </li>
                    </ul>
                </div>

				<?php if ( ! empty( $_GET['thucdon'] ) && $_GET['thucdon'] == 'nhucau_dinhduong' ) {
					$args = [
						'post_type' => 'dinhduong'
					];

					$the_query_dd = new WP_Query( $args );
					?>
                    <ul class="tabs tabs-pill tabs-small advanced-search  !shadow-none border-t border-[var(--Gray-06)] pt-4 mt-4 !gap-2">
						<?php
						while ( $the_query_dd->have_posts() ) : $the_query_dd->the_post();
							$post = get_post();
							?>
                            <li class="tab">
                                <a data-dinh-duong="<?= esc_attr( $post->post_name ) ?>">
									<?= $post->post_title ?>
                                </a>
                            </li>
						<?php endwhile;
						wp_reset_postdata();
						?>
                    </ul>
				<?php } ?>
                <ul class="tabs tabs-pill tabs-small advanced-search  !shadow-none border-t border-[var(--Gray-06)] pt-4 mt-4 !gap-2 !hidden">
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
                        <li class="advanced-group tab" data-dropdown-pos="bottom-start">
                          <span id="dropdown-button-<?= $prop ?>" class="dropdown-btn">
                            <?= $pro_arr['title'] ?>
                            <span
                                    class="advanced-count rounded-3xl text-xs bg-[var(--Primary-02)] py-0.5 px-2 text-white ml-auto hidden"></span>
                            <span class="icon icon-[ph--caret-down-fill] transition-all shrink-0 hidden"></span></span>
                            <div id="dropdown-hover-<?= $prop ?>"
                                 class="dropdown hidden bg-white text-[var(--Gray-01)] pb-4 shadow-[0px_8px_24px_0px_rgba(0,0,0,0.16)] z-10 p-4 rounded-lg"
                                 style="width: 453px">
								<?php
								if ( $categories ) :
									foreach ( $categories as $cat ) :

										$acf_cat = \get_fields( $cat );
										$hide_search_filter = $acf_cat['hide_search_filter'] ?? false;
										if ( ! $hide_search_filter ) :

											$posts_query = Helper::queryByTerm( $cat, $prop, false, - 1, [
												'menu_order' => 'ASC',
												'date'       => 'ASC'
											] );
											if ( $posts_query ) :
												?>
                                                <h3 class="font-bold py-2 mt-2 border-t border-[var(--Gray-03)] text-sm"><?php echo $cat->name ?></h3>
                                                <div class="flex flex-wrap justify-start font-normal">
													<?php
													while ( $posts_query->have_posts() ) : $posts_query->the_post();
														$post = get_post();
														?>
                                                        <label class="flex items-center gap-2 flex-[0_1_max(70px,25%)] cursor-pointer text-xs lg:text-sm py-1">
                                                            <input type="checkbox"
                                                                   value="<?= esc_attr( $post->post_name ) ?>"
                                                                   name="<?= esc_attr( $prop ) ?>"
                                                                   class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                            <span class="pr-2 block text-nowrap"> <?= $post->post_title ?></span>
                                                        </label>
													<?php endwhile;
													wp_reset_postdata();
													?>
                                                </div>
											<?php endif; endif; endforeach;
								else :

									$args = [
										'post_type'      => $prop,
										'post_status'    => 'publish',
										'posts_per_page' => - 1,
										//'orderby'        => 'menu_order',
										//'order'          => 'ASC',
									];

									$posts_query = new \WP_Query( $args );
									if ( $posts_query->have_posts() ) :
										?>
                                        <div class="flex flex-wrap justify-start font-normal">
											<?php
											while ( $posts_query->have_posts() ) : $posts_query->the_post();
												$post = get_post();
												?>
                                                <label class="flex items-center gap-2 flex-[0_1_max(70px,25%)] cursor-pointer text-xs lg:text-sm py-1">
                                                    <input type="checkbox"
                                                           value="<?= esc_attr( $post->post_name ) ?>"
                                                           name="<?= esc_attr( $prop ) ?>"
                                                           class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                    <span class="pr-2 block text-nowrap"> <?= $post->post_title ?></span>
                                                </label>
											<?php endwhile;
											wp_reset_postdata();
											?>
                                        </div>
									<?php endif; endif; ?>
                                <div class="flex justify-center">
                                    <button class="btn btn-primary mt-4 btn-submit">Tìm công thức</button>
                                </div>
                            </div>
                        </li>

					<?php endforeach; ?>
                </ul>

            </div>
        </form>
		<?php
		if ( ! empty( $_GET['thucdon'] ) && $_GET['thucdon'] == 'nhucau_dinhduong' ) {
			$args = [
				'post_type'  => 'monan',
				'meta_query' => [
					[
						'key'     => 'dinhduong  ', // Tên trường tùy chỉnh
						'value'   => '', // Giá trị không được trống
						'compare' => '!=', // So sánh không trống
					],
				],
			];
		} else {
			$args = [
				'post_type' => 'monan',
			];
		}

		$the_query   = new WP_Query( $args );
		$count_posts = $the_query->found_posts;
		?>
        <div class="text-center mt-8 mb-2">The results of <strong class="text-[var(--Primary-02)]">
				<?= $count_posts ?> recipe</strong> are displayed
        </div>
		<?php

		if ( ! empty( $_GET['thucdon'] ) ) :
			if ( $_GET['thucdon'] == 'nhucau_dinhduong' ) {
				if ( ! empty( $_GET['sort'] ) ) {
					if ( $_GET['sort'] == 'newest' ) {
						$args_dinhduong = [
							'post_type'  => 'monan',
							'paged'      => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1, // Lấy trang hiện tại
							'meta_query' => [
								[
									'key'     => 'dinhduong  ', // Tên trường tùy chỉnh
									'value'   => '', // Giá trị không được trống
									'compare' => '!=', // So sánh không trống
								],
							],
							'orderby' => 'date',
							'order'   => 'DESC',
						];
					} elseif ( $_GET['sort'] == 'oldest' ) {
						$args_dinhduong = [
							'post_type'  => 'monan',
							'paged'      => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1, // Lấy trang hiện tại
							'meta_query' => [
								[
									'key'     => 'dinhduong  ', // Tên trường tùy chỉnh
									'value'   => '', // Giá trị không được trống
									'compare' => '!=', // So sánh không trống
								],
							],
							'orderby' => 'date',
							'order'   => 'ASC',
						];
					}
                    elseif ( $_GET['sort'] == 'popular' ) {
						$args_dinhduong = [
							'post_type'  => 'monan',
							'paged'      => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1, // Lấy trang hiện tại
							'meta_query' => [
								[
									'key'     => 'dinhduong  ', // Tên trường tùy chỉnh
									'value'   => '', // Giá trị không được trống
									'compare' => '!=', // So sánh không trống
								],
							],
							'meta_key'  => 'views', // Tên trường tùy chỉnh
							'orderby'   => 'meta_value_num', // Sắp xếp theo giá trị số
							'order'     => 'DESC', // Sắp xếp giảm dần
						];
					}
				} else {
					$args_dinhduong = [
						'post_type'  => 'monan',
						'paged'      => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1, // Lấy trang hiện tại
						'meta_query' => [
							[
								'key'     => 'dinhduong  ', // Tên trường tùy chỉnh
								'value'   => '', // Giá trị không được trống
								'compare' => '!=', // So sánh không trống
							],
						],
					];
				}
			} elseif ( $_GET['thucdon'] == 'monngon_goiy' ) {
				if ( ! empty( $_GET['sort'] ) ) {
					if ( $_GET['sort'] == 'newest' ) {
						$args_dinhduong = [
							'post_type' => 'monan',
							'paged'     => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1, // Lấy trang hiện tại
							'meta_key'  => 'views', // Tên trường tùy chỉnh
							'orderby' => 'date',
							'order'   => 'DESC',
						];
					} elseif ( $_GET['sort'] == 'oldest' ) {
						$args_dinhduong = [
							'post_type' => 'monan',
							'paged'     => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1, // Lấy trang hiện tại
							'meta_key'  => 'views', // Tên trường tùy chỉnh
							'orderby' => 'date',
							'order'   => 'ASC',
						];
					}
                    elseif ( $_GET['sort'] == 'popular' ) {
						$args_dinhduong = [
							'post_type' => 'monan',
							'paged'     => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1, // Lấy trang hiện tại
							'meta_key'  => 'views', // Tên trường tùy chỉnh
							'orderby'   => 'meta_value_num', // Sắp xếp theo giá trị số
							'order'     => 'DESC', // Sắp xếp giảm dần
						];
					}
				} else {
					$args_dinhduong = [
						'post_type' => 'monan',
						'paged'     => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1, // Lấy trang hiện tại
						'meta_key'  => 'views', // Tên trường tùy chỉnh
						'orderby'   => 'meta_value_num', // Sắp xếp theo giá trị số
						'order'     => 'DESC', // Sắp xếp giảm dần
					];
				}
			}

			$dinhduong_query = new WP_Query( $args_dinhduong );
			if ( $dinhduong_query->have_posts() ) :
				?>

                <div class="relative has-[.slider]:-mx-4 group">

                    <div class="flex lg:gap-8 justify-between group group-3 flex-wrap flex-col lg:flex-row">
						<?php while ( $dinhduong_query->have_posts() ) :
							$dinhduong_query->the_post();

							$post_title = get_the_title( $post->ID );
							$post_title = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)', EHD_TEXT_DOMAIN );

							$acf_fields            = \get_fields( $post );
							$term_like             = $acf_fields['likes'] ?? '';
							$term_people           = $acf_fields['people'] ?? '';
							$term_level            = $acf_fields['level'] ?? '';
							$term_preparation_time = $acf_fields['preparation_time'] ?? '';
							$term_time_cook        = $acf_fields['time_cook'] ?? '';
							?>
                            <div class="hidden lg:!flex flex-col mt-6 lg:mt-5 gap-5 w-full group-has-[.group-1]:lg:flex-row group-has-[.slider]:px-4 group-has-[.group-2]:flex-[0_1_calc(50%_-_20px)] group-has-[.group-3]:flex-[0_1_calc(33%_-_20px)] group-has-[.group-4]:flex-[0_1_calc(24%_-_20px)] group-has-[.group-1]:lg:border group-has-[.group-1]:lg:!p-5 group-has-[.group-1]:lg:rounded-2xl [&:nth-child(1)]:!flex [&:nth-child(2)]:!flex  pb-5 lg:pb-10">
                                <div class="relative rounded-2xl overflow-hidden group-has-[.group-1]:flex-[0_1_calc(50%_-_20px)]">
									<?php echo get_the_post_thumbnail( null, 'large', [ 'class' => 'w-full object-cover aspect-video group-has-[.group-4]:aspect-square' ] ); ?>
                                    <img src="/images/chef-recommend.png"
                                         srcset="/images/chef-recommend.png 1x, /images/chef-recommend@2x.png 2x"
                                         alt="Chef Recommend" class="absolute left-2 bottom-2">
                                    <a href="#" data-tooltip-target="latest-1" data-tooltip-placement="top"
                                       class="absolute top-4 right-4 w-12 h-12 rounded-full border border-[var(--Gray-02)] bg-[var(--Gray-03)] flex items-center justify-center text-[var(--Gray-02)] hover:text-[var(--Primary-02)] hover:border-[var(--Primary-02)] hover:bg-[var(--Primary-03)] transition-all">
                                        <span class="icon-[ph--heart-fill] text-2xl"></span>
                                    </a>
                                </div>
                                <div id="latest-1" role="tooltip"
                                     class="absolute z-10 invisible inline-block px-2 py-1 text-sm font-medium text-white transition-opacity duration-300 bg-black/70 rounded-md opacity-0 tooltip">
                                    Click vào đây để lưu công thức
                                </div>
                                <div class="flex flex-col gap-3 w-full group-has-[.group-1]:lg:flex-[0_1_calc(50%_-_20px)]">
                                    <div class="flex gap-2 justify-between group-has-[.group-1]:lg:flex-col-reverse">
                                        <h3 class="md:text-xl font-bold"><?php echo $post_title; ?></h3>
                                        <div class="tag tag-small max-w-min">
											<?= $term_like ?>
                                            <span class="icon icon-[ph--heart-fill]"></span>
                                        </div>
                                    </div>
                                    <div class="tags">
                                        <div class="tag">
                                            <span class="icon icon-[ph--users]"></span>
											<?= $term_people ?> người
                                        </div>
                                        <div class="tag">
                                            <span class="icon icon-[ph--gauge]"></span>
											<?= $term_level ?>
                                        </div>
                                        <div class="tag">
                                            <span class="icon icon-[ph--timer]"></span>
											<?= $term_preparation_time ?> Phút
                                        </div>
                                        <div class="tag">
                                            <span class="icon icon-[ph--cooking-pot]"></span>
											<?= $term_time_cook ?> Phút
                                        </div>
                                    </div>
									<?php echo Helper::loopExcerpt( $post, 'line-clamp-2 text-xs font-normal text-[var(--Gray-02)] leading-4 md:text-base md:leading-6' ); ?>
                                    <div>
                                        <a href="<?php the_permalink(); ?>"
                                           class="btn btn-primary btn-default flex-grow-0">
                                            Xem chi tiết
                                            <span class="icon icon-[ph--caret-right-bold]"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
						<?php endwhile;
						wp_reset_postdata();
						?>
                    </div>

                </div>
				<?php

				$the_query      = new WP_Query( $args_dinhduong );
				$count_posts    = $the_query->found_posts;
				$posts_per_page = get_option( 'posts_per_page' );
				//	    dump($count_posts);
				$ehd_posts_num_per_page_arr = apply_filters( 'ehd_posts_num_per_page', [] );
				$page                       = get_query_var( 'paged' );
				$pagenum                    = 0;
				if ( isset( $_GET['pagenum'] ) ) {
					$pagenum = esc_sql( $_GET['pagenum'] );

					if ( in_array( $pagenum, $ehd_posts_num_per_page_arr ) ) {
						$posts_per_page = $pagenum;
					}
				}

				$col_post = ceil( $count_posts / $posts_per_page );

				if ( $col_post > 1 ) :

					?>

                    <div class="hidden sm:flex flex-wrap gap-4 justify-between mb-20">
                        <div class="left flex gap-2 items-center">
                            <select class="select_col_post flex gap-1 h-8 items-center px-3 py-1 rounded-sm outline outline-[var(--Neutral-05)] ring-0 outline-0 border-[var(--Neutral-05)]">
								<?php
								foreach ( $ehd_posts_num_per_page_arr as $posts_num_per_page ) :
									$selected = '';
									if ( $pagenum == $posts_num_per_page ) {
										$selected = ' selected';
									}
									?>
                                    <option<?= $selected ?> value="<?= $posts_num_per_page ?>"
                                                            class="text-sm text-[var(--Gray-01)] font-normal">
										<?= $posts_num_per_page ?> / <?php echo __( 'trang', EHD_TEXT_DOMAIN ); ?>
                                    </option>
								<?php endforeach; ?>
                            </select>
                            <div class="text-sm text-[var(--Gray-01)] font-normal">Go to</div>
                            <input type="number" data-url="<?= Helper::current( true, true ) ?>" min="1"
                                   max="<?= $col_post ?>"
                                   value="<?= $page >= 1 ? $page : '1' ?>"
                                   class="input_col_post w-[50px] px-3 h-7 text-sm text-[var(--Gray-01)] text-center font-normal rounded-sm outline outline-[var(--Neutral-05)]">
                        </div>
                        <div class="right pagination">
							<?php
							$paginate_links = paginate_links_post_ehd( [
								'total'     => $dinhduong_query->max_num_pages,
								'current'   => max( 1, get_query_var( 'paged' ) ),
								'prev_text' => __( '<span class="icon icon-[fe--arrow-left]"></span>' ),
								'next_text' => __( '<span class="icon icon-[fe--arrow-right]"></span>' ),
							] );

							if ( $paginate_links ) {
								echo '
                                <nav aria-label="Pagination">
                                <ul class="pagination">
                                ';
								echo $paginate_links;
								echo '</ul> </nav>';
							}
							?>
                        </div>
                    </div>
				<?php endif; ?>
			<?php endif; ?>
		<?php else:
			if ( ! empty( $_GET['sort'] ) ) {
				if ( $_GET['sort'] == 'newest' ) {
					$args_dinhduong = [
						'post_type'  => 'monan',
						'paged'     => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1, // Lấy trang hiện tại
						'orderby' => 'date',
						'order'   => 'DESC',
					];
				} elseif ( $_GET['sort'] == 'oldest' ) {
					$args_dinhduong = [
						'post_type'  => 'monan',
						'paged'     => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1, // Lấy trang hiện tại
						'orderby' => 'date',
						'order'   => 'ASC',
					];
				}
                elseif ( $_GET['sort'] == 'popular' ) {
					$args_dinhduong = [
						'post_type' => 'monan',
						'paged'     => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1, // Lấy trang hiện tại
						'meta_key'  => 'views', // Tên trường tùy chỉnh
						'orderby'   => 'meta_value_num', // Sắp xếp theo giá trị số
						'order'     => 'DESC', // Sắp xếp giảm dần
					];
				}
			} else {
				$args = [
					'post_type' => 'monan',
					'paged'     => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1, // Lấy trang hiện tại
				];
			}
			$custom_query = new WP_Query( $args );
            ?>
            <div class="relative has-[.slider]:-mx-4 group">
				<?php if ( $custom_query->have_posts() ) : ?>
                    <div class="flex lg:gap-8 justify-between group group-3 flex-wrap flex-col lg:flex-row">
						<?php while ( $custom_query->have_posts() ) :
							$custom_query->the_post();

							$post_title = get_the_title( $post->ID );
							$post_title = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)', EHD_TEXT_DOMAIN );

							$acf_fields            = \get_fields( $post );
							$term_like             = $acf_fields['likes'] ?? '';
							$term_people           = $acf_fields['people'] ?? '';
							$term_level            = $acf_fields['level'] ?? '';
							$term_preparation_time = $acf_fields['preparation_time'] ?? '';
							$term_time_cook        = $acf_fields['time_cook'] ?? '';
							?>
                            <div class="hidden lg:!flex flex-col mt-6 lg:mt-5 gap-5 w-full group-has-[.group-1]:lg:flex-row group-has-[.slider]:px-4 group-has-[.group-2]:flex-[0_1_calc(50%_-_20px)] group-has-[.group-3]:flex-[0_1_calc(33%_-_20px)] group-has-[.group-4]:flex-[0_1_calc(24%_-_20px)] group-has-[.group-1]:lg:border group-has-[.group-1]:lg:!p-5 group-has-[.group-1]:lg:rounded-2xl [&:nth-child(1)]:!flex [&:nth-child(2)]:!flex  pb-5 lg:pb-10">
                                <div class="relative rounded-2xl overflow-hidden group-has-[.group-1]:flex-[0_1_calc(50%_-_20px)]">
									<?php echo get_the_post_thumbnail( null, 'large', [ 'class' => 'w-full object-cover aspect-video group-has-[.group-4]:aspect-square' ] ); ?>
                                    <img src="/images/chef-recommend.png"
                                         srcset="/images/chef-recommend.png 1x, /images/chef-recommend@2x.png 2x"
                                         alt="Chef Recommend" class="absolute left-2 bottom-2">
                                    <a href="#" data-tooltip-target="latest-1" data-tooltip-placement="top"
                                       class="absolute top-4 right-4 w-12 h-12 rounded-full border border-[var(--Gray-02)] bg-[var(--Gray-03)] flex items-center justify-center text-[var(--Gray-02)] hover:text-[var(--Primary-02)] hover:border-[var(--Primary-02)] hover:bg-[var(--Primary-03)] transition-all">
                                        <span class="icon-[ph--heart-fill] text-2xl"></span>
                                    </a>
                                </div>
                                <div id="latest-1" role="tooltip"
                                     class="absolute z-10 invisible inline-block px-2 py-1 text-sm font-medium text-white transition-opacity duration-300 bg-black/70 rounded-md opacity-0 tooltip">
                                    Click vào đây để lưu công thức
                                </div>
                                <div class="flex flex-col gap-3 w-full group-has-[.group-1]:lg:flex-[0_1_calc(50%_-_20px)]">
                                    <div class="flex gap-2 justify-between group-has-[.group-1]:lg:flex-col-reverse">
                                        <h3 class="md:text-xl font-bold"><?php echo $post_title; ?></h3>
                                        <div class="tag tag-small max-w-min">
											<?= $term_like ?>
                                            <span class="icon icon-[ph--heart-fill]"></span>
                                        </div>
                                    </div>
                                    <div class="tags">
                                        <div class="tag">
                                            <span class="icon icon-[ph--users]"></span>
											<?= $term_people ?> người
                                        </div>
                                        <div class="tag">
                                            <span class="icon icon-[ph--gauge]"></span>
											<?= $term_level ?>
                                        </div>
                                        <div class="tag">
                                            <span class="icon icon-[ph--timer]"></span>
											<?= $term_preparation_time ?> Phút
                                        </div>
                                        <div class="tag">
                                            <span class="icon icon-[ph--cooking-pot]"></span>
											<?= $term_time_cook ?> Phút
                                        </div>
                                    </div>
									<?php echo Helper::loopExcerpt( $post, 'line-clamp-2 text-xs font-normal text-[var(--Gray-02)] leading-4 md:text-base md:leading-6' ); ?>
                                    <div>
                                        <a href="<?php the_permalink(); ?>"
                                           class="btn btn-primary btn-default flex-grow-0">
                                            Xem chi tiết
                                            <span class="icon icon-[ph--caret-right-bold]"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
						<?php endwhile;
						wp_reset_postdata();
						?>
                    </div>
				<?php endif; ?>
            </div>
			<?php

			$the_query      = new WP_Query( $args );
			$count_posts    = $the_query->found_posts;
			$posts_per_page = get_option( 'posts_per_page' );
			//	    dump($count_posts);
			$ehd_posts_num_per_page_arr = apply_filters( 'ehd_posts_num_per_page', [] );
			$page                       = get_query_var( 'paged' );
			$pagenum                    = 0;
			if ( isset( $_GET['pagenum'] ) ) {
				$pagenum = esc_sql( $_GET['pagenum'] );

				if ( in_array( $pagenum, $ehd_posts_num_per_page_arr ) ) {
					$posts_per_page = $pagenum;
				}
			}

			$col_post = ceil( $count_posts / $posts_per_page );

			if ( $col_post > 1 ) :

				?>

                <div class="hidden sm:flex flex-wrap gap-4 justify-between mb-20">
                    <div class="left flex gap-2 items-center">
                        <select class="select_col_post flex gap-1 h-8 items-center px-3 py-1 rounded-sm outline outline-[var(--Neutral-05)] ring-0 outline-0 border-[var(--Neutral-05)]">
							<?php
							foreach ( $ehd_posts_num_per_page_arr as $posts_num_per_page ) :
								$selected = '';
								if ( $pagenum == $posts_num_per_page ) {
									$selected = ' selected';
								}
								?>
                                <option<?= $selected ?> value="<?= $posts_num_per_page ?>"
                                                        class="text-sm text-[var(--Gray-01)] font-normal">
									<?= $posts_num_per_page ?> / <?php echo __( 'trang', EHD_TEXT_DOMAIN ); ?>
                                </option>
							<?php endforeach; ?>
                        </select>
                        <div class="text-sm text-[var(--Gray-01)] font-normal">Go to</div>
                        <input type="number" data-url="<?= Helper::current( true, true ) ?>" min="1"
                               max="<?= $col_post ?>"
                               value="<?= $page >= 1 ? $page : '1' ?>"
                               class="input_col_post w-[50px] px-3 h-7 text-sm text-[var(--Gray-01)] text-center font-normal rounded-sm outline outline-[var(--Neutral-05)]">
                    </div>
                    <div class="right pagination">
		                <?php
		                $paginate_links = paginate_links_post_ehd( [
			                'total'     => $custom_query->max_num_pages,
			                'current'   => max( 1, get_query_var( 'paged' ) ),
			                'prev_text' => __( '<span class="icon icon-[fe--arrow-left]"></span>' ),
			                'next_text' => __( '<span class="icon icon-[fe--arrow-right]"></span>' ),
		                ] );

		                if ( $paginate_links ) {
			                echo '
                                <nav aria-label="Pagination">
                                <ul class="pagination">
                                ';
			                echo $paginate_links;
			                echo '</ul> </nav>';
		                }
		                ?>
                    </div>
                </div>
			<?php endif; ?>
		<?php endif; ?>

    </div>
<?php

get_footer();
