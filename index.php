<!doctype html>

<?php
//Page title
$pageTitle = "Organic lemonade with an attitude made from simple ingredients you can pronounce | Sweet Leaf Tea Co.";
$meta_description = "Sweet Leaf Tea organic lemonades are available in Cranberry Lime, Orange Mango, Pomegranate Blueberry, and Classic Lemonade. Sweet but not too sweet.";

$page = "home-page";
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
    <section class="slide-main slide1">
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
          <p class="subtitle">Join Sweet Leaf Tea as we go cross-country spreading all types of sweetness during the Luke Bryan 2019 Farm Tour! Bring a friend to our photo booths, enter to win some sweet prizes, and taste the sweet Austin goodness that is Mimi's original organic teas!</p>
          <div class="location-box">
            <p class="location-info">Our Next Stop:</p>
            <p class="location-city">Nashville, TN</p>
          </div>
        </div>
      </div>
    </section>
    <!--
    <section class="slide-main slide2">
      <div class="mimi-clouds-left rellax" data-rellax-speed="4"></div>
      <div class="mimi-clouds-right rellax" data-rellax-speed="-3"></div>
      <div class="mimi-left-lem-blueberry rellax" data-rellax-speed="-1"></div>
      <div class="mimi-left-pom-lem-orange rellax" data-rellax-speed="1"></div>
      <div class="mimi-right-lime-mango rellax" data-rellax-speed="-3"></div>
      <div class="mimi-right-orange-cran rellax" data-rellax-speed="3"></div>
      <div class="center"></div>
      <div class="slide-content">
        <div class="slide-image-container" data-rellax-speed="1">
          <div class="slide-image"></div>
        </div>
        <div class="slide-copy rellax" data-rellax-speed="-2">
          <h1>What's both sour and sweet all at once?</h1>
          <p class="subtitle">No, not me! My new lemonades! Growing up in Austin, we always grew the finest fruit with the sweetest juice that we'd pour over ice to get us through those summer days.<br><br>And don't worry... just like my Organic Iced Teas, you'll still find the same love in every bottle, and only ingredients that you can pronounce, like organic lemon juice and organic cane sugar. You know me, I like keeping things sweet and simple.</p>
        </div>
      </div>
    </section>

    <section class="slide-main slide3">
      <div class="ingredients-clouds-left rellax" data-rellax-speed="-4"></div>
      <div class="ingredients-clouds-right rellax" data-rellax-speed="3"></div>
      <div class="ingredients-right-lem rellax" data-rellax-speed="-1"></div>
      <div class="center"></div>
      <div class="slide-content">
        <div class="slide-image-container" data-rellax-speed="3">
          <div class="slide-image"></div>
        </div>
        <div class="slide-copy rellax" data-rellax-speed="2">
          <h1>Organic from day one!</h1>
          <p class="subtitle">Made with simple ingredients and a whole lotta love. We wouldn't make our Lemonades any other way!</p>
        </div>
      </div>
    </section>
-->

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
