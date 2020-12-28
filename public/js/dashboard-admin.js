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

!function(t,e,n,r,o){if("customElements"in n)o();else{if(n.AWAITING_WEB_COMPONENTS_POLYFILL)return void n.AWAITING_WEB_COMPONENTS_POLYFILL.then(o);var a=n.AWAITING_WEB_COMPONENTS_POLYFILL=f();a.then(o);var i=n.WEB_COMPONENTS_POLYFILL||"//cdnjs.cloudflare.com/ajax/libs/webcomponentsjs/2.0.2/webcomponents-bundle.js",s=n.ES6_CORE_POLYFILL||"//cdnjs.cloudflare.com/ajax/libs/core-js/2.5.3/core.min.js";"Promise"in n?c(i).then((function(){a.isDone=!0,a.exec()})):c(s).then((function(){c(i).then((function(){a.isDone=!0,a.exec()}))}))}function f(){var t=[];return t.isDone=!1,t.exec=function(){t.splice(0).forEach((function(t){t()}))},t.then=function(e){return t.isDone?e():t.push(e),t},t}function c(t){var e=f(),n=r.createElement("script");return n.type="text/javascript",n.readyState?n.onreadystatechange=function(){"loaded"!=n.readyState&&"complete"!=n.readyState||(n.onreadystatechange=null,e.isDone=!0,e.exec())}:n.onload=function(){e.isDone=!0,e.exec()},n.src=t,r.getElementsByTagName("head")[0].appendChild(n),n.then=e.then,n}}(0,0,window,document,(function(){var t,e;t=window,e=function(){return function(t){var e={};function n(r){if(e[r])return e[r].exports;var o=e[r]={i:r,l:!1,exports:{}};return t[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}return n.m=t,n.c=e,n.d=function(t,e,r){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:r})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var o in t)n.d(r,o,function(e){return t[e]}.bind(null,o));return r},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=5)}([function(t,e){t.exports=function(t){var e=[];return e.toString=function(){return this.map((function(e){var n=function(t,e){var n,r=t[1]||"",o=t[3];if(!o)return r;if(e&&"function"==typeof btoa){var a=(n=o,"/*# sourceMappingURL=data:application/json;charset=utf-8;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(n))))+" */"),i=o.sources.map((function(t){return"/*# sourceURL="+o.sourceRoot+t+" */"}));return[r].concat(i).concat([a]).join("\n")}return[r].join("\n")}(e,t);return e[2]?"@media "+e[2]+"{"+n+"}":n})).join("")},e.i=function(t,n){"string"==typeof t&&(t=[[null,t,""]]);for(var r={},o=0;o<this.length;o++){var a=this[o][0];"number"==typeof a&&(r[a]=!0)}for(o=0;o<t.length;o++){var i=t[o];"number"==typeof i[0]&&r[i[0]]||(n&&!i[2]?i[2]=n:n&&(i[2]="("+i[2]+") and ("+n+")"),e.push(i))}},e}},function(t,e,n){var r=n(3);t.exports="string"==typeof r?r:r.toString()},function(t,e,n){var r=n(4);t.exports="string"==typeof r?r:r.toString()},function(t,e,n){(t.exports=n(0)(!1)).push([t.i,"@-webkit-keyframes spin{0%{-webkit-transform:rotate(0);transform:rotate(0)}to{-webkit-transform:rotate(359deg);transform:rotate(359deg)}}@keyframes spin{0%{-webkit-transform:rotate(0);transform:rotate(0)}to{-webkit-transform:rotate(359deg);transform:rotate(359deg)}}@-webkit-keyframes burst{0%{-webkit-transform:scale(1);transform:scale(1);opacity:1}90%{-webkit-transform:scale(1.5);transform:scale(1.5);opacity:0}}@keyframes burst{0%{-webkit-transform:scale(1);transform:scale(1);opacity:1}90%{-webkit-transform:scale(1.5);transform:scale(1.5);opacity:0}}@-webkit-keyframes flashing{0%{opacity:1}45%{opacity:0}90%{opacity:1}}@keyframes flashing{0%{opacity:1}45%{opacity:0}90%{opacity:1}}@-webkit-keyframes fade-left{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}75%{-webkit-transform:translateX(-20px);transform:translateX(-20px);opacity:0}}@keyframes fade-left{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}75%{-webkit-transform:translateX(-20px);transform:translateX(-20px);opacity:0}}@-webkit-keyframes fade-right{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}75%{-webkit-transform:translateX(20px);transform:translateX(20px);opacity:0}}@keyframes fade-right{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}75%{-webkit-transform:translateX(20px);transform:translateX(20px);opacity:0}}@-webkit-keyframes fade-up{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}75%{-webkit-transform:translateY(-20px);transform:translateY(-20px);opacity:0}}@keyframes fade-up{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}75%{-webkit-transform:translateY(-20px);transform:translateY(-20px);opacity:0}}@-webkit-keyframes fade-down{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}75%{-webkit-transform:translateY(20px);transform:translateY(20px);opacity:0}}@keyframes fade-down{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}75%{-webkit-transform:translateY(20px);transform:translateY(20px);opacity:0}}@-webkit-keyframes tada{0%{-webkit-transform:scaleX(1);transform:scaleX(1)}10%,20%{-webkit-transform:scale3d(.95,.95,.95) rotate(-10deg);transform:scale3d(.95,.95,.95) rotate(-10deg)}30%,50%,70%,90%{-webkit-transform:scaleX(1) rotate(10deg);transform:scaleX(1) rotate(10deg)}40%,60%,80%{-webkit-transform:scaleX(1) rotate(-10deg);transform:scaleX(1) rotate(-10deg)}to{-webkit-transform:scaleX(1);transform:scaleX(1)}}@keyframes tada{0%{-webkit-transform:scaleX(1);transform:scaleX(1)}10%,20%{-webkit-transform:scale3d(.95,.95,.95) rotate(-10deg);transform:scale3d(.95,.95,.95) rotate(-10deg)}30%,50%,70%,90%{-webkit-transform:scaleX(1) rotate(10deg);transform:scaleX(1) rotate(10deg)}40%,60%,80%{-webkit-transform:rotate(-10deg);transform:rotate(-10deg)}to{-webkit-transform:scaleX(1);transform:scaleX(1)}}.bx-spin,.bx-spin-hover:hover{-webkit-animation:spin 2s linear infinite;animation:spin 2s linear infinite}.bx-tada,.bx-tada-hover:hover{-webkit-animation:tada 1.5s ease infinite;animation:tada 1.5s ease infinite}.bx-flashing,.bx-flashing-hover:hover{-webkit-animation:flashing 1.5s infinite linear;animation:flashing 1.5s infinite linear}.bx-burst,.bx-burst-hover:hover{-webkit-animation:burst 1.5s infinite linear;animation:burst 1.5s infinite linear}.bx-fade-up,.bx-fade-up-hover:hover{-webkit-animation:fade-up 1.5s infinite linear;animation:fade-up 1.5s infinite linear}.bx-fade-down,.bx-fade-down-hover:hover{-webkit-animation:fade-down 1.5s infinite linear;animation:fade-down 1.5s infinite linear}.bx-fade-left,.bx-fade-left-hover:hover{-webkit-animation:fade-left 1.5s infinite linear;animation:fade-left 1.5s infinite linear}.bx-fade-right,.bx-fade-right-hover:hover{-webkit-animation:fade-right 1.5s infinite linear;animation:fade-right 1.5s infinite linear}",""])},function(t,e,n){(t.exports=n(0)(!1)).push([t.i,'.bx-rotate-90{transform:rotate(90deg);-ms-filter:"progid:DXImageTransform.Microsoft.BasicImage(rotation=1)"}.bx-rotate-180{transform:rotate(180deg);-ms-filter:"progid:DXImageTransform.Microsoft.BasicImage(rotation=2)"}.bx-rotate-270{transform:rotate(270deg);-ms-filter:"progid:DXImageTransform.Microsoft.BasicImage(rotation=3)"}.bx-flip-horizontal{transform:scaleX(-1);-ms-filter:"progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1)"}.bx-flip-vertical{transform:scaleY(-1);-ms-filter:"progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)"}',""])},function(t,e,n){"use strict";n.r(e);var r,o,a,i,s=n(1),f=n.n(s),c=n(2),l=n.n(c),m="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},u=function(){function t(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}return function(e,n,r){return n&&t(e.prototype,n),r&&t(e,r),e}}(),d=(r=Object,o=r.getPrototypeOf||function(t){return t.__proto__},a=r.setPrototypeOf||function(t,e){return t.__proto__=e,t},i="object"===("undefined"==typeof Reflect?"undefined":m(Reflect))?Reflect.construct:function(t,e,n){var r,o=[null];return o.push.apply(o,e),r=t.bind.apply(t,o),a(new r,n.prototype)},function(t){var e=o(t);return a(t,a((function(){return i(e,arguments,o(this).constructor)}),e))}),p=window,b={},y=document.createElement("template"),h=function(){return!!p.ShadyCSS};y.innerHTML='\n<style>\n:host {\n  display: inline-block;\n  font-size: initial;\n  box-sizing: border-box;\n  width: 24px;\n  height: 24px;\n}\n:host([size=xs]) {\n    width: 0.8rem;\n    height: 0.8rem;\n}\n:host([size=sm]) {\n    width: 1.55rem;\n    height: 1.55rem;\n}\n:host([size=md]) {\n    width: 2.25rem;\n    height: 2.25rem;\n}\n:host([size=lg]) {\n    width: 3.0rem;\n    height: 3.0rem;\n}\n\n:host([size]:not([size=""]):not([size=xs]):not([size=sm]):not([size=md]):not([size=lg])) {\n    width: auto;\n    height: auto;\n}\n:host([pull=left]) #icon {\n    float: left;\n    margin-right: .3em!important;\n}\n:host([pull=right]) #icon {\n    float: right;\n    margin-left: .3em!important;\n}\n:host([border=square]) #icon {\n    padding: .25em;\n    border: .07em solid rgba(0,0,0,.1);\n    border-radius: .25em;\n}\n:host([border=circle]) #icon {\n    padding: .25em;\n    border: .07em solid rgba(0,0,0,.1);\n    border-radius: 50%;\n}\n#icon,\nsvg {\n  width: 100%;\n  height: 100%;\n}\n#icon {\n    box-sizing: border-box;\n} \n'+f.a+"\n"+l.a+'\n</style>\n<div id="icon"></div>';var g=d(function(t){function e(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,e);var t=function(t,e){if(!t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!e||"object"!=typeof e&&"function"!=typeof e?t:e}(this,(e.__proto__||Object.getPrototypeOf(e)).call(this));return t.$ui=t.attachShadow({mode:"open"}),t.$ui.appendChild(t.ownerDocument.importNode(y.content,!0)),h()&&p.ShadyCSS.styleElement(t),t._state={$iconHolder:t.$ui.getElementById("icon"),type:t.getAttribute("type")},t}return function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}(e,HTMLElement),u(e,null,[{key:"getIconSvg",value:function(t,e){var n=this.cdnUrl+"/regular/bx-"+t+".svg";return"solid"===e?n=this.cdnUrl+"/solid/bxs-"+t+".svg":"logo"===e&&(n=this.cdnUrl+"/logos/bxl-"+t+".svg"),n&&b[n]?b[n]:(b[n]=new Promise((function(t,e){var r=new XMLHttpRequest;r.addEventListener("load",(function(){this.status<200||this.status>=300?e(new Error(this.status+" "+this.responseText)):t(this.responseText)})),r.onerror=e,r.onabort=e,r.open("GET",n),r.send()})),b[n])}},{key:"define",value:function(t){t=t||this.tagName,h()&&p.ShadyCSS.prepareTemplate(y,t),customElements.define(t,this)}},{key:"cdnUrl",get:function(){return"//unpkg.com/boxicons@2.0.7/svg"}},{key:"tagName",get:function(){return"box-icon"}},{key:"observedAttributes",get:function(){return["type","name","color","size","rotate","flip","animation","border","pull"]}}]),u(e,[{key:"attributeChangedCallback",value:function(t,e,n){var r=this._state.$iconHolder;switch(t){case"type":!function(t,e,n){var r=t._state;r.$iconHolder.textContent="",r.type&&(r.type=null),r.type=!n||"solid"!==n&&"logo"!==n?"regular":n,void 0!==r.currentName&&t.constructor.getIconSvg(r.currentName,r.type).then((function(t){r.type===n&&(r.$iconHolder.innerHTML=t)})).catch((function(t){console.error("Failed to load icon: "+r.currentName+"\n"+t)}))}(this,0,n);break;case"name":!function(t,e,n){var r=t._state;r.currentName=n,r.$iconHolder.textContent="",n&&void 0!==r.type&&t.constructor.getIconSvg(n,r.type).then((function(t){r.currentName===n&&(r.$iconHolder.innerHTML=t)})).catch((function(t){console.error("Failed to load icon: "+n+"\n"+t)}))}(this,0,n);break;case"color":r.style.fill=n||"";break;case"size":!function(t,e,n){var r=t._state;r.size&&(r.$iconHolder.style.width=r.$iconHolder.style.height="",r.size=r.sizeType=null),n&&!/^(xs|sm|md|lg)$/.test(r.size)&&(r.size=n.trim(),r.$iconHolder.style.width=r.$iconHolder.style.height=r.size)}(this,0,n);break;case"rotate":e&&r.classList.remove("bx-rotate-"+e),n&&r.classList.add("bx-rotate-"+n);break;case"flip":e&&r.classList.remove("bx-flip-"+e),n&&r.classList.add("bx-flip-"+n);break;case"animation":e&&r.classList.remove("bx-"+e),n&&r.classList.add("bx-"+n)}}},{key:"connectedCallback",value:function(){h()&&p.ShadyCSS.styleElement(this)}}]),e}());n.d(e,"BoxIconElement",(function(){return g})),e.default=g,g.define()}])}, true?module.exports=e():undefined}));
//# sourceMappingURL=boxicons.js.map

