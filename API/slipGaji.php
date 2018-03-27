<?php 
	include '../config/database.php';
	$tanggal = date('Y-m-d');
	$resultRekap = mysqli_query($con, "SELECT * FROM rekapKehadiran where'$tanggal' >=tanggalMulai  AND '$tanggal'<= batasTanggal"); // Mengambil Data dari Tabel Rekapitulasi
	$resultGaji  = mysqli_query($con, "SELECT * FROM gaji ");		   // Mengambil Data dari Tabel Gaji

	$gaji = mysqli_fetch_assoc($resultGaji);	
	if (mysqli_num_rows($resultRekap) > 0 && mysqli_num_rows($resultGaji)) {
		while ($row = mysqli_fetch_assoc($resultRekap)) {
			$potongan = (2 - $row["jumlahKehadiran"]) * $gaji["potongan"];
			$totalGaji = $gaji["gajiPokok"] - $potongan;

			mysqli_query($con, "INSERT INTO slipGaji (id, potongan, tambahan, totalGaji) values($row[id], $potongan, 0, $totalGaji)");
		}
	}
 ?>