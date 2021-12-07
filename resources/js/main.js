(function($){
	"use strict";
  
  jQuery(document).ready(function($){
    // Window scroll to certain heights
    $(window).scroll(function(){
      // Header Background-Color Change
      if( $(document).scrollTop() > 50 ){
        $(".site-header .navbar").removeClass("bg-transparent");
        $(".site-header .navbar").addClass("bg-base-1");
      } else{
        $(".site-header .navbar").removeClass("bg-base-1");
        $(".site-header .navbar").addClass("bg-transparent");
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
          console.log("Finished animating");
        });
      });
    });


    // Embeded Video Play
    $('.video-play').magnificPopup({
      type: 'video'
    });
    


  });




}(jQuery));