/***/ }),

/***/ "./node_modules/num-words/index.js":
/*!*****************************************!*\
  !*** ./node_modules/num-words/index.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/* eslint-disable eqeqeq */

const a = ['', 'one ', 'two ', 'three ', 'four ', 'five ', 'six ', 'seven ', 'eight ', 'nine ', 'ten ', 'eleven ', 'twelve ', 'thirteen ', 'fourteen ', 'fifteen ', 'sixteen ', 'seventeen ', 'eighteen ', 'nineteen ']
const b = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety']

const regex = /^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/

const getLT20 = (n) => a[Number(n)]
const getGT20 = (n) => b[n[0]] + ' ' + a[n[1]]

module.exports = function numWords (input) {
  const num = Number(input)
  if (isNaN(num)) return ''
  if (num === 0) return 'zero'

  const numStr = num.toString()
  if (numStr.length > 9) {
    throw new Error('overflow') // Does not support converting more than 9 digits yet
  }

  const [, n1, n2, n3, n4, n5] = ('000000000' + numStr).substr(-9).match(regex) // left pad zeros

  let str = ''
  str += n1 != 0 ? (getLT20(n1) || getGT20(n1)) + 'crore ' : ''
  str += n2 != 0 ? (getLT20(n2) || getGT20(n2)) + 'lakh ' : ''
  str += n3 != 0 ? (getLT20(n3) || getGT20(n3)) + 'thousand ' : ''
  str += n4 != 0 ? getLT20(n4) + 'hundred ' : ''
  str += n5 != 0 && str != '' ? 'and ' : ''
  str += n5 != 0 ? (getLT20(n5) || getGT20(n5)) : ''

  return str.trim()
}


