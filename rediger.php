<?php
// Include database config file
require_once 'db-con.php';
?>
<?php //Password ændres her

$_SESSION['email'] = $email;

$password = $_POST['pwd']; //Connecting the form data with the update function

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
//defining the check for uppercase and lowercase characters for password vertfication.
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
	
    // Validate password
    if(empty(trim($_POST['pwd']))){
        $password_err = "Skriv venligst et password.";     
    } 
		elseif(!$uppercase || !$lowercase || strlen($password) < 8) {
		  $password_err = "Password bør indholde mindst 8 karakterer, 1 småt bogstav og 1 stort bogstav.";}
		else{
        $password = trim($_POST['pwd']);
		}

    // Check input errors before inserting in database
 if (empty($password_err)){
$sql = "UPDATE user SET pwd=? WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $param_password, $param_email);
$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
$param_email = $email;
$stmt->execute();

if ($stmt->affected_rows >0 ){
	echo "<script type='text/javascript'>
	alert('Dit password er blevet ændret');
	window.location = 'rediger.php';
	</script>";
}
else {
	echo "<script type='text/javascript'>
	alert('Der skete en fejl, prøv igen senere.');
	window.location = 'rediger.php';
	</script>";
}
	          }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);?>

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
	
		<!-- Font awesome icons-->
	<script src="https://kit.fontawesome.com/336a1c920c.js" crossorigin="anonymous"></script>
	
	</head>
<body>
	<?php 
	include 'nav.php';
?>
	<div class="container-fluid">
		<div class="row">	
			<div class="col-sm-12 col-lg-10 offset-lg-1">
			<h1>Rediger Profil</h1>
				<p><i class="fas fa-arrow-left mr-2"></i><a href="profil.php">Tilbage til profil</a></p>
				
<div class="col-lg-8 offset-lg-2 col-sm-12">
	
	<!--IMAGE FETCHING and UPDATING-->
		       <?php
			$email = $_SESSION['email'];
			$sql = "SELECT img FROM user WHERE email=?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('s', $email);
			$stmt->execute();
			$stmt->bind_result($img);
			while ($stmt->fetch()){
				
				echo '<form method="post" action="update-image.php" enctype="multipart/form-data">';
				echo '<div class="form-group text-center">';
				echo '<img class="rounded-circle mt-1 " src="'.$img.'" width="150">';
				echo '<input type="file" class="form-control-file center" name="fileToUpload">';
				echo '<button type="submit" class="btn btn-primary btn-sm mt-2 mb-4">Opdater</button>';
				echo '</div>';
				echo '</form>';
					}
	
	
	//NAME FETCHING and UPDATING
			$sql = "SELECT name FROM user WHERE email=?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('s', $email);
			$stmt->execute();
			$stmt->bind_result($name);
			while ($stmt->fetch()){
				echo '<form method="post" action="update-name.php">';
				echo '<div class="form-group">';
				//echo '<input type="hidden" name="iduser" value="'.$iduser.'">'; //Tjek om denne har værdi
				echo '<input type="name" name="name" class="form-control" value="'.$name.'">';
				echo '<button type="submit" class="btn btn-primary btn-sm float-right mt-2 mb-4">Opdater</button>';
				echo '</div>';
				echo '</form>';
			}
				?>

	<!--PASSWORD UPDATING-->
	
		<form method="post" enctype="multipart/form-data"> <!--Password-->
	<div class="form-group" <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
		
		<input type="password" name="pwd" placeholder="Skriv nyt password" class="form-control" value="<?php echo $password; ?>">
		<span class="help-block"><?php echo $password_err; ?></span>
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