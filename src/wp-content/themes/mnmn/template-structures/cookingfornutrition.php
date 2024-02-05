<?php
/**
 * Footer elements
 *
 * @author WEBHD
 */

use EHD_Cores\Helper;

\defined( 'ABSPATH' ) || die;

// -----------------------------------------------
// ehd_cookingfornutrition hook
// -----------------------------------------------

if ( ! function_exists( '__ehd_cookingfornutrition' ) ) {
    add_action( 'ehd_cookingfornutrition', '__ehd_cookingfornutrition', 10 );
    add_action( 'ehd_cookingfornutrition_post', '__ehd_cookingfornutrition_post', 10 );

    /**
     * Add the copyright to the footer
     *
     * @return void
     */
    function __ehd_cookingfornutrition() {
        $temps = get_queried_object();
        $parents = get_field('select_cookingfornutrition',$temps->ID);
        $tieude = get_field('tieu_de',$temps->ID);
        ?>
        <div class="container flex flex-col gap-10 mb-20">
            <?= $tieude ?>
            <div class="flex m-auto justify-between w-full">
                <?php
                if (!empty($parents)){
                    foreach ($parents as $v){
                        $image2 = Helper::acfTermThumb($v, 'term_thumb', 'medium', true, ['class' => 'object-cover rounded-[20px] h-[211px] self-stretch']);
                        //dump($image2);
                        ?>
                        <a href="<?= get_term_link($v, 'danh-muc-thong-tin-huu-ich') ?>">
                            <div class="cookingfornutritionneeds__item group w-[240px] flex flex-col justify-end py-2 px-3 gap-6 self-stretch bg-white rounded-2xl relative aspect-square border border-solid border-transparent hover:border-[#fbd0d2]">
                                <?= $image2 ?>
                                <h3 class="text-center text-sm font-bold capitalize px-2 h-10 group-hover:text-[var(--Primary-02)]">
                                    <?= $v->name ?>
                                </h3>
                            </div>
                        </a>
                    <?php }
                }
                ?>
            </div>
        </div>
        <?php
    }
    function __ehd_cookingfornutrition_post() {
        $temps = get_queried_object();
        $parents = get_field('repeater_post',$temps->ID);
//        dump($parents);
        if (!empty($parents)){
            foreach ($parents as $parent){
                $taxonamies = get_term($parent['chuyen_muc']);
//                dump($taxonamies);

                ?>
                <div class="container flex flex-col gap-10 mb-20">
                    <?= $parent['tieu_de'] ?>
                    <div class="relative -mx-4">
                        <button class="btn btn-icon btn-primary btn-arrow btn-prev">
                            <span class="icon icon-[fe--arrow-left]"></span>
                        </button>
                        <div class="cookingfornutritionneeds__slider flex gap-10 justify-between slider-2">
                            <?php
                            $post = Helper::queryByTerms( $parent['chuyen_muc'], $taxonamies->taxonomy, 'thong-tin-huu-ich', true, $parent['so_luong'] );
                            if ( is_wp_error( $post ) ) {
                                break;
                            }
//                            dump($post->posts);
                            if(!empty($post->posts)){
                            foreach ($post->posts as $v){
                                $image = Helper::postImageSrc($v, 'full');
//                                dump();
                            ?>
                            <div class="p-10 rounded-2xl border-solid border-2 border-[var(--Gray-03)] w-[calc(100% - 20px)]">
                                <div class="flex flex-col w-full">
                                    <div class="relative overflow-hidden">
                                        <img src="<?= $image ?>" alt=""
                                             class="rounded-2xl object-cover w-full max-h-[288px]">
                                    </div>
                                    <div class="mt-12 mb-6 gap-2 flex flex-col">
                                        <div class="tag font-bold w-fit">
                                            <span>Immunity &amp; Mental Health</span>
                                        </div>
                                        <div class="flex gap-2 justify-between">
                                            <h3 class="text-xl font-bold"><?= $v->post_title ?></h3>
                                        </div>
                                        <?= $v->post_excerpt ?>
                                    </div>
                                    <div>
                                        <a href="<?= get_permalink($v) ?>" class="btn btn-primary btn-default flex-grow-0">
                                            <span>PROCEED TO READ</span>
                                            <span class="icon icon-[ph--caret-right-bold]"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                        <button class="btn btn-icon btn-primary btn-arrow btn-next">
                            <span class="icon icon-[fe--arrow-right]"></span>
                        </button>
                    </div>

                    <?php
                    $count_post = Helper::queryByTerms( $parent['chuyen_muc'], $taxonamies->taxonomy, 'thong-tin-huu-ich', true, -1 );
                    $count = count($count_post->posts);
                    ?>
                    <div class="flex gap-12 justify-center">
                        <a href="<?= get_term_link($taxonamies, 'danh-muc-thong-tin-huu-ich') ?>" class="btn btn-secondary">
                            <span>See <?= $count ?>+ Tips & Trick</span>
                            <span class="icon icon-[fe--arrow-right]"></span>
                        </a>
                    </div>
                </div>
           <?php }
        }
    }
}
