"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var lv = "lvdd";

var App = function () {
  function App() {
    _classCallCheck(this, App);

    this.app = "hello";
  }

  _createClass(App, [{
    key: "load",
    value: function load() {
      alert('2222222');
    }
  }]);

  return App;
}();

window.onload = function () {
  alert(lv);
  console.log('sss');
  App.load();
};