$( document ).ready(function() {
  setMapSize();
  initSchedule();
  initMap();

  $(window).on("resize", function(){
    setMapSize();
  });

  function setMapSize(){
    var tourMap = $(".tour-map");
    var mapKey = $("#map-key");
    var mapKeyHeight = 0;
    var newSc;
    var perc = 0.95;

    if(window.innerWidth < 1500){
      if(window.innerWidth < 960){
        mapKeyHeight = mapKey.outerHeight();
      }
      else{
        mapKeyHeight = 0;
      }
      TweenMax.set(tourMap,{scale: perc});
      if(tourMap.find("img").height() > 0){
        TweenMax.set(tourMap.parent(),{height: tourMap.find("img").height() * perc + mapKeyHeight});
      }
    }
    else{
      TweenMax.set(tourMap,{scale: 1});
      TweenMax.set(tourMap.parent(),{height: "auto"});
    }
  }

  //Schedule
  function initSchedule(){
    var scheduleOpen = false;
    var $viewBt = $(".button.view-schedule");
    var $tourSchedule = $("#tour-schedule");
    var $tourTable = $(".tour-table");
    var $decoration = $tourSchedule.find(".decoration");
    var $tourTruck = $tourSchedule.find(".tour-truck");

    //View Schedule
    $viewBt.click(function(e){
      e.preventDefault();

      if(!scheduleOpen){
        $tourSchedule.removeClass("hidden");
        $tourTable.removeClass("hidden");
        TweenMax.from($tourSchedule,1,{css:{marginBottom: 0}});
        TweenMax.from($tourTable,1,{height: 0, ease: Power4.easeInOut});
        TweenMax.from($tourTruck,1,{x: -70, opacity: 0, ease: Power3.easeInOut});

        $decoration.each(function(index){
          $(this).removeClass("opacity-0");
        });

        $(this).text("Hide Schedule");

        scheduleOpen = true;

        //scrollToSection($("#tour-schedule"),1000,true);
      }
      else{
        TweenMax.to($tourSchedule,1,{css:{marginBottom: 0}});
        TweenMax.to($tourTable,1,{height: 0, ease: Power3.easeInOut});
        TweenMax.set($tourTruck,{display: "none"});
        TweenLite.set($tourSchedule, {className: '+=hidden', delay: 1});
        TweenLite.set($tourTable, {className: '+=hidden', delay: 1});

        TweenMax.set($tourTable,{clearProps: "height", delay: 1});
        TweenMax.set($tourSchedule,{clearProps: "marginBottom", delay: 1});
        TweenMax.set($tourTruck,{clearProps: "display", delay: 1});

        $decoration.each(function(index){
          $(this).addClass("opacity-0");
        });

        $(this).text("View Full Schedule");

        scheduleOpen = false;

        scrollToSection($("#tour-stops"),1000);
      }
    });
  }

  function initMap(){
    var $star = $(".tour-map .tour-star");

    $star.each(function(index){
      $(this).click(function(){
        openLocationModal($(this).attr("id"), $(this).data("city"),$(this).data("date"),$(this).data("farm"),index);
      });
    });
  }

  function openLocationModal(id,city,date,farm,index){
    var $modal = $("#tour-info-modal");
    var $city = $modal.find(".location-city");
    var $info = $modal.find(".location-info");
    var imgs = [$modal.find(".img1"),$modal.find(".img2"),$modal.find(".img3")];
    var $closeBt = $modal.find(".close-bt");
    var $viewBt = $modal.find(".view-bt");

    closeModal();

    if($modal.hasClass("hidden")){
      $city.text(city);
      if(farm != "" && farm != undefined && farm != null){
        $info.html(date + "<br>" + farm);
      }
      else{
        $info.html(date);
      }

      $modal.removeClass("hidden");
      TweenMax.from($modal,0.8,{y: 100,opacity: 0, ease:Power3.easeOut});

      for(var i=0; i< imgs.length; i++){
        loadImage(imgs[i],id);
        TweenMax.from(imgs[i],0.8,{rotation: 0, opacity: 0, left: 0, top: 50, delay: index * 0.02, ease:Power3.easeInOut});

        TweenMax.set(imgs[i],{clearProps: "all",delay:0.8 + (index * 0.02)});
      }
    }

    $closeBt.click(function(){
      closeModal();
    });

    $viewBt.click(function(e){
      e.preventDefault();
      $(".view-schedule").trigger("click");
      scrollToSection($("#schedule-"+id),1000,true);
    });

    function loadImage($el,id){

    }
  }

  function closeModal(){
    var $modal = $("#tour-info-modal");
    var $city = $modal.find(".location-city");
    var $info = $modal.find(".location-info");
    var imgs = [$modal.find(".img1"),$modal.find(".img2"),$modal.find(".img3")];
    var $closeBt = $modal.find(".close-bt");

    $closeBt.off("click");
    $modal.addClass("hidden");
    $city.empty();
    $info.empty();
    TweenMax.set($modal,{clearProps: "all"});
    for(var i=0; i< imgs.length; i++){
      TweenMax.set(imgs[i],{clearProps: "all"});
      imgs[i].attr("src","");
      imgs[i].find(".loading-spinner").removeClass("hidden");
    }
  }

  //smooth scroll for anchor links
  function scrollToSection($section, time=1000,offset){
    var pos;

    if(offset == true){
      pos = $section.offset().top;
    }
    else{
      pos = $section.position().top
    }

    $("html, body").animate({ scrollTop:pos - $("header").height() - 50  },time);
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
