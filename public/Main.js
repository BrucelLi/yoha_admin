webpackJsonp([0],{

/***/ 215:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(219)
}
var normalizeComponent = __webpack_require__(82)
/* script */
var __vue_script__ = __webpack_require__(221)
/* template */
var __vue_template__ = __webpack_require__(232)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-0b5baac0"
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/views/home/Home.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0b5baac0", Component.options)
  } else {
    hotAPI.reload("data-v-0b5baac0", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 219:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(220);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(81)("1a17a638", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../node_modules/css-loader/index.js!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0b5baac0\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Home.vue", function() {
     var newContent = require("!!../../../../node_modules/css-loader/index.js!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0b5baac0\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Home.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 220:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(48)(false);
// imports


// module
exports.push([module.i, "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n", ""]);

// exports


/***/ }),

/***/ 221:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_HeadNavComponent__ = __webpack_require__(222);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_HeadNavComponent___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__components_HeadNavComponent__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__components_FootNavComponent__ = __webpack_require__(227);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__components_FootNavComponent___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__components_FootNavComponent__);
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ __webpack_exports__["default"] = ({
    name: "Home",
    components: {
        HeadNav: __WEBPACK_IMPORTED_MODULE_0__components_HeadNavComponent___default.a,
        FootNav: __WEBPACK_IMPORTED_MODULE_1__components_FootNavComponent___default.a
    }
});

/***/ }),

/***/ 222:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(223)
}
var normalizeComponent = __webpack_require__(82)
/* script */
var __vue_script__ = __webpack_require__(225)
/* template */
var __vue_template__ = __webpack_require__(226)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-165a1af6"
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/HeadNavComponent.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-165a1af6", Component.options)
  } else {
    hotAPI.reload("data-v-165a1af6", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 223:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(224);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(81)("72e1142c", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-165a1af6\",\"scoped\":true,\"hasInlineConfig\":true}!../../../node_modules/stylus-loader/index.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./HeadNavComponent.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-165a1af6\",\"scoped\":true,\"hasInlineConfig\":true}!../../../node_modules/stylus-loader/index.js!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./HeadNavComponent.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 224:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(48)(false);
// imports


// module
exports.push([module.i, "\n@charset \"utf-8\";\nhtml[data-v-165a1af6] {\n  color: #000;\n  background: #fff;\n  -webkit-text-size-adjust: 100%;\n  -ms-text-size-adjust: 100%;\n}\nhtml *[data-v-165a1af6] {\n  outline: none;\n  -webkit-text-size-adjust: none;\n  -webkit-tap-highlight-color: rgba(0,0,0,0);\n}\nhtml[data-v-165a1af6],\nbody[data-v-165a1af6] {\n  font-family: sans-serif;\n  height: 100%;\n  width: 100%;\n  overflow-x: hidden;\n}\nbody[data-v-165a1af6],\ndiv[data-v-165a1af6],\ndl[data-v-165a1af6],\ndt[data-v-165a1af6],\ndd[data-v-165a1af6],\nul[data-v-165a1af6],\nol[data-v-165a1af6],\nli[data-v-165a1af6],\nh1[data-v-165a1af6],\nh2[data-v-165a1af6],\nh3[data-v-165a1af6],\nh4[data-v-165a1af6],\nh5[data-v-165a1af6],\nh6[data-v-165a1af6],\npre[data-v-165a1af6],\ncode[data-v-165a1af6],\nform[data-v-165a1af6],\nfieldset[data-v-165a1af6],\nlegend[data-v-165a1af6],\ninput[data-v-165a1af6],\ntextarea[data-v-165a1af6],\np[data-v-165a1af6],\nblockquote[data-v-165a1af6],\nth[data-v-165a1af6],\ntd[data-v-165a1af6],\nhr[data-v-165a1af6],\nbutton[data-v-165a1af6],\narticle[data-v-165a1af6],\naside[data-v-165a1af6],\ndetails[data-v-165a1af6],\nfigcaption[data-v-165a1af6],\nfigure[data-v-165a1af6],\nfooter[data-v-165a1af6],\nheader[data-v-165a1af6],\nhgroup[data-v-165a1af6],\nmenu[data-v-165a1af6],\nnav[data-v-165a1af6],\nsection[data-v-165a1af6] {\n  margin: 0;\n  padding: 0;\n}\ninput[data-v-165a1af6],\nselect[data-v-165a1af6],\ntextarea[data-v-165a1af6] {\n  font-size: 100%;\n}\ntable[data-v-165a1af6] {\n  border-collapse: collapse;\n  border-spacing: 0;\n}\nfieldset[data-v-165a1af6],\nimg[data-v-165a1af6] {\n  border: 0;\n}\nabbr[data-v-165a1af6],\nacronym[data-v-165a1af6] {\n  border: 0;\n  font-variant: normal;\n}\ndel[data-v-165a1af6] {\n  text-decoration: line-through;\n}\naddress[data-v-165a1af6],\ncaption[data-v-165a1af6],\ncite[data-v-165a1af6],\ncode[data-v-165a1af6],\ndfn[data-v-165a1af6],\nem[data-v-165a1af6],\nth[data-v-165a1af6],\ni[data-v-165a1af6],\nvar[data-v-165a1af6] {\n  font-style: normal;\n  font-weight: 500;\n}\nol[data-v-165a1af6],\nul[data-v-165a1af6] {\n  list-style: none;\n}\ncaption[data-v-165a1af6],\nth[data-v-165a1af6] {\n  text-align: left;\n}\nh1[data-v-165a1af6],\nh2[data-v-165a1af6],\nh3[data-v-165a1af6],\nh4[data-v-165a1af6],\nh5[data-v-165a1af6],\nh6[data-v-165a1af6] {\n  font-size: 100%;\n  font-weight: 500;\n}\nq[data-v-165a1af6]:before,\nq[data-v-165a1af6]:after {\n  content: '';\n}\nsub[data-v-165a1af6],\nsup[data-v-165a1af6] {\n  font-size: 75%;\n  line-height: 0;\n  position: relative;\n  vertical-align: baseline;\n}\nsup[data-v-165a1af6] {\n  top: -0.5em;\n}\nsub[data-v-165a1af6] {\n  bottom: -0.25em;\n}\na[data-v-165a1af6]:hover {\n  text-decoration: underline;\n}\nins[data-v-165a1af6],\na[data-v-165a1af6],\na[data-v-165a1af6]:active,\na[data-v-165a1af6]:visited,\na[data-v-165a1af6]:link {\n  text-decoration: none;\n}\n.clearfix[data-v-165a1af6]:after {\n  display: table;\n  clear: both;\n  content: \"\";\n  visibility: hidden;\n  height: 0;\n}\nbody[data-v-165a1af6] {\n  height: 100%;\n  font-family: \"Microsoft YaHei\";\n}\n.iconfont[data-v-165a1af6] {\n  font-family: \"iconfont\" !important;\n  font-size: 21px;\n  font-style: normal;\n  -webkit-font-smoothing: antialiased;\n  -moz-osx-font-smoothing: grayscale;\n}\n.fl[data-v-165a1af6] {\n  float: left;\n}\n.fr[data-v-165a1af6] {\n  float: right;\n}\n.hand[data-v-165a1af6] {\n  cursor: pointer;\n}\n.web_bg[data-v-165a1af6] {\n  position: fixed;\n  top: 0;\n  left: 0;\n  width: 100%;\n  height: 100%;\n  min-width: 1000px;\n  z-index: -10;\n  zoom: 1;\n  background-color: #fff;\n  background-repeat: no-repeat;\n  background-size: cover;\n  -webkit-background-size: cover;\n  -o-background-size: cover;\n  background-position: center 0;\n}\n", ""]);

// exports


/***/ }),

/***/ 225:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    name: "HeadNavComponent",
    data: function data() {
        return {
            info: '李小龙'
        };
    },

    methods: {
        getTest: function getTest(msg) {
            var _this = this;

            console.info(this.info);
            this.$http.get(msg).then(function (r) {
                return _this.info = r.data.name;
            });
            console.info(this.info);
            console.info('777');
        }
    }
});