/***/ }),

/***/ "./resources/assets/js/helper-module.js":
/*!**********************************************!*\
  !*** ./resources/assets/js/helper-module.js ***!
  \**********************************************/
/*! exports provided: getSiblings, formattingRupiah, setFormAction, getUrlWithoutProtocol, capitalizeFirstLetter, setAttributes, openCloseModal, getParents, boxiconHoverChangeColor, pageUrl, appUrl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getSiblings", function() { return getSiblings; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "formattingRupiah", function() { return formattingRupiah; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "setFormAction", function() { return setFormAction; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getUrlWithoutProtocol", function() { return getUrlWithoutProtocol; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "capitalizeFirstLetter", function() { return capitalizeFirstLetter; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "setAttributes", function() { return setAttributes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "openCloseModal", function() { return openCloseModal; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getParents", function() { return getParents; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "boxiconHoverChangeColor", function() { return boxiconHoverChangeColor; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "pageUrl", function() { return pageUrl; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "appUrl", function() { return appUrl; });
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
	formatting currency to rupiah
*/

var formattingRupiah = function formattingRupiah(currency) {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR'
  }).format(currency).replace(',00', '');
};
/**
 * set form action
 */

var setFormAction = function setFormAction(form, url) {
  document.querySelector(form).action = url;
};
/**
 * get url without protocol
 */

