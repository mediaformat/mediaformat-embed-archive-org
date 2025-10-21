/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "@wordpress/primitives":
/*!************************************!*\
  !*** external ["wp","primitives"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["primitives"];

/***/ }),

/***/ "react/jsx-runtime":
/*!**********************************!*\
  !*** external "ReactJSXRuntime" ***!
  \**********************************/
/***/ ((module) => {

module.exports = window["ReactJSXRuntime"];

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__);
/**
 * Registers a block variation.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-variations/
 */




const archiveIcon = /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__.SVG, {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg",
  children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__.G, {
    transform: "matrix(.049914 0 0 .049914 -6.948 -5.0655)",
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__.Rect, {
      x: "139.2",
      y: "558.56",
      width: "423.26",
      height: "21.705"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__.Rect, {
      x: "155.9",
      y: "516.82",
      width: "390.7",
      height: "30.055"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__.Rect, {
      x: "153.39",
      y: "174.54",
      width: "388.62",
      height: "41.742"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__.Polygon, {
      points: "551.19 149.07 347.7 101.49 144.21 149.07 155.9 162.01 347.7 162.01 539.51 162.01"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__.Path, {
      d: "m209.45 348.42c-0.335-20.5-0.866-41.001-1.669-61.487-0.756-19.302-2-38.585-2.939-57.881-0.081-1.666-0.787-2.026-2.169-2.328-5.693-1.241-11.416-1.824-17.163-1.833-5.747 9e-3 -11.47 0.592-17.163 1.833-1.382 0.301-2.088 0.662-2.169 2.328-0.939 19.296-2.183 38.579-2.939 57.881-0.803 20.486-1.335 40.987-1.669 61.487-0.237 14.528-0.09 29.067 0.14 43.599 0.254 16.121 0.612 32.246 1.265 48.355 0.7 17.288 1.782 34.562 2.731 51.839 0.182 3.311 0.521 6.613 0.78 9.831 6.379 1.66 12.704 2.619 19.025 2.698 6.321-0.079 12.645-1.038 19.025-2.698 0.259-3.218 0.597-6.521 0.779-9.831 0.949-17.277 2.031-34.551 2.731-51.839 0.653-16.109 1.011-32.234 1.265-48.355 0.229-14.532 0.377-29.071 0.139-43.599z"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__.Path, {
      d: "m315.26 348.42c-0.335-20.5-0.867-41.001-1.67-61.487-0.757-19.302-2.001-38.585-2.939-57.881-0.081-1.666-0.786-2.026-2.169-2.328-5.692-1.241-11.416-1.824-17.162-1.833-5.747 9e-3 -11.47 0.592-17.163 1.833-1.382 0.301-2.088 0.662-2.169 2.328-0.938 19.296-2.183 38.579-2.939 57.881-0.803 20.486-1.335 40.987-1.669 61.487-0.237 14.528-0.09 29.067 0.139 43.599 0.255 16.121 0.612 32.246 1.265 48.355 0.701 17.288 1.782 34.562 2.731 51.839 0.182 3.311 0.521 6.613 0.779 9.831 6.38 1.66 12.705 2.619 19.025 2.698 6.321-0.079 12.645-1.038 19.025-2.698 0.258-3.218 0.597-6.521 0.779-9.831 0.948-17.277 2.03-34.551 2.73-51.839 0.653-16.109 1.011-32.234 1.266-48.355 0.231-14.532 0.378-29.071 0.141-43.599z"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__.Path, {
      d: "m437.97 348.42c-0.335-20.5-0.866-41.001-1.67-61.487-0.756-19.302-2-38.585-2.938-57.881-0.082-1.666-0.787-2.026-2.17-2.328-5.692-1.241-11.415-1.824-17.162-1.833-5.747 9e-3 -11.47 0.592-17.163 1.833-1.382 0.301-2.088 0.662-2.169 2.328-0.938 19.296-2.183 38.579-2.938 57.881-0.804 20.486-1.335 40.987-1.67 61.487-0.237 14.528-0.09 29.067 0.14 43.599 0.255 16.121 0.612 32.246 1.265 48.355 0.701 17.288 1.782 34.562 2.731 51.839 0.183 3.311 0.521 6.613 0.779 9.831 6.38 1.66 12.704 2.619 19.025 2.698 6.321-0.079 12.645-1.038 19.025-2.698 0.258-3.218 0.597-6.521 0.779-9.831 0.949-17.277 2.03-34.551 2.731-51.839 0.652-16.109 1.01-32.234 1.265-48.355 0.23-14.532 0.377-29.071 0.14-43.599z"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_2__.Path, {
      d: "m541.28 348.42c-0.335-20.5-0.866-41.001-1.669-61.487-0.757-19.302-2.001-38.585-2.939-57.881-0.082-1.666-0.787-2.026-2.17-2.328-5.691-1.241-11.415-1.824-17.162-1.833-5.746 9e-3 -11.47 0.592-17.162 1.833-1.383 0.301-2.088 0.662-2.169 2.328-0.939 19.296-2.184 38.579-2.939 57.881-0.803 20.486-1.335 40.987-1.67 61.487-0.237 14.528-0.09 29.067 0.14 43.599 0.255 16.121 0.612 32.246 1.266 48.355 0.7 17.288 1.782 34.562 2.73 51.839 0.183 3.311 0.521 6.613 0.779 9.831 6.381 1.66 12.705 2.619 19.025 2.698 6.321-0.079 12.646-1.038 19.025-2.698 0.259-3.218 0.597-6.521 0.779-9.831 0.949-17.277 2.031-34.551 2.731-51.839 0.653-16.109 1.01-32.234 1.265-48.355 0.23-14.532 0.378-29.071 0.14-43.599z"
    })]
  })
});
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockVariation)('core/embed', {
  name: 'mediaformat/embed-archive-org',
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Archive.org Embed', 'mediaformat-embed-archive-org'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Embed media from Archive.org', 'mediaformat-embed-archive-org'),
  icon: {
    src: archiveIcon
  },
  category: 'embed',
  keywords: ['archive', 'internet archive', 'digital library', 'video', 'audio', 'podcast'],
  attributes: {
    providerNameSlug: 'archive-org'
  },
  patterns: [/^https?:\/\/(www\.)?archive\.org\/.+/i],
  isActive: ['providerNameSlug']
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map