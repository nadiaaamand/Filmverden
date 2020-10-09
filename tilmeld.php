<?php
// Include config file
require_once 'db-con.php';

// Define variables and initialize with empty values
$confirm_password = "";
$name_err = $email_err = $password_err = $confirm_password_err = "";

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["email"]))){
        $email_err = "Skriv venligst en mail.";
    } else{
        // Prepare a select statement
        $sql = "SELECT iduser FROM user WHERE email = ?";
        
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
	
	//defining the check for uppercase and lowercase characters for password vertfication..
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
	
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Skriv venligst et password.";     
    } 
		elseif(!$uppercase || !$lowercase || strlen($password) < 8) {
		  $password_err = "Password bør indholde mindst 8 karaktere, 1 småt bogstav og 1 stort bogstav.";}
		else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Vær venlig at tjekke dine passwordfelter.'; 
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password passer ikke sammen.';
        }
    }
    
    // Check input errors before inserting in database
    if (empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO user (name, email, pwd) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_password);

            // Set parameters
			$param_name = $name;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
               header("location: login.php");
            } else{
                echo "Beklager, der skete en fejl. Prøv igen senere.";
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
	
</head>

<body>
<?php 
	include 'nav.php';
?>
	<div class="container">
		<div class="row">
		   <div class="col-lg-6 offset-lg-3 col-sm-12 mb-5 mt-4">
			   <h1>Tilmeld</h1>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
    <label for="navn">Navn</label>
    <input type="name" name="name" class="form-control" value="<?php echo $name; ?>" id="navn">
	  <span class="help-block"><?php echo $name_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo $name; ?>" id="exampleInputEmail1">
	  <span class="help-block"><?php echo $email_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" id="exampleInputPassword1">
	  <span class="help-block"><?php echo $password_err; ?></span>
		</div>
							  
	<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
    <label for="exampleInputPassword2">Bekræft Password</label>
    <input type="password" name="confirmPassword" class="form-control" value="<?php echo $confirm_password; ?>" id="exampleInputPassword1">
	  <span class="help-block"><?php echo $confirm_password_err; ?></span>
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
</body>
</html>