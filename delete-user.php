<?php
require_once 'db-con.php';
$iduser = $_POST['iduser'];

$sql = "DELETE FROM user WHERE iduser = ?";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i', $iduser);
	$stmt->execute();

if ($conn->query($sql) === TRUE){
	echo "<script type='text/javascript'>
	alert('Din bruger er nu slettet.');
	window.location = 'rediger.php';
	</script>"; 
	header('Location: index.php');
}
else {
	echo "<script type='text/javascript'>
	alert('Ingen ændring - din bruger findes stadig.');
	window.location = 'rediger.php';
	</script>"; 

}



?>