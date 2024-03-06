/*------------------------------------------------------------------
* Project:        Nepayatri
* Author:         CN-InfoTech
* URL:            hthttps://themeforest.net/user/cn-infotech
* Created:        03/06/2020
-------------------------------------------------------------------
*/


 (function($) {
     "use strict";


     /*======== Doucument Ready Function =========*/
    jQuery(document).ready(function () {
     //CACHE JQUERY OBJECTS
      $("#status").fadeOut();
      $("#preloader").delay(200).fadeOut("slow");
      $("body").delay(200).css({ "overflow": "visible" });

      
      /* Init Wow Js */
      new WOW().init();

    });
    $(window).scroll(function(){

        if( $(window).scrollTop() > 10 ){
      
          $('.header_menu').addClass('navbar-sticky')
      
        } else {
          $('.header_menu').removeClass('navbar-sticky')
        }
      });
      
      $(window).scroll(function(){
      
        if( $(window).scrollTop() > 10 ){
      
          $('.tabs-navbar').addClass('navbar-sticky')
      
        } else {
          $('.tabs-navbar').removeClass('navbar-sticky')
        }
      });

     // Range sliders activation
     $(".range-slider-ui").each(function() {
         var minRangeValue = $(this).attr('data-min');
         var maxRangeValue = $(this).attr('data-max');
         var minName = $(this).attr('data-min-name');
         var maxName = $(this).attr('data-max-name');
         var unit = $(this).attr('data-unit');
         $(this).slider({
             range: true,
             min: minRangeValue,
             max: maxRangeValue,
             values: [minRangeValue, maxRangeValue],
             slide: function(event, ui) {
                 event = event;
                 var currentMin = parseInt(ui.values[0], 10);
                 var currentMax = parseInt(ui.values[1], 10);
                 $(this).children(".min-value").text(currentMin + " " + unit);
                 $(this).children(".max-value").text(currentMax + " " + unit);
                 $(this).children(".current-min").val(currentMin);
                 $(this).children(".current-max").val(currentMax);
             }
         });
     });
     /* ------------------------------------------------------------------------ */
     /* BACK TO TOP
/* ------------------------------------------------------------------------ */
     $(document).on('click', '#back-to-top, .back-to-top', () => {
         $('html, body').animate({
             scrollTop: 0
         }, '500');
         return false;
     });
     $(window).on('scroll', () => {
         if ($(window).scrollTop() > 500) {
             $('#back-to-top').fadeIn(200);
         } else {
             $('#back-to-top').fadeOut(200);
         }
     });
     // Slick SLider
     $('.slider-store').slick({
         slidesToShow: 1,
         slidesToScroll: 1,
         arrows: false,
         dots: false,
         fade: true,
         asNavFor: '.slider-thumbs'
     });
     $('.slider-thumbs').slick({
         slidesToShow: 5,
         slidesToScroll: 1,
         asNavFor: '.slider-store',
         dots: false,
         arrows: false,
         centerMode: true,
         focusOnSelect: true
     });
     $('.review-slider').slick({
         infinite: true,
         slidesToShow: 2,
         slidesToScroll: 1,
         draggable:false,
         arrows: true,
         speed: 1000,
         dots: false,
         autoplay: false,
         responsive: [{
             breakpoint: 800,
             settings: {
                 slidesToShow: 1
             }
         },
        {
         breakpoint: 600,
            settings: {
                slidesToShow: 1,
                arrows: false
            }
        }]
     });
     $('.top-deal-slider,.rental-slider,.testimonial-slider, .rental-destination-slider, .ticket-slider').slick({
         infinite: true,
         slidesToShow: 3,
         slidesToScroll: 1,
         arrows: true,
         dots: false,
         autoplay: true,
         draggable:false,
         responsive: [{
             breakpoint: 1000,
             settings: {
                 slidesToShow: 2,
                 arrows: false
             }
         }, {
             breakpoint: 600,
             settings: {
                 slidesToShow: 1,
                 arrows: false
             }
         }]
     });
     $('.about-slider').slick({
         infinite: true,
         slidesToShow: 1,
         slidesToScroll: 1,
         arrows: false,
         dots: false,
         autoplay: true,
         speed: 2000
     });
     $('.textslide-slider').slick({
         infinite: true,
         slidesToShow: 1,
         slidesToScroll: 1,
         arrows: true,
         dots: false,
         autoplay: true,
         speed: 2000,
         vertical: true,
         verticalScrolling: true,
         cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
         adaptiveHeight: true
     });
     $('.hotel-slider').slick({
         infinite: true,
         slidesToShow: 4,
         slidesToScroll: 1,
         speed: 3000,
         arrows: false,
         draggable:false,
         dots: false,
         autoplay: true,
         responsive: [{
             breakpoint: 1000,
             settings: {
                 slidesToShow: 2
             }
         }, {
             breakpoint: 500,
             settings: {
                 slidesToShow: 1
             }
         }]
     });
     $('.team-slider').slick({
         infinite: true,
         slidesToShow: 3,
         slidesToScroll: 1,
         arrows: true,
         dots: false,
         autoplay: true,
         speed: 1000,
         draggable:false,
         responsive: [{
             breakpoint: 1000,
             settings: {
                 slidesToShow: 2
             }
         }, {
             breakpoint: 500,
             settings: {
                 slidesToShow: 1,
                 arrows: false
             }
         }]
     });
     $('.partner-slider').slick({
         infinite: true,
         slidesToShow: 5,
         slidesToScroll: 1,
         arrows: false,
         dots: false,
         autoplay: true,
         speed: 1000,
         draggable:false,
         responsive: [{
             breakpoint: 1000,
             settings: {
                 slidesToShow: 3
             }
         }, {
             breakpoint: 800,
             settings: {
                 slidesToShow: 2
             }
         }, {
             breakpoint: 500,
             settings: {
                 slidesToShow: 1
             }
         }]
     });
     $('.attract-slider').slick({
         infinite: true,
         slidesToShow: 6,
         slidesToScroll: 1,
         arrows: false,
         dots: false,
         speed: 2000,
         autoplay: true,
         draggable:false,
         responsive: [{
             breakpoint: 1000,
             settings: {
                 slidesToShow: 3
             }
         }, 
         {
             breakpoint: 600,
             settings: {
                 slidesToShow: 2
            }
         }, 
         {
             breakpoint: 500,
             settings: {
                 slidesToShow: 1
             }
         }]
     });

      $("#contactform").validate({      
      submitHandler: function() {
        
        $.ajax({
          url : 'mail/contact.php',
          type : 'POST',
          data : {
            fname : $('input[name="first_name"]').val(),
            lname : $('input[name="last_name"]').val(),
            email : $('input[name="email"]').val(),
            phone : $('input[name="phone"]').val(),
            comments : $('textarea[name="comments"]').val(),
          },
          success : function( result ){
            $('#contactform-error-msg').html( result );
            $("#contactform")[0].reset();
          }     
        });

      }
    });
     // counter-block
     $('#counter-block').ready(function() {
         $('.boats').animationCounter({
             start: 0,
             end: 320,
             step: 1,
             delay: 1
         });
         $('.location').animationCounter({
             start: 0,
             end: 150,
             step: 1,
             delay: 1
         });
         $('.showroom').animationCounter({
             start: 0,
             end: 152,
             step: 1,
             delay: 1
         });
         $('.lisence').animationCounter({
             start: 0,
             end: 523,
             step: 1,
             delay: 1
         });
     });
     // $('.grid').masonry({
     // // options
     //   itemSelector: '.grid-item',
     //   columnWidth: 200
     // });

     var $grid = $('.blog-main').masonry({
         // options
         itemSelector: '.mansonry-item',
         columnWidth: 200
     });

     $grid.imagesLoaded().progress( function() {
  $grid.masonry('layout');
});



     $(document).ready(() => {
         loopcounter('coming-counter');
     });
     jQuery(document).ready(() => {
         jQuery('.js-video-button').modalVideo({
             channel: 'vimeo'
         });
     });
     // Nice Select JS
     $('.niceSelect').niceSelect();
     $('a[href="#search1"]').on('click', function(event) {
         event.preventDefault();
         $('#search1').addClass('open');
         $('#search1 > form > input[type="search"]').focus();
     });
     $('#search1, #search1 button.close').on('click keyup', function(event) {
         if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
             $(this).removeClass('open');
         }
     });
     //Do not include! This prevents the form from submitting for DEMO purposes only!
     $('form').submit(function(event) {
         event.preventDefault();
         return false;
     })

     ColorSwitcher_main();

 }(jQuery));

 function ColorSwitcher_main() {
     var colorSheets = [{
         color: "#ee2654",
         title: "Switch to Default",
         href: "./css/color/color-default.css"
     }, {
         color: "#fb2d1f",
         title: "Switch to Red",
         href: "./css/color/color-red.css"
     }, {
         color: "#7DBD21",
         title: "Switch to Green",
         href: "./css/color/color-green.css"
     }, {
         color: "#00b1cd",
         title: "Switch to Blue",
         href: "./css/color/color-blue.css"
     }, {
         color: "#ec5f0c",
         title: "Switch to orange",
         href: "./css/color/color-orange.css"
     }, {
         color: "#785cb4",
         title: "Switch to Violet",
         href: "./css/color/color-violet.css"
     }, 
     {
         color: "#005294",
         title: "Switch to Darkblue",
         href: "./css/color/color-darkblue.css"
     }, {
         color: "#bea882",
         title: "Switch to beige",
         href: "./css/color/color-beige.css"
     }];
     ColorSwitcher.init(colorSheets);
 }

 jQuery(window).on('resize load', () => {
     resize_eb_slider();
 }).resize();
 /**
  * Resize slider
  */
 function resize_eb_slider() {
     let bodyheight = jQuery(this).height();
     if (jQuery(window).width() > 1400) {
         bodyheight *= 0.90;
         jQuery('.slider').css('height', `${bodyheight}px`);
     }
 }