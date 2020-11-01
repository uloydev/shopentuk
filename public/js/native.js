/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/boxicons/dist/boxicons.js":
/*!************************************************!*\
  !*** ./node_modules/boxicons/dist/boxicons.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

!function(t,e,n,r,o){if("customElements"in n)o();else{if(n.AWAITING_WEB_COMPONENTS_POLYFILL)return void n.AWAITING_WEB_COMPONENTS_POLYFILL.then(o);var a=n.AWAITING_WEB_COMPONENTS_POLYFILL=f();a.then(o);var i=n.WEB_COMPONENTS_POLYFILL||"//cdnjs.cloudflare.com/ajax/libs/webcomponentsjs/2.0.2/webcomponents-bundle.js",s=n.ES6_CORE_POLYFILL||"//cdnjs.cloudflare.com/ajax/libs/core-js/2.5.3/core.min.js";"Promise"in n?c(i).then((function(){a.isDone=!0,a.exec()})):c(s).then((function(){c(i).then((function(){a.isDone=!0,a.exec()}))}))}function f(){var t=[];return t.isDone=!1,t.exec=function(){t.splice(0).forEach((function(t){t()}))},t.then=function(e){return t.isDone?e():t.push(e),t},t}function c(t){var e=f(),n=r.createElement("script");return n.type="text/javascript",n.readyState?n.onreadystatechange=function(){"loaded"!=n.readyState&&"complete"!=n.readyState||(n.onreadystatechange=null,e.isDone=!0,e.exec())}:n.onload=function(){e.isDone=!0,e.exec()},n.src=t,r.getElementsByTagName("head")[0].appendChild(n),n.then=e.then,n}}(0,0,window,document,(function(){var t,e;t=window,e=function(){return function(t){var e={};function n(r){if(e[r])return e[r].exports;var o=e[r]={i:r,l:!1,exports:{}};return t[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}return n.m=t,n.c=e,n.d=function(t,e,r){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:r})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var o in t)n.d(r,o,function(e){return t[e]}.bind(null,o));return r},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=5)}([function(t,e){t.exports=function(t){var e=[];return e.toString=function(){return this.map((function(e){var n=function(t,e){var n,r=t[1]||"",o=t[3];if(!o)return r;if(e&&"function"==typeof btoa){var a=(n=o,"/*# sourceMappingURL=data:application/json;charset=utf-8;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(n))))+" */"),i=o.sources.map((function(t){return"/*# sourceURL="+o.sourceRoot+t+" */"}));return[r].concat(i).concat([a]).join("\n")}return[r].join("\n")}(e,t);return e[2]?"@media "+e[2]+"{"+n+"}":n})).join("")},e.i=function(t,n){"string"==typeof t&&(t=[[null,t,""]]);for(var r={},o=0;o<this.length;o++){var a=this[o][0];"number"==typeof a&&(r[a]=!0)}for(o=0;o<t.length;o++){var i=t[o];"number"==typeof i[0]&&r[i[0]]||(n&&!i[2]?i[2]=n:n&&(i[2]="("+i[2]+") and ("+n+")"),e.push(i))}},e}},function(t,e,n){var r=n(3);t.exports="string"==typeof r?r:r.toString()},function(t,e,n){var r=n(4);t.exports="string"==typeof r?r:r.toString()},function(t,e,n){(t.exports=n(0)(!1)).push([t.i,"@-webkit-keyframes spin{0%{-webkit-transform:rotate(0);transform:rotate(0)}to{-webkit-transform:rotate(359deg);transform:rotate(359deg)}}@keyframes spin{0%{-webkit-transform:rotate(0);transform:rotate(0)}to{-webkit-transform:rotate(359deg);transform:rotate(359deg)}}@-webkit-keyframes burst{0%{-webkit-transform:scale(1);transform:scale(1);opacity:1}90%{-webkit-transform:scale(1.5);transform:scale(1.5);opacity:0}}@keyframes burst{0%{-webkit-transform:scale(1);transform:scale(1);opacity:1}90%{-webkit-transform:scale(1.5);transform:scale(1.5);opacity:0}}@-webkit-keyframes flashing{0%{opacity:1}45%{opacity:0}90%{opacity:1}}@keyframes flashing{0%{opacity:1}45%{opacity:0}90%{opacity:1}}@-webkit-keyframes fade-left{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}75%{-webkit-transform:translateX(-20px);transform:translateX(-20px);opacity:0}}@keyframes fade-left{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}75%{-webkit-transform:translateX(-20px);transform:translateX(-20px);opacity:0}}@-webkit-keyframes fade-right{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}75%{-webkit-transform:translateX(20px);transform:translateX(20px);opacity:0}}@keyframes fade-right{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}75%{-webkit-transform:translateX(20px);transform:translateX(20px);opacity:0}}@-webkit-keyframes fade-up{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}75%{-webkit-transform:translateY(-20px);transform:translateY(-20px);opacity:0}}@keyframes fade-up{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}75%{-webkit-transform:translateY(-20px);transform:translateY(-20px);opacity:0}}@-webkit-keyframes fade-down{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}75%{-webkit-transform:translateY(20px);transform:translateY(20px);opacity:0}}@keyframes fade-down{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}75%{-webkit-transform:translateY(20px);transform:translateY(20px);opacity:0}}@-webkit-keyframes tada{0%{-webkit-transform:scaleX(1);transform:scaleX(1)}10%,20%{-webkit-transform:scale3d(.95,.95,.95) rotate(-10deg);transform:scale3d(.95,.95,.95) rotate(-10deg)}30%,50%,70%,90%{-webkit-transform:scaleX(1) rotate(10deg);transform:scaleX(1) rotate(10deg)}40%,60%,80%{-webkit-transform:scaleX(1) rotate(-10deg);transform:scaleX(1) rotate(-10deg)}to{-webkit-transform:scaleX(1);transform:scaleX(1)}}@keyframes tada{0%{-webkit-transform:scaleX(1);transform:scaleX(1)}10%,20%{-webkit-transform:scale3d(.95,.95,.95) rotate(-10deg);transform:scale3d(.95,.95,.95) rotate(-10deg)}30%,50%,70%,90%{-webkit-transform:scaleX(1) rotate(10deg);transform:scaleX(1) rotate(10deg)}40%,60%,80%{-webkit-transform:rotate(-10deg);transform:rotate(-10deg)}to{-webkit-transform:scaleX(1);transform:scaleX(1)}}.bx-spin,.bx-spin-hover:hover{-webkit-animation:spin 2s linear infinite;animation:spin 2s linear infinite}.bx-tada,.bx-tada-hover:hover{-webkit-animation:tada 1.5s ease infinite;animation:tada 1.5s ease infinite}.bx-flashing,.bx-flashing-hover:hover{-webkit-animation:flashing 1.5s infinite linear;animation:flashing 1.5s infinite linear}.bx-burst,.bx-burst-hover:hover{-webkit-animation:burst 1.5s infinite linear;animation:burst 1.5s infinite linear}.bx-fade-up,.bx-fade-up-hover:hover{-webkit-animation:fade-up 1.5s infinite linear;animation:fade-up 1.5s infinite linear}.bx-fade-down,.bx-fade-down-hover:hover{-webkit-animation:fade-down 1.5s infinite linear;animation:fade-down 1.5s infinite linear}.bx-fade-left,.bx-fade-left-hover:hover{-webkit-animation:fade-left 1.5s infinite linear;animation:fade-left 1.5s infinite linear}.bx-fade-right,.bx-fade-right-hover:hover{-webkit-animation:fade-right 1.5s infinite linear;animation:fade-right 1.5s infinite linear}",""])},function(t,e,n){(t.exports=n(0)(!1)).push([t.i,'.bx-rotate-90{transform:rotate(90deg);-ms-filter:"progid:DXImageTransform.Microsoft.BasicImage(rotation=1)"}.bx-rotate-180{transform:rotate(180deg);-ms-filter:"progid:DXImageTransform.Microsoft.BasicImage(rotation=2)"}.bx-rotate-270{transform:rotate(270deg);-ms-filter:"progid:DXImageTransform.Microsoft.BasicImage(rotation=3)"}.bx-flip-horizontal{transform:scaleX(-1);-ms-filter:"progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1)"}.bx-flip-vertical{transform:scaleY(-1);-ms-filter:"progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)"}',""])},function(t,e,n){"use strict";n.r(e);var r,o,a,i,s=n(1),f=n.n(s),c=n(2),l=n.n(c),m="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},u=function(){function t(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}return function(e,n,r){return n&&t(e.prototype,n),r&&t(e,r),e}}(),d=(r=Object,o=r.getPrototypeOf||function(t){return t.__proto__},a=r.setPrototypeOf||function(t,e){return t.__proto__=e,t},i="object"===("undefined"==typeof Reflect?"undefined":m(Reflect))?Reflect.construct:function(t,e,n){var r,o=[null];return o.push.apply(o,e),r=t.bind.apply(t,o),a(new r,n.prototype)},function(t){var e=o(t);return a(t,a((function(){return i(e,arguments,o(this).constructor)}),e))}),p=window,b={},y=document.createElement("template"),h=function(){return!!p.ShadyCSS};y.innerHTML='\n<style>\n:host {\n  display: inline-block;\n  font-size: initial;\n  box-sizing: border-box;\n  width: 24px;\n  height: 24px;\n}\n:host([size=xs]) {\n    width: 0.8rem;\n    height: 0.8rem;\n}\n:host([size=sm]) {\n    width: 1.55rem;\n    height: 1.55rem;\n}\n:host([size=md]) {\n    width: 2.25rem;\n    height: 2.25rem;\n}\n:host([size=lg]) {\n    width: 3.0rem;\n    height: 3.0rem;\n}\n\n:host([size]:not([size=""]):not([size=xs]):not([size=sm]):not([size=md]):not([size=lg])) {\n    width: auto;\n    height: auto;\n}\n:host([pull=left]) #icon {\n    float: left;\n    margin-right: .3em!important;\n}\n:host([pull=right]) #icon {\n    float: right;\n    margin-left: .3em!important;\n}\n:host([border=square]) #icon {\n    padding: .25em;\n    border: .07em solid rgba(0,0,0,.1);\n    border-radius: .25em;\n}\n:host([border=circle]) #icon {\n    padding: .25em;\n    border: .07em solid rgba(0,0,0,.1);\n    border-radius: 50%;\n}\n#icon,\nsvg {\n  width: 100%;\n  height: 100%;\n}\n#icon {\n    box-sizing: border-box;\n} \n'+f.a+"\n"+l.a+'\n</style>\n<div id="icon"></div>';var g=d(function(t){function e(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,e);var t=function(t,e){if(!t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!e||"object"!=typeof e&&"function"!=typeof e?t:e}(this,(e.__proto__||Object.getPrototypeOf(e)).call(this));return t.$ui=t.attachShadow({mode:"open"}),t.$ui.appendChild(t.ownerDocument.importNode(y.content,!0)),h()&&p.ShadyCSS.styleElement(t),t._state={$iconHolder:t.$ui.getElementById("icon"),type:t.getAttribute("type")},t}return function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}(e,HTMLElement),u(e,null,[{key:"getIconSvg",value:function(t,e){var n=this.cdnUrl+"/regular/bx-"+t+".svg";return"solid"===e?n=this.cdnUrl+"/solid/bxs-"+t+".svg":"logo"===e&&(n=this.cdnUrl+"/logos/bxl-"+t+".svg"),n&&b[n]?b[n]:(b[n]=new Promise((function(t,e){var r=new XMLHttpRequest;r.addEventListener("load",(function(){this.status<200||this.status>=300?e(new Error(this.status+" "+this.responseText)):t(this.responseText)})),r.onerror=e,r.onabort=e,r.open("GET",n),r.send()})),b[n])}},{key:"define",value:function(t){t=t||this.tagName,h()&&p.ShadyCSS.prepareTemplate(y,t),customElements.define(t,this)}},{key:"cdnUrl",get:function(){return"//unpkg.com/boxicons@2.0.6/svg"}},{key:"tagName",get:function(){return"box-icon"}},{key:"observedAttributes",get:function(){return["type","name","color","size","rotate","flip","animation","border","pull"]}}]),u(e,[{key:"attributeChangedCallback",value:function(t,e,n){var r=this._state.$iconHolder;switch(t){case"type":!function(t,e,n){var r=t._state;r.$iconHolder.textContent="",r.type&&(r.type=null),r.type=!n||"solid"!==n&&"logo"!==n?"regular":n,void 0!==r.currentName&&t.constructor.getIconSvg(r.currentName,r.type).then((function(t){r.type===n&&(r.$iconHolder.innerHTML=t)})).catch((function(t){console.error("Failed to load icon: "+r.currentName+"\n"+t)}))}(this,0,n);break;case"name":!function(t,e,n){var r=t._state;r.currentName=n,r.$iconHolder.textContent="",n&&void 0!==r.type&&t.constructor.getIconSvg(n,r.type).then((function(t){r.currentName===n&&(r.$iconHolder.innerHTML=t)})).catch((function(t){console.error("Failed to load icon: "+n+"\n"+t)}))}(this,0,n);break;case"color":r.style.fill=n||"";break;case"size":!function(t,e,n){var r=t._state;r.size&&(r.$iconHolder.style.width=r.$iconHolder.style.height="",r.size=r.sizeType=null),n&&!/^(xs|sm|md|lg)$/.test(r.size)&&(r.size=n.trim(),r.$iconHolder.style.width=r.$iconHolder.style.height=r.size)}(this,0,n);break;case"rotate":e&&r.classList.remove("bx-rotate-"+e),n&&r.classList.add("bx-rotate-"+n);break;case"flip":e&&r.classList.remove("bx-flip-"+e),n&&r.classList.add("bx-flip-"+n);break;case"animation":e&&r.classList.remove("bx-"+e),n&&r.classList.add("bx-"+n)}}},{key:"connectedCallback",value:function(){h()&&p.ShadyCSS.styleElement(this)}}]),e}());n.d(e,"BoxIconElement",(function(){return g})),e.default=g,g.define()}])}, true?module.exports=e():undefined}));
//# sourceMappingURL=boxicons.js.map

