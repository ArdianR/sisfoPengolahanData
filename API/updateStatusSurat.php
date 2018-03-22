<?php
	include '../config/database.php';

	$data = json_decode(file_get_contents("php://input"));
	$id = $data->idSurat;

	mysqli_query($con, "UPDATE suratCuti SET status='read' where idSurat=$id");
?>
