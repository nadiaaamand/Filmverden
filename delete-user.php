<?php
require_once 'db-con.php';

//Code inspired from Amit Andipara --> https://www.youtube.com/watch?v=_KsDpo0uCVs

$iduser=  $_GET["iduser"];

mysqli_query($conn, "DELETE FROM user WHERE iduser = $iduser");
session_start();
session_destroy();
?>
	<script type='text/javascript'>
	alert('Din bruger er nu slettet.');
	window.location="index.php";
	</script>; 





