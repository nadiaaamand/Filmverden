<?php

require_once 'db-con.php';

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
$sql = "UPDATE user SET pwd=? WHERE iduser=1";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $param_password);
$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
$stmt->execute();

if ($stmt->affected_rows >0 ){
	echo "<script type='text/javascript'>
	alert('Dit navn er blevet ændret');
	window.location = 'rediger.php';
	</script>";
}
else {
	echo "<script type='text/javascript'>
	alert('No Change');
	window.location = 'rediger.php';
	</script>";
}
	          }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);

?>