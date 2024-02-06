<?php
/**
 * The template for displaying Archive pages.
 *
 * @package eHD
 * @since 1.0.0
 */

use EHD_Cores\Helper;

\defined('ABSPATH') || die;

get_header();

$post_page_id = get_option('page_for_posts');
$term = get_queried_object();

get_template_part('template-parts/header/archive-title', null, ['css_class' => 'archive-title']);

?>
    <div class="wrapper pt-16 lg:pt-24">
        <header id="header"
                class="py-2 px-4 lg:py-4 lg:px-6 flex gap-6 items-center justify-start fixed inset-x-0 top-0 z-10">
            <h1 id="logo" class="p-1 bg-white rounded-[10px]">
                <a href="/">
                    <img src="/images/logo.png" srcset="/images/logo.png 1x, /images/logo@2x.png 2x"
                         class="w-24 lg:w-20"
                         alt="Ajinomoto - Món ngon mỗi ngày"/>
                </a>
            </h1>
            <a href="#"
               class="menu-toggle ml-auto flex lg:hidden items-center justify-center border border-[var(--Gray-03)] rounded p-1">
                <span class="icon-[ph--text-align-right] text-2xl"></span>
            </a>
            <div
                    class="nav-wrap flex lg:justify-start lg:items-center flex-auto fixed lg:static top-0 right-0 flex-col lg:flex-row h-screen lg:h-auto w-screen lg:w-auto justify-between pointer-events-none lg:pointer-events-auto">
                <div class="menu-bg absolute inset-0 w-screen h-screen bg-[var(--Gray-01)] opacity-0 lg:hidden transition-all">
                </div>
                <nav id="mainNav"
                     class="main-nav text-xs font-bold lg:h-[30px] w-72 lg:w-auto ml-auto lg:ml-0 bg-white lg:bg-transparent z-10 flex-auto pt-6 px-6 lg:pt-0 lg:px-0 translate-x-full lg:translate-x-0 transition-all">
                    <div class="flex self-stretch items-center justify-between text-xl lg:hidden pb-2">Menu <a href="#"
                                                                                                               class="menu-toggle">
                            <span class="icon-[ph--x-bold] text-2xl"></span>
                        </a></div>
                    <ul class="flex items-start lg:items-center flex-col lg:flex-row gap-1 lg:gap-0">
                        <li
                                class="active group items-center lg:px-2 py-2 lg:py-0 lg:border-r border-[var(--Gray-03)] text-[var(--Gray-01)] hover:text-[var(--Primary-02)] relative first:pl-0 self-stretch justify-between">
                            <a href="/" class="flex items-center gap-1 h-full self-stretch justify-between">
                                <span class="icon-[ph--house-fill] text-[28px]"></span>
                            </a>
                        </li>
                        <li
                                class=" group items-center lg:px-2 py-2 lg:py-0 lg:border-r border-[var(--Gray-03)] text-[var(--Gray-01)] hover:text-[var(--Primary-02)] relative first:pl-0 self-stretch justify-between">
                            <a href="#" class="flex items-center gap-1 h-full self-stretch justify-between">
                                Danh mục thực đơn
                                <span class="icon-[ph--caret-down-fill] text-sm"></span>
                            </a>
                            <div
                                    class="relative lg:absolute top-full left-0 group-hover:pt-2 pl-2 opacity-0 transition-all pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto group-hover:h-auto h-0 group-hover:scale-y-100 lg:h-auto transform scale-y-0 lg:scale-1 origin-top">
                                <ul class="w-[230px] p-3 lg:p-4 bg-white rounded-lg border border-[var(--Gray-03)]">
                                    <li
                                            class="active border-b border-[var(--Gray-03)] text-[var(--Gray-01)] py-3 lg:py-2 first:pt-0 last:border-none last:pb-0">
                                        <a href="#"
                                           class="flex items-center gap-1 lg:p-2 hover:bg-[var(--Primary-04)] rounded-lg">
                                            Recipes
                                        </a>
                                    </li>
                                    <li
                                            class=" border-b border-[var(--Gray-03)] text-[var(--Gray-01)] py-3 lg:py-2 first:pt-0 last:border-none last:pb-0">
                                        <a href="#"
                                           class="flex items-center gap-1 lg:p-2 hover:bg-[var(--Primary-04)] rounded-lg">
                                            MNMN recommendation
                                        </a>
                                    </li>
                                    <li
                                            class=" border-b border-[var(--Gray-03)] text-[var(--Gray-01)] py-3 lg:py-2 first:pt-0 last:border-none last:pb-0">
                                        <a href="#"
                                           class="flex items-center gap-1 lg:p-2 hover:bg-[var(--Primary-04)] rounded-lg">
                                            Specific need-based
                                        </a>
                                    </li>
                                    <li
                                            class=" border-b border-[var(--Gray-03)] text-[var(--Gray-01)] py-3 lg:py-2 first:pt-0 last:border-none last:pb-0">
                                        <a href="#"
                                           class="flex items-center gap-1 lg:p-2 hover:bg-[var(--Primary-04)] rounded-lg">
                                            Tips &amp; Trick
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li
                                class=" group items-center lg:px-2 py-2 lg:py-0 lg:border-r border-[var(--Gray-03)] text-[var(--Gray-01)] hover:text-[var(--Primary-02)] relative first:pl-0 self-stretch justify-between">
                            <a href="#" class="flex items-center gap-1 h-full self-stretch justify-between">
                                Kế hoạch nấu ăn
                            </a>
                        </li>
                        <li
                                class=" group items-center lg:px-2 py-2 lg:py-0 lg:border-r border-[var(--Gray-03)] text-[var(--Gray-01)] hover:text-[var(--Primary-02)] relative first:pl-0 self-stretch justify-between">
                            <a href="/cooking-with-experts"
                               class="flex items-center gap-1 h-full self-stretch justify-between">
                                Nấu ăn cùng chuyên gia
                            </a>
                        </li>
                        <li
                                class=" group items-center lg:px-2 py-2 lg:py-0 lg:border-r border-[var(--Gray-03)] text-[var(--Gray-01)] hover:text-[var(--Primary-02)] relative first:pl-0 self-stretch justify-between">
                            <a href="/seasonings_master"
                               class="flex items-center gap-1 h-full self-stretch justify-between">
                                Gia vị bạn cần
                            </a>
                        </li>
                        <li
                                class=" group items-center lg:px-2 py-2 lg:py-0 lg:border-r border-[var(--Gray-03)] text-[var(--Gray-01)] hover:text-[var(--Primary-02)] relative first:pl-0 self-stretch justify-between">
                            <a href="#" class="flex items-center gap-1 h-full self-stretch justify-between">
                                HNS Project
                            </a>
                        </li>
                        <li
                                class=" group items-center lg:px-2 py-2 lg:py-0 lg:border-r border-[var(--Gray-03)] text-[var(--Gray-01)] hover:text-[var(--Primary-02)] relative first:pl-0 self-stretch justify-between">
                            <a href="#" class="flex items-center gap-1 h-full self-stretch justify-between">
                                Lịch phát sóng
                            </a>
                        </li>
                        <li
                                class=" group items-center lg:px-2 py-2 lg:py-0 lg:border-r border-[var(--Gray-03)] text-[var(--Gray-01)] hover:text-[var(--Primary-02)] relative first:pl-0 self-stretch justify-between">
                            <a href="#" class="flex items-center gap-1 h-full self-stretch justify-between">
                                AVN Mission &amp; Vision
                            </a>
                        </li>
                    </ul>
                </nav>
                <div
                        class="user-menu w-72 lg:w-auto ml-auto relative flex-shrink-0 bg-white lg:bg-transparent translate-x-full lg:translate-x-0  transition-all">
                    <span class="hidden lg:block italic text-xs absolute -top-5 -left-8">Đăng ký thành viên để hưởng ưu đãi ...</span>
                    <ul class="flex gap-4 flex-col lg:flex-row py-4 px-6 lg:p-0">
                        <li class="flex-shrink-0">
                            <a href="#"
                               class="btn btn-primary btn-default btn-login uppercase w-full lg:w-auto justify-center lg:justify-start">
                                <span>Sign In</span>
                                <img class="icon" src="/images/icons/user-signin.svg"/>
                            </a>
                        </li>
                        <li class="flex-shrink-0">
                            <a href="#"
                               class="btn btn-primary btn-login uppercase w-full lg:w-auto justify-center lg:justify-start">
                                <span>Sign Up</span>
                                <img class="icon" src="/images/icons/user-signup.svg"/>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <section id="banner" class="container mt-4 relatives z-20">
            <div class="banner-slider lg:rounded-xl overflow-hidden w-screen -ml-4 lg:ml-0 lg:w-full aspect-auto lg:aspect-[1280/320]">
                <div class="banner-slider__item relative">
                    <picture class="w-full h-full object-cover">
                        <source srcset="/images/banners/1.png " media="(min-width: 1280px)">
                        <source srcset="/images/banners/1-mb.png " media="(min-width: 0px)">
                        <img src="/images/banners/1-mb.png" class="w-full h-full object-cover">
                    </picture>
                    <!-- <div class="banner-slider__content absolute inset-0 h-full flex flex-col gap-4 justify-center pl-10 text-white">
                      <div class="flex flex-col gap-2">
                        <h3 class="condensed font-extrabold text-3xl">Spicy delicious chicken thighs</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                          magna aliqut e...</p>
                      </div>
                      <div class="tags">
                        <span class="tag tag-banner"><span class="icon icon-[ph--timer-fill]"></span><span>30
                            Minutes</span></span>
                        <span class="tag tag-banner"><span class="icon icon-[ph--fork-knife-fill]"></span><span>Chicken</span></span>
                      </div>
                      <div>
                        <a class="btn btn-primary" href="#">
                          <span>Find out more</span>
                          <span class="icon-[fe--arrow-right]"></span>
                        </a>
                      </div>
                    </div> -->
                </div>
                <div class="banner-slider__item relative">
                    <picture class="w-full h-full object-cover">
                        <source srcset="/images/banners/2.png " media="(min-width: 1280px)">
                        <source srcset="/images/banners/2-mb.png " media="(min-width: 0px)">
                        <img src="/images/banners/2-mb.png" class="w-full h-full object-cover">
                    </picture>
                    <!-- <div class="banner-slider__content absolute inset-0 h-full flex flex-col gap-4 justify-center pl-10 text-white">
                      <div class="flex flex-col gap-2">
                        <h3 class="condensed font-extrabold text-3xl">Spicy delicious chicken thighs</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                          magna aliqut e...</p>
                      </div>
                      <div class="tags">
                        <span class="tag tag-banner"><span class="icon icon-[ph--timer-fill]"></span><span>30
                            Minutes</span></span>
                        <span class="tag tag-banner"><span class="icon icon-[ph--fork-knife-fill]"></span><span>Chicken</span></span>
                      </div>
                      <div>
                        <a class="btn btn-primary" href="#">
                          <span>Find out more</span>
                          <span class="icon-[fe--arrow-right]"></span>
                        </a>
                      </div>
                    </div> -->
                </div>
            </div>
            <div id="search"
                 class="searchform p-3 rounded-xl bg-white m-auto relative flex flex-col items-center gap-4 mb-10 group">
                <h2 class="lobster text-2xl">10.000+ Công thức ngon dễ làm</h2>
                <form class="w-full flex gap-4 items-center justify-between" action="/tim-kiem-mon-ngon/">
                    <label for="searchinput" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                            <span class="icon-[ph--magnifying-glass] text-[var(--Gray-02)] text-xl"></span>
                        </div>
                        <input type="text" id="searchinput"
                               class="text-[var(--Gray-02)] text-base border-none rounded-lg block w-full ps-12 pe-14 p-2 bg-[var(--Gray-03)] hover:ring-1 hover:ring-[var(--Primary-03)] focus:ring-1 focus:ring-[var(--Primary-02)] focus:ring-offset-0 focus:ring-offset-transparent focus:outline-none group-has-[.advanced]:ring-1 group-has-[.advanced]:ring-[var(--Primary-02)]"
                               placeholder="Tìm công thức hoặc nguyên liệu...">
                        <button type="button"
                                class="advanced-btn absolute inset-y-2 end-2 flex items-center p-2 border-l border-gray-300 group-has-[.advanced]:border-none group-has-[.advanced]:rounded-md group-has-[.advanced]:bg-[var(--Primary-03)]">
                            <span class="icon-[ph--sliders-fill] text-[var(--Primary-02)] group-has-[.advanced]:hidden"></span>
                            <span class="icon-[ph--x-bold] text-[var(--Primary-02)] hidden group-has-[.advanced]:inline-flex"></span>
                        </button>
                        <div id="accordion-advanced-search" data-active-classes="bg-white text-[var(--Primary-02)]"
                             data-inactive-classes="text-[var(--Gray-01)]"
                             class="advanced-search visible opacity-0 transition-all fixed h-screen lg:h-auto lg:absolute inset-x-0 top-0 lg:top-16 bg-white rounded-2xl p-4 pr-0 z-10 pointer-events-none group-has-[.advanced]:opacity-100 group-has-[.advanced]:pointer-events-auto">
                            <div class="flex justify-end px-3 lg:hidden">
                                <button type="button" class="advanced-btn flex items-center p-2">
                                    <span class="icon-[ph--x] text-xl"></span>
                                </button>
                            </div>
                            <div
                                    class="advanced-search-inner flex flex-col gap-4 max-h-[calc(100vh_-_66px)] lg:max-h-[45vh] scrollbox pr-2 mr-2">
                                <div class="advanced-group p-4 pb-0 border border-[var(--Gray-03)] rounded-lg"
                                     id="accordion-flush-nguyenlieu">
                                    <h2 id="accordion-flush-heading-nguyenlieu">
                                        <button type="button"
                                                class="flex items-center justify-between w-full gap-3 font-bold pb-4"
                                                data-accordion-target="#accordion-flush-body-nguyenlieu"
                                                aria-expanded="true"
                                                aria-controls="accordion-flush-body-nguyenlieu">
                                            <span>Nguyên liệu </span>
                                            <span
                                                    class="advanced-count rounded-3xl text-xs bg-[var(--Primary-02)] py-0.5 px-2 text-white ml-auto hidden">04</span>
                                            <span class="icon icon-[ph--caret-down-fill] transition-all shrink-0"></span>
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-flush-body-nguyenlieu"
                                         class="hidden transition-all border-t border-[var(--Gray-03)] text-[var(--Gray-01)] pb-4"
                                         aria-labelledby="accordion-flush-heading-nguyenlieu">
                                        <h3 class="font-bold py-4">Thịt</h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-tu-thit-heo" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Thịt heo</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-tu-thit-ga" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Thịt gà</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-tu-thit-bo" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Thịt bò</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="thit-khac" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Khác</span>
                                            </label>
                                        </div>
                                        <h3 class="font-bold py-4">Hải sản</h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-tu-ca" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Cá</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-tu-tom" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Tôm</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-tu-muc" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Mực/Bạch tuộc</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="hai-san-khac" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Khác</span>
                                            </label>
                                        </div>
                                        <h3 class="font-bold py-4">Rau củ quả</h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="cac-loai-rau" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Các loại rau</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="cu-qua" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Củ quả</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-tu-nam" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Nấm</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-tu-ca-chua" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Cà chua</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-tu-ca-rot" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Cà rốt</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="rau-cu-qua-khac" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Khác</span>
                                            </label>
                                        </div>
                                        <h3 class="font-bold py-4">Tinh bột</h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="pho-bun-hu-tieu-mien" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Phở / bún / hủ tiếu / miến</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-tu-banh-mi" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Bánh mì</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="gao" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Gạo</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="khac" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Khác</span>
                                            </label>
                                        </div>
                                        <h3 class="font-bold py-4">Khác</h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-tu-trung" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Trứng</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-tu-dau-hu" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Đậu hũ</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="nguyen-lieu-khac" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Khác</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="advanced-group p-4 pb-0 border border-[var(--Gray-03)] rounded-lg"
                                     id="accordion-flush-cachnau">
                                    <h2 id="accordion-flush-heading-cachnau">
                                        <button type="button"
                                                class="flex items-center justify-between w-full gap-3 font-bold pb-4"
                                                data-accordion-target="#accordion-flush-body-cachnau"
                                                aria-expanded="true"
                                                aria-controls="accordion-flush-body-cachnau">
                                            <span>Cách nấu </span>
                                            <span
                                                    class="advanced-count rounded-3xl text-xs bg-[var(--Primary-02)] py-0.5 px-2 text-white ml-auto hidden">04</span>
                                            <span class="icon icon-[ph--caret-down-fill] transition-all shrink-0"></span>
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-flush-body-cachnau"
                                         class="hidden transition-all border-t border-[var(--Gray-03)] text-[var(--Gray-01)] pb-4"
                                         aria-labelledby="accordion-flush-heading-cachnau">
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none pt-4">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="cac-mon-lau-ngon" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Lẩu</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="cac-mon-ham-ngon" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Hầm</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="cac-mon-goi-ngon" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Gỏi/Trộn</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="cac-mon-hap-ngon" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Hấp/Tiềm</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="cac-mon-chien-ngon" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Chiên</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="cac-mon-kho-ngon" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Kho</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="cac-mon-om-ngon" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Om/Rim</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="cach-mon-canh-ngon" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Canh/Súp</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="cac-mon-xao-ngon" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Món Xào</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="cac-mon-nuong-ngon" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Nướng</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="cac-mon-quay-ngon" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Quay/Rôti</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="cach-nau-khac" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Khác</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="advanced-group p-4 pb-0 border border-[var(--Gray-03)] rounded-lg"
                                     id="accordion-flush-dipnau">
                                    <h2 id="accordion-flush-heading-dipnau">
                                        <button type="button"
                                                class="flex items-center justify-between w-full gap-3 font-bold pb-4"
                                                data-accordion-target="#accordion-flush-body-dipnau"
                                                aria-expanded="true"
                                                aria-controls="accordion-flush-body-dipnau">
                                            <span>Dịp lễ </span>
                                            <span
                                                    class="advanced-count rounded-3xl text-xs bg-[var(--Primary-02)] py-0.5 px-2 text-white ml-auto hidden">04</span>
                                            <span class="icon icon-[ph--caret-down-fill] transition-all shrink-0"></span>
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-flush-body-dipnau"
                                         class="hidden transition-all border-t border-[var(--Gray-03)] text-[var(--Gray-01)] pb-4"
                                         aria-labelledby="accordion-flush-heading-dipnau">
                                        <h3 class="font-bold py-4">Ngày</h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="bua-sang" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Bữa sáng</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="bua-trua" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Bữa trưa</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="bua-toi" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Bữa tối</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-cuoi-tuan" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Cuối tuần</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="thuc-don-hang-ngay" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Thực đơn hàng ngày</span>
                                            </label>
                                        </div>
                                        <h3 class="font-bold py-4">Lễ tiệc</h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="ngay-he" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Ngày hè</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="le-hoi-hoa-trang" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Lễ hội hóa trang</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-ngay-sinh-nhat" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Sinh nhật</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-dip-giang-sinh" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Giáng sinh</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-ngay-tet" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Tết</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="le-tiec-khac" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Khác</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="advanced-group p-4 pb-0 border border-[var(--Gray-03)] rounded-lg"
                                     id="accordion-flush-loaimon">
                                    <h2 id="accordion-flush-heading-loaimon">
                                        <button type="button"
                                                class="flex items-center justify-between w-full gap-3 font-bold pb-4"
                                                data-accordion-target="#accordion-flush-body-loaimon"
                                                aria-expanded="true"
                                                aria-controls="accordion-flush-body-loaimon">
                                            <span>Món ăn </span>
                                            <span
                                                    class="advanced-count rounded-3xl text-xs bg-[var(--Primary-02)] py-0.5 px-2 text-white ml-auto hidden">04</span>
                                            <span class="icon icon-[ph--caret-down-fill] transition-all shrink-0"></span>
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-flush-body-loaimon"
                                         class="hidden transition-all border-t border-[var(--Gray-03)] text-[var(--Gray-01)] pb-4"
                                         aria-labelledby="accordion-flush-heading-loaimon">
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none pt-4">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-man" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Món mặn</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-nhau" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Món nhậu</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="cac-mon-chay-ngon" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Món chay</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="cac-mon-an-kem-mon-phu" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Các món ăn kèm, món phụ</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="an-vat" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Ăn vặt</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="advanced-group p-4 pb-0 border border-[var(--Gray-03)] rounded-lg"
                                     id="accordion-flush-giadinh">
                                    <h2 id="accordion-flush-heading-giadinh">
                                        <button type="button"
                                                class="flex items-center justify-between w-full gap-3 font-bold pb-4"
                                                data-accordion-target="#accordion-flush-body-giadinh"
                                                aria-expanded="true"
                                                aria-controls="accordion-flush-body-giadinh">
                                            <span>Gia đình </span>
                                            <span
                                                    class="advanced-count rounded-3xl text-xs bg-[var(--Primary-02)] py-0.5 px-2 text-white ml-auto hidden">04</span>
                                            <span class="icon icon-[ph--caret-down-fill] transition-all shrink-0"></span>
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-flush-body-giadinh"
                                         class="hidden transition-all border-t border-[var(--Gray-03)] text-[var(--Gray-01)] pb-4"
                                         aria-labelledby="accordion-flush-heading-giadinh">
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none pt-4">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="tre-em" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Trẻ em</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-cho-me" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Mẹ</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-an-cho-cha" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Cha</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-an-cho-nguoi-lon-tuoi" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Người lớn tuổi</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="advanced-group p-4 pb-0 border border-[var(--Gray-03)] rounded-lg"
                                     id="accordion-flush-vungmien">
                                    <h2 id="accordion-flush-heading-vungmien">
                                        <button type="button"
                                                class="flex items-center justify-between w-full gap-3 font-bold pb-4"
                                                data-accordion-target="#accordion-flush-body-vungmien"
                                                aria-expanded="true"
                                                aria-controls="accordion-flush-body-vungmien">
                                            <span>Vùng miền </span>
                                            <span
                                                    class="advanced-count rounded-3xl text-xs bg-[var(--Primary-02)] py-0.5 px-2 text-white ml-auto hidden">04</span>
                                            <span class="icon icon-[ph--caret-down-fill] transition-all shrink-0"></span>
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-flush-body-vungmien"
                                         class="hidden transition-all border-t border-[var(--Gray-03)] text-[var(--Gray-01)] pb-4"
                                         aria-labelledby="accordion-flush-heading-vungmien">
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none pt-4">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-mien-bac" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Bắc</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-mien-trung" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Trung</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-ngon-mien-nam" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Nam</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-a" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Món Á</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mon-au" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Món Âu</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="advanced-group p-4 pb-0 border border-[var(--Gray-03)] rounded-lg"
                                     id="accordion-flush-dinhduong">
                                    <h2 id="accordion-flush-heading-dinhduong">
                                        <button type="button"
                                                class="flex items-center justify-between w-full gap-3 font-bold pb-4"
                                                data-accordion-target="#accordion-flush-body-dinhduong"
                                                aria-expanded="true"
                                                aria-controls="accordion-flush-body-dinhduong">
                                            <span>Dinh dưỡng </span>
                                            <span
                                                    class="advanced-count rounded-3xl text-xs bg-[var(--Primary-02)] py-0.5 px-2 text-white ml-auto hidden">04</span>
                                            <span class="icon icon-[ph--caret-down-fill] transition-all shrink-0"></span>
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-flush-body-dinhduong"
                                         class="hidden transition-all border-t border-[var(--Gray-03)] text-[var(--Gray-01)] pb-4"
                                         aria-labelledby="accordion-flush-heading-dinhduong">
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none pt-4">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="an-kieng" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Ăn kiêng</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="tang-nang-luong" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Tăng năng lượng</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="tot-cho-xuong" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Tốt cho xương</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="tot-cho-da" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Tốt cho da</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="ho-tro-mien-dich" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Hỗ trợ miễn dịch</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="hoi-phuc-sau-cam" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Hồi phục sau cảm</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="advanced-group p-4 pb-0 border border-[var(--Gray-03)] rounded-lg"
                                     id="accordion-flush-nuoccham">
                                    <h2 id="accordion-flush-heading-nuoccham">
                                        <button type="button"
                                                class="flex items-center justify-between w-full gap-3 font-bold pb-4"
                                                data-accordion-target="#accordion-flush-body-nuoccham"
                                                aria-expanded="true"
                                                aria-controls="accordion-flush-body-nuoccham">
                                            <span>Xốt/Nước chấm </span>
                                            <span
                                                    class="advanced-count rounded-3xl text-xs bg-[var(--Primary-02)] py-0.5 px-2 text-white ml-auto hidden">04</span>
                                            <span class="icon icon-[ph--caret-down-fill] transition-all shrink-0"></span>
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-flush-body-nuoccham"
                                         class="hidden transition-all border-t border-[var(--Gray-03)] text-[var(--Gray-01)] pb-4"
                                         aria-labelledby="accordion-flush-heading-nuoccham">
                                        <h3 class="font-bold py-4">Nước chấm khác</h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="bot-canh" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Bột Canh</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="nuoc-tuong" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Nước tương</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="tuong-ca-tuong-ot" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Tương cà/Tương ớt</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mayonnaise" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Mayonnaise</span>
                                            </label>
                                        </div>
                                        <h3 class="font-bold py-4">Nước chấm truyền thống</h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="chao" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Chao</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="advanced-group p-4 pb-0 border border-[var(--Gray-03)] rounded-lg"
                                     id="accordion-flush-giavi">
                                    <h2 id="accordion-flush-heading-giavi">
                                        <button type="button"
                                                class="flex items-center justify-between w-full gap-3 font-bold pb-4"
                                                data-accordion-target="#accordion-flush-body-giavi" aria-expanded="true"
                                                aria-controls="accordion-flush-body-giavi">
                                            <span>Sản phẩm Ajinomoto </span>
                                            <span
                                                    class="advanced-count rounded-3xl text-xs bg-[var(--Primary-02)] py-0.5 px-2 text-white ml-auto hidden">04</span>
                                            <span class="icon icon-[ph--caret-down-fill] transition-all shrink-0"></span>
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-flush-body-giavi"
                                         class="hidden transition-all border-t border-[var(--Gray-03)] text-[var(--Gray-01)] pb-4"
                                         aria-labelledby="accordion-flush-heading-giavi">
                                        <h3 class="font-bold pt-4"></h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="bot-ngot-ajinomoto" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Bột ngọt AJI-NO-MOTO®</span>
                                            </label>
                                        </div>
                                        <h3 class="font-bold pt-4"></h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="hat-nem-aji-ngon" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Hạt nêm Aji-ngon® Heo</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="hat-nem-aji-ngon-tu-nam-huong-va-hat-sen"
                                                       name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Hạt nêm Aji-ngon® Nấm</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="hat-nem-aji-ngon-ga" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Hạt nêm Aji-ngon® Gà</span>
                                            </label>
                                        </div>
                                        <h3 class="font-bold pt-4"></h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mayonnaise-aji-mayo" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Xốt Mayonnaise Aji-mayo® Vị Nguyên Bản</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="mayonnaise-aji-mayo-ngot-diu" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Xốt Mayonnaise Aji-mayo® Vị Ngọt Dịu</span>
                                            </label>
                                        </div>
                                        <h3 class="font-bold pt-4"></h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="nuoc-tuong-phu-si" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Nước tương &quot;Phú Sĩ&quot;</span>
                                            </label>
                                        </div>
                                        <h3 class="font-bold pt-4"></h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="giam-gao-len-men-lisa" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Giấm gạo lên men Ajinomoto</span>
                                            </label>
                                        </div>
                                        <h3 class="font-bold pt-4"></h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="aji-quick-ca-kho-rieng-gia-vi-nem-san"
                                                       name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Gia vị nêm sẵn Aji-Quick® Cá Kho Riềng</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="gia-vi-mon-kho-aji-quick" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Gia vị món kho Aji-Quick® Cá Kho</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="aji-quick-gia-vi-nem-san-lau-kim-chi"
                                                       name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Gia vị nêm sẵn Aji-Quick® Lẩu Kim Chi</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="aji-quick-gia-vi-nem-san-lau-thai" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Gia vị nêm sẵn Aji-Quick® Lẩu Thái</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="aji-quick-bot-tam-kho-chien-gion" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Gia vị nêm sẵn Aji-Quick® Bột tẩm khô chiên giòn</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="aji-quick-bot-chien-gion" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Gia vị nêm sẵn Aji-Quick® Bột chiên giòn</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="aji-quick-bun-bo-hue-gia-vi-nem-san"
                                                       name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Gia vị nêm sẵn Aji-Quick® Bún Bò Huế</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="aji-quick-pho-bo-gia-vi-nem-san" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Gia vị nêm sẵn Aji-Quick® Phở Bò</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="aji-quick-thit-kho-tau-gia-vi-nem-san"
                                                       name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Gia vị nêm sẵn Aji-Quick® Thịt Kho tàu</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="aji-quick-thit-kho-gia-vi-nem-san" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Gia vị nêm sẵn Aji-Quick® Thịt Kho</span>
                                            </label>
                                        </div>
                                        <h3 class="font-bold pt-4"></h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="bot-canh-cua-ajinomoto" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Bột canh</span>
                                            </label>
                                        </div>
                                        <h3 class="font-bold pt-4"></h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="bot-banh-ran-pha-san-vi-so-co-la" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Bột bánh rán pha sẵn vị Sô-Cô-La</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="bot-banh-ran-pha-san-tu-ajinomoto" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Bột bánh rán pha sẵn vị truyền thống</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="banh-ran-pha-san-bua-sang-dinh-duong"
                                                       name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Bột bánh rán pha sẵn bữa sáng dinh dưỡng</span>
                                            </label>
                                        </div>
                                        <h3 class="font-bold pt-4"></h3>
                                        <div class="flex flex-wrap justify-start border-b pb-4 last:pb-0 last:border-none">
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="tra-sua-dau-blendy" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Blendy™ Trà Sữa Dâu</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="tra-matcha-sua-blendy" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Blendy® Trà Matcha Sữa</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="tra-sua-royal-blendy" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Blendy® Trà Sữa Royal</span>
                                            </label>
                                            <label class="flex items-center gap-2 flex-[0_1_25%] cursor-pointer text-xs lg:text-sm py-1">
                                                <input type="checkbox" value="tra-matcha-gao-rang-blendy" name=""
                                                       class="w-4 h-4 text-[var(--Primary-02)] focus:ring-0 border-[var(--Neutral-05)] rounded-sm">
                                                <span class="pr-2 block text-nowrap"> Blendy® Trà Matcha Gạo Rang</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-search">
                        <img src="/images/icons/right-bold.svg" class="w-8 h-8 aspect-square"/>
                    </button>
                </form>
            </div>
        </section>

        <div class="container mb-10 md:mb-20 relative px-4 lg:px-0">
            <h2 class="title">Sản <strong>Phẩm</strong></h2>
            <div class="flex mt-10 gap-12 justify-between">
                <?php
                global $wp;