function getUrlWithoutProtocol(urlnya) {
  return urlnya.split('//').pop();
}
/**
 * capitalize first letter each word
 */

var capitalizeFirstLetter = function capitalizeFirstLetter(string) {
  return string[0].toUpperCase() + string.slice(1);
};
/**
 * set multiple attr
 */

var setAttributes = function setAttributes(el, attrs) {
  for (var key in attrs) {
    el.setAttribute(key, attrs[key]);
  }
};
/**
 * open / close a modal
 */

function openCloseModal(modalSelector) {
  var _modalEl$classList;

  var modalEl = document.querySelector(modalSelector);
  var classToCloseModal = ['invisible', 'h-0', 'opacity-0']; // if modal open, set isModalOpen = true. else, isModalOpen = false

  var isModalOpen = (_modalEl$classList = modalEl.classList).contains.apply(_modalEl$classList, classToCloseModal) ? true : false;

  if (isModalOpen === true) {
    var _modalEl$classList2;

    // close modal
    (_modalEl$classList2 = modalEl.classList).remove.apply(_modalEl$classList2, classToCloseModal);
  } else {
    var _modalEl$classList3;

    // open modal
    (_modalEl$classList3 = modalEl.classList).add.apply(_modalEl$classList3, classToCloseModal);

    if (modalEl.querySelectorAll('input, textarea')) {
      modalEl.querySelectorAll('input:not([name="_method"]):not([name="_token"]), textarea').forEach(function (inputOrTextarea) {
        inputOrTextarea.value = '';
      });
    }
  }
}
/*!
 * Get all of an element's parent elements up the DOM tree
 * (c) 2019 Chris Ferdinandi, MIT License, https://gomakethings.com
 * @param  {Node}   elem     The element
 * @param  {String} selector Selector to match against [optional]
 * @return {Array}           The parent elements
 */

