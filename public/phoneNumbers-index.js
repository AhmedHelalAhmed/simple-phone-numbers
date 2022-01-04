/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./resources/js/phoneNumbers-index.js ***!
  \********************************************/
document.querySelectorAll('#filter_form select').forEach(function (filterElement) {
  filterElement.addEventListener('change', function () {
    document.querySelector('#filter_form').submit();
  });
});
/******/ })()
;