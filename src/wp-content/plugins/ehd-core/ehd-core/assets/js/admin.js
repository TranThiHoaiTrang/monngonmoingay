!function(){"use strict";
/*! js-cookie v3.0.5 | MIT */
function e(e){for(var r=1;r<arguments.length;r++){var t=arguments[r];for(var i in t)e[i]=t[i]}return e}var r=function r(t,i){function n(r,n,o){if("undefined"!=typeof document){"number"==typeof(o=e({},i,o)).expires&&(o.expires=new Date(Date.now()+864e5*o.expires)),o.expires&&(o.expires=o.expires.toUTCString()),r=encodeURIComponent(r).replace(/%(2[346B]|5E|60|7C)/g,decodeURIComponent).replace(/[()]/g,escape);var c="";for(var a in o)o[a]&&(c+="; "+a,!0!==o[a]&&(c+="="+o[a].split(";")[0]));return document.cookie=r+"="+t.write(n,r)+c}}return Object.create({set:n,get:function(e){if("undefined"!=typeof document&&(!arguments.length||e)){for(var r=document.cookie?document.cookie.split("; "):[],i={},n=0;n<r.length;n++){var o=r[n].split("="),c=o.slice(1).join("=");try{var a=decodeURIComponent(o[0]);if(i[a]=t.read(c,a),e===a)break}catch(e){}}return e?i[e]:i}},remove:function(r,t){n(r,"",e({},t,{expires:-1}))},withAttributes:function(t){return r(this.converter,e({},this.attributes,t))},withConverter:function(t){return r(e({},this.converter,t),this.attributes)}},{attributes:{value:Object.freeze(i)},converter:{value:Object.freeze(t)}})}({read:function(e){return'"'===e[0]&&(e=e.slice(1,-1)),e.replace(/(%[\dA-F]{2})+/gi,decodeURIComponent)},write:function(e){return encodeURIComponent(e).replace(/%(2[346BF]|3[AC-F]|40|5[BDE]|60|7[BCD])/g,decodeURIComponent)}},{path:"/"}),t=jQuery;t((function(){function e(e){var r=((e=21)=>{let r="",t=crypto.getRandomValues(new Uint8Array(e));for(;e--;)r+="useandom-26T198340PX75pxJACKVERYMINDBUSHWOLF_GQZbfghjklqvwyzrict"[63&t[e]];return r})(9);t(e).addClass(r);var i=t(e).attr("id");return"undefined"!==i&&""!==i||(i=r,t(e).attr("id",i)),i}var i=t(".codemirror_css"),n=t(".codemirror_html");i.each((function(r,i){e(i);var n=codemirror_settings.codemirror_css?_.clone(codemirror_settings.codemirror_css):{};n.codemirror=_.extend({},n.codemirror,{indentUnit:3,tabSize:3,autoRefresh:!0}),wp.codeEditor.initialize(t(i),n)})),n.each((function(r,i){e(i);var n=codemirror_settings.codemirror_html?_.clone(codemirror_settings.codemirror_html):{};n.codemirror=_.extend({},n.codemirror,{indentUnit:3,tabSize:3,autoRefresh:!0}),wp.codeEditor.initialize(t(i),n)})),t(".notice-dismiss").on("click",(function(){t(this).closest(".notice.is-dismissible").fadeOut()})),t(".filter-tabs").each((function(i,n){var o=e(n),c=t(n).find(".tabs-nav"),a=t(n).find(".tabs-content");a.find(".tabs-panel").hide();var s="cookie_"+o+"_"+i;if(""===r.get(s)||"undefined"===r.get(s)){var d=c.find("a:first").attr("href");r.set(s,d,{expires:7,path:""})}c.find('a[href="'+r.get(s)+'"]').addClass("current"),c.find("a").on("click",(function(e){e.preventDefault(),r.set(s,t(this).attr("href"),{expires:7,path:""}),c.find("a.current").removeClass("current"),a.find(".tabs-panel:visible").removeClass("show").hide(),t(this.hash).addClass("show").show(),t(this).addClass("current")})).filter(".current").trigger("click")})),t("#createuser").find("#send_user_notification").removeAttr("checked").attr("disabled",!0),t('input[value="advanced-custom-fields-pro/acf.php"]').remove(),t('input[value="ehd-core/ehd-core.php"]').remove()}))}();