//                $temps_page = get_queried_object();
//                $slug_page = get_term_link($temps_page,'danh_muc_gia_vi_ban_can');
                ?>
                <ul class="tabs">
                    <li class="tab tab-active">
                        <a href="<?= home_url( $wp->request ) ?>">Tất Cả</a>
                    </li>
                    <?php
                    $args = array(
                        'taxonomy' => 'danh_muc_gia_vi_ban_can',
                    );
                    $taxonomy = get_categories($args);
                    if (!empty($taxonomy)) {
                        foreach ($taxonomy as $taxo) { ?>
                            <li class="tab">
                                <a href="<?= get_term_link($taxo, 'danh_muc_gia_vi_ban_can') ?>">
                                    <span class="icon ">
                                        <?php
                                        $image2 = Helper::acfTermThumb($taxo, 'term_thumb', 'medium', true, ['class' => '']);
                                         ?>
                                        <?= $image2 ?>
                                    </span>
                                    <?= $taxo->name ?>
                                </a>
                            </li>
                        <?php }
                    }
                    ?>
                </ul>
            </div>
            <div class="seasoning_shelf flex flex-wrap justify-between items-center gap-x-4 gap-14 pt-14 lg:gap-y-40 lg:pb-20 lg:pt-40">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <div class="seasoning_shelf--item flex flex-col gap-6 sm:gap-8 w-1/2 lg:w-1/4 items-start">
                        <?php echo get_the_post_thumbnail(null, 'medium', array( 'class' => 'aspect-square object-cover' )); ?>
