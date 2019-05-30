$( document ).ready(function() {
  var scrolled = false;
  var $header = $("header");
  var $logo = $header.find(".logo-container");

  //smooth scroll to anchor link (this moves section down a bit so it doesn't overlap with header)
  if (location.hash) {
    setTimeout(function() {
      scrollToSection($(location.hash));
    }, 1);
  }

  //handle anchor links
  $("nav li > a").each(function(index){
      if($(this).attr("href").indexOf("#") == 0){
        $(this).click(function(e){
          e.preventDefault();
          history.pushState(null,null,$(this).attr("href"));
          scrollToSection($($(this).attr("href")),700);
        });
      }
  });

  $("header .logo-img").click(function(e){
    if($("body").attr("id") == "home-page"){
      e.preventDefault();
      scrollToSection($("body"),500);
    }
  });

  //smooth scroll for anchor links
  function scrollToSection($section, time=1000){
    $("html, body").animate({ scrollTop:$section.position().top - $("header").height() - 50  },time);
  }

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
        }
      }
  }
});
