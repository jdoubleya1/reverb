"use strict";

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * Custom JavaScript
 *
 * @since 1.0.0
 */
;

(function ($, window, document, undefined) {
  var ECHO = {
    init: function init() {
      this.utils.init();
    },
    vals: {
      win: $(window),
      winWidth: $(window).width(),
      winHeight: $(window).height(),
      xs: 0,
      sm: 576,
      md: 768,
      lg: 992,
      xl: 1200,
      xxl: 1440,
      xxxl: 1920
    },
    utils: {
      init: function init() {
        this.preloader();
        this.devTools();
        this.colorToggle();
        this.dataAtts();
        this.menuToggle();
        this.stickyHeader();
        this.pagination();
        this.verticalScroll();
        this.blockModal();
        this.blockProducts();
        this.blockFeaturesImage();
        this.blockGrid();
        this.blockText();
      },
      preloader: function preloader() {
        // animate in header componenets
        if ($('.site-header .navbar-brand').length > 0 && $('.site-header .navbar-nav .nav-link').length > 0 && $('.site-header .btn').length > 0) {
          gsap.from(['.site-header .navbar-brand', '.site-header .navbar-nav .nav-link', '.site-header .btn'], {
            duration: 0.75,
            y: -100,
            opacity: 0,
            stagger: 0.2
          });
        }

        $('.gform_button').addClass('btn btn-primary');
      },
      colorToggle: function colorToggle() {
        if ($('.color-toggle').length > 0) {
          var $light = $('button.light');
          var $dark = $('button.dark');
          $light.on('click', function () {
            if ($(this).closest('.module').hasClass('bg-light')) {
              $(this).closest('.module').removeClass('bg-light text-dark');
            } else {
              $(this).closest('.module').removeClass('bg-dark text-light').addClass('bg-light text-dark');
            }
          });
          $dark.on('click', function () {
            if ($(this).closest('.module').hasClass('bg-dark')) {
              $(this).closest('.module').removeClass('bg-dark text-light');
            } else {
              $(this).closest('.module').removeClass('bg-light text-dark').addClass('bg-dark text-light');
            }
          });
        }
      },
      devTools: function devTools() {
        var breakpoint, dimensions;
        $('body').append('<div id="devTools" class="text-uppercase fs-xs"></div>');
        $(window).resize(function () {
          var ww = $(window).width();
          var wh = $(window).height();

          if (ww < ECHO.vals.sm) {
            breakpoint = 'XS';
          } else if (ww >= ECHO.vals.sm && ww < ECHO.vals.md) {
            breakpoint = 'SM';
          } else if (ww >= ECHO.vals.md && ww < ECHO.vals.lg) {
            breakpoint = 'MD';
          } else if (ww >= ECHO.vals.lg && ww < ECHO.vals.xl) {
            breakpoint = 'LG';
          } else if (ww >= ECHO.vals.xl && ww < ECHO.vals.xxl) {
            breakpoint = 'XL';
          } else if (ww >= ECHO.vals.xxl) {
            breakpoint = 'XXL';
          }

          dimensions = ww + ' x ' + wh + ' | ' + breakpoint;
          $('#devTools').html(dimensions);
        }).resize();
      },
      dataAtts: function dataAtts() {
        if ($('[data-bg]').length > 0) {
          $('[data-bg]').each(function () {
            var t = $(this),
                bg = t.attr('data-bg'),
                align = t.attr('data-bgalign');

            if (!align) {
              align = 'center';
            }

            t.css('background', 'url(' + bg + ') ' + align + '/cover no-repeat');
          });
        }

        if ($('[data-opacity]').length > 0) {
          $('[data-opacity]').each(function () {
            var t = $(this),
                opacity = t.attr('data-opacity');
            t.css('opacity', opacity);
          });
        }

        $('[data-bgcolor]').each(function () {
          var t = $(this),
              bgcolor = t.attr('data-bgcolor');
          t.attr('style', 'background-color:' + bgcolor + '!important');
        });
        $('[data-color]').each(function () {
          var t = $(this),
              color = t.attr('data-color');
          t.find('*').css('color', color);
        });
        $('[data-gradient]').each(function () {
          var t = $(this),
              colors = t.attr('data-gradient'),
              direction = t.attr('data-direction');

          if (colors) {
            direction = direction ? direction : 'to top';
            t.attr('style', (t.attr('style') ? t.attr('style') : '') + 'background:linear-gradient(' + direction + colors + ')');
          }
        });
      },
      menuToggle: function menuToggle() {
        // $('.nav-item.dropdown').on('click', function () {
        // 	$(this).children('.dropdown-menu').slideToggle();
        // });
        $('.nav-item.dropdown').on('mouseover', function () {
          $(this).children('.dropdown-menu').stop(true, true).delay(250).slideDown('fast');
        }).on('mouseleave', function () {
          $(this).children('.dropdown-menu').stop(true, true).delay(250).slideUp('fast');
        });
        $('.navbar-toggler').on('click', function () {
          var eTop = $('.site-header').outerHeight();
          var navHeight = $(window).height() - eTop;
          $('#navbarNavDropdown').css({
            'max-height': navHeight + 'px',
            'overflow-y': 'auto'
          });
          $('body').toggleClass('nav-open');
          $(this).toggleClass('active');
        });
      },
      pagination: function pagination() {
        if ($('.pagination').length > 0) {
          $('.pagination').find('.active').children('a').append('<span class="visually-hidden">(current)</span>');
        }
      },
      stickyHeader: function stickyHeader() {
        var $header = $('#wrapper-navbar'),
            $nav = $header.find('.navbar'),
            $header_height = $header.outerHeight(),
            $header_theme = $nav.attr('data-headertheme'),
            $sticky_theme = $nav.attr('data-stickytheme'),
            $stickybgcolor = $nav.attr('data-stickybg'),
            $bgstyle = $nav.attr('data-bgcolor');
        $(window).on('scroll resize load', function () {
          if ($(window).scrollTop() > $header_height) {
            $('body').addClass('sticky-header');

            if ($stickybgcolor) {
              $nav.attr('style', '');
              $nav.attr('style', 'background-color:' + $stickybgcolor + '!important');
            }

            $nav.removeClass($header_theme).addClass($sticky_theme);
          } else {
            $('body').removeClass('sticky-header');
            $nav.removeAttr('style');
            $nav.removeClass($sticky_theme).addClass($header_theme);

            if ($bgstyle) {
              $nav.attr('style', '');
              $nav.attr('style', 'background-color:' + $bgstyle + '!important');
            }
          }
        });

        if ($('body').hasClass('header-fixed-top')) {
          $('.module-page_title_bar').css('padding-top', $('.site-header').outerHeight() + 'px');
        }
      },
      blockModal: function blockModal() {
        if ($('.modal').length > 0) {
          $('.modal').each(function () {
            $(this).appendTo('body');
          });
        }
      },
      blockProducts: function blockProducts() {
        $.extend({
          replaceTag: function replaceTag(currentElem, newTagObj, keepProps) {
            var $currentElem = $(currentElem);
            var i,
                $newTag = $(newTagObj).clone();

            if (keepProps) {
              newTag = $newTag[0];
              newTag.className = currentElem.className;
              $.extend(newTag.classList, currentElem.classList);
              $.extend(newTag.attributes, currentElem.attributes);
            }

            $currentElem.wrapAll($newTag);
            $currentElem.contents().unwrap();
            return this;
          }
        });
        $.fn.extend({
          replaceTag: function replaceTag(newTagObj, keepProps) {
            return this.each(function () {
              jQuery.replaceTag(this, newTagObj, keepProps);
            });
          }
        });
      },
      blockFeaturesImage: function blockFeaturesImage() {
        if ($('.features_with_photo_2').length > 0) {
          var t = $('.features_with_photo_2');
          t.find('.module-bg.bg-image').removeClass('module-bg');
          t.find('.swiper').wrapInner('<div class="swiper-wrapper"></div>').prepend('<div class="row swiper-pagination position-relative"></div><div class="swiper-scrollbar position-relative mb-5"></div>');
          var gallery = new Swiper('.features_with_photo_2 .swiper', {
            effect: 'fade',
            fadeEffect: {
              crossFade: true
            },
            loop: false,
            slidesPerView: 1,
            scrollbar: {
              el: '.swiper-scrollbar',
              draggable: true
            },
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
              type: 'bullets',
              parallax: true,
              renderBullet: function renderBullet(index, className) {
                var slide = $('.swiper-slide').eq(index);
                var icon = slide.find('.icon').children('i').attr('class');
                var name = slide.find('.feature-heading').text();
                return '<div class="col d-flex align-items-center justify-content-start py-4 bg-transparent text-uppercase">' + (icon ? '<div class="icon"><i class="' + icon + '"></i></div>' : '') + (name ? '<p class="m-0">' + name + '</p>' : '') + '</div>';
              }
            }
          });
        }

        if ($('.features_with_photo_7').length > 0) {
          var tops = $('.features_with_photo_7 .gallery-top');
          var thumbs = $('.features_with_photo_7 .gallery-thumbs');
          var galleryThumbs = new Swiper('.features_with_photo_7 .gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 4,
            loop: true,
            freeMode: true,
            loopedSlides: 5,
            //looped slides should be the same
            watchSlidesVisibility: true,
            watchSlidesProgress: true
          });
          var galleryTop = new Swiper('.features_with_photo_7 .gallery-top', {
            spaceBetween: 10,
            loop: true,
            loopedSlides: 5,
            //looped slides should be the same
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev'
            },
            thumbs: {
              swiper: galleryThumbs
            }
          });
        }
      },
      blockGrid: function blockGrid() {
        if ($('.grid_4').length > 0) {
          var swiper = new Swiper('.grid_4 .swiper', {
            spaceBetween: 30,
            loop: true,
            pagination: {
              el: '.swiper-pagination',
              dynamicBullets: true
            },
            slidesPerView: 1,
            breakpoints: {
              992: {
                slidesPerView: '3',
                navigation: {
                  nextEl: '.grid_4 .swiper-button-next',
                  prevEl: '.grid_4 .swiper-button-prev'
                }
              }
            }
          });
        }

        if ($('.grid_11').length > 0 && ECHO.vals.winWidth < ECHO.vals.lg) {
          $('.grid_11').each(function (elem) {
            $(this).children('.inner').children().attr('class', 'swiper');
            $(this).find('.row').attr('class', 'swiper-wrapper');
            $(this).find('.col').attr('class', 'swiper-slide');
            $(this).find('.gs_reveal').removeClass('gs_reveal');
          });
          $(window).on('load', function () {
            var _Swiper;

            var swiper = new Swiper('.grid_11 .swiper', (_Swiper = {
              spaceBetween: 15,
              loop: true,
              slidesPerView: 'auto'
            }, _defineProperty(_Swiper, "loop", true), _defineProperty(_Swiper, "speed", 1000), _defineProperty(_Swiper, "preloadImages", false), _defineProperty(_Swiper, "lazy", true), _defineProperty(_Swiper, "freeMode", {
              enabled: true,
              sticky: true
            }), _defineProperty(_Swiper, "slidesOffsetBefore", 15), _Swiper));
          });
        }
      },
      blockText: function blockText() {
        if ($('.module-text').length > 0) {
          $('.module-text').each(function () {
            var t = $(this); // Testimonial Slider

            if (t.find('.sidebar-testimonial-swiper').length > 0) {
              var slider = t.find('.sidebar-testimonial-swiper');
              var mySwiper = new Swiper(slider, {
                loop: true
              });
            }
          });
        }
      },
      verticalScroll: function verticalScroll() {
        if ($('.vertical-scroll-container').length > 0) {
          $('.vertical-scroll-container').each(function () {
            var swiper = new Swiper($(this).find('.swiper'), {
              direction: 'vertical',
              slidesPerView: 'auto',
              freeMode: true,
              scrollbar: {
                el: '.swiper-scrollbar'
              },
              mousewheel: true
            });
          });
        }
      }
    }
  };
  ECHO.init();
})(jQuery, window, document);
"use strict";

function swipr() {
  var nSlider = document.querySelectorAll(".swiper-new");
  [].forEach.call(nSlider, function (slider, index, arr) {
    var data = slider.getAttribute("data-swiper") || {};

    if (data) {
      var dataOptions = JSON.parse(data);
    }

    slider.options = Object.assign({}, dataOptions);
    var swiper = new Swiper(slider, slider.options);
  });
}

document.addEventListener("DOMContentLoaded", function () {
  swipr();
});