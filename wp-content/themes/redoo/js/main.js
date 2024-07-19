jQuery(document).ready(function ($) {
"use strict";

/////////////////////////////////////////////////////////////////////////
//        Side Menu Pop Up Option
////////////////////////////////////////////////////////////////////////// 

var sidemenuoption = $('.sidemenuoption');
    var menuoption_open = $('.sidemenuoption-open');
    var menuoption_close = $('.menuoption-close');
    var overlay = $('.body-overlay');
    var is_closed = true;
    menuoption_open.on('click', function(e) {
        e.preventDefault();
        if (is_closed == true) {
            is_closed = false;
            sidemenuoption.removeClass('themelazer-close');
            sidemenuoption.addClass('themelazer-open');
            overlay.addClass('overlay-show');
        } else {
            is_closed = true;
            sidemenuoption.removeClass('themelazer-open');
            sidemenuoption.addClass('themelazer-close');
            overlay.removeClass('overlay-show');
        }
    }); 
    menuoption_close.add(overlay).on('click', function(e) {
        e.preventDefault();
        sidemenuoption.removeClass('themelazer-open');
        sidemenuoption.addClass('themelazer-close');
        overlay.removeClass('overlay-show');
        is_closed = true;
    });
    
    if (typeof($.fn.slicknav) == 'function') {
        $('.themelazer-navigation').slicknav({
            prependTo: '.themelazer_mobile_menu',
            closedSymbol: '<i class="fa fa-chevron-right"></i>',
            openedSymbol: '<i class="fa fa-chevron-down"></i>',
            label: '',
            allowParentLinks: true
    });
}

/////////////////////////////////////////////////////////////////////////
//        Search Header 
////////////////////////////////////////////////////////////////////////// 

$('a[href="#search_popup"]').on('click keyup', function(event) {
  event.preventDefault();
  var target = $("#search_popup");

  $('#themelazer_search_wrapper').addClass('open');
  target.find('input').focus();
  $('#themelazer_search_wrapper > form > input[type="text"]').focus();
   
});

$('#themelazer_search_wrapper, #themelazer_search_wrapper i').on('click ', function(event) {
  if (event.target == this || event.target.className == 'ti-close' || event.keyCode == 27) {
    $(this).removeClass('open');
  }
});
 
/////////////////////////////////////////////////////////////////////////
//       Sticky Header
////////////////////////////////////////////////////////////////////////// 

$(".themelazer_middle_header").sticky({ topSpacing: 0 } );

///////////////// ///////////////// 
                   // video
///////////////// ///////////////// 
fluidvids.init({
    selector: 'iframe',
    players: ['www.youtube.com', 'player.vimeo.com']
}); 

//////////////////////////////////////////////////////////////////////////
//        Grid images
//////////////////////////////////////////////////////////////////////////  

$(".justified-gallery-post").justifiedGallery({
    rowHeight: 200,
    captions: false,
    margins : 1,
    lastRow : 'justify',
    fixedHeight : false
});

//////////////////////////////////////////////////////////////////////////
//        Image
//////////////////////////////////////////////////////////////////////////  
$('.justified-gallery-post').magnificPopup({
  type:'image', 
  delegate: 'a',
  closeOnContentClick: false,
  closeBtnInside: false,
  mainClass: 'mfp-with-zoom mfp-img-mobile',
  image: {
            verticalFit: true,
            titleSrc: function(item) {
              return item.el.attr('title');
            }
  },
  gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1]
    },
  zoom: {
            enabled: true,
            duration: 300,
            opener: function(element) {
              return element.find('img');
  }}
});
//////////////////////////////////////////////////////////////////////////
//        Share Post Via Copy Linked 
////////////////////////////////////////////////////////////////////////// 
$(".themelazer_share_link_button").on('click', function(){
  $(".themelazer_share_link_text").select();
      document.execCommand('copy');
  $('.themelazer_popup_copy_link').addClass('show');
      setTimeout(function () {
        $('.themelazer_popup_copy_link').removeClass('show');
      }, 2000);
});
//////////////////////////////////////////////////////////////////////////
//        Sticky Sidebar
////////////////////////////////////////////////////////////////////////// 