/***/ }),

/***/ 226:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("div", { staticClass: "test" }, [_vm._v("这是公共头")]),
    _vm._v(" "),
    _c(
      "div",
      {
        staticStyle: { width: "100%", "background-color": "red" },
        on: {
          click: function($event) {
            _vm.getTest("test.send")
          }
        }
      },
      [_vm._v("点击")]
    ),
    _vm._v(" "),
    _c("div", [_vm._v(_vm._s(_vm.info))])
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-165a1af6", module.exports)
  }
}

/***/ }),

/***/ 227:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(228)
}
var normalizeComponent = __webpack_require__(82)
/* script */
var __vue_script__ = __webpack_require__(230)
/* template */
var __vue_template__ = __webpack_require__(231)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-0e6155da"
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/FootNavComponent.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0e6155da", Component.options)
  } else {
    hotAPI.reload("data-v-0e6155da", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 228:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(229);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(81)("8d086a8a", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0e6155da\",\"scoped\":true,\"hasInlineConfig\":true}!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./FootNavComponent.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0e6155da\",\"scoped\":true,\"hasInlineConfig\":true}!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./FootNavComponent.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 229:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(48)(false);
// imports


// module
exports.push([module.i, "\n\n\n\n\n\n\n\n\n\n\n\n", ""]);

// exports


/***/ }),

/***/ 230:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    name: "FootComponent"
});

/***/ }),

/***/ 231:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [_vm._v("这是公共脚")])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-0e6155da", module.exports)
  }
}

/***/ }),

/***/ 232:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("head-nav"),
      _vm._v(" "),
      _c(
        "router-link",
        { attrs: { to: { name: "home", params: { userId: 123 } } } },
        [_vm._v("Home")]
      ),
      _vm._v(" "),
      _c(
        "router-link",
        { attrs: { to: { name: "test", params: { userId: 123 } } } },
        [_vm._v("test")]
      ),
      _vm._v(" "),
      _c(
        "router-link",
        { attrs: { to: { name: "login", params: { userId: 123 } } } },
        [_vm._v("login")]
      ),
      _vm._v(" "),
      _c("router-view"),
      _vm._v(" "),
      _c("foot-nav")
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-0b5baac0", module.exports)
  }
}

/***/ })

});