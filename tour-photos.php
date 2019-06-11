<!doctype html>
<?php
$tourPhotos =  array(
  array('location' => 'Cincinnati, OH',
        'href' => 'https://www.simplebooth.com/gallery/Vjg9U4nccdf8-sweet-for-luke-cincinnati',
        'imgSrc' => 'tour-photo-cincinnati-oh.jpg'),
  array('location' => 'Nashville, TN',
        'href' => 'https://www.simplebooth.com/gallery/2cAt4ALUM8f6-hanging-out-with-sweet-leaf-tea-cma-fest-the-george-jones-nashville',
        'imgSrc' => 'tour-photo-nashville-tn.jpg')
);
?>

<section id="tour-photos" class="slide-main">
  <div class="tour-photos-side-orange rellax" data-rellax-speed="-1"></div>
  <div class="tour-photos-main">
    <h2>Tour Photos</h2>
    <div class="photos">
      <?php
        foreach ($tourPhotos as $i => $row){

          //Create 2x image src
          $periodPos = strpos($row['imgSrc'], ".");
          $img2x = substr_replace($row['imgSrc'], "@2x", $periodPos, 0 );

          echo "<div>";
            echo "<a class='tour-photo' href='".$row['href']."' target='_blank'>";
              echo "<img src='images/tour-photos/".$row['imgSrc']."' ";
              echo "srcset='images/tour-photos/".$row['imgSrc']." 1x, images/tour-photos/'".$img2x." 2x' ";
              echo "alt='tour-photo' />";
            echo "</a>";
            echo "<a href='".$row['href']."' target='_blank'>".$row['location']."</a>";
          echo "</div>";
        }
      ?>
        <!--
      <div>
        <a href="https://www.simplebooth.com/gallery/Vjg9U4nccdf8-sweet-for-luke-cincinnati" target="_blank">
          <img src="images/tour-photo-1.jpg"  srcset="images/tour-photo-1.jpg 1x, images/tour-photo-1@2x.jpg 2x" alt="tour photo"/>
        </a>
      </div>
      <div>
        <a href="https://www.simplebooth.com/gallery/Vjg9U4nccdf8-sweet-for-luke-cincinnati" target="_blank">
          <img src="images/tour-photo-2.jpg"  srcset="images/tour-photo-2.jpg 1x, images/tour-photo-2@2x.jpg 2x" alt="tour photo"/>
        </a>
      </div>
      <div>
        <a href="https://www.simplebooth.com/gallery/Vjg9U4nccdf8-sweet-for-luke-cincinnati" target="_blank">
          <img src="images/tour-photo-3.jpg"  srcset="images/tour-photo-3.jpg 1x, images/tour-photo-3@2x.jpg 2x" alt="tour photo"/>
        </a>
      </div>
    -->
    </div>
  </div>
</section>
