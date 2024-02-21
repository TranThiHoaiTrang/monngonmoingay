<?php
/**
 * Footer elements
 *
 * @author WEBHD
 */

use EHD_Cores\Helper;

\defined('ABSPATH') || die;

if (!function_exists('__ehd_lichphatsong')) {
	add_action('ehd_lichphatsong', '__ehd_lichphatsong', 10);

	/**
	 * Add the copyright to the footer
	 *
	 * @return void
	 */
	function __ehd_lichphatsong()
	{
		global $post;
		$temps = get_queried_object();
		$tieude = get_field('tieu_de', $temps->ID);
		$link_page_youtube = get_field('link_page_youtube', $temps->ID);
		$link_youtube = get_field('link_youtube', $temps->ID);
		?>
        <div id="broadcast_schedule_master" class="container flex flex-col gap-8 md:gap-10 px-4">
            <div class="flex flex-col-reverse gap-4 mt-[30px] lg:flex-row lg:gap-10 md:mt-[40px] xl:mt-[100px]">
                <div class="w-full lg:max-w-[462px] flex flex-col items-center lg:items-start gap-4 md:gap-6">
					<?= $tieude ?>
                    <p class="text-center md:text-left text-base text-[var(--Gray-02)] font-normal leading-6">
						<?= $temps->post_content ?>
                    </p>
                    <a href="<?= $link_page_youtube ?>" target="_blank" >
                        <div class="w-fit flex gap-3 items-center bg-[var(--Primary-03)] cursor-pointer p-2 rounded-[20px]">
                            <div class="flex items-center gap-4 py-1 pl-[5px] pr-[14px] bg-white rounded-[15px]">
                                <img class="icon" src="/images/icons/youtube.svg">
                                <div class="flex flex-col gap-[2px]">
                                    <h5 class="capitalize text-xs font-semibold leading-[14px] tracking-[2.28px]">Xem lại
                                        trên</h5>
                                    <h3 class="uppercase text-[var(--Primary-02)] text-[21px] font-extrabold leading-[22px]">
                                        Youtube
                                    </h3>
                                </div>
                            </div>
                            <span class="icon icon-[fe--arrow-right] w-6 h-6 text-[var(--Primary-02)]"></span>
                        </div>
                    </a>

                </div>
                <div class="flex flex-1 justify-center items-end" data-toggle="modal" data-target="videoModal" data-src="<?=$link_youtube?>>">
                    <div class="broadcast_thumb w-[180px] h-[110px] sm:w-[250px] sm:h-[150px] lg:w-[350px] lg:h-[200px] xl:w-[406px] xl:h-[248px] border relative">
						<?php echo get_the_post_thumbnail($temps, 'large', array( 'class' => 'w-full h-full object-cover -translate-x-[1rem] lg:-translate-x-[3rem] xl:translate-x-0' )); ?>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center gap-2 md:gap-4">
                <div class="w-[376px] h-[1px] bg-[var(--Neutral-05)] rounded-full"></div>
                <img class="filter grayscale w-[66px] my-1 md:w-[146px]" src="/images/logo.png"
                     srcset="/images/logo.png 1x, /images/logo@2x.png 2x" width="146" height="70"
                     alt="Ajinomoto - Món ngon mỗi ngày">
                <div class="w-[376px] h-[1px] bg-[var(--Neutral-05)] rounded-full"></div>
            </div>
            <div class="flex flex-col gap-8 md:gap-12" id="broadcastDates">
                <form class="hidden">
                    <input type="hidden" name="start">
                    <input type="hidden" name="end">
                    <input type="hidden" name="type">
                </form>
                <ul class="tabs">
                    <li class="tab tab-active newest">
                        <span class="relative">Mới nhất</span>
                    </li>
                    <li class="tab week-picker relative">
                        <span class="relative group">
                          Theo tuần
                          <span class="hidden absolute group-hover:inline-block -top-2/3 left-1/2 -translate-x-1/2 bg-[#000000B2] whitespace-nowrap text-xs text-white font-bold px-2 py-1 leading-[14px] rounded-[5px]">Chọn
                            lịch chiếu</span>
                        </span>
                        <input name="week-start" type="text" class="absolute top-0 left-0 invisible pointer-events-none"
                               placeholder="Select date start">
                        <input name="week-end" type="text" class="absolute top-0 left-0 invisible pointer-events-none"
                               placeholder="Select date end">
                    </li>
                    <li class="tab month-picker relative">
                        <span class="relative group">
                          Theo tháng
                          <span class="hidden absolute group-hover:inline-block -top-2/3 left-1/2 -translate-x-1/2 bg-[#000000B2] whitespace-nowrap text-xs text-white font-bold px-2 py-1 leading-[14px] rounded-[5px]">Chọn
                            lịch chiếu</span>
                          <input name="month-start" type="text" class="absolute inset-0 invisible pointer-events-none"
                                 placeholder="Select date start">
                          <input name="month-end" type="text" class="absolute inset-0 invisible pointer-events-none"
                                 placeholder="Select date end">
                        </span>
                    </li>
                </ul>
                <div class="all_grid_lichphatsong flex flex-col gap-4 md:gap-6">
					<?php
					if (!empty($_GET['start'])) {
						$start = $_GET['start'];
						$arr_start = explode("/", $start);
					}
					if (!empty($_GET['end'])) {
						$end = $_GET['end'];
						$arr_end = explode("/", $end);
					}
					if (!empty($_GET['type'])) {
						if($_GET['type'] == 'week'){
							$day_end = $arr_end[0] +1;
						}else{
							$day_end = $arr_end[0];
						}
					}

					$soluong = get_field('so_luong', $temps->ID);

					if (!empty($arr_start) || !empty($arr_end)) {
						$args = array(
							'post_type' => 'monan',
							'posts_per_page' => $soluong,
							'date_query' => array(
								'after' => array(
									'year' => $arr_start[2],
									'month' => $arr_start[1],
									'day' => $arr_start[0],
								),
								'before' => array(
									'year' => $arr_end[2],
									'month' => $arr_end[1],
									'day' => $day_end,
								),
							),
						);
					} else {
						$args = array(
							'post_type' => 'monan',
							'posts_per_page' => $soluong,
						);
					}

					$get_post = new WP_Query($args);
					$count_posts = $get_post->post_count;
					$col_post = ceil($count_posts / 2);
					$j = 0;
					for ($i = 1; $i <= $col_post; $i++ ) {
						?>
                        <div class="grid_lichphatsong flex flex-wrap lg:flex-nowrap gap-2 items-stretch p-2 lg:p-6 lg:grid-cols-2 lg:gap-6 rounded-2xl">
							<?php
							if (!empty($arr_start) || !empty($arr_end)) {
								$args_p = array(
									'post_type' => 'monan',
									'posts_per_page' => 2,
									'offset' => $j,
									'date_query' => array(
										'after' => array(
											'year' => $arr_start[2],
											'month' => $arr_start[1],
											'day' => $arr_start[0],
										),
										'before' => array(
											'year' => $arr_end[2],
											'month' => $arr_end[1],
											'day' => $day_end,
										),
									),
								);
							} else {
								$args_p = array(
									'post_type' => 'monan',
									'posts_per_page' => 2,
									'offset' => $j,
								);
							}

							$custom_query = new WP_Query( $args_p);
							while ($custom_query->have_posts()) :
								$custom_query->the_post();
								?>

								<?php $date_play1 = get_field('time_play',$post->ID); ?>
                                <div class="broadcast_item broadcast_item--upcoming flex flex-col lg:flex-row lg:gap-6 lg:p-0 w-1/2 flex-auto">
                                    <div class="flex items-center lg:items-end gap-2 p-2 lg:flex-col lg:p-4 text-right">
                                        <span class="capitalize text-xs lg:text-sm lg:whitespace-nowrap font-bold leading-4 text-[var(--Gray-01)]">Thứ 7</span>
                                        <span class="font-bold lg:text-2xl lg:leading-8"><?= $date_play1 ?></span>
                                        <span class="capitalize text-xs font-normal leading-4 text-[var(--Gray-01)] lg:text-[20px] lg:leading-[20px]">11:50</span>
                                    </div>
                                    <div class="w-full aspect-[271/150] overflow-hidden flex-[1_0_40%]">
										<?php echo get_the_post_thumbnail(null, 'large', array( 'class' => 'w-full rounded-xl' )); ?>
                                    </div>
                                    <div class="flex flex-col gap-2 px-2 py-3 lg:p-0">
                                        <h3 class="text-[var(--Primary-02)] font-bold leading-[18px] lg:text-2xl lg:leading-8">
											<?= $post->post_title ?></h3>
										<?php echo Helper::loopExcerpt( $post, 'line-clamp-2 text-xs font-normal text-[var(--Gray-02)] leading-4 lg:text-base lg:leading-6' ); ?>
                                        <button class="btn mt-4  btn-default w-fit capitalize">
                                            Đón xem Tập mới
                                        </button>
                                    </div>
                                </div>
                                <hr class="h-[1px] lg:h-auto w-full lg:w-[1px] bg-[var(--Gray-06)] shrink-0 last:hidden">
							<?php  endwhile; ?>
                        </div>
                        <hr class="w-full h-[1px] bg-[var(--Gray-03)] rounded-full">
						<?php wp_reset_postdata(); $j+=2; } ?>

                </div>
                <div class="right">
					<?= ehd_pagination_links() ?>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <span class="close-model" data-dismiss="modal"><i class="fa fa-times-circle"></i></span>
                    <div class="modal-body">
						<?= Helper::youtubeIframe($link_youtube); ?>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}

}
