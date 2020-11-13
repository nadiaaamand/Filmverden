<?php
// Include config file
require_once 'db-con.php';

$email = $_POST["email"];
$password = $_POST["pwd"]; 

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

//Check that none of the fields were left empty
if ($email==''|$password=='') {
  $error = true;
  $fill_error = "Please fill in all the fields";
}
//If all the fields were filled correctly process form data
if (!$error) {
  //check that the user is not already registered, checking by unique email
  //remember to replace users_mwa18 with the name of the table you created
  $querycheckexist= "SELECT * FROM users WHERE email = '" . $email. "' AND password = '" . sha1($password). "' ";
    if(mysqli_query($con, $querycheckexist)) {
      //echo "sucess";
      $successmsg = "<p class='logged'>Welcome ".$email."<br> Du er nu logget ind</p>";
    }
    else {
      $errormsg = "Forkert email eller password";
    }
}
else $errormsg = $fill_error;
}

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
	<div class="container">
		<div class="row">
		   <div class="col-lg-6 offset-lg-3 col-sm-12 mb-5 mt-4">
			   <h1>Login</h1>
	<form>
	 <!-- these two span tags display the user feedback success or error on registering -->
      <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
      <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span><br /><br />
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"required value="<?php if($error) echo $username; ?>">
     <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1"required value="<?php if($error) echo $password; ?>">
    <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
  </div>
		<small>Har du ikke en bruger kan du registrere dig <a href="tilmeld.php">her</a></small><br><br>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
	</div>
	</div>
		</div>
	<?php 
	require 'footer.php';
?>
</body>
</html>