<!--                        <img src="/images/seasonings/1.png" alt="" class="aspect-square object-cover">-->
                        <div class="flex flex-col gap-2 py-2 px-2 sm:px-4 sm:py-3 w-full">
                            <h6 class="text-[var(--Gray-01)] text-sm leading-4 text-center font-bold">
                                <?= $post->post_title ?></h6>
                            <p class="text-sm font-normal text-center text-[var(--Gray-02)] leading-5 line-clamp-2"><?= $post->post_excerpt ?></p>
                            <a href="<?= get_permalink() ?>" class="btn btn-primary btn-default btn-sx !w-fit m-auto">
                                <span>Công thức</span>
                                <span class="icon icon-[fe--arrow-right]"></span>
                            </a>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>

            </div>
            <?php
            $args = array('post_type' => 'gia-vi-ban-can', 'numberposts' => -1);
            $count_posts = count(get_posts($args));
            $col_post = ceil($count_posts / 12);
            if ($col_post > 1) {
                $temps = get_queried_object();
                $slug_post = get_page_link($temps) . $temps->name;
                $page = get_query_var( 'paged' );
                ?>
                <input type="hidden" value="<?= $slug_post ?>" class="slug_post">
                <div class="seasoning_master_pagination  sm:flex flex-wrap gap-4 justify-between">
                    <div class="left flex gap-2 items-center">
                        <select class="select_col_post flex gap-1 h-8 items-center px-3 py-1 rounded-sm outline outline-[var(--Neutral-05)] ring-0 outline-0 border-[var(--Neutral-05)]">
                            <?php
                            for ($i = 1; $i <= $col_post; $i++ ) { ?>
                                <option <?= $i == $page ?  'selected="selected"':''?> value="<?= $i ?>" class="text-sm text-[var(--Gray-01)] font-normal" >
                                    <?= $i ?> / page
                                </option>
                            <?php } ?>
                        </select>
                        <div class="text-sm text-[var(--Gray-01)] font-normal">Go to</div>
                        <input min="1" max="<?= $col_post ?>" value="<?= $page >= 1 ? $page:'1' ?>"
                               class="testinput w-[50px] px-3 h-7 text-sm text-[var(--Gray-01)] text-center font-normal rounded-sm outline outline-[var(--Neutral-05)]">
                    </div>
                    <div class="right">
                        <?= ehd_pagination_links() ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php

get_footer();
