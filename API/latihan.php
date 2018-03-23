<?php 
	include('../config/database.php');
	
	$result = mysqli_query($con, "SELECT count(id) as jum from daftarKehadiran where id=1");

	$row = mysqli_fetch_assoc($result);

	//print_r($result);
	echo $row['jum'];
?>