/***/ }),

/***/ "./public/js/addons/raterjs/index.js":
/*!*******************************************!*\
  !*** ./public/js/addons/raterjs/index.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;var require;var require;function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

(function (f) {
  if (( false ? undefined : _typeof(exports)) === "object" && typeof module !== "undefined") {
    module.exports = f();
  } else if (true) {
    !(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_FACTORY__ = (f),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
  } else { var g; }
})(function () {
  var define, module, exports;
  return function () {
    function r(e, n, t) {
      function o(i, f) {
        if (!n[i]) {
          if (!e[i]) {
            var c = "function" == typeof require && require;
            if (!f && c) return require(i, !0);
            if (u) return u(i, !0);
            var a = new Error("Cannot find module '" + i + "'");
            throw a.code = "MODULE_NOT_FOUND", a;
          }

          var p = n[i] = {
            exports: {}
          };
          e[i][0].call(p.exports, function (r) {
            var n = e[i][1][r];
            return o(n || r);
          }, p, p.exports, r, e, n, t);
        }

        return n[i].exports;
      }

      for (var u = "function" == typeof require && require, i = 0; i < t.length; i++) {
        o(t[i]);
      }

      return o;
    }

    return r;
  }()({
    1: [function (require, module, exports) {
      "use strict";
      /*! rater-js. [c] 2018 Fredrik Olsson. MIT License */

      var css = require('./style.css');

      module.exports = function (options) {
        //private fields
        var showToolTip = true;

        if (typeof options.element === "undefined" || options.element === null) {
          throw new Error("element required");
        }

        if (typeof options.showToolTip !== "undefined") {
          showToolTip = !!options.showToolTip;
        }

        if (typeof options.step !== "undefined") {
          if (options.step <= 0 || options.step > 1) {
            throw new Error("step must be a number between 0 and 1");
          }
        }

        var elem = options.element;
        var reverse = options.reverse;
        var stars = options.max || 5;
        var starSize = options.starSize || 16;
        var step = options.step || 1;
        var onHover = options.onHover;
        var onLeave = options.onLeave;
        var rating = null;
        var myRating;
        elem.classList.add("star-rating");
        var div = document.createElement("div");
        div.classList.add("star-value");

        if (reverse) {
          div.classList.add("rtl");
        }

        div.style.backgroundSize = starSize + "px";
        elem.appendChild(div);
        elem.style.width = starSize * stars + "px";
        elem.style.height = starSize + "px";
        elem.style.backgroundSize = starSize + "px";
        var callback = options.rateCallback;
        var disabled = !!options.readOnly;
        var disableText;
        var isRating = false;
        var isBusyText = options.isBusyText;
        var currentRating;
        var ratingText;

        if (typeof options.disableText !== "undefined") {
          disableText = options.disableText;
        } else {
          disableText = "{rating}/{maxRating}";
        }

        if (typeof options.ratingText !== "undefined") {
          ratingText = options.ratingText;
        } else {
          ratingText = "{rating}/{maxRating}";
        }

        if (options.rating) {
          setRating(options.rating);
        } else {
          var dataRating = elem.dataset.rating;

          if (dataRating) {
            setRating(+dataRating);
          }
        }

        if (!rating) {
          elem.querySelector(".star-value").style.width = "0px";
        }

        if (disabled) {
          disable();
        } //private methods


        function onMouseMove(e) {
          onMove(e, false);
        }
        /**
         * Called by eventhandlers when mouse or touch events are triggered
         * @param {MouseEvent} e
         */


        function onMove(e, isTouch) {
          if (disabled === true || isRating === true) {
            return;
          }

          var xCoor = null;
          var percent;
          var width = elem.offsetWidth;
          var parentOffset = elem.getBoundingClientRect();

          if (reverse) {
            if (isTouch) {
              xCoor = e.changedTouches[0].pageX - parentOffset.left;
            } else {
              xCoor = e.pageX - window.scrollX - parentOffset.left;
            }

            var relXRtl = width - xCoor;
            var valueForDivision = width / 100;
            percent = relXRtl / valueForDivision;
          } else {
            if (isTouch) {
              xCoor = e.changedTouches[0].pageX - parentOffset.left;
            } else {
              xCoor = e.offsetX;
            }

            percent = xCoor / width * 100;
          }

          if (percent < 101) {
            if (step === 1) {
              currentRating = Math.ceil(percent / 100 * stars);
            } else {
              var rat = percent / 100 * stars;

              for (var i = 0;; i += step) {
                if (i >= rat) {
                  currentRating = i;
                  break;
                }
              }
            } //todo: check why this happens and fix


            if (currentRating > stars) {
              currentRating = stars;
            }

            elem.querySelector(".star-value").style.width = currentRating / stars * 100 + "%";

            if (showToolTip) {
              var toolTip = ratingText.replace("{rating}", currentRating);
              toolTip = toolTip.replace("{maxRating}", stars);
              elem.setAttribute("title", toolTip);
            }

            if (typeof onHover === "function") {
              onHover(currentRating, rating);
            }
          }
        }
        /**
         * Called when mouse is released. This function will update the view with the rating.
         * @param {MouseEvent} e
         */


        function onStarOut(e) {
          if (!rating) {
            elem.querySelector(".star-value").style.width = "0%";
            elem.removeAttribute("data-rating");
          } else {
            elem.querySelector(".star-value").style.width = rating / stars * 100 + "%";
            elem.setAttribute("data-rating", rating);
          }

          if (typeof onLeave === "function") {
            onLeave(currentRating, rating);
          }
        }
        /**
         * Called when star is clicked.
         * @param {MouseEvent} e
         */


        function onStarClick(e) {
          if (disabled === true) {
            return;
          }

          if (isRating === true) {
            return;
          }

          if (typeof callback !== "undefined") {
            isRating = true;
            myRating = currentRating;

            if (typeof isBusyText === "undefined") {
              elem.removeAttribute("title");
            } else {
              elem.setAttribute("title", isBusyText);
            }

            elem.classList.add("is-busy");
            callback.call(this, myRating, function () {
              if (disabled === false) {
                elem.removeAttribute("title");
              }

              isRating = false;
              elem.classList.remove("is-busy");
            });
          }
        }
        /**
         * Disables the rater so that it's not possible to click the stars.
         */


        function disable() {
          disabled = true;
          elem.classList.add("disabled");

          if (showToolTip && !!disableText) {
            var toolTip = disableText.replace("{rating}", !!rating ? rating : 0);
            toolTip = toolTip.replace("{maxRating}", stars);
            elem.setAttribute("title", toolTip);
          } else {
            elem.removeAttribute("title");
          }
        }
        /**
         * Enabled the rater so that it's possible to click the stars.
         */


        function enable() {
          disabled = false;
          elem.removeAttribute("title");
          elem.classList.remove("disabled");
        }
        /**
         * Sets the rating
         */


        function setRating(value) {
          if (typeof value === "undefined") {
            throw new Error("Value not set.");
          }

          if (value === null) {
            throw new Error("Value cannot be null.");
          }

          if (typeof value !== "number") {
            throw new Error("Value must be a number.");
          }

          if (value < 0 || value > stars) {
            throw new Error("Value too high. Please set a rating of " + stars + " or below.");
          }

          rating = value;
          elem.querySelector(".star-value").style.width = value / stars * 100 + "%";
          elem.setAttribute("data-rating", value);
        }
        /**
         * Gets the rating
         */


        function getRating() {
          return rating;
        }
        /**
         * Set the rating to a value to inducate it's not rated.
         */


        function clear() {
          rating = null;
          elem.querySelector(".star-value").style.width = "0px";
          elem.removeAttribute("title");
        }
        /**
         * Remove event handlers.
         */


        function dispose() {
          elem.removeEventListener("mousemove", onMouseMove);
          elem.removeEventListener("mouseleave", onStarOut);
          elem.removeEventListener("click", onStarClick);
          elem.removeEventListener("touchmove", handleMove, false);
          elem.removeEventListener("touchstart", handleStart, false);
          elem.removeEventListener("touchend", handleEnd, false);
          elem.removeEventListener("touchcancel", handleCancel, false);
        }

        elem.addEventListener("mousemove", onMouseMove);
        elem.addEventListener("mouseleave", onStarOut);
        var module = {
          setRating: setRating,
          getRating: getRating,
          disable: disable,
          enable: enable,
          clear: clear,
          dispose: dispose,

          get element() {
            return elem;
          }

        };
        /**
        * Handles touchmove event.
        * @param {TouchEvent} e
        */

        function handleMove(e) {
          e.preventDefault();
          onMove(e, true);
        }
        /**
         * Handles touchstart event.
         * @param {TouchEvent} e 
         */


        function handleStart(e) {
          e.preventDefault();
          onMove(e, true);
        }
        /**
         * Handles touchend event.
         * @param {TouchEvent} e 
         */


        function handleEnd(evt) {
          evt.preventDefault();
          onMove(evt, true);
          onStarClick.call(module);
        }
        /**
         * Handles touchend event.
         * @param {TouchEvent} e 
         */


        function handleCancel(e) {
          e.preventDefault();
          onStarOut(e);
        }

        elem.addEventListener("click", onStarClick.bind(module));
        elem.addEventListener("touchmove", handleMove, false);
        elem.addEventListener("touchstart", handleStart, false);
        elem.addEventListener("touchend", handleEnd, false);
        elem.addEventListener("touchcancel", handleCancel, false);
        return module;
      };
    }, {
      "./style.css": 2
    }],
    2: [function (require, module, exports) {
      var css = ".star-rating {\n  width: 0;\n  position: relative;\n  display: inline-block;\n  background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDguOSIgaGVpZ2h0PSIxMDMuNiIgdmlld0JveD0iMCAwIDEwOC45IDEwMy42Ij48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6I2UzZTZlNjt9PC9zdHlsZT48L2RlZnM+PHRpdGxlPnN0YXJfMDwvdGl0bGU+PGcgaWQ9IkxheWVyXzIiIGRhdGEtbmFtZT0iTGF5ZXIgMiI+PGcgaWQ9IkxheWVyXzEtMiIgZGF0YS1uYW1lPSJMYXllciAxIj48cG9seWdvbiBjbGFzcz0iY2xzLTEiIHBvaW50cz0iMTA4LjkgMzkuNiA3MS4zIDM0LjEgNTQuNCAwIDM3LjYgMzQuMSAwIDM5LjYgMjcuMiA2Ni4xIDIwLjggMTAzLjYgNTQuNCA4NS45IDg4LjEgMTAzLjYgODEuNyA2Ni4xIDEwOC45IDM5LjYiLz48L2c+PC9nPjwvc3ZnPg0K);\n  background-position: 0 0;\n  background-repeat: repeat-x;\n  cursor: pointer;\n}\n.star-rating .star-value {\n  position: absolute;\n  height: 100%;\n  width: 100%;\n  background: url('data:image/svg+xml;base64,PHN2Zw0KCXhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwOC45IiBoZWlnaHQ9IjEwMy42IiB2aWV3Qm94PSIwIDAgMTA4LjkgMTAzLjYiPg0KCTxkZWZzPg0KCQk8c3R5bGU+LmNscy0xe2ZpbGw6I2YxYzk0Nzt9PC9zdHlsZT4NCgk8L2RlZnM+DQoJPHRpdGxlPnN0YXIxPC90aXRsZT4NCgk8ZyBpZD0iTGF5ZXJfMiIgZGF0YS1uYW1lPSJMYXllciAyIj4NCgkJPGcgaWQ9IkxheWVyXzEtMiIgZGF0YS1uYW1lPSJMYXllciAxIj4NCgkJCTxwb2x5Z29uIGNsYXNzPSJjbHMtMSIgcG9pbnRzPSI1NC40IDAgNzEuMyAzNC4xIDEwOC45IDM5LjYgODEuNyA2Ni4xIDg4LjEgMTAzLjYgNTQuNCA4NS45IDIwLjggMTAzLjYgMjcuMiA2Ni4xIDAgMzkuNiAzNy42IDM0LjEgNTQuNCAwIi8+DQoJCTwvZz4NCgk8L2c+DQo8L3N2Zz4NCg==');\n  background-repeat: repeat-x;\n}\n.star-rating.disabled {\n  cursor: default;\n}\n.star-rating.is-busy {\n  cursor: wait;\n}\n.star-rating .star-value.rtl {\n  -moz-transform: scaleX(-1);\n  -o-transform: scaleX(-1);\n  -webkit-transform: scaleX(-1);\n  transform: scaleX(-1);\n  filter: FlipH;\n  -ms-filter: \"FlipH\";\n  right: 0;\n  left: auto;\n}\n";

      require("browserify-css").createStyle(css, {
        "href": "lib\\style.css"
      }, {
        "insertAt": "bottom"
      });

      module.exports = css;
    }, {
      "browserify-css": 3
    }],
    3: [function (require, module, exports) {
      'use strict'; // For more information about browser field, check out the browser field at https://github.com/substack/browserify-handbook#browser-field.

      var styleElementsInsertedAtTop = [];

      var insertStyleElement = function insertStyleElement(styleElement, options) {
        var head = document.head || document.getElementsByTagName('head')[0];
        var lastStyleElementInsertedAtTop = styleElementsInsertedAtTop[styleElementsInsertedAtTop.length - 1];
        options = options || {};
        options.insertAt = options.insertAt || 'bottom';

        if (options.insertAt === 'top') {
          if (!lastStyleElementInsertedAtTop) {
            head.insertBefore(styleElement, head.firstChild);
          } else if (lastStyleElementInsertedAtTop.nextSibling) {
            head.insertBefore(styleElement, lastStyleElementInsertedAtTop.nextSibling);
          } else {
            head.appendChild(styleElement);
          }

          styleElementsInsertedAtTop.push(styleElement);
        } else if (options.insertAt === 'bottom') {
          head.appendChild(styleElement);
        } else {
          throw new Error('Invalid value for parameter \'insertAt\'. Must be \'top\' or \'bottom\'.');
        }
      };

      module.exports = {
        // Create a <link> tag with optional data attributes
        createLink: function createLink(href, attributes) {
          var head = document.head || document.getElementsByTagName('head')[0];
          var link = document.createElement('link');
          link.href = href;
          link.rel = 'stylesheet';

          for (var key in attributes) {
            if (!attributes.hasOwnProperty(key)) {
              continue;
            }

            var value = attributes[key];
            link.setAttribute('data-' + key, value);
          }

          head.appendChild(link);
        },
        // Create a <style> tag with optional data attributes
        createStyle: function createStyle(cssText, attributes, extraOptions) {
          extraOptions = extraOptions || {};
          var style = document.createElement('style');
          style.type = 'text/css';

          for (var key in attributes) {
            if (!attributes.hasOwnProperty(key)) {
              continue;
            }

            var value = attributes[key];
            style.setAttribute('data-' + key, value);
          }

          if (style.sheet) {
            // for jsdom and IE9+
            style.innerHTML = cssText;
            style.sheet.cssText = cssText;
            insertStyleElement(style, {
              insertAt: extraOptions.insertAt
            });
          } else if (style.styleSheet) {
            // for IE8 and below
            insertStyleElement(style, {
              insertAt: extraOptions.insertAt
            });
            style.styleSheet.cssText = cssText;
          } else {
            // for Chrome, Firefox, and Safari
            style.appendChild(document.createTextNode(cssText));
            insertStyleElement(style, {
              insertAt: extraOptions.insertAt
            });
          }
        }
      };
    }, {}]
  }, {}, [1])(1);
});

