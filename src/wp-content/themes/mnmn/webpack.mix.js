const mix = require('laravel-mix');
const purgeCss = require('@fullhuman/postcss-purgecss');

const path = require('path');
let directory = path.basename(path.resolve(__dirname));

const dir = 'wp-content/themes/' + directory;
const dir_main = '../html/dist';

const resources = dir + '/resources';
const assets = dir + '/assets';

mix
    .disableNotifications()
    .copyDirectory(dir_main + '/images' , assets + '/images')

    .sass(resources + '/sass/fonts.scss', assets + '/css')
    .sass(resources + '/sass/main.scss', assets + '/css')

    //.sass(resources + '/sass/elementor.scss', assets + '/css')
    // .sass(resources + '/sass/woocommerce.scss', assets + '/css')
    .sass(resources + '/sass/app.scss', assets + '/css')
    .sass(resources + '/sass/trang.scss', assets + '/css')

    .js(resources + '/js/plugins-dev/back-to-top.js', assets + '/js/plugins')
    .js(resources + '/js/plugins-dev/draggable.js', assets + '/js/plugins')
    .js(resources + '/js/plugins-dev/social-share.js', assets + '/js/plugins')

    .js(resources + '/js/main.js', assets + '/js')
    .js(resources + '/js/app.js', assets + '/js')
    .js(resources + '/js/trang.js', assets + '/js');