var getParents = function getParents(elem, selector) {
  // Setup parents array
  var parents = []; // Get matching parent elements

  while (elem && elem !== document) {
    // If using a selector, add matching parents to array
    // Otherwise, add all parents
    if (selector) {
      if (elem.matches(selector)) {
        parents.push(elem);
      }
    } else {
      parents.push(elem);
    } // Jump to the next parent node


    elem = elem.parentNode;
  }

  return parents;
};
var boxiconHoverChangeColor = function boxiconHoverChangeColor(icon, hoverColor) {
  var originalIconColor = icon.getAttribute('color');
  icon.addEventListener('mouseover', function () {
    icon.setAttribute('color', hoverColor);
  });
  icon.addEventListener('mouseleave', function () {
    icon.setAttribute('color', originalIconColor);
  });
};
var pageUrl = window.location.pathname;
var appUrl = window.location.origin;

/***/ }),

/***/ "./resources/assets/js/page/admin/category-parent.js":
/*!***********************************************************!*\
  !*** ./resources/assets/js/page/admin/category-parent.js ***!
  \***********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helper_module__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../helper-module */ "./resources/assets/js/helper-module.js");
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }



if (pageUrl === '/admin/all-category' || pageUrl === '/admin/all-category/') {
  var modalManipulatePrimaryCategory = document.querySelector('#modal-manipulate-primary-category');
  var editPrimaryBtn = document.querySelectorAll('.edit-primary-category');
  var addPrimaryCategory = document.querySelector('.add-primary-category');
  var btnManipulateCategory = [addPrimaryCategory].concat(_toConsumableArray(editPrimaryBtn));
  var titleModal, primaryTitle, primaryDesc, primaryIsDigitalProduct, urlForm;
  btnManipulateCategory.forEach(function (btn) {
    btn.addEventListener('click', function () {
      urlForm = btn.dataset.routing;

      if (btn.classList.contains('edit-primary-category')) {
        titleModal = 'edit';
        primaryTitle = btn.parentNode.querySelector('.primary-category__title').textContent.trim();
        primaryDesc = btn.dataset.desc;
        primaryIsDigitalProduct = Boolean(Number(btn.dataset.isDigital));
        console.log(primaryIsDigitalProduct);
        modalManipulatePrimaryCategory.querySelector('input[name="title"]').value = primaryTitle;
        modalManipulatePrimaryCategory.querySelector('input[name="is_digital_product"]').checked = primaryIsDigitalProduct == false ? false : true;
        modalManipulatePrimaryCategory.querySelector('input[name="_method"]').disabled = false;
      } else {
        titleModal = 'add new';
        modalManipulatePrimaryCategory.querySelector('input[name="_method"]').disabled = true;
      }

      titleModal = "".concat(titleModal, " category");
      $("#modal-manipulate-primary-category").modal('show');
      modalManipulatePrimaryCategory.querySelector('.modal-title').textContent = titleModal;
      modalManipulatePrimaryCategory.querySelector('form').action = urlForm;
      $('#modal-manipulate-primary-category').on('hidden.bs.modal', function (e) {
        $(this).find("input:not([name='_method']), textarea").val("").prop('checked', false);
      });
    });
  });
}