/***/ }),

/***/ "./resources/js/helper.js":
/*!********************************!*\
  !*** ./resources/js/helper.js ***!
  \********************************/
/*! exports provided: getSiblings, inputElement, setAttributes, inputOnlyNumberAndSpace */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getSiblings", function() { return getSiblings; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "inputElement", function() { return inputElement; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "setAttributes", function() { return setAttributes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "inputOnlyNumberAndSpace", function() { return inputOnlyNumberAndSpace; });
/*!
 * Get all siblings of an element
 * (c) 2018 Chris Ferdinandi, MIT License, https://gomakethings.com
 */
var getSiblings = function getSiblings(elem) {
  return Array.prototype.filter.call(elem.parentNode.children, function (sibling) {
    return sibling !== elem;
  });
};
/*
 * Make all input lowercase
 */


var inputElement = document.querySelectorAll(".input-lowercase");
inputElement.forEach(function (input) {
  input.addEventListener('input', function () {
    return input.value = input.value.toLowerCase();
  });
  input.addEventListener('change', function () {
    return console.log(input.value);
  });
});

var setAttributes = function setAttributes(el, attrs) {
  for (var key in attrs) {
    el.setAttribute(key, attrs[key]);
  }
};

var inputOnlyNumberAndSpace = document.querySelectorAll('.only-alpha-space');
inputOnlyNumberAndSpace.forEach(function (input) {
  input.setAttribute('pattern', '[a-zA-Z][a-zA-Z ]+ ');
});


