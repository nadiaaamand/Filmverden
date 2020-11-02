<?php
// Include database config file
require_once 'db-con.php';

?>


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
				
<div class="col-lg-8 offset-lg-2 col-sm-12">
	
	<!--IMAGE FETCHING and UPDATING-->
		       <?php
			
			$sql = "SELECT IMG FROM user WHERE iduser=1";
			$stmt = $conn->prepare($sql);
			//$stmt->bind_param('i', $bid);
			$stmt->execute();
			$stmt->bind_result($img);
			while ($stmt->fetch()){
				
				echo '<form method="post" action="update-image.php">';
				echo '<div class="form-group text-center">';
				echo '<img class="rounded-circle mt-1 " src="'.$img.'" width="150">';
				echo '<input type="hidden" name="iduser" value="'.$iduser.'">';
				echo '<input type="file" class="form-control-file center" value="'.$img.'">';
				echo '<button type="submit" class="btn btn-primary btn-sm mt-2 mb-4">Opdater</button>';
				echo '</div>';
				echo '</form>';
					}
				?>
	
	
	<!--NAME FETCHING and UPDATING-->
	       <?php
			
			$sql = "SELECT name FROM user WHERE iduser=1";
			$stmt = $conn->prepare($sql);
			//$stmt->bind_param('i', $bid);
			$stmt->execute();
			$stmt->bind_result($name);
			while ($stmt->fetch()){
				echo '<form method="post" action="update-name.php">';
				echo '<div class="form-group">';
				echo '<input type="hidden" name="iduser" value="'.$iduser.'">';
				echo '<input type="name" name="name" class="form-control" value="'.$name.'">';
				echo '<button type="submit" class="btn btn-primary btn-sm float-right mt-2 mb-4">Opdater</button>';
				echo '</div>';
				echo '</form>';
					}
				?>
	
	<!--EMAIL FETCHING and UPDATING-->
		       <?php
			
			$sql = "SELECT email FROM user WHERE iduser=1";
			$stmt = $conn->prepare($sql);
			//$stmt->bind_param('i', $bid);
			$stmt->execute();
			$stmt->bind_result($email);
			while ($stmt->fetch()){
				echo '<form method="post" action="update-email.php">';
				echo '<div class="form-group">';
				echo '<input type="hidden" name="iduser" value="'.$iduser.'">';
				echo '<input type="email" name="email" class="form-control" value="'.$email.'">';
				echo '<button type="submit" class="btn btn-primary btn-sm float-right mt-2 mb-4">Opdater</button>';
				echo '</div>';
				echo '</form>';
					}
				?>

	<!--PASSWORD UPDATING-->
	
		<form method="post" action="update-password.php"> <!--Password-->
	<div class="form-group">
		<input type="hidden" name="iduser" value='<?=$iduser?>'>
		<input type="password" name="password" placeholder="Skriv nyt password" class="form-control" value="<?php $pwd ?>">
		<button type="submit" class="btn btn-primary btn-sm float-right mt-2 mb-4">Opdater</button>
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