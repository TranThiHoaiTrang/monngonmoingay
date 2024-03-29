let mix = require('laravel-mix');
const purgeCss = require('@fullhuman/postcss-purgecss');

const path = require('path');
let directory = path.basename(path.resolve(__dirname));

const dir = './wp-content/plugins/' + directory;

const resources = dir + '/resources';
const assets = dir + '/assets';

mix
    .disableNotifications()

    .copyDirectory(resources + '/fonts/fontawesome/webfonts', assets + '/webfonts')

    .sass(resources + '/sass/editor-style.scss', assets + '/css')
    .sass(resources + '/sass/admin.scss', assets + '/css')
    .sass(resources + '/sass/ehd.scss', assets + '/css')
    //.sass(resources + '/sass/woocommerce.scss', assets + '/css')
    //.sass(resources + '/sass/elementor.scss', assets + '/css')
    .sass(resources + '/sass/swiper.scss', assets + '/css')

    .js(resources + '/js/plugins-dev/swiper.js', assets + '/js/plugins')

    .js(resources + '/js/plugins-dev/skip-link-focus-fix.js', assets + '/js/plugins')
    .js(resources + '/js/plugins-dev/flex-gap.js', assets + '/js/plugins')
    //.js(resources + '/js/plugins-dev/passive-events-fix.js', assets + '/js/plugins')
    .js(resources + '/js/plugins-dev/load-scripts.js', assets + '/js/plugins')

    .js(resources + '/js/login.js', assets + '/js')
    .js(resources + '/js/admin.js', assets + '/js')
    .js(resources + '/js/ehd.js', assets + '/js');