/***/ }),

/***/ "./resources/js/native.js":
/*!********************************!*\
  !*** ./resources/js/native.js ***!
  \********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var boxicons__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! boxicons */ "./node_modules/boxicons/dist/boxicons.js");
/* harmony import */ var boxicons__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(boxicons__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _helper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./helper.js */ "./resources/js/helper.js");


var btnOpenMenu = document.querySelector('.nav__toggle-menu');
var btnOpenChildMenu = document.querySelectorAll('.nav__link--open-child');
var nav = document.querySelector('nav');
var navUl = nav.querySelector('.nav__ul');
var dividerMenu = ['divide-y', 'divide-gray-400']; //ini class buat nambah border ke menu

var classToOpenNavItemHasChild = 'nav__item-has-child--open';
var pageUrl = window.location.pathname;
var elementOnHeaderExceptNav = document.querySelectorAll('header nav + *');

function closeNav() {
  var _navUl$classList;

  nav.classList.remove('nav--open');

  (_navUl$classList = navUl.classList).remove.apply(_navUl$classList, dividerMenu);
}

function openNav() {
  var _navUl$classList2;

  nav.classList.add('nav--open');

  (_navUl$classList2 = navUl.classList).add.apply(_navUl$classList2, dividerMenu);
}

function closeAllMenu() {
  var allChild = document.querySelectorAll('.nav__item-has-child--open');
  allChild.forEach(function (child) {
    child.classList.remove('nav__item-has-child--open');
  });
  closeNav();
}

