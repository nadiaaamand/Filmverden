<?php
//LOUSIES PHP ELEMENT
session_start();
require_once 'db-con.php';

$email = $_SESSION['email'];
$name = $_POST['name']; //Connecting the form data with the update function

$sql = "UPDATE user SET name=? WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $name, $email);
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

?>