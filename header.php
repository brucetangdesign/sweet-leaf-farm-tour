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
  <!--<nav>
    <ul class="hr-list">
      <li><a href="https://www.sweetleaftea.com/contact/" target="_blank">Contact</a></li>
    </ul>
  </nav>-->
</header>
