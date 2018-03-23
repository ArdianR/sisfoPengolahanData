<?php
	include('../config/database.php');

	$data 	= json_decode(file_get_contents("PHP://input"));
	$id 		= $data->id;
	$result = mysqli_query($con, "SELECT rekapKehadiran.id, karyawan.nama, karyawan.photo, rekapKehadiran.jumlahKehadiran, rekapKehadiran.jumlahKetidakhadiran, rekapKehadiran.jumlahCuti, rekapKehadiran.totalJamKerja, rekapKehadiran.Bulan, rekapKehadiran.Tahun, rekapKehadiran.totalJamLembur FROM rekapKehadiran inner join karyawan on rekapKehadiran.id = karyawan.id where rekapKehadiran.id='$id'");
	$data = array();
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
	}
	echo json_encode($data);
?>
