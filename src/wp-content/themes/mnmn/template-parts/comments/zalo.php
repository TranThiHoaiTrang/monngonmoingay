<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/

use EHD_Cores\Helper;

\defined( 'ABSPATH' ) || die;

if ( post_password_required() ) {
    return;
}

$zalo_appid = Helper::getThemeMod( 'zalo_menu_setting' );
if ( ! $zalo_appid ) {
    return;
}

?>
<div class="zalo-comments-area comments-area">
    <span class="comments-title"><?php echo __( 'Zalo comments', EHD_TEXT_DOMAIN ) ?></span>
    <div class="zalo-comment-plugin" data-appid="<?= $zalo_appid ?>" data-size="5"></div>
</div>