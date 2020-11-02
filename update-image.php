<?php
require_once 'db-con.php';

$target_file = $_POST['img'];
$file = $_POST['fileToUpload'];


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
$sql = "UPDATE user SET img=? WHERE iduser=1";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $param_img);
 // Set parameters
$param_img = $target_file;
$stmt->execute();


  if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
              header("location: rediger.php");
            } else{
                echo "Beklager, der skete en fejl. Prøv igen senere.";
            }
}
?>