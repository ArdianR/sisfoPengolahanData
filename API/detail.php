<?php
	include('../config/database.php');
	$tanggal = date('Y-m-d');
	$data 	= json_decode(file_get_contents("PHP://input"));
	$id 		= $data->id;
	$result = mysqli_query($con, "SELECT rekapKehadiran.id, karyawan.nama, karyawan.photo, rekapKehadiran.jumlahKehadiran, rekapKehadiran.jumlahKetidakhadiran, rekapKehadiran.jumlahCuti, rekapKehadiran.totalJamKerja, rekapKehadiran.totalJamLembur, rekapKehadiran.tanggalMulai, rekapKehadiran.batasTanggal FROM rekapKehadiran inner join karyawan on rekapKehadiran.id = karyawan.id where rekapKehadiran.id='$id' AND  '$tanggal' >=rekapKehadiran.tanggalMulai  AND '$tanggal'<= rekapKehadiran.batasTanggal");
	$data = array();
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
	}
	echo json_encode($data);
?>
