<?php

/**
 * The template for displaying the footer.
 * Contains the body & html closing tags.
 * @package ehd
 */

\defined( 'ABSPATH' ) || die;

?>
            </div><!-- .site-content -->
        </div><!-- .site-page -->
        <?php

        do_action( 'ehd_before_footer' );

        ?>
        <div class="site-footer">
            <?php

            do_action( 'ehd_before_footer_content' );

            /**
             * @see __construct_footer_widgets - 5
             * @see __construct_footer - 10
             */
            do_action( 'ehd_footer' );

            do_action( 'ehd_after_footer_content' );

            ?>
        </div>
        <?php

        do_action( 'ehd_after_footer' );

        ?>
    </div><!-- .site-outer -->

    <?php wp_footer(); ?>
<div class="divider"></div>
<footer class="bg-[var(--Primary-04)]">
    <div class="news-letter py-5 px-2">
        <div class="container flex justify-center items-center gap-14">
            <h2 class="text-white italic text-center font-extrabold uppercase condensed">BECOME A MEMBER &amp; GET EXCLUSIVE
                CONTENT
            </h2>
            <a href="#"
               class="relative z-0 after:block after:absolute after:top-1 after:left-1 after:rounded-lg after:bg-[var(--Primary-03)] after:content-['_'] after:w-full after:h-full after:-z-10">
                <div class="flex items-center gap-3 relative z-0 py-4 px-8 bg-white rounded-lg">
                    <span class="text-sm font-bold uppercase">Sign Up for free</span>
                    <span class="icon-[ph--sign-in] text-2xl"></span>
                </div>
            </a>
        </div>
    </div>
    <div class="footer-bg">
        <div class="container flex flex-col items-center py-6 gap-8 px-4">
            <h1 id="logo" class="p-1 bg-white rounded-[10px]">
                <a href="#">
                    <img src="/images/logo.png" srcset="/images/logo.png 1x, /images/logo@2x.png 2x" width="147"
                         alt="Ajinomoto - Món ngon mỗi ngày" />
                </a>
            </h1>
            <ul class="flex gap-4 lg:gap-8 justify-center flex-wrap">
                <li class="flex-[1_0_calc(50%_-_16px)] lg:flex-auto text-center">
                    <a href="#">
                        About MNMN
                    </a>
                </li>
                <li class="flex-[1_0_calc(50%_-_16px)] lg:flex-auto text-center">
                    <a href="#">
                        FAQ
                    </a>
                </li>
                <li class="flex-[1_0_calc(50%_-_16px)] lg:flex-auto text-center">
                    <a href="#">
                        Contact
                    </a>
                </li>
                <li class="flex-[1_0_calc(50%_-_16px)] lg:flex-auto text-center">
                    <a href="#">
                        Terms and Conditions
                    </a>
                </li>
            </ul>
            <div class="flex flex-col-reverse lg:flex-row justify-between items-center w-full gap-4">
                <p>®/™©2023 <a href="/" class="text-[var(--Primary-02)]">MNMN</a>. All rights reserved.</p>
                <div class="text-lg font-bold">
                    <div class="flex gap-4 flex-col lg:flex-row items-center">
                        <div class="flex justify-center">Follow Us:</div>
                        <div class="flex gap-4">
                            <a href="#"><img src="/images/icons/fb.svg" class="w-8 h-8" /></a>
                            <a href="#"><img src="/images/icons/yt.svg" class="w-8 h-8" /></a>
                            <a href="#"><img src="/images/icons/in.svg" class="w-8 h-8" /></a>
                            <a href="#"><img src="/images/icons/htv.png" class="h-8" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>
</body>
</html>
