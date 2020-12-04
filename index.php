<!doctype html>
<html lang="da">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
<meta charset="UTF-8">
<title>Filmverden</title>
	<!--Bootstrap stylesheet-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	
	<!--Stylesheet-->
	<link rel="stylesheet" href="css/style.css">
	
		<!-- Font awesome icons-->
	<script src="https://kit.fontawesome.com/336a1c920c.js" crossorigin="anonymous"></script>
	
</head>

<body>
	 <?php 
	include 'nav.php';
?>
	<div class="container-fluid">
	<div class="row">
		<div class="banner mb-4">
			<img class="img-fluid" src="img/pp.jpg" alt="banner">
			<div class="banner-text">
			<h1>
			Vi bringer viden om film tættere på dig.
			</h1>
				</div>
			</div>
		
			<!--nyeste indlæg-->
<div class="container">
	<h2 class="text-center mb-4 mt-2">Nyeste indlæg</h2>
	<!--Indlæg 1-->
<div class="card mb-3 bg-card">			
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img/ca1.jpg" class="card-img" alt="ca1">
    </div>
    <div class="col-lg-8">
      <div class="card-body">
        <h5 class="card-title">CAPTAIN AMERICA: THE FIRST AVENGER</h5>
        <p class="card-text">Hans mod og hans vilje kan der ikke være nogen tvivl om, men den spinkle Steve Rogers bliver kasseret, da han melder sig frivilligt til hæren i 1941. Snart finder militæret imidlertid andet at bruge ham til. Den geniale Dr. Erskine er undsluppet fra nazisterne, og han har udviklet et eksperimentalt serum, der kan styrke et mands naturlige anlæg og forvandle ham til en supersoldat. Således forvandles Rogers til Captain America...</p>
		  <a href="blog_indlaeg1.php" class="btn btn-primary float-right">Læs mere</a>
      </div>
    </div>
  </div>
</div>
	
	<!--Indlæg 2-->
	
	<div class="card mb-3 bg-card">			
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img/harrypotter.jpg" class="card-img" alt="harrypotter">
    </div>
    <div class="col-lg-8">
      <div class="card-body">
        <h5 class="card-title">HARRY POTTER OG FØNIXORDENEN</h5>
        <p class="card-text">Allerede før semesterstart på Hogwarts, skolen for heksekunster og troldmandsskab, har Harry kæmpet mod Dementorer i Little Whinging. Da Harry har brugt magi foran en muggler, bliver han indkaldt til en høring i Ministeriet for Magi, der truer med at bortvise Harry fra skolen. Heldigvis hjælper Dumbledore Harry, og han får lov til at starte på skolen til det femte semester...</p>
		  <a href="blog_indlaeg2.php" class="btn btn-primary float-right">Læs mere</a>
      </div>
    </div>
  </div>
</div>
	</div>
		<!-- Indlæg slut-->
		
		<!--Film features-->
		<!-- Source for image carousel: https://bootsnipp.com/snippets/exVWQ-->

		<div class="container">
            <div class="row">
                <div class="col-md-12 mb-4">
					<h2 class="text-center mb-4 mt-2">Kommende film</h2>
                    <div id="blogCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="blog carousel-indicators">
                            <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#blogCarousel" data-slide-to="1"></li>
                        </ol>

                        <!-- Carousel items -->
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="https://www.imdb.com/title/tt8305852/?ref_=nv_sr_srsg_0&fbclid=IwAR00kt0tfQyW8JEHCdJ9_Fzb1lqKEH3mZZwgasD-dEBh7nQ6fQWYz14eOsw" target="_blank">
                                            <img src="img/all-my-life.jpg" alt="Image" style="max-width:100%;">
                                        </a>
                                    </div>
                                    <div class="space col-md-3">
                                        <a href="https://www.movieinsider.com/posters/567070?fbclid=IwAR2_Xqih2gqvMVEK941QuA6vRixmZ0mFN7HmyN_QivtcnCYhiwA3jfZjkj4" target="_blank">
                                            <img src="img/barefoot.jpg" alt="Image" style="max-width:100%;">
                                        </a>
                                    </div>
                                    <div class=" space col-md-3">
                                        <a href="https://www.imdb.com/title/tt2850386/?ref_=nv_sr_srsg_0&fbclid=IwAR3ATFhfis__pbHZY5OtPtBPSvqe3je1UPxt5e-bG4kf0CVo7wpXQIeEDAs" target="_blank">
                                            <img src="img/croods.jpg" alt="Image" style="max-width:100%;">
                                        </a>
                                    </div>
                                    <div class=" space col-md-3">
                                        <a href="https://www.imdb.com/title/tt10515926/?ref_=fn_al_tt_1&fbclid=IwAR12qWxfRei_3ffCtWhc4E5AAmd_kjyVq0varNS4Zr0RYnnCjN1ZONWvIGw" target="_blank">
                                            <img src="img/half-brothers.jpg" alt="Image" style="max-width:100%;">
                                        </a>
                                    </div>
                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="https://www.imdb.com/title/tt10272386/?ref_=nv_sr_srsg_0&fbclid=IwAR1H6KFrWP9BVqz2DtP3zMq5haeqkVZM-P6-AUkpLsmoyCpkPmI-MuS9VMA" target="_blank">
                                            <img src="img/the-father.jpg" alt="Image" style="max-width:100%;">
                                        </a>
                                    </div>
                                    <div class="space col-md-3">
                                        <a href="https://www.imdb.com/title/tt6475714/?ref_=nv_sr_srsg_0&fbclid=IwAR2_Xqih2gqvMVEK941QuA6vRixmZ0mFN7HmyN_QivtcnCYhiwA3jfZjkj4" target="_blank">
                                            <img src="img/monster-hunter.jpg" alt="Image" style="max-width:100%;">
                                        </a>
                                    </div>
                                    <div class="space col-md-3">
                                        <a href="https://www.imdb.com/title/tt12592252/?ref_=fn_al_tt_1&fbclid=IwAR24qsqoL8Tk_fPidlX-PetX-swhQ2V9v4mJIAajDZDXI1gXon4zdDfWFg8" target="_blank">
                                            <img src="img/songbird.jpg" alt="Image" style="max-width:100%;">
                                        </a>
                                    </div>
                                    <div class="space col-md-3">
                                        <a href="https://www.imdb.com/title/tt6218010/?ref_=nv_sr_srsg_0&fbclid=IwAR2JqwuM2idsOt7fA7Yaxwlb8UYP_VH_wyfbvRXF973GAyCjhPvC_XEZm0U" target="_blank">
               					  <img src="img/iron-mask.jpg" alt="Image" style="max-width:100%;">
                                        </a>
                                    </div>
                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                        </div>
                        <!--.carousel-inner-->
                    </div>
                    <!--.Carousel-->

                </div>
            </div>
			</div>

<?php 
		require 'footer.php';
		?>
	<!--Bootstrap JS-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
</body>
</html>
