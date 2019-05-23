$( document ).ready(function() {
  var scrolled = false;
  var $header = $("header");
  var $logo = $header.find(".logo-container");

  //check page scroll on page load (will show mobile nav if necessary)
  checkScroll();

  //check the scroll - display mobile nav if necessary
  $(window).on("resize scroll", function(){
    checkScroll();
  });

  //Display the mobile nav if user has scrolled on a small screen (< 768px)
  function checkScroll(){
    //if($(window).width() < 768){
      if($(window).scrollTop() > 20){
        if(!scrolled){
          $header.addClass("scrolled");
          scrolled = true;
          TweenMax.set($logo,{clearProps:"all",delay: 0.1});
          TweenMax.from($logo,0.3,{opacity: 0,delay: 0.1});
        }
      }
      else{
        if(scrolled){
          $header.removeClass("scrolled");
          scrolled = false;
          TweenMax.set($logo,{clearProps:"all",delay: 0.1});
          TweenMax.from($logo,0.3,{opacity: 0, delay: 0.1});
        }
      }
  }
});
