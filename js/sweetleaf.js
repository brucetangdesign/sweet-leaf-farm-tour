$( document ).ready(function() {
  var tourMap = $(".tour-map");

  setMapSize();

  $(window).on("resize", function(){
    setMapSize();
  });

  function setMapSize(){
    var newSc;
    var perc = 0.95;
    var aspectRatio = 880/1314;

    if(window.innerWidth < 1500){
      TweenMax.set(tourMap,{scale: perc});
      if(tourMap.find("img").height() > 0){
        TweenMax.set(tourMap.parent(),{height: tourMap.find("img").height() * perc});
      }
    }
    else{
      console.log("f");
      TweenMax.set(tourMap,{scale: 1});
      TweenMax.set(tourMap.parent(),{height: "auto"});
    }
  }

  /*var numBreakpoints = $(".slide-main").length;
  var sec1 = true;
  var sec2 = false;
  var sec3 = false;
  var sec4 = false;
  var $bg = $("#bg");

  checkScroll();

  //call the check when you scroll or resize
  $(window).on("resize scroll", function(){
    checkScroll();
  });

  function checkScroll(){

    if($("body").isInView($(".center"))){
      if(!sec1){
        showSection(1);
      }
    }

    if($("body").isInView($(".slide2 .center"))){
      if(!sec2){
        showSection(2);
      }
    }

    if($("body").isInView($(".slide3 .center"))){
      if(!sec3){
        showSection(3);
      }
    }

    if($("body").isInView($(".slide4 .center"))){
      if(!sec4){
        showSection(4);
      }
    }

  }

  function showSection(secNum){
    if(!$bg.hasClass("bg"+secNum)){
      $bg.removeClass();
      $bg.addClass("bg"+secNum);
    }

    $bg.children().each(function(index){
      if(!$(this).hasClass("bg-gradient"+secNum)){
        if(!$(this).hasClass("hidden")){
          $(this).addClass("hidden");
        }
      }
      else{
        if($(this).hasClass("hidden")){
          $(this).removeClass("hidden");
        }
      }
    });

    for(var i=0; i< numBreakpoints; i ++){
      eval("sec" + (i+1) + " = false");
    }
    eval("sec" + secNum + " = true");
  }*/

  var rellax = new Rellax('.rellax', {
    center: true
  });
});
