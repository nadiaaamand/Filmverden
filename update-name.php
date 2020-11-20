<?php
session_start();
require_once 'db-con.php';

$iduser = $_SESSION['id'];

$name = $_POST['name']; //Connecting the form data with the update function

$sql = "UPDATE user SET name=? WHERE iduser=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('si', $name, $iduser);
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