<?php
session_start();
require_once 'db-con.php';

$email = $_SESSION['email'];

//image upload
$uploadOk = true;

if(!empty($_FILES['fileToUpload']['name'])) {
$target_dir = "img/"; //specifies the directory where the file is going to be placed
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']); //specifies the path of the file to be uploaded

move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file); //tmp_name contains the actual copy of your file content on the server
	}else {
		$uploadOk = false;
	}

if($uploadOk){ 
$sql = "UPDATE user SET img=? WHERE email=?"; //Her ændres bruger til når sessionen kommer på
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $param_img, $param_email);
 // Set parameters
$param_img = $target_file;
$param_email = $email;

  if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
              	echo "<script type='text/javascript'>
	alert('Dit billede er blevet ændret');
	window.location = 'rediger.php';
	</script>";
            } else{
	  echo "<script type='text/javascript'>
	alert('Beklager, der skete en fejl. Prøv igen senere.');
	window.location = 'rediger.php';
	</script>";
            }
}
?>