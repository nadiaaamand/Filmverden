<?php

require_once 'db-con.php';

$email = $_POST['email']; //Connecting the form data with the update function

$sql = "UPDATE user SET email=? WHERE iduser=1";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $email);
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