/***/ }),

/***/ "./resources/assets/js/page/admin/category-sub.js":
/*!********************************************************!*\
  !*** ./resources/assets/js/page/admin/category-sub.js ***!
  \********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helper_module__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../helper-module */ "./resources/assets/js/helper-module.js");


if (_helper_module__WEBPACK_IMPORTED_MODULE_0__["pageUrl"].includes('/sub')) {
  // edit sub category
  var modalEditSub = document.querySelectorAll('.edit-sub-category-btn');
  var modalManipulateCategory = document.querySelector('.modal-manipulate-category');
  var modalTitle = modalManipulateCategory.querySelector('.modal-title');
  var modalTitleText, subCategoryVal, parentCategoryVal;
  var modalForm = modalManipulateCategory.querySelector('#form-edit-sub-category');
  var parentCategoryOptionEl = modalManipulateCategory.querySelectorAll('#parent-category option:enabled');
  modalEditSub.forEach(function (btnEditSub) {
    var modalEditId = btnEditSub.dataset.target;
    var subCategoryEl = btnEditSub.parentNode.querySelector('.subcategory__title');
    btnEditSub.addEventListener('click', function () {
      modalForm.action = this.dataset.editLink;
      modalTitleText = 'edit sub category';
      modalManipulateCategory.setAttribute('aria-labelledby', modalEditId.replace('#', '') + 'Label');
      $(".modal-manipulate-category").modal('show');
      modalTitle.setAttribute('id', 'modalEditCategoryLabel');
      modalTitle.textContent = modalTitleText;
      subCategoryVal = subCategoryEl.textContent.trim();
      parentCategoryVal = subCategoryEl.dataset.categoryParent.trim();
      modalManipulateCategory.querySelector('#sub-category').value = subCategoryVal;
      parentCategoryOptionEl.forEach(function (parentCategory) {
        if (parentCategory.textContent.trim() === parentCategoryVal) {
          parentCategory.selected = true;
        }
      });
    });
  });
  $('.modal-manipulate-category').on('hidden.bs.modal', function (e) {
    parentCategoryOptionEl[0].selected = true;
    modalManipulateCategory.querySelector('#sub-category').value = null;
  }); // end of edit sub category
  // add new sub category

  var addSubCategory = document.querySelector('#btn-add-sub-category');
  addSubCategory.addEventListener('click', function () {
    modalForm.action = modalForm.dataset.addLink;
    $(".modal-manipulate-category").modal('show');
    modalTitleText = 'add new sub category for ' + this.dataset.category;
    modalManipulateCategory.setAttribute('aria-labelledby', 'addNewCategoryLabel');
    modalTitle.textContent = modalTitleText;
  }); // end of add new sub category
}