btnOpenMenu.addEventListener('click', function () {
  if (nav.classList.contains('nav--open')) {
    closeNav();
  } else {
    openNav();
  }
});
btnOpenChildMenu.forEach(function (openChild) {
  var parentOfBtnOpenChild = openChild.parentNode.classList;
  openChild.addEventListener('click', function (e) {
    e.preventDefault();
    var siblingsChild = _helper_js__WEBPACK_IMPORTED_MODULE_1__["getSiblings"](openChild.parentNode);
    siblingsChild.forEach(function (eachSibling) {
      if (eachSibling.classList.contains(classToOpenNavItemHasChild)) {
        eachSibling.classList.remove(classToOpenNavItemHasChild);
      }
    });

    if (parentOfBtnOpenChild.contains(classToOpenNavItemHasChild)) {
      parentOfBtnOpenChild.remove(classToOpenNavItemHasChild);
    } else {
      parentOfBtnOpenChild.add(classToOpenNavItemHasChild);
    }
  });
});

if (elementOnHeaderExceptNav.length > 0) {
  document.querySelector('header nav + *').addEventListener('click', function () {
    closeAllMenu();
  });
}

document.querySelector('main').addEventListener('click', function () {
  closeAllMenu();
});

if (pageUrl === '/') {
  nav.classList.add('bg-gray-800', 'bg-opacity-25');
  document.querySelector('header, main').classList.remove('bg-gray-100'); //jika lg di landing page dan di mode tablet keatas, icon menu ganti warna jd putih

  if (window.screen.width > 768) {
    document.querySelectorAll('.nav .container > .nav__ul > .nav__item > .nav__link > .child-dropdown-icon').forEach(function (dropdownIcon) {
      dropdownIcon.setAttribute('color', '#fff');
    });
  }
} //auth page script


