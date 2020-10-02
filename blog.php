<!doctype html>
<html lang="da">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
<meta charset="UTF-8">
<!--Bootstrap stylesheet-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	
	<!--Stylesheet-->
	<link rel="stylesheet" href="css/style.css">
	
	<!--Bootstrap JS-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
</head>

<body>
 <?php 
	include 'nav.php';
?>
	<div class="container">

	<h1 class="text-center mb-4">Blog</h1>
		<p class="text-center">Her kan du finde alle vores blogindlæg</p>
	<!--Indlæg-->
<div class="card mb-3">			
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img/test.jpg" class="card-img" alt="test">
    </div>
    <div class="col-lg-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
		  <a href="#" class="btn btn-primary float-right">Go somewhere</a>
      </div>
    </div>
	</div>
		</div>
	
	<!--Indlæg 2-->
	
	<div class="card mb-3">			
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img/test.jpg" class="card-img" alt="test">
    </div>
    <div class="col-lg-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
		  <a href="#" class="btn btn-primary float-right">Go somewhere</a>
      </div>
    </div>
  </div>
</div>
		
	<!--Indlæg 3-->
	
	<div class="card mb-3">			
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img/test.jpg" class="card-img" alt="test">
    </div>
    <div class="col-lg-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
		  <a href="#" class="btn btn-primary float-right">Go somewhere</a>
      </div>
    </div>
  </div>
</div>
		</div>
	
	
 <?php 
	include 'footer.php';
?>

</body>
</html>