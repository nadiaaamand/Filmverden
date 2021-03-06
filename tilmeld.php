<?php
// Include config file
require_once 'db-con.php';

//Defining what variable belong to what name in the form.
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["pwd"];
$nyhedsbrev = $_POST["nyhedsbrev"]; 

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["email"]))){
        $email_err = "Skriv venligst en mail.";
    } else{
        // Prepare a select statement
        $sql = "SELECT email FROM user WHERE email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
			$param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "E-mail findes allerede, vælg venligst et andet.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Hov! Der skete en fejl, prøv igen senere.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    } 
	
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
    if (empty($name_err) && empty($email_err) && empty($password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO user (name, email, pwd, img, nyhedsbrev) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_email, $param_password, $param_img, $param_nyhedsbrev);

            // Set parameters
			$param_name = $name;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
			$param_img = "img/default-img.png";
			$param_nyhedsbrev = $nyhedsbrev;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
				echo "<script type='text/javascript'>
					alert('Du er nu oprettet vores system og kan nu logge ind.');
					window.location = 'login.php';
					</script>";
            } else{
                echo "<script type='text/javascript'>
					alert('Beklager, der skete en fejl. Prøv eventuelt igen senere.');
					</script>";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}

?>

<!doctype html>
<html lang="da">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
<meta charset="UTF-8">
<title>Tilmeld</title>
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
	<div class="container">
		<div class="row">
		   <div class="col-lg-6 offset-lg-3 col-sm-12 mb-5 mt-4">
			   <h1>Tilmeld</h1>
			   		   <?php
			   //// Tell user it is already logged in
//Calling for the session id - if you are logged in you will see the id, if not you will get the else message
	if (isset($_SESSION['email'])) {
		echo '<p><strong>';
		echo "Du er allerede logget ind!";
		echo '</strong></p>';
			} 
			   ?>
<!--$SERVER PHP_SELF sørger for at error beskeder bliver vist på den nuværende side og htmlschars konvertere scpecielle karaktere til html entities(XSS)-->
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
    <label>Navn</label>
    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
	  <span class="help-block"><?php echo $name_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
	  <span class="help-block"><?php echo $email_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
    <label>Password</label>
    <input type="password" name="pwd" class="form-control" value="<?php echo $password; ?>">
	  <span class="help-block"><?php echo $password_err; ?></span>
		</div>
	 <div class="form-check">
	<input type="hidden" class="form-check-input" name="nyhedsbrev" value="nej">
    <input type="checkbox" class="form-check-input" name="nyhedsbrev" value="ja">
    <label class="form-check-label mb-2">Bliv en del af fællesskabet! Tilmeld mig nyhedsbrevet</label>
  </div>

		<small>Har du allerede en konto? <a href="login.php">Login her</a>.</small><br><br>
  <button type="submit" class="btn btn-primary" value="Submit">Tilmeld</button>
</form>
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