/***/ }),

/***/ "./resources/assets/js/page/admin/general.js":
/*!***************************************************!*\
  !*** ./resources/assets/js/page/admin/general.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var logoutBtn = document.querySelector('#logoutBtn');
logoutBtn.addEventListener('click', function (e) {
  e.preventDefault();
  document.getElementById('logout-form').submit();
});
$("#zero_config").DataTable();
document.querySelectorAll('box-icon').forEach(function (icon) {
  icon.classList.remove('has-arrow'); // remove ::after style because of adminmart template

  icon.classList.add('mr-2');
});
$(".refresh-btn").on('click', function (e) {
  e.preventDefault();
  location.reload();
});

/***/ }),

/***/ "./resources/assets/js/page/admin/manage-admin.js":
/*!********************************************************!*\
  !*** ./resources/assets/js/page/admin/manage-admin.js ***!
  \********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helper_module__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./../../helper-module */ "./resources/assets/js/helper-module.js");


if (_helper_module__WEBPACK_IMPORTED_MODULE_0__["pageUrl"] === '/superadmin/admins') {
  var manageAdminPage = document.querySelector("#manageAdminPage");
  var totalError = manageAdminPage.querySelectorAll('.invalid-feedback').length;

  if (totalError > 0) {
    //if there's an error when add/update admin acc
    $("#addNewAdmin").modal('show');
  }

  var urlFormAdmin = 'superadmin/admins';
  var btnEditAdmin = manageAdminPage.querySelectorAll('.btn-edit-admin');
  var adminId, adminName, adminEmail, adminPhone, adminJoinedAt;
  btnEditAdmin.forEach(function (btn) {
    btn.addEventListener('click', function () {
      adminId = btn.dataset.adminId;
      adminName = btn.closest('.admin').querySelector('.admin__name').dataset.adminName.trim();
      adminEmail = btn.closest('.admin').querySelector('.admin__email').textContent.trim();
      adminPhone = btn.closest('.admin').querySelector('.admin__phone').textContent.trim();
      adminJoinedAt = btn.closest('.admin').querySelector('.admin__joined-at').textContent.trim();
      _helper_module__WEBPACK_IMPORTED_MODULE_0__["setFormAction"]('#form-edit-admin', "".concat(appUrl, "/").concat(urlFormAdmin, "/").concat(adminId));
    });
  });
  _helper_module__WEBPACK_IMPORTED_MODULE_0__["setFormAction"]('#form-add-admin', "".concat(appUrl, "/").concat(urlFormAdmin));
}

/***/ }),

/***/ "./resources/assets/js/page/admin/manage-order.js":
/*!********************************************************!*\
  !*** ./resources/assets/js/page/admin/manage-order.js ***!
  \********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helper_module__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../helper-module */ "./resources/assets/js/helper-module.js");


var numWords = __webpack_require__(/*! num-words */ "./node_modules/num-words/index.js");

if (_helper_module__WEBPACK_IMPORTED_MODULE_0__["pageUrl"] === '/admin/order') {
  var manageOrderPage = document.querySelector('#manageOrderPage');
  var orderItem = manageOrderPage.querySelectorAll('.order-item');
  orderItem.forEach(function (currentItem, index) {
    var indexToWord = _helper_module__WEBPACK_IMPORTED_MODULE_0__["capitalizeFirstLetter"](numWords(Number(index) + 1));
    _helper_module__WEBPACK_IMPORTED_MODULE_0__["setAttributes"](document.querySelectorAll('.order-item__btn')[index], {
      'href': "#collapse".concat(indexToWord),
      'aria-controls': "#collapse".concat(indexToWord)
    });
    _helper_module__WEBPACK_IMPORTED_MODULE_0__["setAttributes"](document.querySelectorAll('.order-item__detail')[index], {
      'id': "collapse".concat(indexToWord),
      'aria-labelledby': "heading".concat(indexToWord)
    });
  });
}

