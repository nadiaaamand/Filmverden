<?php 
$conn = mysqli_connect("localhost", "root", "root", "filmverden");

if (!$conn) {
	die("Connection failed: ". mysqli_connect_error());
	}

?>