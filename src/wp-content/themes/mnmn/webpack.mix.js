const mix = require('laravel-mix');
const purgeCss = require('@fullhuman/postcss-purgecss');

const path = require('path');
let directory = path.basename(path.resolve(__dirname));

const dir = './wp-content/themes/' + directory;

const dist_dir = '../html/dist';
const root_dir = '..';

const resources = dir + '/resources';
const assets = dir + '/assets';
const storage = dir + '/storage';

mix
    .disableNotifications()

    .copyDirectory(dist_dir, root_dir + '/dist')
    .copyDirectory(dist_dir + '/images', root_dir + '/images')
    //.copyDirectory(dist_dir + '/images', assets + '/images')

    .sass(resources + '/sass/fonts.scss', assets + '/css')
    .sass(resources + '/sass/dist.scss', assets + '/css')
    .sass(resources + '/sass/trang.scss', assets + '/css')

    //.sass(resources + '/sass/elementor.scss', assets + '/css')
    //.sass(resources + '/sass/woocommerce.scss', assets + '/css')
    .sass(resources + '/sass/app.scss', assets + '/css')

    .js(resources + '/js/plugins-dev/back-to-top.js', assets + '/js/plugins')
    .js(resources + '/js/plugins-dev/draggable.js', assets + '/js/plugins')
    .js(resources + '/js/plugins-dev/social-share.js', assets + '/js/plugins')

    .js(resources + '/js/dist.js', assets + '/js')
    .js(resources + '/js/trang.js', assets + '/js')
    .js(resources + '/js/app.js', assets + '/js');
