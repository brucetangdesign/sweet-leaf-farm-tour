<!doctype html>
<?php
$tourPhotos =  array(
  array('location' => 'Nashville, TN',
        'href' => 'https://www.simplebooth.com/gallery/2cAt4ALUM8f6-hanging-out-with-sweet-leaf-tea-cma-fest-the-george-jones-nashville',
        'imgSrc' => 'tour-photo-nashville-tn.jpg'),
  array('location' => 'Cincinnati, OH',
        'href' => 'https://www.simplebooth.com/gallery/Vjg9U4nccdf8-sweet-for-luke-cincinnati',
        'imgSrc' => 'tour-photo-cincinnati-oh.jpg')
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
              echo "srcset='images/tour-photos/".$row['imgSrc']." 1x, images/tour-photos/".$img2x." 2x' ";
              echo "alt='tour-photo' />";
            echo "</a>";
            echo "<a href='".$row['href']."' target='_blank'>".$row['location']."</a>";
          echo "</div>";
        }
      ?>
    </div>
  </div>
</section>
