<?php
// Include config file
require_once 'db-con.php';
			   

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $email_err = 'Skriv venligst din email.';
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Skriv venligst dit password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT iduser, email, pwd FROM user WHERE email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
					
                    mysqli_stmt_bind_result($stmt, $email, $hashed_password=password_hash($password, PASSWORD_DEFAULT));
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the email to the session */
                            session_start();
                            $_SESSION['id'] = $row['iduser'];      
                            header("location: profil.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'Dit password er ikke rigtig, prøv igen.';
                        }
                    }
                } else{
                    // Display an error message if email doesn't exist
                    $email_err = 'Ingen konto blev fundet med den email.';
                }
            } else{
                echo "Hov! Noget gik galt, prøv igen senere.";
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
<!--Bootstrap stylesheet-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	
	<!--Stylesheet-->
	<link rel="stylesheet" href="css/style.css">
	
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
	<div class="container">
		<div class="row">
		   <div class="col-lg-6 offset-lg-3 col-sm-12 mb-5 mt-4">
			   <h1>Login</h1>
	<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <div class="form-group" <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>>
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
	 <span class="help-block"><?php echo $email_err; ?></span>
  </div>
  <div class="form-group" <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
	 <span class="help-block"><?php echo $password_err; ?></span>

  </div>
		<small>Har du ikke en bruger kan du registrere dig <a href="tilmeld.php">her</a></small><br><br>
  <button type="submit" value="Login" class="btn btn-primary">Login</button>
</form>
	</div>
	</div>
		</div>
	<?php 
	require 'footer.php';
?>
</body>
</html>