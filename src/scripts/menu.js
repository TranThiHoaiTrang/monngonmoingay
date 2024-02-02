import $ from 'jquery';
const header = $('#header');
const mainNav = header.find('.main-nav');
const userMenu = header.find('.user-menu');
const navWrap = header.find('.nav-wrap');
const menuBg = header.find('.menu-bg');

// Toggle menu
$('.menu-toggle, #header .menu-bg').on('click', function () {
  mainNav.toggleClass('translate-x-0 translate-x-full');
  userMenu.toggleClass('translate-x-0 translate-x-full');
  navWrap.toggleClass('pointer-events-none pointer-events-auto');
  menuBg.toggleClass('opacity-30 opacity-0');
  $('body').toggleClass('overflow-hidden');
});
