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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/backend/myScript.js":
/*!******************************************!*\
  !*** ./resources/js/backend/myScript.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  var $btnSearch = $('button#btn-search');
  var $btnClearSearch = $('button#btn-clear-search');
  var $inputSearchField = $('input[name=search_field]');
  var $inputSearchValue = $('input[name=search_value]');
  var $statusAjax = $('button.status-ajax');
  var $bccContactAjax = $('button.bcc_contact-ajax');
  var $categoryName = $('input[name=name]');
  var $categorySlug = $('input[name=slug]');
  var $slugVI = $("input[name='vi[name]']");
  var $slugEN = $("input[name='en[name]']");
  var $selectAttr = $('select.select-ajax');
  var $selectFilter = $('select[name = select_filter]');
  var $priceFormat = $('input.currency');
  var $inputOrdering = $('input.input-ordering');
  var $fieldAjax = $('.field-ajax');
  var $removeImage = $('.dz-remove');
  var categoryTree = $('#nestable-category');
  categoryTree.nestable({
    /* config options */
  }).on('change', function () {
    var dataSend = categoryTree.nestable('serialize');
    $.ajax({
      type: 'POST',
      url: categoryTree.data('url'),
      data: {
        data: dataSend,
        _token: $('meta[name="csrf-token"]').attr('content')
      },
      dataType: 'json',
      success: function success(response) {// console.log(response);
      }
    });
  }); // Star rating

  $('.zvn-rating').rating({
    showClear: false,
    step: 1,
    min: 0,
    max: 5,
    starCaptions: function starCaptions(val) {
      return val;
    }
  });
  $('.zvn-rating-show').rating({
    displayOnly: true,
    showClear: false,
    showCaption: false,
    step: 1,
    min: 0,
    max: 5,
    size: 'xs'
  }); // Init select2

  $('.select-multi').select2(); // Select field

  $('a.select-field').click(function (e) {
    e.preventDefault();
    var field = $(this).data('field');
    var fieldName = $(this).html();
    $('button.btn-active-field').html(fieldName + ' <span class="caret"></span>');
    $inputSearchField.val(field);
  });
  /* Search */

  $btnSearch.click(function () {
    var pathname = window.location.pathname;
    var params = ['filter_status'];
    var searchParams = new URLSearchParams(window.location.search); // ?filter_status=active

    var link = '';
    $.each(params, function (key, param) {
      // filter_status
      if (searchParams.has(param)) {
        link += param + '=' + searchParams.get(param) + '&'; // filter_status=active
      }
    });
    var search_field = $inputSearchField.val();
    var search_value = $inputSearchValue.val();

    if (search_value.replace(/\s/g, '') == '') {
      alert('Nhập vào giá trị cần tìm !');
    } else {
      window.location.href = pathname + '?' + link + 'search_field=' + search_field + '&search_value=' + search_value;
    }
  });
  /* Filter status */

  $btnClearSearch.click(function () {
    var pathname = window.location.pathname;
    var searchParams = new URLSearchParams(window.location.search);
    params = ['filter_status'];
    var link = '';
    $.each(params, function (key, param) {
      if (searchParams.has(param)) {
        link += param + '=' + searchParams.get(param) + '&';
      }
    });
    window.location.href = pathname + '?' + link.slice(0, -1);
  });
  /* Confirm delete */

  $('.btn-delete').on('click', function () {
    if (!confirm('Bạn có chắc muốn xóa phần tử?')) return false;
  });
  /* Change status */

  $statusAjax.on('click', function () {
    var link = $(this).data('link');
    var $selector = $(this);
    $.ajax({
      url: link,
      type: 'GET',
      dataType: 'json',
      success: function success(result) {
        if (result.status) {
          if (result.response === 'active') $selector.removeClass('btn-info').addClass('btn-success').text('Active').data('link', result.link);else $selector.removeClass('btn-success').addClass('btn-info').text('Inactive').data('link', result.link);
          $selector.notify('Cập nhật thành công!', {
            className: 'success',
            autoHideDelay: 1500,
            elementPosition: 'top left'
          });
        } else {
          console.log(result.error);
        }
      }
    });
  });
  /* Change Bcc contact */

  $bccContactAjax.on('click', function () {
    var link = $(this).data('link');
    var $selector = $(this);
    $.ajax({
      url: link,
      type: 'GET',
      dataType: 'json',
      success: function success(result) {
        if (result.status) {
          if (result.response === 'active') $selector.removeClass('btn-warning').addClass('btn-primary').text('Bật').data('link', result.link);else $selector.removeClass('btn-primary').addClass('btn-warning').text('Tắt').data('link', result.link);
          $selector.notify('Cập nhật thành công!', {
            className: 'success',
            autoHideDelay: 1500,
            elementPosition: 'top left'
          });
        } else {
          console.log(result.error);
        }
      }
    });
  });
  /* Create slug of category */

  $categoryName.on('change', function () {
    var categoryName = $(this).val();
    if ($categorySlug.val() === '') $categorySlug.val(to_slug(categoryName));
  });
  $slugVI.on('change', function () {
    var value = $('input[name="vi[name]"]').val();
    var $selector = $('input[name="vi[slug]"]');
    if ($selector.val() === '') $selector.val(to_slug(value));
  });
  $slugEN.on('change', function () {
    var value = $('input[name="en[name]"]').val();
    var $selector = $('input[name="en[slug]"]');
    if ($selector.val() === '') $selector.val(to_slug(value));
  });
  /* Upload image */

  $('.lfm').filemanager('image');
  /* Init datepicker */

  $('.datepicker').datepicker({
    format: 'dd-mm-yyyy'
  });
  /* Change attr select box */

  $selectAttr.on('change', function () {
    var url = $(this).data('url');
    var field = $(this).data('field');
    var value = $(this).val();
    var $selector = $(this);
    $.ajax({
      url: url,
      type: 'GET',
      data: {
        field: field,
        value: value
      },
      dataType: 'json',
      success: function success(result) {
        if (result.status) {
          $selector.notify('Cập nhật thành công!', {
            className: 'success',
            autoHideDelay: 1500,
            elementPosition: 'top left'
          });
        } else {
          console.log(result.error);
        }
      }
    });
  });
  $fieldAjax.on('change', function (e) {
    var value = $(this).val();
    var field = $(this).data('field');
    var link = $(this).data('link');
    var $selector = $(this);
    $.ajax({
      url: link,
      type: 'GET',
      data: {
        field: field,
        value: value
      },
      dataType: 'json',
      success: function success(result) {
        if (result.status) {
          $selector.notify('Cập nhật thành công!', {
            className: 'success',
            autoHideDelay: 1500,
            elementPosition: 'top left'
          });
        } else {
          console.log(result.error);
        }
      }
    });
  });
  $selectFilter.on('change', function () {
    var pathname = window.location.pathname;
    var searchParams = new URLSearchParams(window.location.search);
    params = ['page', 'filter_status', 'search_field', 'search_value'];
    var link = '';
    $.each(params, function (key, value) {
      if (searchParams.has(value)) {
        link += value + '=' + searchParams.get(value) + '&';
      }
    });
    var select_field = $(this).data('field');
    var select_value = $(this).val();
    if (link === '') window.location.href = pathname + '?select_field=' + select_field + '&select_value=' + select_value;else window.location.href = pathname + '?' + link.slice(0, -1) + '&select_field=' + select_field + '&select_value=' + select_value;
  });
  /* Format currency */

  $priceFormat.simpleMoneyFormat();
  /* Hide alert */

  $('.alert').delay(2500).hide(1000);
  /* Checkbox ordering */

  $inputOrdering.on('change', function () {
    var id = $(this).data('id');
    var $selector = $('input[name="cid[' + id + ']"]');
    $selector.attr('checked', true);
    $selector.parent().addClass('checked');
    $selector.parent().parent().addClass('selected');
  });
  $removeImage.on('click', function () {
    var file = $(this).data('file');
    $('.dz-preview[data-file="' + file + '"]').remove();
    $('.image-hidden[data-file="' + file + '"]').remove();
  });
});

