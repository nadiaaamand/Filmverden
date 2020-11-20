<?php
session_start();
require_once 'db-con.php';

$id = $_SESSION['iduser'];

$target_file = $_POST['img'];


//image upload
$uploadOk = true;

if(!empty($_FILES['fileToUpload']['name'])) {
$target_dir = "img/"; //specifies the directory where the file is going to be placed
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']); //specifies the path of the file to be uploaded

$uploadOk = 1;
move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file); //tmp_name contains the actual copy of your file content on the server
}else {
$uploadOk = false;

}
if($uploadOk){ 
$sql = "UPDATE user SET img=? WHERE iduser=?"; //Her ændres bruger til når sessionen kommer på
$stmt = $conn->prepare($sql);
$stmt->bind_param('si', $param_img, $param_id);
 // Set parameters
$param_img = $target_file;
$param_id =$id;
$stmt->execute();


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