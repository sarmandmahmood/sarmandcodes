<?php
	$conn=mysqli_connect("localhost","root","","asas");
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	mysqli_set_charset($conn,"utf8");
	

?>