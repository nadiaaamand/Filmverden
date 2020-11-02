<?php

require_once 'db-con.php';

$name = $_POST['name']; //Connecting the form data with the update function

$sql = "UPDATE user SET name=? WHERE iduser=1";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $name);
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