if (jQuery('.themelazer_sticky').length) {
    jQuery('body').addClass('sticky-sidebar_init');
    jQuery('.themelazer_sticky').each(function(){

      if(jQuery(this).hasClass('elementor-element')){
        jQuery(this).find('.elementor-widget-wrap').theiaStickySidebar({
          containerSelector: jQuery(this).parent(),
          additionalMarginTop: 30,
          additionalMarginBottom: 30
        });
      }else{
        jQuery(this).theiaStickySidebar({
          additionalMarginTop: 30,
          additionalMarginBottom: 30
        });
      }
      
  });
} 

//////////////////////////////////////////////////////////////////////////
//        Scroll To Top
//////////////////////////////////////////////////////////////////////////  

$(window).on('scroll', scrollFunction);
  function scrollFunction() {
    var target = $('.themelazer_single_post_content_wrapper ');
      
      if ( target.length > 0 ) {
          var contentHeight = target.outerHeight();
          var documentScrollTop = $(document).scrollTop();
          var targetScrollTop = target.offset().top;
          var scrolled = documentScrollTop - targetScrollTop;
          
          if (0 <= scrolled) {
              var scrolledPercentage = (scrolled / contentHeight) * 100;
              if (scrolledPercentage >= 82) {
                $(".themelazer_go_to_top_body, .themelazer_go_to_text").css({
                  color: "#FFFFFF"
                });
              } else {
                $(".themelazer_go_to_top_body, .themelazer_go_to_text").css({
                  color: "#000000"
                });
              }
              if (scrolledPercentage >= 0 && scrolledPercentage <= 100) {
                  scrolledPercentage = scrolledPercentage >= 90 ? 100 : scrolledPercentage;
                  $("#progress_bar_active").css({
                      width: scrolledPercentage + "%"
                  });
              }
          } else {
              $("#progress_bar_active").css({
                  width: "0%"
              });
          }
      }
  }     
