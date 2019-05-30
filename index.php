<!doctype html>

<?php
//Page title
$pageTitle = "Organic lemonade with an attitude made from simple ingredients you can pronounce | Sweet Leaf Tea Co.";
$meta_description = "Sweet Leaf Tea organic lemonades are available in Cranberry Lime, Orange Mango, Pomegranate Blueberry, and Classic Lemonade. Sweet but not too sweet.";

$page = "home-page";

//Tour Info
include 'tour-info.php';
?>

<html lang="en">
  <head>
    <?php include 'head.php'; ?>
    <script src="js/sweetleaf.js"></script>
  </head>

  <body id="<?php echo $page; ?>">
    <!-- Google Tag Manager -->
  	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-P9FLPC"
  	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  	})(window,document,'script','dataLayer','GTM-P9FLPC');</script>
  	<!-- End Google Tag Manager -->

    <!-- Mirum Sweet Leaf Tea - Lemonade - Landing -->
	 <!-- OwnerIQ Analytics tag -->
    <!-- Sweet Leaf Tea - Analytics -->
    <script type="text/javascript">
    window._oiqq = window._oiqq || [];
    _oiqq.push(['oiq_addPageLifecycle', 'e3c7']);
    _oiqq.push(['oiq_doTag']);
    (function() {
    var oiq = document.createElement('script'); oiq.type = 'text/javascript'; oiq.async = true;
    oiq.src = document.location.protocol + '//px.owneriq.net/stas/s/554pnr.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(oiq, s);
    })();
    </script>
    <!-- End OwnerIQ tag -->

    <?php include 'header.php'; ?>

    <!-- Main Slides -->
    <section id="feature" class="slide-main">
      <div class="bg-feature-gradient"></div>
      <div class="bg-feature-bushes"></div>
      <div class="bg-feature-barn-container">
        <div class="bg-feature-barn"></div>
      </div>
      <div class="bg-feature-fence"></div>
      <div class="bg-feature-grass-container">
        <div class="bg-feature-grass"></div>
      </div>
      <div class="center"></div>
      <div class="slide-content">
        <div class="slide-image-container">
          <div class="slide-image-content">
            <div class="feature-stars rellax" data-rellax-speed="-3"></div>
            <div class="slide-image"></div>
            <ul class="feature-hashtags hr-list">
              <li><span>#</span>SWEETFORLUKE</li>
              <li><span>#</span>FARMTOUR2019</li>
            </ul>
          </div>
        </div>
        <div class="slide-copy" data-rellax-speed="3">
          <div class="feature-logo-glow"></div>
          <img class="feature-logo" src="images/feature-logo-sweet-leaf.svg" />
          <h1 class="h1">Sweet For Luke</h1>
          <h4>Official Tea Sponsor of Luke Bryan Farm Tour 2019</h4>
          <p class="subtitle">Join Sweet Leaf Tea as we go cross-country spreading all types of sweetness during the Luke Bryan 2019 tour dates! Bring a friend to our photo booths, enter to win some sweet prizes, and taste the sweet Austin goodness that is Mimi's original organic teas!</p>
          <div class="location-box">
            <p class="location-info">Our Next Stop:</p>
            <p class="location-city">
              <?php
              foreach ($tourStops as $i => $row){
                if(isset($row['closest-date'])){
                  echo $row['city'];
                }
              }
              ?>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Tour Stops -->
    <section id="tour-stops" class="slide-main">
      <div class="bg-graphics rellax" data-rellax-speed="-2" data-rellax-percentage="0.5"></div>
      <div class="austin-stamp rellax" data-rellax-speed="2" data-rellax-percentage="0.5"></div>
      <div class="cactus rellax" data-rellax-speed="2" data-rellax-percentage="0.5"></div>
      <div class="cactus reverse"></div>
      <div class="center"></div>
      <div class="slide-content">
        <div class="slide-image-container">
          <div class="slide-image tour-map">
            <img src="images/tour-map.svg" />
            <?php
              //Place Stars on map
              //Farm Stops
              foreach ($tourStops as $i => $row){
                echo "<div id='".$row['id']."' class='";
                if (isset($row['closest-date'])) {
                  echo "next-date ";
                }
                echo "tour-star";
                  if (isset($row['farm'])) {
                    echo " farm-stop'";
                    echo "data-farm='".$row['farm']."' ";
                  }
                  else{
                    echo " other-stop'";
                  }

                  echo "style='".$row['map-coords']."' ";
                  echo "data-city='".$row['city']."' ";
                  echo "data-date='".$row['date']."' ";

                  //Get all map photos images
                  echo "data-imgs='";
                  $directory = "images/map-photos";
                  $images = glob($directory . "/*.jpg");
                  $searchString = $row['id'];

                  foreach($images as $image)
                  {
                      // determines if the search string is in the filename.
                      if(strpos(strtolower($image), strtolower($searchString))) {
                           echo $image." ";
                      }
                  }
                  echo "'";


                echo "></div>";
              }

            ?>
          </div>
          <div id="map-key" class="hidden-680">
            <div><span class="tour-star farm-stop"></span>Farm Tour Stops</div>
            <div><span class="tour-star other-stop"></span>Other Stops</div>
          </div>
          <div id="tour-info-modal" class="hidden">
            <div class="location-box">
              <div class="close-bt"></div>
              <p class="location-city">Cincinnati, OH</p>
              <p class="location-info"> Sept 27<br>Farm</p>
              <a class="button view-bt" a href="#">View</a>
            </div>
            <div class="location-images">
              <div class="img1"><img src="" /><div class="loading-spinner"></div></div>
              <div class="img2"><img src="" /><div class="loading-spinner"></div></div>
              <div class="img3"><img src="" /><div class="loading-spinner"></div></div>
            </div>
          </div>
        </div>
        <div class="tour-schedule-container">
          <h2 class="hidden-680">Select a Stop on the Map</h2>
          <div id="tour-schedule" class="hidden">
            <div class="honeycomb decoration opacity-0"></div>
            <div class="chart-leaves-left decoration opacity-0"></div>
            <div class="chart-leaves-right decoration opacity-0"></div>
            <div class="tour-truck"></div>
            <div class="tour-table hidden">
              <div class="schedule-header"><h3>Full Schedule</h3></div>
              <div class="schedule-body">
                <div class="schedule-content farm-dates">
                  <div class="dates-header">
                    <span class="tour-star farm-stop"></span><h3>Farm Tour Stops</h3>
                  </div>
                  <?php
                    $numFarms = 0;
                    $numOthers = 0;
                    foreach ($tourStops as $i => $row){
                      if (isset($row['farm'])) {
                        $numFarms += 1;
                        echo "<div id='schedule-".$row['id']."'>";
                          echo "<span class='date'>".$row['date']."</span>";
                          echo "<p>".$row['city']." / ".$row['farm'];
                            if(strlen($row['ticket-link']) > 0){
                              echo " / <a href='".$row['ticket-link']."'>Get Tickets</a>";
                            }
                          echo "</p>";
                        echo "</div>";
                      }
                      else{
                        $numOthers += 1;
                      }
                    }

                    if($numFarms < $numOthers){
                      $numBlankFields = $numOthers - $numFarms;
                      for ($i=0; $i < $numBlankFields; $i ++){
                        echo "<div class='empty-date'><span class='date'>NA</span><p>NA</p></div>";
                      }
                    }
                  ?>
                </div>
                <div class="schedule-content other-dates">
                  <div class="dates-header">
                    <span class="tour-star other-stop"></span><h3>Other Stops</h3>
                  </div>
                  <?php
                    $numFarms = 0;
                    $numOthers = 0;
                    foreach ($tourStops as $i => $row){
                      if (!isset($row['farm'])) {
                        $numOthers += 1;
                        echo "<div id='schedule-".$row['id']."'>";
                          echo "<span class='date'>".$row['date']."</span>";
                          echo "<p>".$row['city'];
                            if(strlen($row['ticket-link']) > 0){
                              echo " / <a href='".$row['ticket-link']."'>Get Tickets</a>";
                            }
                          echo "</p>";
                        echo "</div>";
                      }
                      else{
                        $numFarms += 1;
                      }
                    }

                    if($numOthers < $numFarms){
                      $numBlankFields = $numFarms - $numOthers;
                      for ($i=0; $i < $numBlankFields; $i ++){
                        echo "<div class='empty-date'><span class='date'>NA</span><p>NA</p></div>";
                      }
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <a class="button view-schedule" href="#">View Full Schedule</a>
        </div>
      </div>
    </section>

    <!-- Retailers -->
    <section id="retailers" class="slide-main">
      <div class="retailer-content">
        <p>Find Sweet Leaf Tea at the following retailers:</p>
        <div class="retailer-logos">
          <?php
            //Get all retailer images
            $directory = "images/retailers";
            $images = glob($directory . "/*.png");

            foreach($images as $image)
            {
              echo "<div>";
                echo "<img src='".$image."' alt='retailer logo' />";
              echo "</div>";
            }
          ?>
        </div>
      </div>
    </section>

    <!-- Sweet Leaf Product Info -->
    <section id="about-products" class="slide-main">
      <div class="product-side-lemon rellax" data-rellax-speed="3"></div>
      <div class="product-side-honey rellax" data-rellax-speed="-1"></div>
      <div class="about-products-main">
        <h2>Our famous 100% organic tea recipes for y’all and all y'alls taste.</h2>
        <p class="subtitle">Made from simple ingredients and a whole lotta love. Original Sweet Teas, Semisweet Teas and Unsweet Teas in different flavors to enjoy.</p>
        <a class="button" href="#" name="link to gallery">See All Flavors</a>
        <div class="about-products-main-image"></div>
        <div class="center"></div>
      </div>
    </section>

    <!-- Tour Photos -->
    <section id="tour-photos" class="slide-main">
      <div class="tour-photos-side-orange rellax" data-rellax-speed="-3"></div>
      <div class="tour-photos-main">
        <h2>Tour Photos</h2>
        <div class="photos">
          <div>
            <a href="#">
              <img src="images/tour-photo-1.jpg"  srcset="images/tour-photo-1.jpg 1x, images/tour-photo-1@2x.jpg 2x" alt="tour photo"/>
            </a>
          </div>
          <div>
            <a href="#">
              <img src="images/tour-photo-2.jpg"  srcset="images/tour-photo-2.jpg 1x, images/tour-photo-2@2x.jpg 2x" alt="tour photo"/>
            </a>
          </div>
          <div>
            <a href="#">
              <img src="images/tour-photo-3.jpg"  srcset="images/tour-photo-3.jpg 1x, images/tour-photo-3@2x.jpg 2x" alt="tour photo"/>
            </a>
          </div>
        </div>
        <a class="button" href="#" name="link to gallery">View All</a>
        <div class="center"></div>
      </div>
    </section>

    <?php include 'footer.php'; ?>
  </body>
</html>
