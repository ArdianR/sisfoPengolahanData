<?php 
	
	include '../config/database.php';

	$result = mysqli_query($con, "SELECT * FROM gaji");

	$data    = array();

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$data[] = $row; 
		}
	}

	echo  json_encode($data);
 ?>