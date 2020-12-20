<?php 

$conn = mysqli_connect("http://lamp2.sdu.dk/~naaam19", "naaam19", "23081993", "naaam19_db");

if (!$conn) {
	die("Connection failed: ". mysqli_connect_error());
	}

?>