function to_slug(str) {
  str = str.toLowerCase();
  str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
  str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
  str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
  str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
  str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
  str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
  str = str.replace(/(đ)/g, 'd');
  str = str.replace(/([^0-9a-z-\s])/g, '');
  str = str.replace(/(\s+)/g, '-');
  str = str.replace(/^-+/g, '');
  str = str.replace(/-+$/g, '');
  return str;
}

/***/ }),

/***/ "./resources/sass/backend/myStyle.scss":
/*!*********************************************!*\
  !*** ./resources/sass/backend/myStyle.scss ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/frontend/myStyle.scss":
/*!**********************************************!*\
  !*** ./resources/sass/frontend/myStyle.scss ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*****************************************************************************************************************************!*\
  !*** multi ./resources/js/backend/myScript.js ./resources/sass/backend/myStyle.scss ./resources/sass/frontend/myStyle.scss ***!
  \*****************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\laragon\www\project-dhts\resources\js\backend\myScript.js */"./resources/js/backend/myScript.js");
__webpack_require__(/*! C:\laragon\www\project-dhts\resources\sass\backend\myStyle.scss */"./resources/sass/backend/myStyle.scss");
module.exports = __webpack_require__(/*! C:\laragon\www\project-dhts\resources\sass\frontend\myStyle.scss */"./resources/sass/frontend/myStyle.scss");


/***/ })

/******/ });