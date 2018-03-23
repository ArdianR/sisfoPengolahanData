<?php
  include('../config/database.php');
  $monthIn = array(
    "01" => "Januari",
    "02" => "Februari",
    "03" => "Maret",
    "04" => "April",
    "05" => "Mei",
    "06" => "Junis",
    "07" => "Juli",
    "08" => "Agustus",
    "09" => "September",
    "10" => "Oktober",
    "11" => "November",
    "12" => "Desember"
  );
  $bulan = $monthIn[date('m')];
  $result = mysqli_query($con, "SELECT rekapKehadiran.id, karyawan.nama, rekapKehadiran.jumlahKehadiran, rekapKehadiran.jumlahKetidakhadiran, rekapKehadiran.jumlahCuti, rekapKehadiran.totalJamKerja, rekapKehadiran.totalJamLembur, rekapKehadiran.Bulan, rekapKehadiran.Tahun FROM rekapKehadiran inner join karyawan on rekapKehadiran.id = karyawan.id where rekapKehadiran.Bulan = '$bulan'");

  $data = array();
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $data[]=$row;
    }
  }

  echo json_encode($data);

?>
