<?php
// Include database config file
require_once 'db-con.php';
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
  header("location: login.php");
  exit;}
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
			<div class="col-sm-12 col-lg-7 offset-lg-1">
			<h1>Profil</h1>
				
	<?php 	
			//Retrieve name from databse
			$iduser = $_SESSION["id"];
			$sql = 'SELECT name FROM user WHERE iduser=?';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('i', $iduser);
			$stmt->execute();
			$stmt->bind_result($name);
			while ($stmt->fetch()){
				echo '<h2>Hej ' . "<b>" . $name . "</b>" . "!</h2>"; 
				echo '<p>Her kan du se og ændre din info. </p>';
				}
				?>
				
			
				<?php
			//Retrieve name and email from database
			$sql = "SELECT img, name, email FROM user WHERE iduser=?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('i', $iduser);
			$stmt->execute();
			$stmt->bind_result($img, $name, $email);
			while ($stmt->fetch()){
				echo "<img class='img-fluid pb-2 rounded-circle' src=" . $img . " alt='Default image' width='150px'>";
				echo "<div class='pb-2'>Navn: " . '<b>' . $name . '</b>' . '</div>';
				echo "<div class='pb-2'>Email: " . '<b>' . $email . '</b>' . '</div>';

			}
				?>
				<p class="mb-4"><a href="rediger.php">Rediger</a></p>
			</div>
			<div class="col-sm-12 col-lg-3 offset-lg-1">
			<!--Logout-->
				<?php
			//if (isset($_SESSION["id"])){
				echo '<form class="pt-5" action="logud.php">
						<button class="btn btn-primary">Log ud</button>
						<p>Husk at logge ud når du er færdig!</p>
						</form>';
			//} 
			
			?>
			</div>

		</div>
	
	</div>
	
<?php 
	require 'footer.php';
?>
</body>
</html>