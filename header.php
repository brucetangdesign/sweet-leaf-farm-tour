<header>
  <div class="logo-container">
    <?php
      if($page != "home-page"){
        echo '<a href="./">';
      }
    ?>
    <img class="desktop-logo" src="images/sweet-leaf-tea-logo.svg" alt="Sweet Leaf Tea Logo">
    <?php
      if($page != "home-page"){
        echo '</a>';
      }
    ?>
  </div>
  <nav>
    <ul class="hr-list">
      <li><a href="#tour">Tour</a></li>
      <li><a href="https://www.sweetleaftea.com/" target="_blank">Sweetleaf.com</a></li>
    </ul>
  </nav>
</header>