function ThemelazerGoTop() {
//alert("working");
    if ($(window).scrollTop() > 500) {
      $('.themelazer_go_to_top').fadeIn();
      $('.themelazer_next_prev_post_wrapper').addClass('display');
    } else {
      $('.themelazer_go_to_top').fadeOut();
      $('.themelazer_next_prev_post_wrapper').removeClass('display');
    }
}
//bottom to top scroll click to go
$('.themelazer_go_to_top').on('click', function() {
  $('html, body').animate({scrollTop : 0},1000);
  return false;
}); 
jQuery(window).on('scroll', function(){
    (function ($) {
    ThemelazerGoTop();                
    })(jQuery);
  });            
});
( function( $ ) {

//////////////////////////////////////////////////////////////////////////
//        Carousel
////////////////////////////////////////////////////////////////////////// 

var themelazer_slider_option = function ($scope, $) {  
      var themelazer_carousel  =  $scope.find('.themelazer-carousel').eq(0);
          for (i = 0; i < themelazer_carousel.length; i++) {
          var $carousel_col = $(themelazer_carousel[i]);
            $carousel_col.slick({
            dots: $carousel_col.attr("data-dots") == "true",
            infinite: $carousel_col.attr("data-loop") == "true",
            arrows: $carousel_col.attr("data-arrows") == "true",
            swipe: $carousel_col.attr("data-swipe") == "true",
            autoplay: $carousel_col.attr("data-play") == "true",
            autoplaySpeed: $carousel_col.attr("data-autospeed") || 6000,
            draggable: true,
            autoplay: true, 
            pauseOnHover: true,
            adaptiveHeight: true,
            centerMode: true,
            centerPadding: '9%',
            prevArrow:'<span class="themelazer-arrow-left"><i class="ti-arrow-left"></i></span>',
            nextArrow:'<span class="themelazer-arrow-right"><i class="ti-arrow-right"></i></span>',
            slidesToScroll: 1,
            responsive: [
                  {
                breakpoint: 0,  
                settings: {
                  centerMode: false,
                  slidesToShow: parseInt($carousel_col.attr('data-items')) || 1,
                }
              },
              {
                breakpoint: 479,
                settings: {
                  centerMode: false,
                  slidesToShow: parseInt($carousel_col.attr('data-xs-items')) || 1,
                }
              },
              {
                breakpoint: 767,
                settings: {
                  centerMode: false,
                  slidesToShow: parseInt($carousel_col.attr('data-sm-items')) || 1,
                }
              },
              {
                breakpoint: 991,
                settings: {
                   
                  slidesToShow: parseInt($carousel_col.attr('data-md-items')) || 1,
                }
              },
              {
                breakpoint: 1199,
                settings: {
                  arrows: true,
                  slidesToShow: parseInt($carousel_col.attr('data-lg-items')) || 1,
                }
              },
              {
                breakpoint: 1799,
                settings: {
                  arrows: true,
                  slidesToShow: parseInt($carousel_col.attr('data-xl-items')) || 1,
                }
              },
            ]
      });
     }
      
      //////////////////////////////////////////////////////////////////////////
      //        Carousel Z
      ////////////////////////////////////////////////////////////////////////// 

      var themelazer_carousel_z  =  $scope.find('.themelazer-carousel-z').eq(0);
          for (i = 0; i < themelazer_carousel_z.length; i++) {
          var $carousel_col = $(themelazer_carousel_z[i]);
            $carousel_col.slick({
            dots: $carousel_col.attr("data-dots") == "true",
            infinite: $carousel_col.attr("data-loop") == "true",
            arrows: $carousel_col.attr("data-arrows") == "true",
            swipe: $carousel_col.attr("data-swipe") == "true",
            autoplay: $carousel_col.attr("data-play") == "true",
            autoplaySpeed: $carousel_col.attr("data-autospeed") || 6000,
            draggable: true,
            autoplay: true, 
            pauseOnHover: true,
            adaptiveHeight: true,
            centerMode: true,
            centerPadding: '9%',
            prevArrow:'<span class="themelazer-arrow-left"><i class="ti-arrow-left"></i></span>',
            nextArrow:'<span class="themelazer-arrow-right"><i class="ti-arrow-right"></i></span>',
            slidesToScroll: 1,
            responsive: [
                  {
                breakpoint: 0,  
                settings: {
                  centerMode: false,
                  slidesToShow: parseInt($carousel_col.attr('data-items')) || 1,
                }
              },
              {
                breakpoint: 479,
                settings: {
                  centerMode: false,
                  slidesToShow: parseInt($carousel_col.attr('data-xs-items')) || 1,
                }
              },
              {
                breakpoint: 767,
                settings: {
                  centerMode: false,
                  slidesToShow: parseInt($carousel_col.attr('data-sm-items')) || 1,
                }
              },
              {
                breakpoint: 991,
                settings: {
                   
                  slidesToShow: parseInt($carousel_col.attr('data-md-items')) || 1,
                }
              },
              {
                breakpoint: 1199,
                settings: {
                  arrows: true,
                  slidesToShow: parseInt($carousel_col.attr('data-lg-items')) || 1,
                }
              },
              {
                breakpoint: 1799,
                settings: {
                  arrows: true,
                  slidesToShow: parseInt($carousel_col.attr('data-xl-items')) || 1,
                }
              },
            ]
      });     
      }      
      /////////////////////////////////////////////////////////////////////////
      //        Slider Center
      //////////////////////////////////////////////////////////////////////////  

      var themelazer_slider_center = $('.themelazer-slider-center');
          for (i = 0; i < themelazer_slider_center.length; i++) {
          var $slider_slide = $(themelazer_slider_center[i]);
          var time = 2;
          var $bar, $slick, isPause, tick, percentTime;
                  $slider_slide.slick({
                    dots: $slider_slide.attr("data-dots") == "true",
                    infinite: $slider_slide.attr("data-loop") == "true",
                    arrows: $slider_slide.attr("data-arrows") == "true",
                    swipe: $slider_slide.attr("data-swipe") == "true",
                    autoplay: $slider_slide.attr("data-play") == "true",
                    autoplaySpeed: $slider_slide.attr("data-autospeed") || 7000,
                    pauseOnHover: true,
                    adaptiveHeight: true,
                    swipeToSlide:true,
                    infinite: true,
                    fade: true,
                    cssEase: 'linear',
                    draggable: false,
                    prevArrow:'<span class="themelazer-arrow-left"><i class="ti-angle-left"></i></span>',
                    nextArrow:'<span class="themelazer-arrow-right"><i class="ti-angle-right"></i></span>',
                    slidesToScroll: 1,
                    responsive: [
                       {
                          breakpoint: 992,
                          settings: {
                            arrows: false,
                            slidesToShow:1,
                          }
                        },
                        {
                          breakpoint: 768,
                          settings: {
                            arrows: false,
                            slidesToShow:1,

                          }
                        },
                        {
                          breakpoint: 480,
                          settings: {
                            arrows: false,
                            slidesToShow:1,
                            
                          }
                        }
                    ] 
                    
                  });
                  $bar = $('.slider-progress .progress');
                  function startProgressbar() {
                    resetProgressbar();
                    percentTime = 0;
                    isPause = false;
                    tick = setInterval(interval, 30);
                  }
                  function interval() {
                    if (isPause === false) {
                      percentTime += 1 / (time + 0.1);
                      $bar.css({
                        width: percentTime + "%"
                      });
                      if (percentTime >= 100) {
                        $slider_slide.slick('slickNext');
                        startProgressbar();
                      }
                    }
                  }
                  function resetProgressbar() {
                    $bar.css({
                      width: 0 + '%'
                    });
                    clearTimeout(tick);
                  }
                  startProgressbar();
                  $('.themelazer-arrow-left, .themelazer-arrow-right').click(function() {
                    startProgressbar();
                  });
        
     }

      /////////////////////////////////////////////////////////////////////////
      //        Home Slider
      ////////////////////////////////////////////////////////////////////////// 
      var themelazer_slider = $('.themelazer-slider');
          for (i = 0; i < themelazer_slider.length; i++) {
          var $slider_slide = $(themelazer_slider[i]);
        $slider_slide.slick({
        dots: $slider_slide.attr("data-dots") == "true",
        infinite: $slider_slide.attr("data-loop") == "true",
        arrows: $slider_slide.attr("data-arrows") == "true",
        swipe: $slider_slide.attr("data-swipe") == "true",
        autoplay: $slider_slide.attr("data-play") == "true",
        pauseOnHover: true,
        adaptiveHeight: true,
        centerMode: true,
        centerPadding: '250px',
        prevArrow:'<span class="themelazer-arrow-left"><i class="ti-angle-left"></i></span>',
        nextArrow:'<span class="themelazer-arrow-right"><i class="ti-angle-right"></i></span>',
        slidesToScroll: 1, 
        responsive: [
        {
          breakpoint: 992,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '150px',
          }
        },
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            centerMode: false,

          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            centerMode: false,
            
          }
        }
      ]   
      });
        }

      /////////////////////////////////////////////////////////////////////////
      //        Feature Slider
      //////////////////////////////////////////////////////////////////////////  

      var themelazer_feature_slider = $('.themelazer-feature-slider');
      var $status = $('.pagingInfo');
      for (i = 0; i < themelazer_feature_slider.length; i++) {
      var $slider_slide = $(themelazer_feature_slider[i]);
      $slider_slide.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
            //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
            var i = (currentSlide ? currentSlide : 0) + 1;
            $status.text(i + '/' + slick.slideCount);
      });
        $slider_slide.slick({
        dots: $slider_slide.attr("data-dots") == "true",
        infinite: $slider_slide.attr("data-loop") == "true",
        arrows: $slider_slide.attr("data-arrows") == "true",
        autoplaySpeed: $slider_slide.attr('data-autospeed') || 7000,
        swipe: $slider_slide.attr("data-swipe") == "true",
        autoplay: $slider_slide.attr("data-play") == "true",
        pauseOnHover: true,
        adaptiveHeight: true,
        swipeToSlide:true,
        infinite: true,
        fade: true,
        cssEase: 'linear',
        draggable: false,
        prevArrow:'<div class="themelazer-arrow-left"><i class="ti-angle-left"></i></div>',
        nextArrow:'<div class="themelazer-arrow-right"><i class="ti-angle-right"></i></div>',
        slidesToScroll: 1,
        responsive: [
        {
          breakpoint: 992,
          settings: {
            arrows: false,
            slidesToShow:1,
          }
        },
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            slidesToShow:1,

          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            slidesToShow:1,
            
          }
        }
      ] 
        
      });
     }     
    /////////////////////////////////////////////////////////////////////////
    //        Feature Slider
    //////////////////////////////////////////////////////////////////////////  

      var themelazer_feature_slider_style_two = $('.themelazer-feature-slider-style-two');
        for (i = 0; i < themelazer_feature_slider_style_two.length; i++) {
              var $slider_slide = $(themelazer_feature_slider_style_two[i]);
              $slider_slide.slick({
              dots: $slider_slide.attr("data-dots") == "true",
              infinite: $slider_slide.attr("data-loop") == "true",
              arrows: $slider_slide.attr("data-arrows") == "true",
              autoplaySpeed: $slider_slide.attr('data-autospeed') || 7000,
              swipe: $slider_slide.attr("data-swipe") == "true",
              autoplay: $slider_slide.attr("data-play") == "true",
              pauseOnHover: true,
              adaptiveHeight: true,
              swipeToSlide:true,
              infinite: true,
              fade: true,
              cssEase: 'linear',
              draggable: false,
              prevArrow:'<div class="themelazer-arrow-left"><i class="ti-angle-left"></i></div>',
              nextArrow:'<div class="themelazer-arrow-right"><i class="ti-angle-right"></i></div>',
              slidesToScroll: 1,
              responsive: [
              {
                breakpoint: 992,
                settings: {
                  arrows: false,
                  slidesToShow:1,
                }
              },
              {
                breakpoint: 768,
                settings: {
                  arrows: false,
                  slidesToShow:1,

                }
              },
              {
                breakpoint: 480,
                settings: {
                  arrows: false,
                  slidesToShow:1,
                  
                }
              }
            ]               
        });
             
     }    
      var Animation_text_circle = function($scope, $){
        $(".roundButton .circle").wrap('<div class="circleContainer"></div>');
          $(".roundButton .circle").each(function () {
                var e = $(this);
                var t = new CircleType(e.find("p")[0]).dir(+1);
                e.find("span").each(function () {
                    var e = $(this).text();
                    if (e == "/") $(this).html("&nbsp;");
          });
        }); 
      }  
  
};
 
/////////////////////////////////////////////////////////////////////////
//        Masonry Support with Elementor Page Builder
////////////////////////////////////////////////////////////////////////// 
var WidgetMasonryHandler = function ($scope, $) {  
   $('.grid').masonry({
      itemSelector: '.grid-item',
      itemSelector: '.grid-item1',
      itemSelector: '.grid-item2',
    });
}    

$( window ).on( 'elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction( 'frontend/element_ready/redoo-carousel.default', themelazer_slider_option ); 
    elementorFrontend.hooks.addAction( 'frontend/element_ready/redoo-carousel-z.default', themelazer_slider_option);
    elementorFrontend.hooks.addAction( 'frontend/element_ready/redoo-slider.default', themelazer_slider_option );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/redoo-slider-center.default', themelazer_slider_option );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/redoo-feature-slider.default', themelazer_slider_option );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/redoo-feature-slider-style-two.default',themelazer_slider_option);
    elementorFrontend.hooks.addAction( 'frontend/element_ready/redoo-animation-text-circle.default', themelazer_slider_option );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/redoo-marsonry-post.default', WidgetMasonryHandler );
  });
})( jQuery );