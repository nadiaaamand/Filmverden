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
				<!--Edit profile taken from https://bbbootstrap.com/snippets/bootstrap-edit-profile-form-84177583-->
				<div class="container mt-5">
    <div class="row">
        <!--Billede til venstre-->
		<div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-1" src="https://i.imgur.com/0eg0aG0.jpg" width="150"></div>
		</div>
		
		<!--Info om person/rediger profil-->
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
						<h6><a href="profil.php">Tilbage</a></h6>
                    </div>
                    <h6 class="text-right">Rediger profil</h6>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="name" value="John"></div>
					<div class="col-md-6"><input type="text" class="form-control" placeholder="Email" value="john_doe12@bbb.com"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Password" value=""></div>
					<div class="col-md-6 text-right">
					<button class="btn btn-danger profile-button" type="button">Slet</button>
					<button class="btn btn-primary profile-button" type="button">Gem</button>
				</div>
                </div>

            </div>
        </div>
    </div>
</div>
				
				
			</div>
		</div>
	</div>
<?php 
	require 'footer.php';
?>
</body>
</html>