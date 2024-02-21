<?php

/**
 * The template for displaying the footer.
 * Contains the body & html closing tags.
 * @package ehd
 */

use EHD_Cores\Helper;

\defined( 'ABSPATH' ) || die;

?>
</div><!-- #site-content -->
<?php

    do_action( 'ehd_before_footer' );

    ?>
    <footer class="bg-[var(--Primary-04)]" <?php echo Helper::microdata( 'footer' ); ?>>
        <?php

        do_action( 'ehd_before_footer_content' );

        /**
         * @see __construct_footer_widgets - 5
         * @see __construct_footer - 10
         */
        do_action( 'ehd_footer' );

        do_action( 'ehd_after_footer_content' );

        ?>
    </footer>
    <?php

    do_action( 'ehd_after_footer' );

    ?>
    </div><!-- .wrapper -->

    <?php wp_footer(); ?>

</body>
</html>
