<header>
  <div class="logo-container">
    <?php
      if($page != "home-page"){
        echo '<a href="./">';
      }
      else{
        echo '<a href="#">';
      }
    ?>
    <img class="logo-img" src="images/sweet-leaf-tea-logo.svg" alt="Sweet Leaf Tea Logo">
    <?php echo '</a>'; ?>
  </div>
  <nav>
    <ul class="hr-list">
      <li><a href="#tour-stops">Tour</a></li>
      <li><a href="https://www.sweetleaftea.com/" target="_blank">Sweetleaf.com</a></li>
    </ul>
  </nav>
</header>
