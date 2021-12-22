(function($){
	"use strict";
  
  jQuery(document).ready(function($){
    // Window scroll to certain heights
    $(window).scroll(function(){
      // Header Background-Color Change
      if( $(document).scrollTop() > 50 ){
        $(".site-header .navbar.home").removeClass("bg-transparent");
        $(".site-header .navbar.home").addClass("bg-base-1");
      } else{
        $(".site-header .navbar.home").removeClass("bg-base-1");
        $(".site-header .navbar.home").addClass("bg-transparent");
      }
      

      // Mouse Scroll-To-Top
      if( $(document).scrollTop() > 300 ){
        $("#scroll-top").removeClass("hidden");
      } else{
        $("#scroll-top").addClass("hidden");
      }
      $("#scroll-top").click(function(){
        let body = $("html, body");
        body.stop().animate({scrollTop:0}, 500, 'swing', function(){
          console.log("");
        });
      });
    });


    // Embeded Video Play
    $('.video-play').magnificPopup({
      type: 'video'
    });


    // Single-Property Slider
    $(".largeSlider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: false,
        asNavFor: ".thumbSlider",
        prevArrow: '<i class="fa fa-angle-left slick-prev"></i>',
        nextArrow: '<i class="fa fa-angle-right slick-next"></i>'
    });
    $(".thumbSlider").slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        arrows: true,
        centerPadding: '20px',
        asNavFor: ".largeSlider",
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        prevArrow: '<i class="fa fa-angle-left slick-prev"></i>',
        nextArrow: '<i class="fa fa-angle-right slick-next"></i>'
    });
    
    

  });




}(jQuery));