<?php
session_start();
require_once 'db-con.php';

$iduser = $_SESSION['id'];
$email = $_POST['email']; //Connecting the form data with the update function
//$iduser = $_POST['iduser'];

$sql = "UPDATE user SET email=$email WHERE iduser=$id";
$stmt = $conn->prepare($sql);
//$stmt->bind_param('si', $email, $iduser);
$stmt->execute();

if ($stmt->affected_rows >0 ){
	echo "<script type='text/javascript'>
	alert('Din email er blevet ændret');
	window.location = 'rediger.php';
	</script>";
}
else {
	echo "<script type='text/javascript'>
	alert('Der skete en fejl, prøv igen senere.');
	window.location = 'rediger.php';
	</script>";
}

?>