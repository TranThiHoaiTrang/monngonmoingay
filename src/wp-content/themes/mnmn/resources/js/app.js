/* jshint esversion: 6 */
//import './_foundation';
import {array} from "../../../../../wp-includes/js/dist/redux-routine";

Object.assign(window, { $: jQuery, jQuery });

// import { nanoid } from 'nanoid';
//
// import random from "lodash/random";
// import isEmpty from "lodash/isEmpty";
// import toString from "lodash/toString";

/** current-device */
import device from "current-device";

const is_mobile = () => device.mobile();
const is_tablet = () => device.tablet();

/** Fancybox */
//import { Fancybox } from "@fancyapps/ui";

//import SimpleBar from 'simplebar';

/** for browsers that don't support it! (iOS Safari, Edge, ...) */
//import ResizeObserver from 'resize-observer-polyfill';
//window.ResizeObserver = ResizeObserver;

/** AOS */
//import AOS from 'aos';
//AOS.init();

/** Create a deferred YT object */
// const YT_deferred = $.Deferred();
// window.onYouTubeIframeAPIReady = function () {
//     YT_deferred.resolve(window.YT);
// };

$(() => {

    $('.input_col_post').on('keyup', function(e) {
        let max = parseInt(this.max);
        let min = parseInt(this.min);
        if (parseInt(this.value) > max) {
            this.value = max;
        }
        if (parseInt(this.value) < min) {
            this.value = min;
        }

        let key = e.which;
        if(key === 13) {
            let url = $(this).data('url');
            let index_arr = url.split('/?');

            if ( this.value >= 1 ) {
                url = index_arr[0] + '/page/' + this.value + '/';
                if ( index_arr[1] ) {
                    url = url + '?' + index_arr[1];
                }

                redirect(url);
            }
        }
    });

    $('.select_col_post').on('change', function () {
        let pagenum = $(this).val();
        let index_arr = window.location.href.split('/?');

        let output = '';
        let index_arr1 = index_arr[0].split('/page/');
        let index_arr2 = Array();

        if (index_arr[1]) {

            index_arr2 = index_arr[1].split('&');
            for (let i = 0; i < index_arr2.length; i++) {
                // search key
                if (index_arr2[i].substring(0, 2).toLowerCase() === 's=') {
                    output = index_arr2[i];
                    break;
                }
            }
        }

        let return_str = index_arr1[0] + '/?pagenum=' + pagenum;
        if (output !== '') {
            return_str = index_arr1[0] + '/?' + index_arr2[i] + '&pagenum=' + pagenum;
        }

        redirect(return_str);
    });

    //...
    const onload_events = () => {}

    onload_events();
    $(window).on('load', () => { onload_events(); });
    device.onChangeOrientation(() => { onload_events(); });
});

/** DOMContentLoaded */
document.addEventListener( 'DOMContentLoaded', () => {
    //...
});

/** vars */
const getParameters = (url) => `${url}?`.split('?')[1].split('&').reduce((params, pair) =>
    ((key, val) => key ? {...params, [key]: val} : params)
    (...`${pair}=`.split('=').map(decodeURIComponent)), {});

const touchSupported = () => { ('ontouchstart' in window || window.DocumentTouch && document instanceof window.DocumentTouch); };

/**
 * https://stackoverflow.com/questions/1248081/how-to-get-the-browser-viewport-dimensions
 *
 * @param w
 * @returns {{w: *, h: *}}
 */
function getViewportSize(w) {

    /* Use the specified window or the current window if no argument*/
    w = w || window;

    /* This works for all browsers except IE8 and before*/
    if (w.innerWidth != null) return {w: w.innerWidth, h: w.innerHeight};

    /* For IE (or any browser) in Standards mode*/
    let d = w.document;
    if ("CSS1Compat" === document.compatMode)
        return {
            w: d.documentElement.clientWidth,
            h: d.documentElement.clientHeight
        };

    /* For browsers in Quirks mode*/
    return {w: d.body.clientWidth, h: d.body.clientHeight};
}

/**
 * @param url
 * @param $delay
 */
function redirect(url = null, $delay = 10) {
    setTimeout(function () {
        if (url === null || url === '' || typeof url === "undefined") {
            document.location.assign(window.location.href);
        } else {
            url = url.replace(/\s+/g, '');
            document.location.assign(url);
        }
    }, $delay);
}

/**
 * @param page
 * @param title
 * @param url
 */
function pushState(page, title, url) {
    if ("undefined" !== typeof history.pushState) {
        history.pushState({page: page}, title, url);
    } else {
        window.location.assign(url);
    }
}
