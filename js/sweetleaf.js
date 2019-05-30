$( document ).ready(function() {
  var tourStopInit = false;
  var images;
  var scheduleOpen = false;

  setMapSize();
  initSchedule();
  initMap();

  $(window).on("resize", function(){
    setMapSize();
    if(window.innerWidth > 679){
      checkScheduleTableCellHeight();
    }
    else{
      resetTableCellHeight();
    }
  });

  if($("body").isInView($("#tour-stops .center"),200) && !tourStopInit){
    $(".tour-map .next-date").trigger("click");
    tourStopInit = true;
  }

  $(window).on("scroll", function(){
    if($("body").isInView($("#tour-stops .center"),200) && !tourStopInit){
      $(".tour-map .next-date").trigger("click");
      tourStopInit = true;
    }
  });

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

        if(window.innerWidth > 679){
          checkScheduleTableCellHeight();
        }
        else{
          resetTableCellHeight();
        }
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

  function checkScheduleTableCellHeight(){
    var $farmDates = $(".schedule-content.farm-dates");
    var $otherDates = $(".schedule-content.other-dates");
    var $other;
    var largerHeight;

    $farmDates.children().each(function(index){
      $other = $otherDates.children().eq(index);
      if($(this).height() != $other.height()){
        largerHeight = Math.max($(this).height(), $other.height());
        if($(this).height() != largerHeight){
          $(this).height(largerHeight);
        }

        if($other.height() != largerHeight){
          $other.height(largerHeight);
        }
      }
    });
  }

  function resetTableCellHeight(){
    var $farmDates = $(".schedule-content.farm-dates");
    var $otherDates = $(".schedule-content.other-dates");

    $(".schedule-body div").each(function(){
      $(this).height("auto");
    });
  }

  function initMap(){
    var $star = $(".tour-map .tour-star");

    $star.each(function(index){
      var thisIndex = index;
      $(this).click(function(){
        openLocationModal($(this).attr("id"), $(this).data("city"),$(this).data("date"),$(this).data("farm"),$(this).data("imgs"),index);
        $(this).addClass("selected");
        initMobileModalControls();
      });
    });
  }

  function openLocationModal(id,city,date,farm,imgURLs,index){
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


      if(imgURLs != undefined){
        loadImages(imgURLs.split(" "));

        for(var i=0; i< imgURLs.split(" ").length; i++){
          imgs[i].removeClass("hidden");
          TweenMax.from(imgs[i],0.8,{rotation: 0, opacity: 0, left: 0, top: 50, delay: index * 0.02, ease:Power3.easeInOut});

          TweenMax.set(imgs[i],{clearProps: "all",delay:0.8 + (index * 0.02)});
        }
      }
    }

    $closeBt.click(function(){
      closeModal();
    });

    $viewBt.click(function(e){
      e.preventDefault();
      console.log(scheduleOpen);
      if(!scheduleOpen){
        $(".view-schedule").trigger("click");
      }
      scrollToSection($("#schedule-"+id),1000,true);
    });
  }

  function closeModal(){
    var $modal = $("#tour-info-modal");
    var $city = $modal.find(".location-city");
    var $info = $modal.find(".location-info");
    var imgs = [$modal.find(".img1"),$modal.find(".img2"),$modal.find(".img3")];
    var $closeBt = $modal.find(".close-bt");
    var $viewBt = $modal.find(".view-bt");

    $(".tour-map .tour-star.selected").each(function(index){
      $(this).removeClass("selected");
    });

    $closeBt.off("click");
    $viewBt.off("click");
    $modal.addClass("hidden");
    $city.empty();
    $info.empty();
    TweenMax.set($modal,{clearProps: "all"});

    for(var i=0; i< imgs.length; i++){
      TweenMax.set(imgs[i],{clearProps: "all"});
      imgs[i].addClass("hidden");
      killImageLoading();
      imgs[i].find("img").addClass("opacity-0");
      imgs[i].find(".loading-spinner").removeClass("hidden");
    }

    killMobileMediaControls();
  }

  function initMobileModalControls(){
    var $nextBt = $("#tour-info-modal .control.next");
    var $prevBt = $("#tour-info-modal .control.previous");
    var $stars = $(".tour-map .stars");
    var curStop = $stars.find(".selected").index();
    var nextStop;
    var numStops = $(".tour-map .stars").children().length;


    checkFirstLast();

    $nextBt.click(function(){
      if($prevBt.hasClass("disabled")){
        $prevBt.removeClass("disabled");
      }

      if(nextStop < numStops -1){
        $nextBt.addClass("disabled");
      }

      nextStop = curStop + 1;
      $stars.children().eq(nextStop).trigger("click");
    });

    $prevBt.click(function(){
      if($nextBt.hasClass("disabled")){
        $nextBt.removeClass("disabled");
      }

      if(nextStop > 1){
        $prevBt.addClass("disabled");
      }

      nextStop = curStop - 1;
      $stars.children().eq(nextStop).trigger("click");
    });

    //disable prev/next if necessary
    function checkFirstLast(){
      if(curStop == 0){
        $prevBt.addClass("disabled");
      }

      if(curStop == numStops-1){
        $nextBt.addClass("disabled");
      }
    }
  }

  function killMobileMediaControls(){
    var $nextBt = $("#tour-info-modal .control.next");
    var $prevBt = $("#tour-info-modal .control.previous");

    $nextBt.off("click");
    $nextBt.removeClass("disabled");
    $prevBt.off("click");
    $prevBt.removeClass("disabled");
  }

  function loadImages(imageURLs,id){
    var $img = $("#tour-info-modal .location-images img");
    images = new Array();

    $img.each(function(index){
      var url = imageURLs[index];

      if(url != undefined && url != null){
        $(this).attr("src",url);
        images[index] = new Image();
        images[index].onload = imgLoaded;
        images[index].src = url;
        images[index].onerror = imgError;
      }
    });


    function imgError(event){
      var img = event.target;
      //hide image with error
      $img.each(function(index){
        if($(this).attr("src") == $(img).attr("src")){
          $(this).addClass("opacity-0");
          $(this).parent().addClass("hidden");
        }
      });
    }

    function imgLoaded(event){
      var img = event.target;

      //show loaded image
      var $curImg = $("#tour-info-modal .location-images").find("img[src='"+$(img).attr("src")+"']");
      $curImg.removeClass("opacity-0");

      img.onload = null;
      img.onerror = null;
      img = null;
    }
  }

  function killImageLoading(){
    if(images != undefined && images.length > 0){
      for(var i=0; i< images.length; i++){
        images[i].onload = null;
        images[i].onerror = null;
        images[i] = null;
      }

      images.length = 0;
    }

    $("#tour-info-modal .location-images img").each(function(){
        $(this).attr("src","");
    });
  }

  var rellax = new Rellax('.rellax', {
    center: true
  });
});
