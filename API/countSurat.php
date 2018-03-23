<?php 
	include '../config/database.php';

	$result = mysqli_query($con, "SELECT count(id) as jumlah FROM suratCuti where status='terkirim'");

	$data = mysqli_fetch_assoc($result);

	echo json_encode($data);
?>