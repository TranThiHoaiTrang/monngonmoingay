<?php

use EHD_Cores\Helper;

\defined( 'ABSPATH' ) || die;

?>
<nav id="mainNav" class="main-nav text-xs font-bold lg:h-[30px] w-72 lg:w-auto ml-auto lg:ml-0 bg-white lg:bg-transparent z-10 flex-auto pt-6 px-6 lg:pt-0 lg:px-0 translate-x-full lg:translate-x-0 transition-all">
	<div class="flex self-stretch items-center justify-between text-xl lg:hidden pb-2">
		Menu
		<a href="#" class="menu-toggle">
			<span class="icon-[ph--x-bold] text-2xl"></span>
		</a>
	</div>

    <?php echo Helper::doShortcode( 'main_nav' ); ?>

</nav>