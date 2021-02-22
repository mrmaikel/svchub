<?php
function conn() {
	$conn = mysqli_connect("db","root","example","svchub");
	if (mysqli_connect_errno()) { die('Could not connect: ' . mysqli_connect_error()); }
	return $conn;
}
?>
