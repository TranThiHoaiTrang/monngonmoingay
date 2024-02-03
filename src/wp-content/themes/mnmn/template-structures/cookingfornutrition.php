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

    /**
     * Add the copyright to the footer
     *
     * @return void
     */
    function __ehd_cookingfornutrition() {
        $temps = get_queried_object();
        $parents = get_field('select_cookingfornutrition',$temps->ID);

//        dump($parents);
        if (!empty($parents)){
            foreach ($parents as $parent){
//                dump($parent->post_type);
                $pa = Helper::queryByTerms( $parent->term_id, $parent->taxonomy, 'thong-tin-huu-ich', true );
                if ( is_wp_error( $pa ) ) {
                    break;
                }
                $temp = get_term($parent->term_id, $parent->taxonomy);
//                $term_id = $parent->term_id;
//                dump($temp);
//                dump($parent);
            }
        }
    }
}
