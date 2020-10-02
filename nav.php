<?php 
session_start();

$curpage = basename ($_SERVER['PHP_SELF']);
//Using this cause you can't use a class directly since the class is on all pages - instead I have used an if statement --> if the current page is e.g. contact.php the class will be shown as active. The $_server is a super global variable which holds information about header, locations.
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-link" href="om.php" <?php if($curpage == 'om.php') {echo 'class="active"';}?>>Om</a>
      <a class="nav-link" href="blog.php" <?php if($curpage == 'blog.php') {echo 'class="active"';}?>>Blog</a>
      <a class="nav-link" href="login.php" <?php if($curpage == 'login.php') {echo 'class="active"';}?>>Login</a>
    </div>
  </div>
</nav>