!function(){var t={8451:function(t,e){var n,r,i;function o(){"use strict";/*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */o=function(){return e};var t,e={},n=Object.prototype,r=n.hasOwnProperty,i=Object.defineProperty||function(t,e,n){t[e]=n.value},a="function"==typeof Symbol?Symbol:{},s=a.iterator||"@@iterator",l=a.asyncIterator||"@@asyncIterator",c=a.toStringTag||"@@toStringTag";function u(t,e,n){return Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}),t[e]}try{u({},"")}catch(t){u=function(t,e,n){return t[e]=n}}function h(t,e,n,r){var o=e&&e.prototype instanceof g?e:g,a=Object.create(o.prototype),s=new N(r||[]);return i(a,"_invoke",{value:O(t,n,s)}),a}function p(t,e,n){try{return{type:"normal",arg:t.call(e,n)}}catch(t){return{type:"throw",arg:t}}}e.wrap=h;var d="suspendedStart",m="suspendedYield",y="executing",v="completed",b={};function g(){}function w(){}function k(){}var _={};u(_,s,(function(){return this}));var x=Object.getPrototypeOf,S=x&&x(x(I([])));S&&S!==n&&r.call(S,s)&&(_=S);var j=k.prototype=g.prototype=Object.create(_);function E(t){["next","throw","return"].forEach((function(e){u(t,e,(function(t){return this._invoke(e,t)}))}))}function L(t,e){function n(i,o,a,s){var l=p(t[i],t,o);if("throw"!==l.type){var c=l.arg,u=c.value;return u&&"object"==f(u)&&r.call(u,"__await")?e.resolve(u.__await).then((function(t){n("next",t,a,s)}),(function(t){n("throw",t,a,s)})):e.resolve(u).then((function(t){c.value=t,a(c)}),(function(t){return n("throw",t,a,s)}))}s(l.arg)}var o;i(this,"_invoke",{value:function(t,r){function i(){return new e((function(e,i){n(t,r,e,i)}))}return o=o?o.then(i,i):i()}})}function O(e,n,r){var i=d;return function(o,a){if(i===y)throw new Error("Generator is already running");if(i===v){if("throw"===o)throw a;return{value:t,done:!0}}for(r.method=o,r.arg=a;;){var s=r.delegate;if(s){var l=T(s,r);if(l){if(l===b)continue;return l}}if("next"===r.method)r.sent=r._sent=r.arg;else if("throw"===r.method){if(i===d)throw i=v,r.arg;r.dispatchException(r.arg)}else"return"===r.method&&r.abrupt("return",r.arg);i=y;var c=p(e,n,r);if("normal"===c.type){if(i=r.done?v:m,c.arg===b)continue;return{value:c.arg,done:r.done}}"throw"===c.type&&(i=v,r.method="throw",r.arg=c.arg)}}}function T(e,n){var r=n.method,i=e.iterator[r];if(i===t)return n.delegate=null,"throw"===r&&e.iterator.return&&(n.method="return",n.arg=t,T(e,n),"throw"===n.method)||"return"!==r&&(n.method="throw",n.arg=new TypeError("The iterator does not provide a '"+r+"' method")),b;var o=p(i,e.iterator,n.arg);if("throw"===o.type)return n.method="throw",n.arg=o.arg,n.delegate=null,b;var a=o.arg;return a?a.done?(n[e.resultName]=a.value,n.next=e.nextLoc,"return"!==n.method&&(n.method="next",n.arg=t),n.delegate=null,b):a:(n.method="throw",n.arg=new TypeError("iterator result is not an object"),n.delegate=null,b)}function A(t){var e={tryLoc:t[0]};1 in t&&(e.catchLoc=t[1]),2 in t&&(e.finallyLoc=t[2],e.afterLoc=t[3]),this.tryEntries.push(e)}function C(t){var e=t.completion||{};e.type="normal",delete e.arg,t.completion=e}function N(t){this.tryEntries=[{tryLoc:"root"}],t.forEach(A,this),this.reset(!0)}function I(e){if(e||""===e){var n=e[s];if(n)return n.call(e);if("function"==typeof e.next)return e;if(!isNaN(e.length)){var i=-1,o=function n(){for(;++i<e.length;)if(r.call(e,i))return n.value=e[i],n.done=!1,n;return n.value=t,n.done=!0,n};return o.next=o}}throw new TypeError(f(e)+" is not iterable")}return w.prototype=k,i(j,"constructor",{value:k,configurable:!0}),i(k,"constructor",{value:w,configurable:!0}),w.displayName=u(k,c,"GeneratorFunction"),e.isGeneratorFunction=function(t){var e="function"==typeof t&&t.constructor;return!!e&&(e===w||"GeneratorFunction"===(e.displayName||e.name))},e.mark=function(t){return Object.setPrototypeOf?Object.setPrototypeOf(t,k):(t.__proto__=k,u(t,c,"GeneratorFunction")),t.prototype=Object.create(j),t},e.awrap=function(t){return{__await:t}},E(L.prototype),u(L.prototype,l,(function(){return this})),e.AsyncIterator=L,e.async=function(t,n,r,i,o){void 0===o&&(o=Promise);var a=new L(h(t,n,r,i),o);return e.isGeneratorFunction(n)?a:a.next().then((function(t){return t.done?t.value:a.next()}))},E(j),u(j,c,"Generator"),u(j,s,(function(){return this})),u(j,"toString",(function(){return"[object Generator]"})),e.keys=function(t){var e=Object(t),n=[];for(var r in e)n.push(r);return n.reverse(),function t(){for(;n.length;){var r=n.pop();if(r in e)return t.value=r,t.done=!1,t}return t.done=!0,t}},e.values=I,N.prototype={constructor:N,reset:function(e){if(this.prev=0,this.next=0,this.sent=this._sent=t,this.done=!1,this.delegate=null,this.method="next",this.arg=t,this.tryEntries.forEach(C),!e)for(var n in this)"t"===n.charAt(0)&&r.call(this,n)&&!isNaN(+n.slice(1))&&(this[n]=t)},stop:function(){this.done=!0;var t=this.tryEntries[0].completion;if("throw"===t.type)throw t.arg;return this.rval},dispatchException:function(e){if(this.done)throw e;var n=this;function i(r,i){return s.type="throw",s.arg=e,n.next=r,i&&(n.method="next",n.arg=t),!!i}for(var o=this.tryEntries.length-1;o>=0;--o){var a=this.tryEntries[o],s=a.completion;if("root"===a.tryLoc)return i("end");if(a.tryLoc<=this.prev){var l=r.call(a,"catchLoc"),c=r.call(a,"finallyLoc");if(l&&c){if(this.prev<a.catchLoc)return i(a.catchLoc,!0);if(this.prev<a.finallyLoc)return i(a.finallyLoc)}else if(l){if(this.prev<a.catchLoc)return i(a.catchLoc,!0)}else{if(!c)throw new Error("try statement without catch or finally");if(this.prev<a.finallyLoc)return i(a.finallyLoc)}}}},abrupt:function(t,e){for(var n=this.tryEntries.length-1;n>=0;--n){var i=this.tryEntries[n];if(i.tryLoc<=this.prev&&r.call(i,"finallyLoc")&&this.prev<i.finallyLoc){var o=i;break}}o&&("break"===t||"continue"===t)&&o.tryLoc<=e&&e<=o.finallyLoc&&(o=null);var a=o?o.completion:{};return a.type=t,a.arg=e,o?(this.method="next",this.next=o.finallyLoc,b):this.complete(a)},complete:function(t,e){if("throw"===t.type)throw t.arg;return"break"===t.type||"continue"===t.type?this.next=t.arg:"return"===t.type?(this.rval=this.arg=t.arg,this.method="return",this.next="end"):"normal"===t.type&&e&&(this.next=e),b},finish:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var n=this.tryEntries[e];if(n.finallyLoc===t)return this.complete(n.completion,n.afterLoc),C(n),b}},catch:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var n=this.tryEntries[e];if(n.tryLoc===t){var r=n.completion;if("throw"===r.type){var i=r.arg;C(n)}return i}}throw new Error("illegal catch attempt")},delegateYield:function(e,n,r){return this.delegate={iterator:I(e),resultName:n,nextLoc:r},"next"===this.method&&(this.arg=t),b}},e}function a(t,e,n,r,i,o,a){try{var s=t[o](a),l=s.value}catch(t){return void n(t)}s.done?e(l):Promise.resolve(l).then(r,i)}function s(t){return function(){var e=this,n=arguments;return new Promise((function(r,i){var o=t.apply(e,n);function s(t){a(o,r,i,s,l,"next",t)}function l(t){a(o,r,i,s,l,"throw",t)}s(void 0)}))}}function l(t){return function(t){if(Array.isArray(t))return h(t)}(t)||function(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}(t)||u(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function c(t,e){var n="undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(!n){if(Array.isArray(t)||(n=u(t))||e&&t&&"number"==typeof t.length){n&&(t=n);var r=0,i=function(){};return{s:i,n:function(){return r>=t.length?{done:!0}:{done:!1,value:t[r++]}},e:function(t){throw t},f:i}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var o,a=!0,s=!1;return{s:function(){n=n.call(t)},n:function(){var t=n.next();return a=t.done,t},e:function(t){s=!0,o=t},f:function(){try{a||null==n.return||n.return()}finally{if(s)throw o}}}}function u(t,e){if(t){if("string"==typeof t)return h(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);return"Object"===n&&t.constructor&&(n=t.constructor.name),"Map"===n||"Set"===n?Array.from(t):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?h(t,e):void 0}}function h(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,r=new Array(e);n<e;n++)r[n]=t[n];return r}function f(t){return f="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},f(t)}function p(t,e,n){return e=m(e),function(t,e){if(e&&("object"===f(e)||"function"==typeof e))return e;if(void 0!==e)throw new TypeError("Derived constructors may only return object or undefined");return y(t)}(t,d()?Reflect.construct(e,n||[],m(t).constructor):e.apply(t,n))}function d(){try{var t=!Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){})))}catch(t){}return(d=function(){return!!t})()}function m(t){return m=Object.setPrototypeOf?Object.getPrototypeOf.bind():function(t){return t.__proto__||Object.getPrototypeOf(t)},m(t)}function y(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}function v(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),Object.defineProperty(t,"prototype",{writable:!1}),e&&b(t,e)}function b(t,e){return b=Object.setPrototypeOf?Object.setPrototypeOf.bind():function(t,e){return t.__proto__=e,t},b(t,e)}function g(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function w(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,_(r.key),r)}}function k(t,e,n){return e&&w(t.prototype,e),n&&w(t,n),Object.defineProperty(t,"prototype",{writable:!1}),t}function _(t){var e=function(t,e){if("object"!=f(t)||!t)return t;var n=t[Symbol.toPrimitive];if(void 0!==n){var r=n.call(t,e||"default");if("object"!=f(r))return r;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===e?String:Number)(t)}
/*!
 * loltgt/ensemble.SocialShare
 *
 * @version 0.0.2
 * @link https://github.com/loltgt/ensemble-social-share
 * @copyright Copyright (C) Leonardo Laureti
 * @license MIT License
 */(t,"string");return"symbol"==f(e)?e:String(e)}"undefined"!=typeof globalThis?globalThis:"undefined"!=typeof self&&self,r=[e],n=function(t){"use strict";
/*!
   * loltgt ensemble _Symbol
   *
   * @version 0.0.2
   * @link https://github.com/loltgt/ensemble
   * @copyright Copyright (C) Leonardo Laureti
   * @license MIT License
   */Object.defineProperty(t,"__esModule",{value:!0}),t.SocialShare=void 0;var e="undefined"==typeof Symbol?0:Symbol,n=/html|head|body|meta|link|style|script/i,r=/(<(html|head|body|meta|link|style|script)*>)/i,i=/html|head|body|meta|link|style|script/i,a=/attributes|classList|innerHTML|outerHTML|nodeName|nodeType/,u=function(t,n){function r(t,e,n,o,s,l){var u;if(g(this,r),!(this instanceof r?this.constructor:void 0))throw"ensemble.Compo error: Bad invocation, must be called with new.";var h=(u=p(this,r))._ns="_"+t,d=e?e.toString():"div";if(i.test(e))throw new Error("ensemble.Compo error: The tag name provided ('".concat(d,"') is not a valid name."));var m=u[h]=u._element(t,d,n,o,s,l);if(u.__Compo=!0,u[h].__compo=y(u),o&&"object"==f(o))for(var v in o){var b=v.toString();if(a.test(b))throw new Error("ensemble.Compo error: The property name provided ('".concat(b,"') is not a valid name."));if(0===b.indexOf("on")&&o[b]&&"function"==typeof o[b])m[b]=o[b].bind(y(u));else if("object"!=f(o[b]))m[b]=o[b];else if("children"==b&&"object"==f(o[b])&&o[b].length){var w,k=c(o.children);try{for(k.s();!(w=k.n()).done;){var _=w.value,x=_.tag,S=_.name,j=_.props;u.append(new r(t,x,S,j))}}catch(t){k.e(t)}finally{k.f()}}}if(n){var E=m.className;m.className="","string"==typeof n?m.className=t+"-"+n:"object"==f(n)&&(m.className=n.map((function(e){return t+"-"+e})).join(" ")),E&&(m.className+=" "+E)}return u._renderer(),u}return v(r,t),k(r,[{key:"_element",value:function(t,e,n,r,i,o){return o?document.createElementNS(e,[].concat(l(o),l(i))):document.createElement(e,i)}},{key:"hasAttr",value:function(t){return this[this._ns].hasAttribute(t)}},{key:"getAttr",value:function(t){return this[this._ns].getAttribute(t)}},{key:"setAttr",value:function(t,e){this[this._ns].setAttribute(t,e)}},{key:"delAttr",value:function(t){this[this._ns].removeAttribute(t)}},{key:"getStyle",value:function(t){return window.getComputedStyle(this[this._ns])[t]}},{key:"show",value:function(){this[this._ns].hidden=!1}},{key:"hide",value:function(){this[this._ns].hidden=!0}},{key:"enable",value:function(){this[this._ns].disabled=!1}},{key:"disable",value:function(){this[this._ns].disabled=!0}},{key:"node",get:function(){return console.warn("ensemble.Compo","Direct access to the node is strongly discouraged."),this[this._ns]}},{key:"parent",get:function(){var t=this._ns;return this[t].parentElement&&"__compo"in this[t].parentElement?this[t].parentElement.__compo:null}},{key:"previous",get:function(){var t=this._ns;return this[t].previousElementSibling?this[t].previousElementSibling.__compo:null}},{key:"next",get:function(){var t=this._ns;return this[t].nextElementSibling?this[t].nextElementSibling.__compo:null}},{key:"classList",get:function(){return this[this._ns].classList}},{key:n,get:function(){return"ensemble.Compo"}}],[{key:"isCompo",value:function(t){return e?e.for(t)===e.for(r.prototype):t&&"object"==f(t)&&"__Compo"in t}}]),r}(function(){function t(){g(this,t)}return k(t,[{key:"_renderer",value:function(){delete this._element,delete this._renderer}},{key:"install",value:function(t,e){return"function"==typeof e&&e.call(this,this[this._ns]),!!t.appendChild(this[this._ns])}},{key:"uninstall",value:function(t,e){return"function"==typeof e&&e.call(this,this[this._ns]),!!t.removeChild(this[this._ns])}},{key:"up",value:function(t,e){return"function"==typeof e&&e.call(this,this[this._ns]),!!t.replaceWith(this[this._ns])}},{key:"append",value:function(t){var e=this._ns;return!!this[e].appendChild(t[e])}},{key:"prepend",value:function(t){var e=this._ns;return!!this[e].prependChild(t[e])}},{key:"remove",value:function(t){var e=this._ns;return!!this[e].removeChild(t[e])}},{key:"inject",value:function(t){if(t instanceof Element==0||n.test(t.tagName)||r.test(t.innerHTML))throw new Error("ensemble.Compo error: The remote object could not be resolved into a valid node.");return this.empty(),!!this[this._ns].appendChild(t)}},{key:"empty",value:function(){for(;this.first;)this.remove(this.first)}},{key:"children",get:function(){return Array.prototype.map.call(this[this._ns].children,(function(t){return t.__compo}))}},{key:"first",get:function(){var t=this._ns;return this[t].firstElementChild?this[t].firstElementChild.__compo:null}},{key:"last",get:function(){var t=this._ns;return this[t].lastElementChild?this[t].lastElementChild.__compo:null}}]),t}(),e.toStringTag),h=function(t){function n(t,e){if(g(this,n),!(this instanceof n?this.constructor:void 0))throw"ensemble.Data error: Bad invocation, must be called with new.";e&&"object"==f(e)&&Object.assign(this,{},e);var r=this._ns="_"+t;this.__Data=!0,this[r]={ns:t}}return k(n,[{key:"compo",value:function(t,e,n){var r,i=arguments.length>3&&void 0!==arguments[3]&&arguments[3],o=arguments.length>4&&void 0!==arguments[4]&&arguments[4],a=arguments.length>5&&void 0!==arguments[5]&&arguments[5],s=this[this._ns].ns;return r=i?{ns:s,tag:t,name:e,props:n,fresh:o,stale:a}:new u(s,t,e,n),o&&"function"==typeof o&&(r.fresh=n.onfresh=o),a&&"function"==typeof a&&(r.stale=n.onstale=a),r}},{key:"render",value:function(){var t=s(o().mark((function t(e){var n;return o().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:this[n=this._ns][e]&&this[n][e].rendered||(this[n][e]={rendered:!0,fresh:this[e].fresh,stale:this[e].stale,params:this[e]},this[e]=new u(this[e].ns,this[e].tag,this[e].name,this[e].props)),this[n][e].fresh();case 2:case"end":return t.stop()}}),t,this)})));function e(e){return t.apply(this,arguments)}return e}()},{key:"stale",value:function(){var t=s(o().mark((function t(e){var n;return o().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:this[n=this._ns][e]&&this[n][e].rendered&&this[n][e].stale();case 2:case"end":return t.stop()}}),t,this)})));function e(e){return t.apply(this,arguments)}return e}()},{key:"reflow",value:function(){var t=s(o().mark((function t(e,n){var r;return o().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:r=this._ns,n?this[r][e]=this.compo(this[r][e].params.ns,this[r][e].params.name,this[r][e].params.props):this[r][e]&&this[r][e].rendered&&this[r][e].fresh();case 2:case"end":return t.stop()}}),t,this)})));function e(e,n){return t.apply(this,arguments)}return e}()},{key:t,get:function(){return"ensemble.Data"}}],[{key:"isData",value:function(t){return e?e.for(t)===e.for(n.prototype):t&&"object"==f(t)&&"__Data"in t}}]),n}(e.toStringTag),d=function(t){function n(t,e,r){if(g(this,n),!(this instanceof n?this.constructor:void 0))throw"ensemble.Event error: Bad invocation, must be called with new.";var i=this._ns="_"+t;r=(u.isCompo(r)?r.node:r)||document,this.__Event=!0,this[i]={name:e,node:r}}return k(n,[{key:"add",value:function(t){var e=arguments.length>1&&void 0!==arguments[1]&&arguments[1];this[this._ns].node.addEventListener(this[this._ns].name,t,e)}},{key:"remove",value:function(t){this[this._ns].node.removeEventListener(this[this._ns].name,t)}},{key:t,get:function(){return"ensemble.Event"}}],[{key:"isEvent",value:function(t){return e?e.for(t)===e.for(n.prototype):t&&"object"==f(t)&&"__Event"in t}}]),n}(e.toStringTag),m=function(){function t(){g(this,t);var e,n,r="ensemble"+((this instanceof t?this.constructor:void 0)&&(this instanceof t?this.constructor:void 0).name?"."+(this instanceof t?this.constructor:void 0).name:"");if(arguments.length>1?(e=arguments[0],n=arguments[1]):n=arguments[0],n&&"object"!=f(n))throw new TypeError("".concat(r," error: The passed argument 'options' is not of type Object."));if(e&&"object"!=f(e))throw new TypeError("".concat(r," error: The passed argument 'element' is not of type Object."));this._bindings(),this.options=this.defaults(this._defaults(),n),Object.freeze(this.options),this.element=e}return k(t,[{key:"defaults",value:function(t,e){var n={};for(var r in t)null!=t[r]&&"object"==f(t[r])?n[r]=Object.assign(t[r],e[r]):n[r]=void 0!==e[r]?e[r]:t[r];return n}},{key:"compo",value:function(t,e,n){return null!=t?new u(this.options.ns,t,e,n):u}},{key:"data",value:function(t){return null!=t?new h(this.options.ns,t):h}},{key:"event",value:function(t,e){return"string"==typeof t?new d(this.options.ns,t,e):t?(t.preventDefault(),void t.target.blur()):d}},{key:"selector",value:function(t,e){return e=e||document,arguments.length>2&&void 0!==arguments[2]&&arguments[2]?e.querySelectorAll(t):e.querySelector(t)}},{key:"appendNode",value:function(t,e){return!!t.appendChild(e)}},{key:"prependNode",value:function(t,e){return!!t.prependChild(e)}},{key:"removeNode",value:function(t,e){return!!t.removeChild(e)}},{key:"cloneNode",value:function(t){var e=arguments.length>1&&void 0!==arguments[1]&&arguments[1];return t.cloneNode(e)}},{key:"hasAttr",value:function(t,e){return t.hasAttribute(e)}},{key:"getAttr",value:function(t,e){return t.getAttribute(e)}},{key:"setAttr",value:function(t,e,n){t.setAttribute(e,n)}},{key:"delAttr",value:function(t,e){t.removeAttribute(e)}},{key:"binds",value:function(t){var e=this;return function(n){t.call(e,n,this)}}},{key:"delay",value:function(t,e,n){var r=e?this.timing(e):0;setTimeout(t,r||n)}},{key:"timing",value:function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"transitionDuration",n=u.isCompo(t)?t.getStyle(e):window.getComputedStyle(t)[e];return n&&(n=n.indexOf("s")?1e3*parseFloat(n):parseInt(n)),n||0}}]),t}(),b=function(t){function e(){var t;if(g(this,e),!(this instanceof e?this.constructor:void 0))throw"ensemble.SocialShare error: Bad invocation, must be called with new.";return(t=p(this,e,arguments)).init(),t}return v(e,t),k(e,[{key:"_defaults",value:function(){return{ns:"share",fx:!0,root:"body",className:"social-share",link:"",title:"",description:"",displays:null,intents:{facebook:0,twitter:0,whatsapp:1,messenger:1,telegram:1,linkedin:0,"send-email":2,"copy-link":3,"web-share":4},uriform:{facebook:"https://facebook.com/sharer.php?u=%url%",twitter:"https://twitter.com/share?url=%url%&text=%title%",whatsapp:"https://api.whatsapp.com/send?text=%text%",messenger:"fb-messenger://share/?link=%url%&app_id=%app_id%",telegram:"https://telegram.me/share/url?url=%url%&text=%text%",linkedin:"https://www.linkedin.com/sharing/share-offsite?mini=true&url=%url%&title=%title%&ro=false&summary=%summary%","send-email":"mailto:?subject=%subject%&body=%text%"},selectorLink:{element:'link[rel="canonical"]',attribute:"href"},selectorTitle:null,selectorDescription:{element:'meta[name="description"]',attribute:"content"},label:{},locale:{label:"Share",share:"Share on %s",send:"Send to %s",subject:"An interesting thing",text:"Hi! There is something may interesting you: %s",email:"Send via email",copy:"Copy link",copied:"Copied link!",whatsapp:"WhatsApp",linkedin:"LinkedIn","web-share":"Share"},onInit:function(){},onIntent:function(){}}}},{key:"_bindings",value:function(){this.intent=this.binds(this.intent)}},{key:"generator",value:function(){var t=this.options,e=this.share=this.compo(!1,!1,{className:"object"==f(t.className)?t.className.join(" "):t.className});if(e.setAttr("data-social-share",""),t.label){var n=this.compo("span","label",t.label);n.classList.add("label"),"innerText"in t.label==0&&(n.innerText=t.locale.label),e.append(n)}var r=this.actions=this.compo("ul","actions");e.append(r),this.built=!0}},{key:"init",value:function(){var t=this.options;this.built||(this.root=this.selector(t.root),this.displays=t.displays&&"object"==f(t.displays)?t.displays:Object.keys(t.intents),this.generator(),this.element&&this.share.up(this.element,function(t){this.element=t}.bind(this)),this.populate(),t.onInit.call(this,this))}},{key:"populate",value:function(){var t=this.options;for(var e in t.intents)if(-1!=this.displays.indexOf(e)){var n=e in t.locale?t.locale[e]:e.replace(/\w/,(function(t){return t.toUpperCase()})),r=void 0;switch(t.intents[e]){case 0:r=t.locale.share.replace("%s",n);break;case 1:r=t.locale.send.replace("%s",n);break;case 2:r=t.locale.email;break;case 3:r=t.locale.copy;break;case 4:if(!("share"in window.navigator)||"function"!=typeof window.navigator.share)continue;r=t.locale["web-share"]}this.action(e,r)}}},{key:"action",value:function(t,e){var n=this.options,r=this.compo("li","action",{className:n.ns+"-action-"+t}),i=this.compo("button",["button","intent"],{className:n.ns+"-intent-"+t,title:e,ariaLabel:e,onclick:this.intent});r.setAttr("data-share-intent",t),r.append(i);var o=this.compo("span","icon",{className:"icon-"+t});i.append(o),this.actions.append(r)}},{key:"intent",value:function(t,e){if(this.event(t),t.isTrusted){var n=this.options;if(this.compo().isCompo(e)){var r=e.parent;if(r&&r.hasAttr("data-share-intent")){var i=r.getAttr("data-share-intent");if(-1!=this.displays.indexOf(i)){var o,a={url:n.link?n.link:n.selectorLink&&"object"==f(n.selectorLink)&&this.selector(n.selectorLink.element)?this.getAttr(this.selector(n.selectorLink.element),n.selectorLink.attribute):window.location.href,title:o=n.title?n.title:n.selectorTitle&&"object"==f(n.selectorTitle)&&this.selector(n.selectorTitle.element)?this.getAttr(this.selector(n.selectorTitle.element),n.selectorTitle.attribute):document.title,text:"\r\n\r\n%title%\r\n%url%\r\n\r\n",summary:n.description?n.description:n.selectorDescription&&"object"==f(n.selectorDescription)&&this.selector(n.selectorDescription.element)?this.getAttr(this.selector(n.selectorDescription.element),n.selectorDescription.attribute):o};if(n.onIntent.call(this,this,t,i,a),a.text=n.locale.text.replace("%s",a.text),i in n.intents)switch(i){case"send-email":this.sendEmail(t,a);break;case"copy-link":this.copyLink(t,a);break;case"web-share":this.webShare(t,a);break;default:this.social(t,a,i,r)}}}}}}},{key:"text",value:function(t){return encodeURIComponent(t.text.replace("%url%",t.url).replace("%title%",t.title).replace("%summary%",t.summary))}},{key:"social",value:function(t,e,n,r){var i=this.options;if(n in i.uriform!=0){var o=i.uriform[n].replace("%url%",encodeURIComponent(e.url)).replace("%title%",encodeURIComponent(e.title)).replace("%summary%",encodeURIComponent(e.summary)),a=r.getAttr("ariaLabel"),s="toolbar=0,status=0,width=640,height=480";if(/%text%/.test(i.uriform[n])&&(o=o.replace("%text%",this.text(e))),"messenger"==n){var l="messenger_app_id"in i?i.messenger_app_id:"";o=o.replace("%app_id%",encodeURIComponent(l))}console.log(o,a,s),window.open(o,a,s)}}},{key:"sendEmail",value:function(t,e){var n=this.options,r=n.uriform["send-email"].replace("%subject%",encodeURIComponent(n.locale.subject)).replace("%text%",this.text(e));console.log(r,"_self"),window.open(r,"_self")}},{key:"copyLink",value:function(t,e){if(this.element){var n=this.options,r=document.createElement("textarea");if(r.style="position:absolute;width:0;height:0;opacity:0;z-index:-1;overflow:hidden",r.value=e.url.toString(),this.appendNode(this.element,r),r.focus(),r.select(),document.execCommand("copy"),r.remove(),n.fx){var i=this.root,o=this.compo(!1,"fx-copied-link--ground",{hidden:!0}),a=this.compo("span","copied-link-message",{innerText:n.locale.copied});i.classList.add("share-fx-copied-link"),o.install(i),a.install(i),o.show(),this.delay((function(){a.uninstall(i),o.uninstall(i),i.classList.remove("share-fx-copied-link")}),o,800)}}}},{key:"webShare",value:function(){var t=s(o().mark((function t(e,n){return o().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.prev=0,t.next=3,window.navigator.share({title:n.title,url:n.url});case 3:t.next=8;break;case 5:t.prev=5,t.t0=t.catch(0),t.t0 instanceof TypeError?console.info("ensemble.SocialShare.webShare","TODO fallback"):console.log("ensemble.SocialShare.webShare",t.t0.message);case 8:case"end":return t.stop()}}),t,null,[[0,5]])})));function e(e,n){return t.apply(this,arguments)}return e}()}]),e}(m);
/*!
   * loltgt ensemble _composition
   *
   * @version 0.0.2
   * @link https://github.com/loltgt/ensemble
   * @copyright Copyright (C) Leonardo Laureti
   * @license MIT License
   */t.SocialShare=b},void 0===(i="function"==typeof n?n.apply(e,r):n)||(t.exports=i);var x=document.querySelector(".social-share");x&&new ensemble.SocialShare(x,{displays:["facebook","twitter","messenger","telegram","send-email","copy-link","web-share"]})}},e={};(function n(r){var i=e[r];if(void 0!==i)return i.exports;var o=e[r]={exports:{}};return t[r].call(o.exports,o,o.exports,n),o.exports})(8451)}();