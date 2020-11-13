<?php 

$curpage = basename ($_SERVER['PHP_SELF']);
//Using this cause you can't use a class directly since the class is on all pages - instead I have used an if statement --> if the current page is e.g. contact.php the class will be shown as active. The $_server is a super global variable which holds information about header, locations.
?>

<nav class="navbar navbar-expand-lg border-bottom">
  <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="logo af filmverden" width="150"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-link <?= ($curpage == 'om.php') ? 'active':''; ?>" href="om.php">Om</a>
      <a class="nav-link <?= ($curpage == 'blog.php') ? 'active':''; ?>" href="blog.php">Blog</a>
		<?php // Session id bliver her aktiveret så når brugeren er logget ind vil profilsiden blive vist i menuen. Derfor vil siden ikke være aktiv medmindre man er logget ind. 
					if($_SESSION["id"]) { 
					  echo '<a class="nav-link" href="profil.php"';
						if($curpage == "profil.php") {
						   echo ' class=" active"';
				        } 
					  echo '<a>Profil</a>';
				 }?>
      <a class="nav-link <?= ($curpage == 'login.php') ? 'active':''; ?>" href="login.php">Login</a>
    </div>
  </div>
</nav>