if (pageUrl === '/login') {
  var removeValidationOnFalseForm = function removeValidationOnFalseForm(falseForm) {
    var falseErrorMessage = falseForm.querySelectorAll('.error-message');
    var falseErrorInput = falseForm.querySelectorAll('.border-red-400');
    Array.from(falseErrorMessage).map(function (error) {
      error.remove();
    });
    Array.from(falseErrorInput).map(function (input) {
      input.value = null;
      input.classList.remove('border-red-400');
    });
  };

  var authPage = document.querySelector('#authPage');
  var formRegister = authPage.querySelector('#form-daftar');
  var formLogin = authPage.querySelector('#form-masuk');
  formRegister.addEventListener('submit', function () {
    localStorage.clear();
    localStorage.setItem('sessionFailed', 'regist');
  });
  formLogin.addEventListener('submit', function () {
    localStorage.clear();
    localStorage.setItem('sessionFailed', 'login');
  });

  if (localStorage.getItem('sessionFailed') === 'regist') {
    removeValidationOnFalseForm(formLogin);
  } else if (localStorage.getItem('sessionFailed') === 'login') {
    removeValidationOnFalseForm(formRegister);
  }
} // detail product script


var tabs = new Tabby('[data-tabs]');
var detailProductPage = document.querySelector('#productDetailPage');
var raterProduct = detailProductPage.querySelector('#rater');
var ratingProduct = raterJs({
  starSize: 32,
  max: 5,
  element: raterProduct,
  rateCallback: function rateCallback(rating, done) {
    this.setRating(rating);
    done();
  }
});
ratingProduct.setRating(3);
var inputRatingName = raterProduct.dataset.inputName;
var inputRating = document.createElement('input');
var inputRatingValue = raterProduct.dataset.rating;
raterProduct.appendChild(inputRating);
inputRating.name = inputRatingName;
inputRating.hidden = true;
inputRating.setAttribute('value', inputRatingValue);
raterProduct.querySelector('.star-value').addEventListener('click', function () {
  //ambil value rating nya setelah value ratingnya berubah
  setTimeout(function () {
    inputRatingValue = raterProduct.dataset.rating;
    inputRating.setAttribute('value', inputRatingValue);
  }, 0.01);
}); //general js

/*  
    trigger box file upload when click child, 
    bcz for default when click child the box is not triggered
*/
// const fileUploaderChild = document.querySelectorAll('.file-upload-drag > *')
// let parentFileUploaderChild
// fileUploaderChild.forEach(child => {
//     child.addEventListener('click', () => {
//         parentFileUploaderChild = child.parentElement
//         parentFileUploaderChild.click()
//     });
// });

/***/ }),

/***/ 1:
/*!**************************************************************************!*\
  !*** multi ./resources/js/native.js ./public/js/addons/raterjs/index.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /var/www/html/shopentuk/resources/js/native.js */"./resources/js/native.js");
module.exports = __webpack_require__(/*! /var/www/html/shopentuk/public/js/addons/raterjs/index.js */"./public/js/addons/raterjs/index.js");


/***/ })

/******/ });