/***/ }),

/***/ "./resources/assets/js/page/admin/manage-product.js":
/*!**********************************************************!*\
  !*** ./resources/assets/js/page/admin/manage-product.js ***!
  \**********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helper_module__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./../../helper-module */ "./resources/assets/js/helper-module.js");


if (_helper_module__WEBPACK_IMPORTED_MODULE_0__["pageUrl"] === '/admin/products') {
  var btnOpenEditModal = document.querySelectorAll('.btn[data-target="#modal-edit-product"]');
  btnOpenEditModal.forEach(function (btn) {
    var productItem = btn.parentNode.parentNode;
    var fieldInputs = ['title', 'price', 'point'];
    var fieldSelects = ['category', 'sub-category'];
    var parentCategoryVal;
    btn.addEventListener('click', function () {
      var categorySelect = document.querySelector('#category-id');
      var subCatSelect = document.querySelectorAll('#sub-category-id option');
      document.querySelector('#modal-edit-product .modal-title').innerHTML = "edit product <b>".concat(productItem.querySelector('.product-item__title').dataset.original, "</b>");
      document.querySelector('#modal-edit-product form').action = btn.dataset.updateUrl;

      for (var i = 0; i < fieldInputs.length; i++) {
        document.querySelector("input[name=\"".concat(fieldInputs[i], "\"]")).value = productItem.querySelector(".product-item__".concat(fieldInputs[i])).dataset.original;
      }

      for (var _i = 0; _i < fieldSelects.length; _i++) {
        document.querySelector("select[name=\"".concat(fieldSelects[_i], "\"]")).value = productItem.querySelector(".product-item__".concat(fieldSelects[_i])).dataset.original;
      }

      categorySelect.addEventListener('change', function () {
        parentCategoryVal = categorySelect.options[categorySelect.selectedIndex].text;
        subCatSelect.forEach(function (optionSubCat) {
          optionSubCat.selected = false;

          if (optionSubCat.dataset.parentCategory !== parentCategoryVal) {
            optionSubCat.hidden = true;
          } else {
            optionSubCat.hidden = false;
          }
        });
      });
    });
  });
}

/***/ }),

/***/ "./resources/assets/js/page/dashboard-admin.js":
/*!*****************************************************!*\
  !*** ./resources/assets/js/page/dashboard-admin.js ***!
  \*****************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var boxicons__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! boxicons */ "./node_modules/boxicons/dist/boxicons.js");
/* harmony import */ var boxicons__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(boxicons__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _admin_manage_product__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./admin/manage-product */ "./resources/assets/js/page/admin/manage-product.js");
/* harmony import */ var _admin_manage_admin__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./admin/manage-admin */ "./resources/assets/js/page/admin/manage-admin.js");
/* harmony import */ var _admin_manage_order__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./admin/manage-order */ "./resources/assets/js/page/admin/manage-order.js");
/* harmony import */ var _admin_category_sub__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./admin/category-sub */ "./resources/assets/js/page/admin/category-sub.js");
/* harmony import */ var _admin_category_parent__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./admin/category-parent */ "./resources/assets/js/page/admin/category-parent.js");
/* harmony import */ var _admin_general__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./admin/general */ "./resources/assets/js/page/admin/general.js");
/* harmony import */ var _admin_general__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_admin_general__WEBPACK_IMPORTED_MODULE_6__);








/***/ }),

/***/ 1:
/*!***********************************************************!*\
  !*** multi ./resources/assets/js/page/dashboard-admin.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/uloydev/project/web/laravel/shopentuk/resources/assets/js/page/dashboard-admin.js */"./resources/assets/js/page/dashboard-admin.js");


/***/ })

/******/ });