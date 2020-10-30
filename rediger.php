<?php
// Include database config file
require_once 'db-con.php';?>

<!doctype html>
<html lang="da">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
<meta charset="UTF-8">
<!--Bootstrap stylesheet-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	
	<!--Stylesheet-->
	<link rel="stylesheet" href="css/style.css">
	
	<!--Font Awesome-->
    <script src="https://kit.fontawesome.com/336a1c920c.js" crossorigin="anonymous"></script>
	
	<!--Bootstrap JS-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</head>
<body>
	<?php 
	include 'nav.php';
?>
	<div class="container-fluid">
		<div class="row">	
			<div class="col-sm-12 col-lg-10 offset-lg-1">
			<h1>Rediger Profil</h1>
<div class="col-lg-4 col-sm-12 border-right">
	<img class="rounded-circle mt-1 " src="https://i.imgur.com/0eg0aG0.jpg" width="150">
	<form action="update-image.php">
	<div class="form-group">
		<input type="file" class="form-control-file">
		<button type="submit" class="btn btn-primary">Opdater</button>
	</div>
	</form>
</div>
				
<div class="col-lg-8 col-sm-12">
	<form method="post" action="update-name.php"> <!--Navn-->
	<div class="form-group">
		<input type="name" name="navn" placeholder="Navn" class="form-control">
		<button type="submit" class="btn btn-primary">Opdater</button>
		</div>
	</form> 
	
		<form method="post" action="update-email.php"> <!--E-mail-->
	<div class="form-group">
		<input type="email" name="email" placeholder="E-mail" class="form-control">
		<button type="submit" class="btn btn-primary">Opdater</button>
		</div>
	</form>
	
		<form method="post" action="update-password.php"> <!--Password-->
	<div class="form-group">
		<input type="password" name="password" placeholder="Password" class="form-control">
		<button type="submit" class="btn btn-primary">Opdater</button>
		</div>
	</form>
</div>
				
				
			</div>
		</div>
	</div>
<?php 
	require 'footer.php';
?>
</body>
</html>